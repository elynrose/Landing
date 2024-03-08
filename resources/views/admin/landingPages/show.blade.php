@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.landingPage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.landing-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.id') }}
                        </th>
                        <td>
                            {{ $landingPage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.title') }}
                        </th>
                        <td>
                            {{ $landingPage->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.description') }}
                        </th>
                        <td>
                            {{ $landingPage->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.heading') }}
                        </th>
                        <td>
                            {{ $landingPage->heading }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.sub_heading') }}
                        </th>
                        <td>
                            {{ $landingPage->sub_heading }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.banner_image') }}
                        </th>
                        <td>
                            @if($landingPage->banner_image)
                                <a href="{{ $landingPage->banner_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $landingPage->banner_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.introduction') }}
                        </th>
                        <td>
                            {{ $landingPage->introduction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.confirmation_message') }}
                        </th>
                        <td>
                            {{ $landingPage->confirmation_message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.about') }}
                        </th>
                        <td>
                            {{ $landingPage->about }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.photo') }}
                        </th>
                        <td>
                            @if($landingPage->photo)
                                <a href="{{ $landingPage->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $landingPage->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.facebook') }}
                        </th>
                        <td>
                            {{ $landingPage->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.twitter') }}
                        </th>
                        <td>
                            {{ $landingPage->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $landingPage->linkedin }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.landing-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection