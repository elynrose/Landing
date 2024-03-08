@extends('layouts.admin')
@section('content')
@can('ai_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.ais.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.ai.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.ai.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Ai">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ai.fields.landing_page') }}
                        </th>
                        <th>
                            {{ trans('cruds.ai.fields.campaign') }}
                        </th>
                        <th>
                            {{ trans('cruds.ai.fields.recommendations') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ais as $key => $ai)
                        <tr data-entry-id="{{ $ai->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ai->landing_page->title ?? '' }}
                            </td>
                            <td>
                                {{ $ai->campaign->title ?? '' }}
                            </td>
                            <td>
                                {{ $ai->recommendations ?? '' }}
                            </td>
                            <td>
                                @can('ai_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ais.show', $ai->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('ai_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ais.edit', $ai->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('ai_delete')
                                    <form action="{{ route('admin.ais.destroy', $ai->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ai_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ais.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Ai:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection