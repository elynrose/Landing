@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('landing_page_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.landing-pages.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.landingPage.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.landingPage.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-LandingPage">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.heading') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.sub_heading') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.banner_image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.introduction') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.confirmation_message') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.about') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.facebook') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.twitter') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.landingPage.fields.linkedin') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($landingPages as $key => $landingPage)
                                    <tr data-entry-id="{{ $landingPage->id }}">
                                        <td>
                                            {{ $landingPage->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $landingPage->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $landingPage->heading ?? '' }}
                                        </td>
                                        <td>
                                            {{ $landingPage->sub_heading ?? '' }}
                                        </td>
                                        <td>
                                            @if($landingPage->banner_image)
                                                <a href="{{ $landingPage->banner_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $landingPage->banner_image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $landingPage->introduction ?? '' }}
                                        </td>
                                        <td>
                                            {{ $landingPage->confirmation_message ?? '' }}
                                        </td>
                                        <td>
                                            {{ $landingPage->about ?? '' }}
                                        </td>
                                        <td>
                                            @if($landingPage->photo)
                                                <a href="{{ $landingPage->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $landingPage->photo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $landingPage->facebook ?? '' }}
                                        </td>
                                        <td>
                                            {{ $landingPage->twitter ?? '' }}
                                        </td>
                                        <td>
                                            {{ $landingPage->linkedin ?? '' }}
                                        </td>
                                        <td>
                                            @can('landing_page_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.landing-pages.show', $landingPage->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('landing_page_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.landing-pages.edit', $landingPage->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('landing_page_delete')
                                                <form action="{{ route('frontend.landing-pages.destroy', $landingPage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('landing_page_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.landing-pages.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-LandingPage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection