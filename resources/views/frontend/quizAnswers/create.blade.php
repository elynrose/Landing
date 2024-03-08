@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.quizAnswer.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.quiz-answers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="quiz_id">{{ trans('cruds.quizAnswer.fields.quiz') }}</label>
                            <select class="form-control select2" name="quiz_id" id="quiz_id">
                                @foreach($quizzes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('quiz_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('quiz'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quiz') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.quizAnswer.fields.quiz_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="answer">{{ trans('cruds.quizAnswer.fields.answer') }}</label>
                            <input class="form-control" type="text" name="answer" id="answer" value="{{ old('answer', '') }}" required>
                            @if($errors->has('answer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('answer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.quizAnswer.fields.answer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email_id">{{ trans('cruds.quizAnswer.fields.email') }}</label>
                            <select class="form-control select2" name="email_id" id="email_id" required>
                                @foreach($emails as $id => $entry)
                                    <option value="{{ $id }}" {{ old('email_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.quizAnswer.fields.email_helper') }}</span>
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