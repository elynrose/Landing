<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCampaignRequest;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Campaign;
use App\Models\WaitingList;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CampaignsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('campaign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::with(['list', 'media'])->get();

        return view('frontend.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        abort_if(Gate::denies('campaign_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lists = WaitingList::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.campaigns.create', compact('lists'));
    }

    public function store(StoreCampaignRequest $request)
    {
        $campaign = Campaign::create($request->all());

        if ($request->input('header_image', false)) {
            $campaign->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $campaign->id]);
        }

        return redirect()->route('frontend.campaigns.index');
    }

    public function edit(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lists = WaitingList::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campaign->load('list');

        return view('frontend.campaigns.edit', compact('campaign', 'lists'));
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());

        if ($request->input('header_image', false)) {
            if (! $campaign->header_image || $request->input('header_image') !== $campaign->header_image->file_name) {
                if ($campaign->header_image) {
                    $campaign->header_image->delete();
                }
                $campaign->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
            }
        } elseif ($campaign->header_image) {
            $campaign->header_image->delete();
        }

        return redirect()->route('frontend.campaigns.index');
    }

    public function show(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->load('list');

        return view('frontend.campaigns.show', compact('campaign'));
    }

    public function destroy(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->delete();

        return back();
    }

    public function massDestroy(MassDestroyCampaignRequest $request)
    {
        $campaigns = Campaign::find(request('ids'));

        foreach ($campaigns as $campaign) {
            $campaign->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('campaign_create') && Gate::denies('campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Campaign();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
