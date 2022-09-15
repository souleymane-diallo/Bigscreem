<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

        $questions = Question::all();
        return view('front.index',['questions'=>$questions]);

    }
    public function answers(string $single_link) {
        $questions = Question::all();
        $answers = Answer::hashPath($single_link)->pluck('response', 'question_id');

        return view('front.answer', ['questions' => $questions, 'answers' => $answers]);
    }
}
