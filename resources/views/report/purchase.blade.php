<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <style>
        .error {
            color: red;
            font-weight: bold;
        }

        .card {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }

        input {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }
        button{
            border-radius:0px !important;
        }
    </style>
</head>
<body>
@include('admin.include.navbar')
<div class="page-content">
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Item Purchase report</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="fa fa-backward"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group-control card-group-control-right">
                            <div class="card mb-2">
{{--                                <div class="card-header">--}}
{{--                                    <h3 class="card-title" style="font-weight:bold;">Item Purchase Lists</h3>--}}
{{--                                </div>--}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Item Name/Brand Name Wise Search</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select id="item_name" class="filter form-control" data-column-index='3'>
                                                <option value="">-Select Item-</option>
                                                @foreach($item_list as $row)
                                                    <option value="{{$row->item_name}}">{{$row->item_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select id="brand_name" class="filter form-control" data-column-index='4'></select>
                                        </div>
                                        <div class="col-md-3">
                                            <select id="vendor_name" class="filter form-control" data-column-index='5'></select>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <h4>Date Wise Search</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" id="min" name="min" class="form-control" placeholder="Start Date" autocomplete="off">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" id="max" name="max" class="form-control" placeholder="End Date" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="distribution_history_table" style="border:1px solid; text-align:center;width:100% !important;">
                                                <thead style="background:#194d83;color:white; text-align:center;">
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Asset Code</th>
                                                    <th class="text-center">Serial No</th>
                                                    <th class="text-center">Item Name</th>
                                                    <th class="text-center">Brand Name</th>
                                                    <th class="text-center">Vendor Name</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Qty</th>
                                                    <th class="text-center">Purchase Date</th>
                                                    <th class="text-center">Exp Date</th>
                                                    <th class="text-center">Amount (BDT)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Asset Code</th>
                                                    <th class="text-center">Serial No</th>
                                                    <th class="text-center">Item Name</th>
                                                    <th class="text-center">Brand Name</th>
                                                    <th class="text-center">Vendor Name</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Qty</th>
                                                    <th class="text-center">Purchase Date</th>
                                                    <th class="text-center">Exp Date</th>
                                                    <th class="text-center">Amount (BDT)</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.include.footer')
            <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
        </div>
    </div>
</div>
<script>
    {{--var SITEURL = '{{URL::to('')}}';--}}
    {{--$(function () {--}}
    {{--    $.ajaxSetup({--}}
    {{--        headers: {--}}
    {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--        }--}}
    {{--    });--}}
    var minDate, maxDate;
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[8]);
            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );
    $('#item_name').select2({
        placeholder: "Search Item Name . .",
        width: '100%',
    });
    $(document).ready(function () {
        $('#item_name').on('change', function () {
            var id = this.value;
            $("#brand_name").html('');
            $.ajax({
                url: "{{url('fetch_search_brand_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#brand_name').html();
                    $.each(result.brand_name, function (key, value) {
                        $("#brand_name").append('<option value="' + value
                            .brand_name + '">' + value.brand_name + '</option>');
                    });
                }
            });
        });
        $('#item_name').on('change', function () {
            var id = this.value;
            $("#vendor_name").html('');
            $.ajax({
                url: "{{url('fetch_search_vendor_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#vendor_name').html();
                    $.each(result.vendor_name, function (key, value) {
                        $("#vendor_name").append('<option value="' + value
                            .vendor_name + '">' + value.vendor_name + '</option>');
                    });
                }
            });
        });
        $('#distribution_history_table thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#distribution_history_table thead');
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });
        var table = $('#distribution_history_table').DataTable({
            columnDefs: [
                {
                    searchable: false,
                    orderable: false,
                    targets: 0
                }
            ],
            order: [[1, 'asc']],
            "searchPane": true,
            "dom": '<"dt-buttons"Bf><"clear">lirtp',
            "orderCellsTop": true,
            "fixedHeader": true,
            initComplete: function () {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();
                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
            "orderCellsTop": true,
            "fixedHeader": true,
            "paging": true,
            "autoWidth": true,
            "buttons": [
                {
                    text: '<i class="fa fa-file-pdf"></i> Export PDF ',
                    className: 'btn btn-danger',
                    extend: 'pdfHtml5',
                    filename: '<?php echo date("d-m-Y") . '-Report'?>',
                    footer: true,
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied',
                        exportOptions: {}
                    },
                    customize: function (doc) {
                        // doc.content[1].table.body[0].forEach(function(h) {
                        //     h.fillColor = '#d8d8d8';
                        // });
                        doc.content.splice(0, 1);
                        doc.defaultStyle.alignment = 'center';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        var logo = 'data:image/png;base64,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';
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 9;
                        doc.styles.tableHeader.fontSize = 9;
                        doc['header'] = (function () {
                            return {
                                columns: [
                                    {
                                        alignment: 'center',
                                        text:
                                            [
                                                {text: 'Peoples Oriented Program Implementation (POPI) ', bold: true}, '\n',
                                                {text: '(Item Purchase Report) ', alignment: 'center'},
                                            ],
                                        fontSize: 11,
                                    },
                                ],
                                margin: 20
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    {
                                        alignment: 'left',
                                        text: ['Created on: ', {text: jsDate.toString()}]
                                    },
                                    {
                                        alignment: 'right',
                                        text: ['page ', {text: page.toString()}, ' of ', {text: pages.toString()}]
                                    }
                                ],
                                margin: 20
                            }
                        });
                        var objLayout = {};
                        objLayout['hLineWidth'] = function (i) {
                            return .5;
                        };
                        objLayout['vLineWidth'] = function (i) {
                            return .5;
                        };
                        objLayout['hLineColor'] = function (i) {
                            return '#aaa';
                        };
                        objLayout['vLineColor'] = function (i) {
                            return '#aaa';
                        };
                        objLayout['paddingLeft'] = function (i) {
                            return 4;
                        };
                        objLayout['paddingRight'] = function (i) {
                            return 4;
                        };
                        doc.content[0].layout = objLayout;
                        doc.content[0].table.widths = ['5%', '10%', '10%', '10%', '10%', '10%','10%','5%', '10%','10%','10%'];
                    }
                }],
            "ajax": "{{ url('report/purchase_list') }}",
            "columns": [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'serial_no', name: 'serial_no '},
                {data: 'item_name', name: 'item_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'vendor_name', name: 'vendor_name'},
                {data: 'item_desc', name: 'item_desc'},
                {data: 'qty', name: 'qty'},
                {data: 'purchase_date', name: 'purchase_date'},
                {data: 'exp_date', name: 'exp_date'},
                {data: 'price', name: 'price'},
            ],
            "lengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();
                nb_cols = api.columns().nodes().length;
                var j =0;
                while (j < nb_cols) {
                    var pageTotal = api
                        .column(j, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return Number(a) + Number(b);
                        }, 0);
                    $(api.column(1).footer()).html('');
                    $(api.column(2).footer()).html('');
                    $(api.column(3).footer()).html('');
                    $(api.column(4).footer()).html('');
                    $(api.column(5).footer()).html('');
                    $(api.column(6).footer()).html('');
                    $(api.column(7).footer()).html('');
                    $(api.column(8).footer()).html('');
                    $(api.column(9).footer()).html('');
                    $(api.column(j).footer()).html(pageTotal);
                    $(api.column(0).footer()).html('TOTAL = ');
                    $(api.column(10).footer()).html(pageTotal + ' TK');
                    j++;
                }
            },


            // "footerCallback": function (row, data, start, end, display) {
            //     var api = this.api();
            //     nb_cols = api.columns().nodes().length;
            //     var j = 2;
            //     while (j < nb_cols) {
            //         var pageTotal = api
            //             .column(j, {page: 'current'})
            //             .data()
            //             .reduce(function (a, b) {
            //                 return Number(a) + Number(b);
            //             }, 0);
            //         $(api.column(j).footer()).html(pageTotal);
            //         $(api.column(2).footer()).html(pageTotal + ' Kg');
            //         j++;
            //     }
            // },
        });
        $('#min, #max').on('change', function () {
            table.draw();
        });
        table
            .on('order.dt search.dt', function () {
                let i = 1;

                table
                    .cells(null, 0, { search: 'applied', order: 'applied' })
                    .every(function (cell) {
                        this.data(i++);
                    });
            })
            .draw();

        $('.filter').on('change', function () {
            var val = [];
            val = $(this).val();
            if (val.length > 1) {
                valString = val.toString();
                valPiped = valString.replace(/,/g, "|")
                table.column($(this).data('columnIndex'))
                    .search(valPiped ? '^' + valPiped + '$' : '', true, false)
                    .draw();
            } else if (val.length == 1) {
                table.column($(this).data('columnIndex'))
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
            } else {
                table.column($(this).data('columnIndex'))
                    .search('', true, false)
                    .draw();
            }
        });
        $('#item').select2({
            placeholder: "Search Item Name . .",
            width: '100%'
        });
        $('#brand_name').select2({
            placeholder: "Search Brand Name . .",
            width: '100%'
        });
        $('#vendor_name').select2({
            placeholder: "Search Vendor Name . .",
            width: '100%'
        });
    });
</script>
</body>
</html>





