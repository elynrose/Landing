<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWaitingListRequest;
use App\Http\Requests\StoreWaitingListRequest;
use App\Http\Requests\UpdateWaitingListRequest;
use App\Models\LandingPage;
use App\Models\WaitingList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WaitingListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('waiting_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $waitingLists = WaitingList::with(['landing_page'])->get();

        return view('admin.waitingLists.index', compact('waitingLists'));
    }

    public function create()
    {
        abort_if(Gate::denies('waiting_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landing_pages = LandingPage::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.waitingLists.create', compact('landing_pages'));
    }

    public function store(StoreWaitingListRequest $request)
    {
        $waitingList = WaitingList::create($request->all());

        return redirect()->route('admin.waiting-lists.index');
    }

    public function edit(WaitingList $waitingList)
    {
        abort_if(Gate::denies('waiting_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landing_pages = LandingPage::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $waitingList->load('landing_page');

        return view('admin.waitingLists.edit', compact('landing_pages', 'waitingList'));
    }

    public function update(UpdateWaitingListRequest $request, WaitingList $waitingList)
    {
        $waitingList->update($request->all());

        return redirect()->route('admin.waiting-lists.index');
    }

    public function show(WaitingList $waitingList)
    {
        abort_if(Gate::denies('waiting_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $waitingList->load('landing_page');

        return view('admin.waitingLists.show', compact('waitingList'));
    }

    public function destroy(WaitingList $waitingList)
    {
        abort_if(Gate::denies('waiting_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $waitingList->delete();

        return back();
    }

    public function massDestroy(MassDestroyWaitingListRequest $request)
    {
        $waitingLists = WaitingList::find(request('ids'));

        foreach ($waitingLists as $waitingList) {
            $waitingList->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
