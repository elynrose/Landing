@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.engagement.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.engagements.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.engagement.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $engagement->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.engagement.fields.campaign') }}
                                    </th>
                                    <td>
                                        {{ $engagement->campaign->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.engagement.fields.email_encode') }}
                                    </th>
                                    <td>
                                        {{ $engagement->email_encode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.engagement.fields.open') }}
                                    </th>
                                    <td>
                                        {{ $engagement->open }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.engagement.fields.click') }}
                                    </th>
                                    <td>
                                        {{ $engagement->click }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.engagement.fields.ip_address') }}
                                    </th>
                                    <td>
                                        {{ $engagement->ip_address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.engagements.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection