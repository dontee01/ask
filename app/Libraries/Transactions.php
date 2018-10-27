<?php
namespace App\Libraries;

use DateTime;
use DB;

/**
* 
*/
class Transactions
{
    // function __construct(argument)
    // {
        
    // }
    protected $ref_percentage;
    protected $first_ref_percentage;
    protected $credit_winner_percentage;

    public function __construct()
    {
        $this->ref_percentage = 0.10;
        $this->first_ref_percentage = 0.15;
        $this->credit_winner_percentage = 0.01;
    }

    public function balance($user_id)
    {
        $balance = DB::table('balance')
            ->where('user_id', $user_id)
            ->first(['previous_balance', 'balance', 'commission_referral', 'email']);

        return $balance;
    }

    public function bill($user_id, $email, $amount, $balance, $time)
    {
        $new_bal = $balance - $amount;
        $data = [
            'previous_balance' => $balance, 'balance' => $new_bal, 'updated_at' => $time
        ];
        $bal_ins = DB::table('balance')
            ->where('user_id', $user_id)
            ->where('email', $email)
            ->update($data);
    }

    public function check_balance($user_id, $amount)
    {
        $balance = DB::table('balance')
            ->where('user_id', $user_id)
            ->value('balance');

        if (($balance - $amount) < 0)
        {
            return 0;
        }

        return 1;
    }

    public function check_subscription($user_id, $game_id)
    {
        $check = DB::table('subscriptions')
            ->where('user_id', $user_id)
            ->where('game_id', $game_id)
            ->first();

        // user hasnt subscribed
        if(collect($check)->isEmpty())
        {
            return (object)['id' => '', 'status' => 0];
        }
        // game attempted and reloaded due to possible network error(page not fully loaded..no question has been attempted)
        if ($check->game_attempted == 1 && $check->next_attempted == 0)
        {
            return (object)['id' => $check->id, 'status' => 2];
        }
        // if game has been attempted and next button has been clicked, user should not reload
        if ($check->game_attempted == 1 && $check->next_attempted == 1)
        {
            return (object)['id' => $check->id, 'status' => 3];
        }
        return (object)['id' => $check->id, 'status' => 1];
    }

    public function credit_winner($user_id, $amount, $quiz_number, $time)
    {
        $ref_percentage = $this->credit_winner_percentage;
        $output = 0;
        $error = 1;

        $check_user = DB::table('users')
            ->where('id', $user_id)
            ->first();

        if (empty($check_user) )
        {
            $resp = ['error' => 1, 'message' => 'An error occured: Invalid user'];
            return (object) $resp;
        }

        DB::transaction(function() use($check_user, $amount, $quiz_number, $ref_percentage, $time, &$output, &$error) {

            $balance = $this->balance($check_user->id);
            // update user's balance
            $new_bal = $balance->balance + $amount;
            $data = [
                'previous_balance' => $balance->balance, 'balance' => $new_bal, 'updated_at' => $time
            ];
            $bill = DB::table('balance')
                ->where('user_id', $check_user->id)
                ->update($data);

            // add record to transactions
            $description = $quiz_number.'-Quiz Reward';
            $data_trans = [
                'user_id' => $check_user->id, 'amount' => $amount, 'previous_balance' => $balance->balance, 'description' => $description, 'created_at' => $time
            ];
            $transactions_ins = DB::table('transactions')
                ->insert($data_trans);

            
            // add credit commission to upline's balance
            $ref = DB::table('referrals')
                ->where('user_id', $check_user->id)
                ->where('deleted', 0)
                ->first();

            if (!empty($ref))
            {
                $ref_id = $ref->ref_user_id;
                if ($ref_id == 0)
                {
                    $ref_id = $this->get_user_custom('email', 'johntobby02@gmail.com', 'id');
                }
                $this->ref_commission($amount, $ref_percentage, $check_user->id, $ref_id, $check_user->username, $time);
                
            }
            

            $output = 1;
            $error = 0;
        });

        $resp = ['error' => $error, 'message' => ''];
        return (object) $resp;
    }

