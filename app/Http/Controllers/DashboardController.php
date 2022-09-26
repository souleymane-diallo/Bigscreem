<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return view('back.index');
    }

    /**
     * get all questions
     *
     */

    public function questionnaires()
    {
        $questions = Question::all();

        return view('back.questions', compact('questions'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function answers()
    {
        return view('back.answers');
    }
}
