<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuizAnswerRequest;
use App\Http\Requests\StoreQuizAnswerRequest;
use App\Http\Requests\UpdateQuizAnswerRequest;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\WaitingList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuizAnswersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quiz_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quizAnswers = QuizAnswer::with(['quiz', 'email'])->get();

        return view('admin.quizAnswers.index', compact('quizAnswers'));
    }

    public function create()
    {
        abort_if(Gate::denies('quiz_answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quizzes = Quiz::pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $emails = WaitingList::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.quizAnswers.create', compact('emails', 'quizzes'));
    }

    public function store(StoreQuizAnswerRequest $request)
    {
        $quizAnswer = QuizAnswer::create($request->all());

        return redirect()->route('admin.quiz-answers.index');
    }

    public function edit(QuizAnswer $quizAnswer)
    {
        abort_if(Gate::denies('quiz_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quizzes = Quiz::pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $emails = WaitingList::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quizAnswer->load('quiz', 'email');

        return view('admin.quizAnswers.edit', compact('emails', 'quizAnswer', 'quizzes'));
    }

    public function update(UpdateQuizAnswerRequest $request, QuizAnswer $quizAnswer)
    {
        $quizAnswer->update($request->all());

        return redirect()->route('admin.quiz-answers.index');
    }

    public function show(QuizAnswer $quizAnswer)
    {
        abort_if(Gate::denies('quiz_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quizAnswer->load('quiz', 'email');

        return view('admin.quizAnswers.show', compact('quizAnswer'));
    }

    public function destroy(QuizAnswer $quizAnswer)
    {
        abort_if(Gate::denies('quiz_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quizAnswer->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuizAnswerRequest $request)
    {
        $quizAnswers = QuizAnswer::find(request('ids'));

        foreach ($quizAnswers as $quizAnswer) {
            $quizAnswer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
