<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
use App\Libraries\Custom;
use App\Libraries\Transactions;
use App\Libraries\Ask;

use Paystack;

class ExploreController extends Controller
{
    protected $custom;
    protected $transactions;
    protected $ask;

    protected $site_name;
    
    public function __construct()
    {
//        $this->middleware('login')->except('how_to');
    	$this->custom = new Custom();
        $this->transactions = new Transactions();
    	$this->ask = new Ask();

        $this->site_name = env('SITE_NAME');
    }
    
    public function answer(Request $request, $number = '')
    {
        $custom = $this->custom;
        $ask = $this->ask;
        $answer = ucfirst($request->answer);
        $ssh = $request->ssh;
        $attachment = $request->attachment;
//        $user_id = \Session::get('uid');
        $user_id = 1;
        $output = 0;
        $time = $custom->time_now();
        
        $file_path = '';
        
        if (empty($answer))
        {
            \Session::flash('flash_message', 'Please type your answer');
            return redirect()->back()->withInput();
        }
        
        if (empty($ssh))
        {
            \Session::flash('flash_message', 'An error occurred. Please contact our support');
            return redirect()->back();
        }

        $this->validate($request, [
            'ssh' => 'required',
            'attachment' => 'image'
        ]);
        
        $verify_question = $ask->getQuestionById($ssh);
        
        if (empty($verify_question))
        {
            \Session::flash('flash_message', 'An error occurred. Please contact our support');
            return redirect()->back();
        }

        // process file
        if (!empty($attachment))
        {
            $file_response = $this->upload($request);
            // $file_id = 0;
            if ($file_response->status == 0)
            {
                \Session::flash('flash_message', $file_response->details);
                return redirect()->back();
            }
            // $file_id = $file_response->file_id;
            $file_path = $file_response->file_path;
        }

        $data_question = [
            'user_id' => $user_id, 'question_id' => $verify_question->id, 
            'answer' => $answer, 'file_url' => $file_path, 'created_at' => $time
        ];
        
        DB::transaction(function() use($data_question, $verify_question, $ask, &$output) {
            $ask->setAnswer($data_question);
//            increment answer count on question table
            $questions_upd = DB::table('questions')
                    ->where('id', $verify_question->id)
                    ->increment('answers_count');
            
            $output = 1;
        });
        
        if ($output == 0)
        {
            \Session::flash('flash_message', 'An error occurred. Please contact our support');
            return redirect()->back();
        }

        \Session::flash('flash_message_success', 'Your answer has been published');
        return redirect()->back();
    }
    
    public function ask(Request $request)
    {
        $custom = $this->custom;
        $channel = $request->channel;
        $question = ucfirst($request->question);
        $details = $request->details;
        $attachment = $request->attachment;
//        $user_id = \Session::get('uid');
        $user_id = 1;
        $time = $custom->time_now();
        
        
        $file_path = '';

        $this->validate($request, [
            'question' => 'required',
            'channel' => 'required',
            'attachment' => 'image'
        ]);

        // process file
        if (!empty($attachment))
        {
            $file_response = $this->upload($request);
            // $file_id = 0;
            if ($file_response->status == 0)
            {
                \Session::flash('flash_message', $file_response->details);
                return redirect()->back();
            }
            // $file_id = $file_response->file_id;
            $file_path = $file_response->file_path;
        }
        
        $question_number = $custom->generate_post_number('questions', 'question_number');
        $title_url = str_replace(' ', '-', $question);
        $title_url = preg_replace('/[^\w]/', '-', $title_url);

        $data_question = [
            'user_id' => $user_id, 'channel_ids' => $channel, 'question_number' => $question_number, 
            'question' => $question, 'question_details' => $details, 'title_url' => strtolower($title_url), 
            'file_url' => $file_path, 'created_at' => $time
        ];
        $question_ins = DB::table('questions')
            ->insert($data_question);

        \Session::flash('flash_message_success', 'Your question has been published');
        return redirect()->back();
    }

    public function change_password_page()
    {
        return view('account');
    }

    public function dashboard()
    {
    	$custom = $this->custom;
    	$user_id = \Session::get('uid');
    	$active_games = collect([]);


		            // var_dump($active_games);exit;
        $results = [];

        $profile = DB::table('users')
        	->join('balance', 'users.email', 'balance.email')
            ->where('users.id', \Session::get('uid'))
            ->where('users.deleted', 0)
            ->select('users.firstname as firstname', 'users.lastname as lastname', 'users.username', 'users.email', 'users.email_verified as verified', 'balance.balance')
            ->first();
            // var_dump(\Session::get('uid'));exit;

		return view('dashboard', ['results' => $results, 'games' => $active_games, 'profile' => $profile]);
    }

    public function how_to()
    {
        return view('how-to');
    }

