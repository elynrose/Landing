@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.quizAnswer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quiz-answers.update", [$quizAnswer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="quiz_id">{{ trans('cruds.quizAnswer.fields.quiz') }}</label>
                <select class="form-control select2 {{ $errors->has('quiz') ? 'is-invalid' : '' }}" name="quiz_id" id="quiz_id">
                    @foreach($quizzes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('quiz_id') ? old('quiz_id') : $quizAnswer->quiz->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <input class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" type="text" name="answer" id="answer" value="{{ old('answer', $quizAnswer->answer) }}" required>
                @if($errors->has('answer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('answer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quizAnswer.fields.answer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_id">{{ trans('cruds.quizAnswer.fields.email') }}</label>
                <select class="form-control select2 {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email_id" id="email_id" required>
                    @foreach($emails as $id => $entry)
                        <option value="{{ $id }}" {{ (old('email_id') ? old('email_id') : $quizAnswer->email->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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



@endsection