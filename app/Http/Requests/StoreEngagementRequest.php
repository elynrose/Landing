<?php

namespace App\Http\Requests;

use App\Models\Engagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEngagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('engagement_create');
    }

    public function rules()
    {
        return [
            'campaign_id' => [
                'required',
                'integer',
            ],
            'email_encode' => [
                'string',
                'required',
            ],
            'open' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'click' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ip_address' => [
                'string',
                'required',
            ],
        ];
    }
}
