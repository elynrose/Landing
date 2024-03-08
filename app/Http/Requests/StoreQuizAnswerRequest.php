<?php

namespace App\Http\Requests;

use App\Models\QuizAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuizAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quiz_answer_create');
    }

    public function rules()
    {
        return [
            'email_id' => [
                'required',
                'integer',
            ],
            'answer' => [
                'string',
                'required',
            ],
        ];
    }
}
