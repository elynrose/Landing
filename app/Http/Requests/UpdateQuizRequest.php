<?php

namespace App\Http\Requests;

use App\Models\Quiz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuizRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quiz_edit');
    }

    public function rules()
    {
        return [
            'question' => [
                'string',
                'nullable',
            ],
            'point' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'landing_page_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
