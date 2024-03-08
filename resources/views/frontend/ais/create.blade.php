@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.ai.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.ais.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="landing_page_id">{{ trans('cruds.ai.fields.landing_page') }}</label>
                            <select class="form-control select2" name="landing_page_id" id="landing_page_id">
                                @foreach($landing_pages as $id => $entry)
                                    <option value="{{ $id }}" {{ old('landing_page_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('landing_page'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('landing_page') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ai.fields.landing_page_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="campaign_id">{{ trans('cruds.ai.fields.campaign') }}</label>
                            <select class="form-control select2" name="campaign_id" id="campaign_id">
                                @foreach($campaigns as $id => $entry)
                                    <option value="{{ $id }}" {{ old('campaign_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('campaign'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('campaign') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ai.fields.campaign_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="recommendations">{{ trans('cruds.ai.fields.recommendations') }}</label>
                            <textarea class="form-control" name="recommendations" id="recommendations">{{ old('recommendations') }}</textarea>
                            @if($errors->has('recommendations'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('recommendations') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ai.fields.recommendations_helper') }}</span>
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