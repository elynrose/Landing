@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ai.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ais.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ai.fields.id') }}
                        </th>
                        <td>
                            {{ $ai->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ai.fields.landing_page') }}
                        </th>
                        <td>
                            {{ $ai->landing_page->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ai.fields.campaign') }}
                        </th>
                        <td>
                            {{ $ai->campaign->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ai.fields.recommendations') }}
                        </th>
                        <td>
                            {{ $ai->recommendations }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ais.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection