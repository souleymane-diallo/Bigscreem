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
			'answer1'    => 'required|email',
            'answer2'    => 'required|integer|min:1',
            'answer3'    => 'required',
            'answer4'    => 'required',
            'answer5'    => 'required|string',
            'answer6'    => 'required',
            'answer7'    => 'required',
            'answer8'    => 'required',
            'answer9'    => 'required',
            'answer10'   => 'required',
            'answer11'   => 'required',
            'answer12'   => 'required',
            'answer13'   => 'required',
            'answer14'   => 'required',
            'answer15'   => 'required',
            'answer16'   => 'required',
            'answer17'   => 'required',
            'answer18'   => 'required',
            'answer19'   => 'required',
            'answer20'   => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'answer1.required'    => 'Ce champ adresse mail est obligatoire !',
            'answer2.required'    => 'Ce champ est obligatoire !',
            'answer2.integer'    => 'Ce champ doit être un entier !',
            'answer3.required'    => 'Ce champ est obligatoire !',
            'answer4.required'    => 'Ce champ est obligatoire !',
            'answer5.required'    => 'Ce champ est obligatoire !',
            'answer6.required'    => 'Ce champ est obligatoire !',
            'answer7.required'    => 'Ce champ est obligatoire !',
            'answer8.required'    => 'Ce champ est obligatoire !',
            'answer9.required'    => 'Ce champ est obligatoire !',
            'answer10.required'   => 'Ce champ est obligatoire !',
            'answer11.required'   => 'Ce champ est obligatoire !',
            'answer12.required'   => 'Ce champ est obligatoire !',
            'answer13.required'   => 'Ce champ est obligatoire !',
            'answer14.required'   => 'Ce champ est obligatoire !',
            'answer15.required'   => 'Ce champ est obligatoire !',
            'answer16.required'   => 'Ce champ est obligatoire !',
            'answer17.required'   => 'Ce champ est obligatoire !',
            'answer18.required'   => 'Ce champ est obligatoire !',
            'answer19.required'   => 'Ce champ est obligatoire !',
            'answer20.required'   => 'Ce champ est obligatoire !',
		];
    }
}
