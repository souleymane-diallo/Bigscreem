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
}
