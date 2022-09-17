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
     /**
     * Show response survey
     *
     * @return void
     */
    public function answers(string $single_link) {
        $questions = Question::all();

        $answers = Answer::HashPath($single_link)->pluck('answer', 'question_id');


        return view('front.answer', ['questions' => $questions, 'answers' => $answers]);
    }

      /**
     *return the message form
     *
     * @return void
     */
    public function message()
    {
        return view('front.message');

    }
}
