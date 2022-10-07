<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     *
     *Displays three pieCharts and radarChart
     *
     * @return void
     */

    public function index()
    {
        $pieDatas = array($this->pieChart('6'), $this->pieChart('7'), $this->pieChart('10'));
        // dd("données pieDatas",$pieDatas);
         $radarDatas = $this->radarChart(array('11', '12', '13', '14', '15'));
         // dd( $radarDatas);
        return view('back.index', ['pieDatas' => $pieDatas, 'radarDatas' => $radarDatas]);
    }

    //allows you to define the number of times an answer has been chosen in relation to a question
    public function pieChart(string $questionID)
    {
        $labels = Question::AnswerPossible($questionID)->pluck('possible_answer');
        $labels = explode(", ", $labels[0]);

        /**
         * Get the question
         */
        $question = Question::where('id', $questionID)->pluck('body');

        /**
         * Group all the responses to count them after
         */
        $answers = Answer::all()->where('question_id', $questionID)->groupBy('answer');

        $datas = [];

        $colors = [];

        /**
         * Foreach labels define :
         *  - $number => how many this response was choose
         *  - $colors => push a value who define the label
         */
        foreach ($labels as $key => $value) {
            $number = 0;

            if(isset($answers[$value])) {

                $number = $answers[$value]->count();

            }

            array_push( $datas, $number);
            array_push( $colors, "#".bin2hex(openssl_random_pseudo_bytes(3)) );
        }


        return array(
            "question_id" => $questionID,
            "question" => $question[0],
            "labels" => $labels,
            "datas" => $datas,
            "colors" => $colors
        );
    }

    //allows you to average the answers of the questions passed as parameters in the table
    public function radarChart(array $questionsID) {

        $labels = [];
        $answers = [];

        /**
         * Foreach value inside $questionsID :
         *  - $labels => push inside the sentence `Question n°` + the value of `$questionID`
         *  - $responses => push inside a average of the answers
         */
        foreach ($questionsID as $questionID) {
            array_push($labels, "Question n°" . $questionID);
            array_push($answers, Answer::all()->where('question_id', $questionID)->avg('answer'));
        }

        return array("labels" => $labels, "datas" => $answers);
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
     *
     * Displays a respondent's questions and answers
     *
     * @return void
     */

     public function answers()
    {
        $questions = Question::all();
        $answers = Answer::all();

        $link = [];
        foreach($answers as $answer) {

            $link[$answer->single_link]= Answer::hashPath($answer->single_link)->pluck('answer', 'question_id');
        }
        return view('back.answers',['answers' => $link, 'questions' => $questions]);
    }
}
