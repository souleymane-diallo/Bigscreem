<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $single_link = Str::uuid()->toString();

        $this->validate($request, [
            'email.*'     => 'required|email',
            'answerA.*' => 'required',
            'answerB.*' => 'required|min:1|max:255',
            'answerC.*' => 'required|regex:/[1-5]/'
        ]);

        $answers = array_replace( $request->email, $request->answerA, $request->answerB, $request->answerC );

        ksort($answers);

        foreach ($answers as $key => $value) {
            Answer::create([
                'question_id'   => $key,
                'answer'      => $value,
                'single_link' => $single_link
            ]);
        }

        // Customer::create([
        //     'email'   => $request->email
        // ]);
        // return redirect()->action([FrontController::class, 'message'], ['url' => $single_link ]);
        // return redirect()->route('message', ['url' => $single_link ]);
          return redirect('/message')->with('url', $single_link);
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
