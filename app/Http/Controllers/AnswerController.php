<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Customer;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AnswerRequest   $answerRequest
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(AnswerRequest $answerRequest)
    {

        $single_link = Str::uuid()->toString();

        // $this->validate($request, [
        //     'email.*'     => 'required|email',
        //     'answerA.*' => 'required',
        //     'answerB.*' => 'required|min:1|max:255',
        //     'answerC.*' => 'required|regex:/[1-5]/'
        // ]);
        $email = $answerRequest->email;
        // dd("email",$email);
        foreach ($email as $key => $value) {
            $email = Customer::all()->where("email", $value)->pluck("email")->implode('0 => ',);
        }
        // dd("email",$email);
        if($email){
            // dd("test reussi");
            $questions = Question::all();
            $mail="L'adresse email existe déjà";
            return view('front.index', ['mail' => $mail,'questions'=> $questions]);
        }else{

            // dd("verification des informations récupérées", $answerRequest->email, $answerRequest->answerA, $answerRequest->answerB, $answerRequest->answerC);
            $email = $answerRequest->email;
            foreach ($email as $key => $value) {
                $emailId = Customer::all()->where("answer", $value)->pluck("id")->implode('0 => ',);
            }
            //dd("id de l'email",$emailId);
            if ($emailId) {

                $answers = array_replace($answerRequest->email, $answerRequest->answerA, $answerRequest->answerB, $answerRequest->answerC);
                ksort($answers);

                foreach ($answers as $key => $value) {
                    Answer::create([
                        'question_id'   => $key,
                        'answer'      => $value,
                        'single_link' => $single_link
                    ]);
                }
            } else {
                // dd("pas d'id de l'email");
                $emailValue = $answerRequest->email;
                foreach ($emailValue as $key => $value) {
                    Customer::create([
                        'email' => $value,
                    ]);
                }
                foreach ($emailValue as $key => $value) {
                    $customerId = Customer::all()->where("email", $value)->pluck("id")->implode('0 => ',);
                }
                // dd("valeur de customerId",$customerId);

                $answers = array_replace($answerRequest->email, $answerRequest->answerA, $answerRequest->answerB, $answerRequest->answerC);
                ksort($answers);
                // dd("$customerId", $customerId);
                foreach ($answers as $key => $value) {
                    Answer::create([
                        'question_id'   => $key,
                        'answer'      => $value,
                        'single_link' => $single_link,
                        'customer_id' => $customerId
                    ]);
                }
            }
            // dd("avant la redirection");
            return redirect('/message')->with('url', $single_link);
            dd("après la redirection");
        }

        // Customer::create([
        //     'email'   => $request->email
        // ]);
        // return redirect()->action([FrontController::class, 'message'], ['url' => $single_link ]);
        // return redirect()->route('message', ['url' => $single_link ]);
        //   return redirect('/message')->with('url', $single_link);
        //  return redirect('/message')->with("ur","Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
        //  votre investissement, nous vous préparons une application toujours plus
        //  facile à utiliser, seul ou en famille.
        //  Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
        //  cette adresse:<br> <a href='".url("/$single_link")."'/>" . url("/$single_link") . " </a>");

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
