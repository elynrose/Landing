@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.waitingList.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.waiting-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.waitingList.fields.id') }}
                        </th>
                        <td>
                            {{ $waitingList->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waitingList.fields.first_name') }}
                        </th>
                        <td>
                            {{ $waitingList->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waitingList.fields.last_name') }}
                        </th>
                        <td>
                            {{ $waitingList->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waitingList.fields.email') }}
                        </th>
                        <td>
                            {{ $waitingList->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waitingList.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $waitingList->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waitingList.fields.landing_page') }}
                        </th>
                        <td>
                            {{ $waitingList->landing_page->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.waiting-lists.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection