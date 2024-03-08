<?php

namespace App\Http\Requests;

use App\Models\Ai;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ai_create');
    }

    public function rules()
    {
        return [];
    }
}