    public function redirectToGateway(Request $request)
    {
    	$custom = $this->custom;
    	$user_id = \Session::get('uid');
    	$email = $request->email;
    	$amount = $request->amount;
    	$original = $request->original;
    	$reference = $request->reference;
    	$key = $request->key;
        $time = $custom->time_now();

        $email = $custom->process_email($email);

        if (empty($email) || empty($original) || empty($amount) || empty($reference) || empty($key) )
        {
            \Session::flash('flash_message', 'An error occured');
            return redirect('account');
        }

        if (!ctype_digit($amount) )
        {
            \Session::flash('flash_message', 'An error occured');
            return redirect('account');
        }

        $check_reference = DB::table('payment_processor')
            ->where('reference', $reference)
            ->first();

        if ($check_reference)
        {
            \Session::flash('flash_message', 'Timeout: please try again');
            return redirect('account');
        }

        $data = [
        	'user_id' => $user_id, 'email' => $email, 'reference' => $reference, 'amount' => $original, 'amount_sent' => $amount, 'created_at' => $time
        ];
        $payment_ins = DB::table('payment_processor')
        	->insert($data);

    	if ($payment_ins)
        {
        	return Paystack::getAuthorizationUrl()->redirectNow();
        }
        else
        {
        	\Session::flash('flash_message', 'An error occured. Please try again');
        	return redirect('account');
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {
        $custom = $this->custom;
        $transactions = $this->transactions;
        $time = $custom->time_now();

        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);
        $tranx = $paymentDetails;
        $data = $tranx['data'];

        if(!$tranx['status'])
        {
            // there was an error from the API
            \Session::flash('flash_message', 'An error occured: '.$tranx['message']);
            return redirect('account');
        }

        // fetch transaction reference from url query string
        $reference = $request->query('trxref');
        if (empty($reference))
        {
            \Session::flash('flash_message', 'An error occured while crediting your account');
            return redirect('account');
        }

        if('success' == $data['status'])
        {
            // transaction was successful...
            // please check other things like whether you already gave value for this ref
            // if the email matches the customer who owns the product etc
            // Give value
            $processor = DB::table('payment_processor')
                ->where('reference', $reference)
                ->latest()
                ->first();

            // if reference could not be found(i.e the transaction has not been initialized or something went wrong)
            if (!$processor)
            {
                \Session::flash('flash_message', 'An error occured: Reference error');
                return redirect('account');
            }

            // check if user has been credited before (avoid multiple billing)
            if ($processor->credited == 1)
            {
                return redirect('account');
            }
            $email = $data['customer']['email'];
            $authorization_code = $data['authorization']['authorization_code'];
            $amount = $processor->amount;

            // check if email matches the customer who owns the current transaction
            if (strtolower($processor->email) !== strtolower($email))
            {
                \Session::flash('flash_message', 'An error occured: Reference error');
                return redirect('account');
            }

            // give value to user and also give referral commission accordingly
            $topup = $transactions->top_up($processor->user_id, $reference, $amount, $processor->id, $authorization_code, json_encode($paymentDetails), $time);

            // if databse transaction failed
            if ($topup == 0)
            {
                \Session::flash('flash_message_error', 'Error');
                return redirect('account');
            }

            // notify user by email
            $message = 'Your '.$this->site_name.' account recharge of &#8358;'.$amount.' was successful';
            $custom->send_generic_email($email, $message, 'Account Recharge');

            \Session::flash('flash_message_success', 'Balance updated');
            return redirect('account');
        }
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
    


    public function upload(Request $request)
    {
        $custom = $this->custom;
        $file_recipients = $request->file('attachment');
        $user_id = \Session::get('uid');
        $time = $custom->time_now();
        $output = 0;
        $file_id = 0;
        $mime_arr = ['image/jpeg','image/png'];

        // var_dump($file_recipients->getSize());exit;

        if ($file_recipients)
        {
            // handle file size
            $size = $file_recipients->getSize();
            if ($size > 5000000)
            {
                $resp = [
                    'status' => 0,
                    'details' => 'File too large. File should not exceed 5MB'
                ];
                return (object) $resp;
            }

            $mime = $file_recipients->getClientMimeType();
            // var_dump($mime);exit;
            if (!in_array($mime, $mime_arr))
            {
                $resp = [
                    'status' => 0,
                    'details' => 'Only images are allowed(png/jpeg)'
                ];
                return (object) $resp;
            }

            $path = '/uploads/';
            // $asset_path = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'blogger-files'.DIRECTORY_SEPARATOR;
            // $destination_path = $this->live_server.DIRECTORY_SEPARATOR.'blogger-files'.DIRECTORY_SEPARATOR;


            $asset_path = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'blogger-files'.DIRECTORY_SEPARATOR;
            $destination_path = $this->live_server.DIRECTORY_SEPARATOR.'blogger-files'.DIRECTORY_SEPARATOR;
            // $destination_path = $asset_path;
            // $destination_path = public_path().$path;
            $filename = $custom->hashh($file_recipients->getClientOriginalName(), $time).'.'.$file_recipients->getClientOriginalExtension();
            $file_path = $destination_path.$filename;
            // getClientOriginalExtension()
            // $file_path = $path.$filename;

            $upload_success = $file_recipients->move($asset_path, $filename);
            // var_dump($upload_success);exit;

            // if file was successfully uploaded
            if ($upload_success)
            {
                $resp = [
                    'status' => 1,
                    'file_path' => $file_path
                ];
                return (object) $resp;
            }
            else
            {
                $resp = [
                    'status' => 0,
                    'details' => 'File not uploaded, try again'
                ];
                return (object) $resp;
            }
        }
        else
        {
            $resp = [
                'status' => 0,
                'details' => 'File upload error'
            ];
            return (object) $resp;
        }
    }

}
