@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tracking.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trackings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.id') }}
                        </th>
                        <td>
                            {{ $tracking->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.campaign') }}
                        </th>
                        <td>
                            {{ $tracking->campaign->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.total_sent') }}
                        </th>
                        <td>
                            {{ $tracking->total_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.total_delivered') }}
                        </th>
                        <td>
                            {{ $tracking->total_delivered }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.total_bounced') }}
                        </th>
                        <td>
                            {{ $tracking->total_bounced }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.opens') }}
                        </th>
                        <td>
                            {{ $tracking->opens }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.clicks') }}
                        </th>
                        <td>
                            {{ $tracking->clicks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.ip_address') }}
                        </th>
                        <td>
                            {{ $tracking->ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.unique_clicks') }}
                        </th>
                        <td>
                            {{ $tracking->unique_clicks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tracking.fields.unique_opens') }}
                        </th>
                        <td>
                            {{ $tracking->unique_opens }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trackings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection