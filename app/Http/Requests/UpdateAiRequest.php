<?php

namespace App\Http\Requests;

use App\Models\Ai;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ai_edit');
    }

    public function rules()
    {
        return [];
    }
}
