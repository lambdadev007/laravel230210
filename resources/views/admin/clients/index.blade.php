@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/config.css') }}" rel="stylesheet" />
@endsection
@section('content')
@can('client_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.clients.create") }}">
                Add Contact
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Contact List
    </div>

    

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Client" id="table_client">
                <thead id="table_client_thead">
                    <tr>
                        <th >

                        </th>
                        <th >
                            ID
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Contact
                        </th>
                        <th>
                            Company
                        </th>
                        <th>
                            Town
                        </th>
                        <th>
                            Area
                        </th>
                        <th>
                            Tel
                        </th>
                        <th>
                            Mobile
                        </th>
                        <th>
                            E-mail
                        </th>
                        <th>
                            Web
                        </th>
                        <th>
                            Brands
                        </th>
                        <th>
                            Comments
                        </th>
                        <th>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $key => $client)
                        <tr data-entry-id="{{ $client->id }}">
                            <td width="1">

                            </td>
                            <td width="10">
                                {{ $client->id ?? '' }}
                            </td>
                            <td>
                                {{ $client->date ?? '' }}
                            </td>
                            <td class = "{{ str_replace(' ', '', $client->status) }}">
                                {{ $client->status ?? '' }}
                            </td>
                            <td>
                                {{ $client->contact ?? '' }}
                            </td>
                            <td>
                                {{ $client->company ?? '' }}
                            </td>
                            <td>
                                {{ $client->town ?? '' }}
                            </td>
                            <td>
                                {{ $client->area ?? '' }}
                            </td>
                            <td>
                                {{ $client->tel ?? '' }}
                            </td>
                            <td>
                                {{ $client->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $client->email ?? '' }}
                            </td>
                            <td>
                                {{ $client->web ?? '' }}
                            </td>
                            <td>
                                {{ $client->brands ?? '' }}
                            </td>
                            <td>
                                {{ $client->comments ?? '' }}
                            </td>
                            <td>
                                @can('client_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.clients.show', $client->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('client_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clients.edit', $client->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('client_delete')
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
// $(function () {
//   let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
// @can('client_delete')
//   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
//   let deleteButton = {
//     text: deleteButtonTrans,
//     url: "{{ route('admin.clients.massDestroy') }}",
//     className: 'btn-danger',
//     action: function (e, dt, node, config) {
//       var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
//           return $(entry).data('entry-id')
//       });

//       if (ids.length === 0) {
//         alert('{{ trans('global.datatables.zero_selected') }}')

//         return
//       }

//       if (confirm('{{ trans('global.areYouSure') }}')) {
//         $.ajax({
//           headers: {'x-csrf-token': _token},
//           method: 'POST',
//           url: config.url,
//           data: { ids: ids, _method: 'DELETE' }})
//           .done(function () { location.reload() })
//       }
//     }
//   }
//   dtButtons.push(deleteButton)
// @endcan

//   $.extend(true, $.fn.dataTable.defaults, {
//     order: [[ 1, 'asc' ]],
//     pageLength: 10,
//   });
//   $('.datatable-Client:not(.ajaxTable)').DataTable({ buttons: dtButtons })
//     $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
//         $($.fn.dataTable.tables(true)).DataTable()
//             .columns.adjust();
//     });
// })

// $(document).ready(function() {
//     var cnt = 0;
//     // $('#table_client thead tr').clone(true).appendTo( '#table_client thead' );
//     $('#table_client').DataTable( {
//         initComplete: function () {
//             this.api().columns().every( function () {
//                 if(cnt != 0 && cnt != 14) {
//                     console.log(cnt);
//                     var column = this;
//                     if(cnt == 1)
//                         var select = $('<select "><option value=""></option></select>');
//                     else var select = $('<select id="select_id"><option value=""></option></select>');
//                         select.appendTo( $(column.header()) )
//                         .on( 'change', function () {
//                             var val = $.fn.dataTable.util.escapeRegex(
//                                 $(this).val()
//                             );
    
//                             column
//                                 .search( val ? '^'+val+'$' : '', true, false )
//                                 .draw();
//                         } );
    
//                     column.data().unique().sort().each( function ( d, j ) {
//                         select.append( '<option value="'+d+'">'+d+'</option>' )
//                     } );
//                 }
//                 cnt++;
//             });
//         },
//         orderCellsTop: true,
//         fixedHeader: true
//     } );
//     $('#select_id').parent().trigger('click');
//     // alert($('#select_id').parten());
//     $('#table_client').DataTable( {
//         orderCellsTop: true,
//         fixedHeader: true
//     } );
// } );

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#table_client thead tr').clone(true).appendTo( '#table_client thead' );
    $('#table_client thead tr:eq(1) th').each( function (i) {
        if(i != 0 ) {
            var title = $(this)[0].innerText;
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        }
    } );
 
    var table = $('#table_client').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        "pageLength": 10
    } );
} );
//     // // Setup - add a text input to each footer cell
//     // $('#table_client thead tr').clone(true).appendTo( '#table_client thead' );
//     // $('#table_client thead tr:eq(1) th').each( function (i) {
//     //     if(i != 0) {
//     //         var title = $(this).text();
//     //         var headid = $('<select type="text" placeholder="Search '+title+'" />');
          
//     //         $(this).html( '<select type="text" placeholder="Search '+title+'" id="select_'+i+'" /><option value=""></option></select>' );
//     //         var select_id = "#select_"+i;
//     //         var select = $(select_id)
//     //             .appendTo( headid ) 
//     //             .on( 'change', function () {
//     //                 var val = $.fn.dataTable.util.escapeRegex(
//     //                     $(this).val()
//     //                 );

//     //                 table.column
//     //                     .search( val ? '^'+val+'$' : '', true, false )
//     //                     .draw();
//     //             } );
//     //         $( 'input', this ).on( 'keyup change', function () {
//     //             if ( table.column(i).search() !== this.value ) {
//     //                 table
//     //                     .column(i)
//     //                     .search( this.value )
//     //                     .draw();
//     //             }
//     //         } );
//     //     }
//     // } );
 
//     // var table = $('#table_client').DataTable( {
//     //     orderCellsTop: true,
//     //     fixedHeader: true
//     // } );
// } );
</script>
    
@endsection