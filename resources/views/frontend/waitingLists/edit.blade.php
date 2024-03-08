@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.waitingList.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.waiting-lists.update", [$waitingList->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="first_name">{{ trans('cruds.waitingList.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $waitingList->first_name) }}" required>
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.waitingList.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_name">{{ trans('cruds.waitingList.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $waitingList->last_name) }}" required>
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.waitingList.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.waitingList.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $waitingList->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.waitingList.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">{{ trans('cruds.waitingList.fields.phone_number') }}</label>
                            <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $waitingList->phone_number) }}">
                            @if($errors->has('phone_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.waitingList.fields.phone_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="landing_page_id">{{ trans('cruds.waitingList.fields.landing_page') }}</label>
                            <select class="form-control select2" name="landing_page_id" id="landing_page_id" required>
                                @foreach($landing_pages as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('landing_page_id') ? old('landing_page_id') : $waitingList->landing_page->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('landing_page'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('landing_page') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.waitingList.fields.landing_page_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection