<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
use App\Libraries\Custom;
use App\Libraries\Ask;

class PagesController extends Controller
{
    protected $custom;
    protected $ask;

    protected $site_name;

    public function __construct()
    {
        // $this->middleware('login')->except('how_to');
    	$this->custom = new Custom();
    	$this->ask = new Ask();

        $this->site_name = env('SITE_NAME');
    }

    public function ask()
    {
        $ask = $this->ask;
        
        $channels = $ask->getChannels();
        $hot = $ask->getHotQuestions();
        
        return view('ask', ['channels' => $channels, 'hot_questions' => $hot]);
    }

    public function home()
    {
        return view('home');
    }

    public function how_to()
    {
        return view('how-to');
    }
    
    public function my_profile()
    {
        $ask = $this->ask;
//        $user_id = \Session::get('uid');
        $user_id = 1;
        
        $user = DB::table('users')
                ->where('id', $user_id)
                ->where('deleted', 0)
                ->first();
//        $username = 'test';
        if (empty($user))
        {
            \Session::flash('flash_message', 'Profile not found');
            return redirect()->back();
        }
        
        $questions = $ask->getMyQuestions($user->id);
        $total_questions = $ask->getQuestionTotal($user->id);
        $total_answers = $ask->getAnswerTotal($user->id);
        
        return view('my-profile', ['questions' => $questions, 'user' => $user, 
            'total_questions' => $total_questions, 'total_answers' => $total_answers]);
    }
    
    public function my_questions()
    {
        $ask = $this->ask;
//        $user_id = \Session::get('uid');
        $user_id = 1;
        
        $questions = $ask->getMyQuestions($user_id);
        
        return view('my-questions', ['questions' => $questions]);
    }

    public function question_details($number = '', $title = '')
    {
        $custom = $this->custom;
        $ask = $this->ask;
        
        if (empty($number) || empty($title))
        {
            return redirect('/');
        }
        $verify = DB::table('questions')
                ->where('question_number', $number)
                ->where('title_url', $title)
                ->where('deleted', 0)
                ->first();
        if (empty($verify))
        {
            return redirect('/');
        }
        $answers = $ask->getAnswers($verify->id);
        $hot = $ask->getHotQuestions($verify->id);
        
        return view('question-details', ['answers' => $answers, 'question' => $verify, 
            'hot_questions' => $hot]);
    }

    public function questions()
    {
        $ask = $this->ask;
        $questions = $ask->getQuestions();
        $hot = $ask->getHotQuestions();
        
        return view('questions', ['questions' => $questions, 'hot_questions' => $hot]);
    }
    
    public function user_profile($username)
    {
        $ask = $this->ask;
//        $user_id = \Session::get('uid');
//        $user_id = 1;
        $user = DB::table('users')
                ->where('username', $username)
                ->where('deleted', 0)
                ->first();
        
        if (empty($user))
        {
            \Session::flash('flash_message', 'Profile not found');
            return redirect()->back();
        }
        
        $questions = $ask->getMyQuestions($user->id);
        $total_questions = $ask->getQuestionTotal($user->id);
        $total_answers = $ask->getAnswerTotal($user->id);
        
        return view('my-questions', ['questions' => $questions, 'username' => $username, 
            'total_questions' => $total_questions, 'total_answers' => $total_answers]);
    }

}
