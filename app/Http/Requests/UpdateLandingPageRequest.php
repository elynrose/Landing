<?php

namespace App\Http\Requests;

use App\Models\LandingPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLandingPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('landing_page_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'heading' => [
                'string',
                'required',
            ],
            'sub_heading' => [
                'string',
                'nullable',
            ],
            'banner_image' => [
                'required',
            ],
            'introduction' => [
                'required',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'linkedin' => [
                'string',
                'nullable',
            ],
            'discord' => [
                'string',
                'nullable',
            ],
            'countdown' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