    public function encode($data)
    {
        // $dec_hash = base64_decode($data);
        // $hashh = substr($dec_hash, 0, 32);
        // $private_token = substr($dec_hash, 32, -1);
        // $pairing_type = substr($dec_hash, -1);
        $hashh = base64_encode($data);
        return $hashh;
    }

    public function decode($hashh)
    {
        $data = base64_encode($hashh);
        return $data;
    }


    public function get_user_custom($param, $val, $ret)
    {
        $val = DB::table('users')
            ->where($param, $val)
            ->value($ret);

        return $val;
    }


    public function ref_commission($amount, $percentage, $user_id, $ref_id, $username, $time)
    {
        $commission = $amount * $percentage;
        $balance = $this->balance($ref_id);
            // update user's balance
        $new_bal = $balance->balance + $commission;
        $new_ref_bal = $balance->commission_referral + $commission;
        $data = [
            'previous_balance' => $balance->balance, 'balance' => $new_bal, 'commission_referral' => $new_ref_bal, 'updated_at' => $time
        ];
        $bill = DB::table('balance')
            ->where('user_id', $ref_id)
            ->update($data);

        // add record to transactions
        $description = 'Referral commission from '.strtoupper($username);
        $data_trans = [
            'user_id' => $ref_id, 'amount' => $commission, 'previous_balance' => $balance->balance, 'description' => $description, 'created_at' => $time
        ];
        $transactions_ins = DB::table('transactions')
            ->insert($data_trans);
    }
    

    public function top_up($user_id, $reference, $amount, $processor_id, $authorization_code, $payment_details, $time)
    {
        $ref_percentage = $this->ref_percentage;
        $output = 0;

        $check_user = DB::table('users')
            ->where('id', $user_id)
            ->first();

        if (empty($check_user) )
        {
            \Session::flash('flash_message', 'An error occured: Reference error');
            return redirect('account');
        }

        DB::transaction(function() use($check_user, $amount, $ref_percentage, $reference, $processor_id, $authorization_code, $payment_details, $time, &$output) {


            $balance = $this->balance($check_user->id);
            // update user's balance
            $new_bal = $balance->balance + $amount;
            $data = [
                'previous_balance' => $balance->balance, 'balance' => $new_bal, 'updated_at' => $time
            ];
            $bill = DB::table('balance')
                ->where('user_id', $check_user->id)
                ->update($data);

            // add record to transactions
            $description = $reference.' Top Up';
            $data_trans = [
                'user_id' => $check_user->id, 'amount' => $amount, 'previous_balance' => $balance->balance, 'description' => $description, 'topup' => 1,  'created_at' => $time
            ];
            $transactions_ins = DB::table('transactions')
                ->insert($data_trans);

            $data_processor = [
                'authorization_code' => $authorization_code, 'payment_details' => $payment_details, 'completed' => 1, 'credited' => 1, 'updated_at' => $time
            ];

            $procesor_upd = DB::table('payment_processor')
                ->where('id', $processor_id)
                ->update($data_processor);

            
            // if this is user's first recharge, add commission to upline's balance
            if ($check_user->first_recharge == 0)
            {
                $ref_percentage = $this->first_ref_percentage;
            }
            $ref = DB::table('referrals')
                ->where('user_id', $check_user->id)
                // ->where('is_ref_commissioned', 0)
                ->where('deleted', 0)
                ->first();

            if (!empty($ref))
            {
                $ref_id = $ref->ref_user_id;
                if ($ref_id == 0)
                {
                    $ref_id = $this->get_user_custom('email', 'johntobby02@gmail.com', 'id');
                }
                $this->ref_commission($amount, $ref_percentage, $check_user->id, $ref_id, $check_user->username, $time);

                if ($check_user->first_recharge == 0)
                {
                    $data_user = [
                        'first_recharge' => 1, 'updated_at' => $time
                    ];
                    $user_upd = DB::table('users')
                        ->where('id', $check_user->id)
                        ->update($data_user);

                    $data_ref = [
                        'first_recharge_amount' => $amount, 'is_ref_commissioned' => 1, 'updated_at' => $time
                    ];
                    $referrals_upd = DB::table('referrals')
                        ->where('user_id', $check_user->id)
                        ->update($data_ref);
                }
                
            }
            

            $output = 1;
        });

        return $output;
    }

}

