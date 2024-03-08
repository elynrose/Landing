@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('waiting_list_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.waiting-lists.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.waitingList.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.waitingList.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-WaitingList">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.waitingList.fields.first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.waitingList.fields.last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.waitingList.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.waitingList.fields.phone_number') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($waitingLists as $key => $waitingList)
                                    <tr data-entry-id="{{ $waitingList->id }}">
                                        <td>
                                            {{ $waitingList->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $waitingList->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $waitingList->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $waitingList->phone_number ?? '' }}
                                        </td>
                                        <td>
                                            @can('waiting_list_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.waiting-lists.show', $waitingList->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('waiting_list_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.waiting-lists.edit', $waitingList->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('waiting_list_delete')
                                                <form action="{{ route('frontend.waiting-lists.destroy', $waitingList->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('waiting_list_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.waiting-lists.massDestroy') }}",
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
  let table = $('.datatable-WaitingList:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection