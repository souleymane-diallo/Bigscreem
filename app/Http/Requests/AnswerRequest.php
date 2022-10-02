<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'email.*'    => 'required|email',
            'answerA.*'  => 'required',
            'answerB.*'  => 'required|min:1|max:255',
            'answerC.*'  => 'required|regex:/[1-5]/'
        ];
    }
    public function messages()
    {
        return [
			'email.required'     => 'Ce champ est obligatoire !',
			'answerA.required'     =>  'Ce champ est obligatoire !',
			'answerB.required'   =>  'Ce champ est obligatoire !',
            'answerC.required'   =>  'Ce champ est obligatoire !',
            'answerC.integer'   =>  'la reponse doit être comprise entre 1 et 5 ',

		];
    }
}
