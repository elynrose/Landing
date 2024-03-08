@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.campaign.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.campaigns.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campaign.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $campaign->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campaign.fields.list') }}
                                    </th>
                                    <td>
                                        {{ $campaign->list->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campaign.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $campaign->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campaign.fields.subject') }}
                                    </th>
                                    <td>
                                        {{ $campaign->subject }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campaign.fields.header_image') }}
                                    </th>
                                    <td>
                                        @if($campaign->header_image)
                                            <a href="{{ $campaign->header_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $campaign->header_image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campaign.fields.body') }}
                                    </th>
                                    <td>
                                        {!! $campaign->body !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campaign.fields.link') }}
                                    </th>
                                    <td>
                                        {{ $campaign->link }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.campaign.fields.label') }}
                                    </th>
                                    <td>
                                        {{ $campaign->label }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.campaigns.index') }}">
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