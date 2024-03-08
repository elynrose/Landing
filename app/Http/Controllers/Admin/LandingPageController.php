<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLandingPageRequest;
use App\Http\Requests\StoreLandingPageRequest;
use App\Http\Requests\UpdateLandingPageRequest;
use App\Models\LandingPage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LandingPageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('landing_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landingPages = LandingPage::with(['created_by', 'media'])->get();

        return view('admin.landingPages.index', compact('landingPages'));
    }

    public function create()
    {
        abort_if(Gate::denies('landing_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.landingPages.create');
    }

    public function store(StoreLandingPageRequest $request)
    {
        $landingPage = LandingPage::create($request->all());

        if ($request->input('banner_image', false)) {
            $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_image'))))->toMediaCollection('banner_image');
        }

        if ($request->input('photo', false)) {
            $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $landingPage->id]);
        }

        return redirect()->route('admin.landing-pages.index');
    }

    public function edit(LandingPage $landingPage)
    {
        abort_if(Gate::denies('landing_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landingPage->load('created_by');

        return view('admin.landingPages.edit', compact('landingPage'));
    }

    public function update(UpdateLandingPageRequest $request, LandingPage $landingPage)
    {
        $landingPage->update($request->all());

        if ($request->input('banner_image', false)) {
            if (! $landingPage->banner_image || $request->input('banner_image') !== $landingPage->banner_image->file_name) {
                if ($landingPage->banner_image) {
                    $landingPage->banner_image->delete();
                }
                $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_image'))))->toMediaCollection('banner_image');
            }
        } elseif ($landingPage->banner_image) {
            $landingPage->banner_image->delete();
        }

        if ($request->input('photo', false)) {
            if (! $landingPage->photo || $request->input('photo') !== $landingPage->photo->file_name) {
                if ($landingPage->photo) {
                    $landingPage->photo->delete();
                }
                $landingPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($landingPage->photo) {
            $landingPage->photo->delete();
        }

        return redirect()->route('admin.landing-pages.index');
    }

    public function show(LandingPage $landingPage)
    {
        abort_if(Gate::denies('landing_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landingPage->load('created_by');

        return view('admin.landingPages.show', compact('landingPage'));
    }

    public function destroy(LandingPage $landingPage)
    {
        abort_if(Gate::denies('landing_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landingPage->delete();

        return back();
    }

    public function massDestroy(MassDestroyLandingPageRequest $request)
    {
        $landingPages = LandingPage::find(request('ids'));

        foreach ($landingPages as $landingPage) {
            $landingPage->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('landing_page_create') && Gate::denies('landing_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new LandingPage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
