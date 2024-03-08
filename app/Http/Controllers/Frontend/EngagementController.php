<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEngagementRequest;
use App\Http\Requests\StoreEngagementRequest;
use App\Http\Requests\UpdateEngagementRequest;
use App\Models\Campaign;
use App\Models\Engagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EngagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('engagement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $engagements = Engagement::with(['campaign'])->get();

        return view('frontend.engagements.index', compact('engagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('engagement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.engagements.create', compact('campaigns'));
    }

    public function store(StoreEngagementRequest $request)
    {
        $engagement = Engagement::create($request->all());

        return redirect()->route('frontend.engagements.index');
    }

    public function edit(Engagement $engagement)
    {
        abort_if(Gate::denies('engagement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $engagement->load('campaign');

        return view('frontend.engagements.edit', compact('campaigns', 'engagement'));
    }

    public function update(UpdateEngagementRequest $request, Engagement $engagement)
    {
        $engagement->update($request->all());

        return redirect()->route('frontend.engagements.index');
    }

    public function show(Engagement $engagement)
    {
        abort_if(Gate::denies('engagement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $engagement->load('campaign');

        return view('frontend.engagements.show', compact('engagement'));
    }

    public function destroy(Engagement $engagement)
    {
        abort_if(Gate::denies('engagement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $engagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyEngagementRequest $request)
    {
        $engagements = Engagement::find(request('ids'));

        foreach ($engagements as $engagement) {
            $engagement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
