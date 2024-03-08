@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.report.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.id') }}
                        </th>
                        <td>
                            {{ $report->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.campaign') }}
                        </th>
                        <td>
                            {{ $report->campaign->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.total_sent') }}
                        </th>
                        <td>
                            {{ $report->total_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.total_delivered') }}
                        </th>
                        <td>
                            {{ $report->total_delivered }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.total_bounced') }}
                        </th>
                        <td>
                            {{ $report->total_bounced }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.opens') }}
                        </th>
                        <td>
                            {{ $report->opens }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.clicks') }}
                        </th>
                        <td>
                            {{ $report->clicks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.ip_address') }}
                        </th>
                        <td>
                            {{ $report->ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.unique_clicks') }}
                        </th>
                        <td>
                            {{ $report->unique_clicks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.unique_opens') }}
                        </th>
                        <td>
                            {{ $report->unique_opens }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection