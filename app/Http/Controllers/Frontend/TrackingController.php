<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrackingRequest;
use App\Http\Requests\StoreTrackingRequest;
use App\Http\Requests\UpdateTrackingRequest;
use App\Models\Campaign;
use App\Models\Tracking;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trackings = Tracking::with(['campaign'])->get();

        return view('frontend.trackings.index', compact('trackings'));
    }

    public function create()
    {
        abort_if(Gate::denies('tracking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.trackings.create', compact('campaigns'));
    }

    public function store(StoreTrackingRequest $request)
    {
        $tracking = Tracking::create($request->all());

        return redirect()->route('frontend.trackings.index');
    }

    public function edit(Tracking $tracking)
    {
        abort_if(Gate::denies('tracking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tracking->load('campaign');

        return view('frontend.trackings.edit', compact('campaigns', 'tracking'));
    }

    public function update(UpdateTrackingRequest $request, Tracking $tracking)
    {
        $tracking->update($request->all());

        return redirect()->route('frontend.trackings.index');
    }

    public function show(Tracking $tracking)
    {
        abort_if(Gate::denies('tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tracking->load('campaign');

        return view('frontend.trackings.show', compact('tracking'));
    }

    public function destroy(Tracking $tracking)
    {
        abort_if(Gate::denies('tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tracking->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrackingRequest $request)
    {
        $trackings = Tracking::find(request('ids'));

        foreach ($trackings as $tracking) {
            $tracking->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
