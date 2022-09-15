<?php

namespace App\Http\Controllers;

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
    public function answer(string $url)
    {
        //$question = Question::find($id);
        return view('front.answer');
    }
}
