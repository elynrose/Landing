@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.quiz.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.quizzes.update", [$quiz->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="question">{{ trans('cruds.quiz.fields.question') }}</label>
                            <input class="form-control" type="text" name="question" id="question" value="{{ old('question', $quiz->question) }}">
                            @if($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.quiz.fields.question_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="point">{{ trans('cruds.quiz.fields.point') }}</label>
                            <input class="form-control" type="number" name="point" id="point" value="{{ old('point', $quiz->point) }}" step="1">
                            @if($errors->has('point'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('point') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.quiz.fields.point_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="landing_page_id">{{ trans('cruds.quiz.fields.landing_page') }}</label>
                            <select class="form-control select2" name="landing_page_id" id="landing_page_id" required>
                                @foreach($landing_pages as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('landing_page_id') ? old('landing_page_id') : $quiz->landing_page->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('landing_page'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('landing_page') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.quiz.fields.landing_page_helper') }}</span>
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