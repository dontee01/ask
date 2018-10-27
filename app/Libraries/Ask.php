<?php
namespace App\Libraries;

use DB;
use DateTime;

class Ask
{
    
    protected $hypermedia_rows;
    
    function __construct()
    {
        $this->hypermedia_rows = env('HYPERMEDIA_ROWS');
    }
    
    public function getAnswers($question_id)
    {
        $answers = DB::table('answers')
                ->join('users', 'answers.user_id', 'users.id')
                ->where('answers.question_id', $question_id)
                ->where('answers.deleted', 0)
                ->select('users.username', 'users.firstname', 'users.lastname', 
                        'answers.id as answer_id', 'answers.answer', 'answers.view_count', 
                        'answers.thumbsup_count', 'answers.created_at as date')
                ->paginate($this->hypermedia_rows);
        
        return $answers;
    }
    
    public function getChannels()
    {
        $channels = DB::table('channels')
                ->where('deleted', 0)
                ->get();
        
        return $channels;
    }
    
    public function getHotQuestions()
    {
        $questions = DB::table('questions')
                ->where('deleted', 0)
                ->orderBy('thumbsup_count')
                ->take(5)
                ->get();
        
        return $questions;
    }

    public function getMyQuestions($user_id)
    {
        $questions = DB::table('questions')
                ->join('users', 'users.id', 'questions.user_id')
                ->where('questions.user_id', $user_id)
                ->where('questions.deleted', 0)
                ->select('users.username', 'questions.question', 'questions.question_details', 'questions.title_url', 
                        'questions.question_number', 'questions.answer_id', 'questions.view_count',
                        'questions.thumbsup_count', 'questions.answers_count',
                        'questions.created_at as date')
                ->orderBy('questions.id')
                ->paginate($this->hypermedia_rows);
        
        return $questions;
    }
    
    public function getOtherHotQuestions($id)
    {
        $questions = DB::table('questions')
                ->where('id', '<>', $id)
                ->where('deleted', 0)
                ->orderBy('thumbsup_count')
                ->take(5)
                ->get();
        
        return $questions;
    }

    public function getQuestionById($id)
    {
        $question = DB::table('questions')
                ->where('id', $id)
                ->where('deleted', 0)
                ->first();
        
        return $question;
    }

    public function getQuestions($filter = '')
    {
        $questions = DB::table('questions')
                ->join('users', 'users.id', 'questions.user_id')
                ->where('questions.deleted', 0)
                ->select('users.username', 'questions.question', 'questions.question_details', 'questions.title_url', 
                        'questions.question_number', 'questions.answer_id', 'questions.view_count',
                        'questions.thumbsup_count', 'questions.answers_count',
                        'questions.created_at as date')
                ->orderBy('questions.id')
                ->paginate($this->hypermedia_rows);
        
        return $questions;
    }

    public function getQuestionTotal($user_id = '')
    {
        $total = 0;
        if (empty($user_id))
        {
            $total = DB::table('questions')
                    ->where('deleted', 0)
                    ->count();
        }
        else
        {
            $total = DB::table('questions')
                    ->where('user_id', $user_id)
                    ->where('deleted', 0)
                    ->count();
        }
        
        
        return $total;
    }

    public function getAnswerTotal($user_id = '')
    {
        $total = 0;
        if (empty($user_id))
        {
            $total = DB::table('answers')
                    ->where('deleted', 0)
                    ->count();
        }
        else
        {
            $total = DB::table('answers')
                    ->where('user_id', $user_id)
                    ->where('deleted', 0)
                    ->count();
        }
        
        
        return $total;
    }
    
    public function setAnswer($data)
    {
        $answer_ins = DB::table('answers')
            ->insert($data);
    }
    
    public function setQuestion($data)
    {
        $question_ins = DB::table('questions')
            ->insert($data);
    }

}

