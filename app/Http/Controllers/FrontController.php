<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        
        $questions = Question::all();
        return view('front.index',['questions'=>$questions]);

    }
}
