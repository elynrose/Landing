<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAiRequest;
use App\Http\Requests\StoreAiRequest;
use App\Http\Requests\UpdateAiRequest;
use App\Models\Ai;
use App\Models\Campaign;
use App\Models\LandingPage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ai_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ais = Ai::with(['landing_page', 'campaign'])->get();

        return view('frontend.ais.index', compact('ais'));
    }

    public function create()
    {
        abort_if(Gate::denies('ai_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landing_pages = LandingPage::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campaigns = Campaign::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.ais.create', compact('campaigns', 'landing_pages'));
    }

    public function store(StoreAiRequest $request)
    {
        $ai = Ai::create($request->all());

        return redirect()->route('frontend.ais.index');
    }

    public function edit(Ai $ai)
    {
        abort_if(Gate::denies('ai_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landing_pages = LandingPage::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campaigns = Campaign::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ai->load('landing_page', 'campaign');

        return view('frontend.ais.edit', compact('ai', 'campaigns', 'landing_pages'));
    }

    public function update(UpdateAiRequest $request, Ai $ai)
    {
        $ai->update($request->all());

        return redirect()->route('frontend.ais.index');
    }

    public function show(Ai $ai)
    {
        abort_if(Gate::denies('ai_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ai->load('landing_page', 'campaign');

        return view('frontend.ais.show', compact('ai'));
    }

    public function destroy(Ai $ai)
    {
        abort_if(Gate::denies('ai_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ai->delete();

        return back();
    }

    public function massDestroy(MassDestroyAiRequest $request)
    {
        $ais = Ai::find(request('ids'));

        foreach ($ais as $ai) {
            $ai->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
