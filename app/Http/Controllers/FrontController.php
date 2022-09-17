<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Show all the list question
     *
     * @return view
     */
    public function index()
    {
        //
        $questions = Question::all();
        return view('front.index', compact('questions'));
    }
    public function answers(string $single_link) {
        $questions = Question::all();
        $answers = Answer::hashPath($single_link)->pluck('response', 'question_id');

        return view('front.answer', ['questions' => $questions, 'answers' => $answers]);
    }

    /**
     * Show response survey
     *
     * @return void
     */
    public function answer(int $id)
    {
        $question = Question::find($id);
        return view('front.answer', compact('question'));
    }
}
