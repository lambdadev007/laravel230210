@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/config.css') }}" rel="stylesheet" />
@endsection
@section('content')

<div class="card" style="zoom: 0.75;">
    <div class="card-header">
        Contact List
        <form method="get" action="{{ route("admin.clients.create") }}" id="form_submit">
        </form>
    </div>


    <!-- @can('client_create')
        <div style="float:right; margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
            </div> 
        </div>
    @endcan -->
    <div class="card-body">

        <div class="table-responsive">

            <div id="printbar" style="float:right"></div>
            <table class=" table table-bordered table-striped table-hover datatable datatable-Client" id="table_client">

                    <!-- <div style="float:left; margin-bottom: 10px;" class="row"> -->
                        <!-- <div class="col-lg-12"> -->
                            <!-- <a class="btn btn-success" style="float:left;margin-right:20px;" href="{{ route("admin.clients.create") }}">
                                Add Contact
                            </a> -->
                        <!-- </div> -->
                    <!-- </div> -->

                <thead id="table_client_thead">
                    <tr>
                        <th>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                            Smp
                        </th>
                        <th>
                            PL€
                        </th>
                        <th>
                            Pcs
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

                    </tr>
                </thead>
                <tbody style="text-align:center">
                    @foreach($clients as $key => $client)
                        <tr data-entry-id="{{ $client->id }}">
                            <td>
                                @can('client_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.clients.show', $client->id) }}">
                                        <i class="fa-fw fas fa-eye"></i>
                                    </a>
                                @endcan

                                @can('client_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clients.edit', $client->id) }}">
                                        <i class="fa-fw fas fa-edit"></i>
                                    </a>
                                @endcan

                                @can('client_delete')
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-xs btn-danger" type="submit">
                                            <i class="fa-fw fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endcan

                            </td>
                            <td width="10">
                                {{ $key + 1 }}
                            </td>
                            <td>
                                {{ $client->date ?? '' }}
                            </td>
                            <td class = "{{ str_replace(' ', '', $client->status) }}">
                                {{ $client->status ?? '' }}
                            </td>
                            <td>
                                {{ $client->samples ?? ''}}
                            </td>
                            <td>
                                {{ $client->pricel ?? ''}}
                            </td>
                            <td>
                                {{ $client->importance ?? '' }}
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
            pixel_arr = [0, 30, 60, 100, 40, 40, 40, 70, 70, 70, 90, 70, 70, 70, 70, 70, 80];
            pixel = pixel_arr[i];
            $(this).html( '<input style= "width:'+pixel+'px" type="text" placeholder="'+title+'" />' );
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
        "lengthMenu": [[10, 25, 50, 250], [10, 25, 50, 250]],
        "pageLength": 250,
        selectableRows: false,
        "createdRow": function (row, data) {
            $(row).find("td:first").removeClass(' select-checkbox');
        },
        buttons: [
            'copyHtml5',
            'csvHtml5',
            'excelHtml5',
            'pdfHtml5',
            'print',
            'colvis',
            {
                text: 'Add Contact',
                action: function ( e, dt, node, config ) {
                    $("#form_submit").submit();
                },
                className: 'btn buttons-collection buttons-colvis btn_add_contact'
            }
        ]
        // buttons: [
        //     'colvis',
        //     'copyHtml5',
        //     'csvHtml5',
        //     'excelHtml5',
        //     'pdfHtml5',
        //     'print',
        //     {
        //           name: 'Add',
        //           extend: '',
        //           text: '<a class="fa fa-file-excel-o btn btn-success"></a>',
        //           titleAttr: 'Excel',
        //           exportOptions: {
        //               columns: [1, 2, 3, 4]
        //           }
        //     },
        // ]
    } );
    $('.dt-buttons').append('<h1>sss</h1>');
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