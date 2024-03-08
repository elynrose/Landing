@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.report.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.reports.update", [$report->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="campaign_id">{{ trans('cruds.report.fields.campaign') }}</label>
                            <select class="form-control select2" name="campaign_id" id="campaign_id">
                                @foreach($campaigns as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('campaign_id') ? old('campaign_id') : $report->campaign->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('campaign'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('campaign') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.report.fields.campaign_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total_sent">{{ trans('cruds.report.fields.total_sent') }}</label>
                            <input class="form-control" type="number" name="total_sent" id="total_sent" value="{{ old('total_sent', $report->total_sent) }}" step="1">
                            @if($errors->has('total_sent'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_sent') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.report.fields.total_sent_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total_delivered">{{ trans('cruds.report.fields.total_delivered') }}</label>
                            <input class="form-control" type="number" name="total_delivered" id="total_delivered" value="{{ old('total_delivered', $report->total_delivered) }}" step="1">
                            @if($errors->has('total_delivered'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_delivered') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.report.fields.total_delivered_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total_bounced">{{ trans('cruds.report.fields.total_bounced') }}</label>
                            <input class="form-control" type="number" name="total_bounced" id="total_bounced" value="{{ old('total_bounced', $report->total_bounced) }}" step="1">
                            @if($errors->has('total_bounced'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_bounced') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.report.fields.total_bounced_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="opens">{{ trans('cruds.report.fields.opens') }}</label>
                            <input class="form-control" type="number" name="opens" id="opens" value="{{ old('opens', $report->opens) }}" step="1">
                            @if($errors->has('opens'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('opens') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.report.fields.opens_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="clicks">{{ trans('cruds.report.fields.clicks') }}</label>
                            <input class="form-control" type="number" name="clicks" id="clicks" value="{{ old('clicks', $report->clicks) }}" step="1">
                            @if($errors->has('clicks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('clicks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.report.fields.clicks_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ip_address">{{ trans('cruds.report.fields.ip_address') }}</label>
                            <input class="form-control" type="text" name="ip_address" id="ip_address" value="{{ old('ip_address', $report->ip_address) }}">
                            @if($errors->has('ip_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ip_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.report.fields.ip_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="unique_clicks">{{ trans('cruds.report.fields.unique_clicks') }}</label>
                            <input class="form-control" type="number" name="unique_clicks" id="unique_clicks" value="{{ old('unique_clicks', $report->unique_clicks) }}" step="1">
                            @if($errors->has('unique_clicks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('unique_clicks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.report.fields.unique_clicks_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="unique_opens">{{ trans('cruds.report.fields.unique_opens') }}</label>
                            <input class="form-control" type="number" name="unique_opens" id="unique_opens" value="{{ old('unique_opens', $report->unique_opens) }}" step="1">
                            @if($errors->has('unique_opens'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('unique_opens') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.report.fields.unique_opens_helper') }}</span>
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