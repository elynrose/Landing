@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.quiz.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quizzes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.id') }}
                        </th>
                        <td>
                            {{ $quiz->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.question') }}
                        </th>
                        <td>
                            {{ $quiz->question }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.point') }}
                        </th>
                        <td>
                            {{ $quiz->point }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quiz.fields.landing_page') }}
                        </th>
                        <td>
                            {{ $quiz->landing_page->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quizzes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection