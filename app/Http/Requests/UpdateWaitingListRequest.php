<?php

namespace App\Http\Requests;

use App\Models\WaitingList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWaitingListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('waiting_list_edit');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'landing_page_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
