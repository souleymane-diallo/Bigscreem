<?php

namespace App\Http\Controllers;

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
     * Undocumented function
     *
     * @return void
     */
    public function questions()
    {
        return view('back.questions');
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
