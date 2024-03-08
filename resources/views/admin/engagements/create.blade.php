@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.engagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.engagements.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="campaign_id">{{ trans('cruds.engagement.fields.campaign') }}</label>
                <select class="form-control select2 {{ $errors->has('campaign') ? 'is-invalid' : '' }}" name="campaign_id" id="campaign_id" required>
                    @foreach($campaigns as $id => $entry)
                        <option value="{{ $id }}" {{ old('campaign_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('campaign'))
                    <div class="invalid-feedback">
                        {{ $errors->first('campaign') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.engagement.fields.campaign_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_encode">{{ trans('cruds.engagement.fields.email_encode') }}</label>
                <input class="form-control {{ $errors->has('email_encode') ? 'is-invalid' : '' }}" type="text" name="email_encode" id="email_encode" value="{{ old('email_encode', '') }}" required>
                @if($errors->has('email_encode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_encode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.engagement.fields.email_encode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="open">{{ trans('cruds.engagement.fields.open') }}</label>
                <input class="form-control {{ $errors->has('open') ? 'is-invalid' : '' }}" type="number" name="open" id="open" value="{{ old('open', '') }}" step="1">
                @if($errors->has('open'))
                    <div class="invalid-feedback">
                        {{ $errors->first('open') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.engagement.fields.open_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="click">{{ trans('cruds.engagement.fields.click') }}</label>
                <input class="form-control {{ $errors->has('click') ? 'is-invalid' : '' }}" type="number" name="click" id="click" value="{{ old('click', '') }}" step="1">
                @if($errors->has('click'))
                    <div class="invalid-feedback">
                        {{ $errors->first('click') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.engagement.fields.click_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ip_address">{{ trans('cruds.engagement.fields.ip_address') }}</label>
                <input class="form-control {{ $errors->has('ip_address') ? 'is-invalid' : '' }}" type="text" name="ip_address" id="ip_address" value="{{ old('ip_address', '') }}" required>
                @if($errors->has('ip_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ip_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.engagement.fields.ip_address_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection