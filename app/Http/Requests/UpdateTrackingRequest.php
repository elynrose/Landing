<?php

namespace App\Http\Requests;

use App\Models\Tracking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTrackingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tracking_edit');
    }

    public function rules()
    {
        return [
            'total_sent' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_delivered' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_bounced' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'opens' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'clicks' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ip_address' => [
                'string',
                'nullable',
            ],
            'unique_clicks' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'unique_opens' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
