<div id="modal_branch_servicing_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-xl" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-plus"></i> Branch Item Return</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>Region/Zone/Branch/Item Wise Search</b></h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <select id="region" class="filter form-control region_name" data-column-index='4'>
                            <option value="">-Select Region-</option>
                            @foreach($region_list as $row)
                                <option value="{{$row->region_name}}">{{$row->region_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="zone" id="zone_name" class="filter form-control zone_name" data-column-index='5'></select>
                    </div>
                    <div class="col-md-3">
                        <select id="branch" class="filter form-control branch_name" data-column-index='6'></select>
                    </div>
                    <div class="col-md-3">
                        <select id="item" class="filter form-control" data-column-index='3'>
                            <option value="">-Select Item Name-</option>
                            @foreach($item_list as $row)
                                <option value="{{$row->item_name}}">{{$row->item_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="branch_item_list_table" style="border:1px solid;width:100%;">
                                <thead style="background:#194d83;color:white;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Asset Code</th>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Region</th>
                                    <th class="text-center">Zone</th>
                                    <th class="text-center">Branch</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_head_servicing_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-plus"></i> Head Office Item Return</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>Item Wise Search</b></h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <select id="h_item" class="filter3 form-control" data-column-index='3'>
                            <option value="">-Select Item Name-</option>
                            @foreach($item_list as $row)
                                <option value="{{$row->item_name}}">{{$row->item_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="head_item_list_table" style="border:1px solid;width:100%;">
                            <thead style="background:#194d83;color:white;">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Action</th>
                                <th>Asset Code</th>
                                <th>Employee Name</th>
                                <th>Item Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_project_servicing_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-plus"></i> Project Item Return</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>Project/Branch/Item Wise Search</b></h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <select id="project" class="filter2 form-control project_name" data-column-index='4'>
                            <option value="">-Select Project-</option>
                            @foreach($project_list as $row)
                                <option value="{{$row->project_name}}">{{$row->project_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="p_branch" class="filter2 form-control branch_name" data-column-index='5'></select>
                        {{--                        <select id="p_branch" class="filter2 form-control" data-column-index='5'>--}}
                        {{--                            <option value="">-Select Branch-</option>--}}
                        {{--                            @foreach($branch_list as $row)--}}
                        {{--                                <option value="{{$row->branch_name}}">{{$row->branch_name}}</option>--}}
                        {{--                            @endforeach--}}
                        {{--                        </select>--}}
                    </div>
                    <div class="col-md-4">
                        <select id="p_item" class="filter2 form-control" data-column-index='3'>
                            <option value="">-Select Item Name-</option>
                            @foreach($item_list as $row)
                                <option value="{{$row->item_name}}">{{$row->item_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="project_item_list_table" style="border:1px solid;width:100%;">
                                <thead style="background:#194d83;color:white;">
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Action</th>
                                    <th>Asset Code</th>
                                    <th>Item Name</th>
                                    <th>Project Name</th>
                                    <th>Branch Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_servicing_return" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-plus"></i> Servicing Return Form</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="servicing_return_form">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Asset Code:</label> <br>
                                    <input type="text" class="form-control" id="asset_code" readonly>
                                    <input type="hidden" class="form-control" id="id" name="id" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Item Name:</label> <br>
                                    <input type="text" class="form-control" id="item_name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Brand Name:</label> <br>
                                    <input type="text" class="form-control" id="brand_name" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Vendor Name:</label> <br>
                                    <input type="text" class="form-control" id="vendor_name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Return Date:</label> <br>
                                    <input type="date" class="form-control" name="return_date">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Service Warranty:</label> <br>
                                    <input type="date" class="form-control" name="warranty">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Servicing Details:</label> <br>
                                    <textarea class="form-control" id="details" readonly></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Billing Number:</label> <br>
                                    <input type="text" class="form-control" name="billing_number" required>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Billing Amount:</label> <br>
                                    <input type="text" class="form-control" name="billing_amount" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" id="save_employee" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="modal_servicing_edit" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-edit"></i> Servicing Edit Form</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="servicing_edit_form">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Asset Code:</label> <br>
                                    <input type="text" class="form-control" id="edit_asset_code" readonly style="background:#a01f1f;color: white;">
                                    <input type="text" class="form-control" id="edit_id" name="id" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Item Name:</label> <br>
                                    <input type="text" class="form-control" id="edit_item_name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Brand Name:</label> <br>
                                    <input type="text" class="form-control" id="edit_brand_name" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Vendor Name:</label> <br>
                                    <input type="text" class="form-control" id="edit_vendor_name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Item Description:</label> <br>
                                    <input type="text" class="form-control" id="edit_item_description" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Sending Date:</label> <br>
                                    <input type="date" class="form-control" name="sending_date" id="edit_sending_date">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Servicing Vendor Name:</label> <br>
                                    <input type="text" class="form-control" name="servicing_vendor_name" id="edit_servicing_vendor_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Billing Number:</label> <br>
                                    <input type="text" class="form-control" name="billing_number" id="edit_billing_number">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Billing Amount:</label> <br>
                                    <input type="text" class="form-control" name="billing_amount" id="edit_billing_amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Servicing Details:</label> <br>
                                    <textarea class="form-control" name="details" id="edit_details"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" id="save_employee" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Update</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.region_name').on('change', function () {
            var id = this.value;
            $(".zone_name").html('');
            $.ajax({
                url: "{{url('fetch_search_zone_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('.zone_name').html('<option value="">-- Select State --</option>');
                    $.each(result.zone_name, function (key, value) {
                        $(".zone_name").append('<option value="' + value
                            .zone_name + '">' + value.zone_name + '</option>');
                    });
                    $('.branch_name').html('<option value="">-- Select Branch --</option>');
                }
            });
        });
        $('.zone_name').on('change', function () {
            var id = this.value;
            console.log(id);
            $(".branch_name").html('');
            $.ajax({
                url: "{{url('fetch_search_branch_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('.branch_name').html('<option value="">-- Select State --</option>');
                    $.each(res.branch_name, function (key, value) {
                        $(".branch_name").append('<option value="' + value
                            .branch_name + '">' + value.branch_name + '</option>');
                    });
                }
            });
        });
        $('.project_name').on('change', function () {
            var id = this.value;
            console.log(id);
            $(".branch_name").html('');
            $.ajax({
                url: "{{url('fetch_project_search_branch_name')}}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('.branch_name').html('<option value="">-- Select State --</option>');
                    $.each(res.branch_name, function (key, value) {
                        $(".branch_name").append('<option value="' + value
                            .branch_name + '">' + value.branch_name + '</option>');
                    });
                }
            });
        });
    });
</script>
<script>
    var SITEURL = '{{URL::to('')}}';
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#return_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('return/return_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                // {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'serial_no', name: 'serial_no'},
                {data: 'item_name', name: 'item_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'distribution_type', name: 'distribution_type'},
                {data: 'distribution_date', name: 'distribution_date'},
                {data: 'return_date', name: 'return_date'},
            ]
        });
        var branch_item_table = $('#branch_item_list_table').DataTable({
            processing: true,
            serverSide: true,
            "orderCellsTop": true,
            "fixedHeader": true,
            ajax: "{{ url('return/branch_item_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'item_name', name: 'item_name'},
                {data: 'region_name', name: 'region_name'},
                {data: 'zone_name', name: 'zone_name'},
                {data: 'branch_name', name: 'branch_name'},
            ]
        });
        var head_item_table = $('#head_item_list_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('return/head_item_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'item_name', name: 'item_name'},
            ]
        });
        var project_item_table = $('#project_item_list_table').DataTable({
            processing: true,
            serverSide: true,
            "orderCellsTop": true,
            "fixedHeader": true,
            ajax: "{{ url('return/project_item_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'item_name', name: 'item_name'},
                {data: 'project_name', name: 'project_name'},
                {data: 'branch_name', name: 'branch_name'},
            ]
        });
        $('.filter').on('change', function () {
            var val = [];
            val = $(this).val();
            if (val.length > 1) {
                valString = val.toString();
                valPiped = valString.replace(/,/g, "|")
                branch_item_table.column($(this).data('columnIndex'))
                    .search(valPiped ? '^' + valPiped + '$' : '', true, false)
                    .draw();
            } else if (val.length == 1) {
                branch_item_table.column($(this).data('columnIndex'))
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
            } else {
                branch_item_table.column($(this).data('columnIndex'))
                    .search('', true, false)
                    .draw();
            }
        });
        $('.filter2').on('change', function () {
            var val = [];
            val = $(this).val();
            if (val.length > 1) {
                valString = val.toString();
                valPiped = valString.replace(/,/g, "|")
                project_item_table.column($(this).data('columnIndex'))
                    .search(valPiped ? '^' + valPiped + '$' : '', true, false)
                    .draw();
            } else if (val.length == 1) {
                project_item_table.column($(this).data('columnIndex'))
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
            } else {
                project_item_table.column($(this).data('columnIndex'))
                    .search('', true, false)
                    .draw();
            }
        });
        $('.filter3').on('change', function () {
            var val = [];
            val = $(this).val();
            if (val.length > 1) {
                valString = val.toString();
                valPiped = valString.replace(/,/g, "|")
                project_item_table.column($(this).data('columnIndex'))
                    .search(valPiped ? '^' + valPiped + '$' : '', true, false)
                    .draw();
            } else if (val.length == 1) {
                project_item_table.column($(this).data('columnIndex'))
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
            } else {
                project_item_table.column($(this).data('columnIndex'))
                    .search('', true, false)
                    .draw();
            }
        });
        jQuery('#branch_modal').on('click', function () {
            jQuery('#modal_branch_servicing_add').modal('show');
            $('#region').select2({
                placeholder: "Search Region . .",
                width: '100%',
                dropdownParent: $('#modal_branch_servicing_add .modal-content')
            });
            $('#zone').select2({
                placeholder: "Search Zone . .",
                width: '100%',
                dropdownParent: $('#modal_branch_servicing_add .modal-content')
            });
            $('#branch').select2({
                placeholder: "Search Branch . .",
                width: '100%',
                dropdownParent: $('#modal_branch_servicing_add .modal-content')
            });
            $('#item').select2({
                placeholder: "Search Item . .",
                width: '100%',
                dropdownParent: $('#modal_branch_servicing_add .modal-content')
            });
        })
        jQuery('#project_modal').on('click', function () {
            jQuery('#modal_project_servicing_add').modal('show');
            $('#project').select2({
                placeholder: "Search Project . .",
                width: '100%',
                dropdownParent: $('#modal_project_servicing_add .modal-content')
            });
            $('#p_branch').select2({
                placeholder: "Search Branch . .",
                width: '100%',
                dropdownParent: $('#modal_project_servicing_add .modal-content')
            });
            $('#p_item').select2({
                placeholder: "Search Item . .",
                width: '100%',
                dropdownParent: $('#modal_project_servicing_add .modal-content')
            });


        })
        jQuery('#head_modal').on('click', function () {
            jQuery('#modal_head_servicing_add').modal('show');
            $('#h_item').select2({
                placeholder: "Search Item . .",
                width: '100%',
                dropdownParent: $('#modal_head_servicing_add .modal-content')
            });


        })
    });
    //(************* Brand (Add/Edit/Delete) Section ***************)
    if ($("#servicing_add_form").length > 0) {
        $("#servicing_add_form").validate({
            rules: {
                department_name: {
                    required: true,
                },
            },
            messages: {
                department_name: {
                    required: "*** Department name is required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#store').html('Sending..');
                $.ajax({
                    url: 'servicing_store',
                    type: "POST",
                    data: $('#servicing_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#servicing_add_form').trigger("reset");
                            swal({
                                icon: 'success',
                                title: 'Servicing Stored Successfully !!!',
                                showConfirmButton: true,
                                timer: 2500
                            });
                            $('#servicing_table').DataTable().ajax.reload();
                        } else {
                            printErrorMsg(data.error);
                        }
                    },
                });

                function printErrorMsg(msg) {
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display', 'block');
                    $.each(msg, function (key, value) {
                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                    });
                }
            }
        })
    }
    if ($("#servicing_return_form").length > 0) {
        $("#servicing_return_form").validate({
            rules: {
                department_name: {
                    required: true,
                },
            },
            messages: {
                department_name: {
                    required: "*** Department name is required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#update').html('Updating..');
                $.ajax({
                    url: 'servicing_return_store',
                    type: "POST",
                    data: $('#servicing_return_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#servicing_return_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Servicing Return Store Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#servicing_table').DataTable().ajax.reload();
                        $('#modal_servicing_return').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    if ($("#servicing_edit_form").length > 0) {
        $("#servicing_edit_form").validate({
            rules: {
                department_name: {
                    required: true,
                },
            },
            messages: {
                department_name: {
                    required: "*** Department name is required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#update').html('Updating..');
                $.ajax({
                    url: 'servicing_update',
                    type: "POST",
                    data: $('#servicing_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#servicing_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Servicing Edit Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#servicing_table').DataTable().ajax.reload();
                        $('#modal_servicing_edit').modal('hide');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    $('body').on('click', '#service_return', function () {
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "servicing_return/" + id,
            success: function (data) {
                $('#modal_servicing_return').modal('show');
                $('#id').val(data.id);
                $('#asset_code').val(data.asset_code);
                $('#sending_date').val(data.sending_date);
                $('#item_name').val(data.item_name);
                $('#brand_name').val(data.brand_name);
                $('#vendor_name').val(data.vendor_name);
                $('#details').val(data.details);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#service_edit', function () {
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "servicing_edit/" + id,
            success: function (data) {
                $('#modal_servicing_edit').modal('show');
                $('#edit_id').val(data.id);
                $('#edit_asset_code').val(data.asset_code);
                $('#edit_sending_date').val(data.sending_date);
                $('#edit_item_name').val(data.item_name);
                $('#edit_brand_name').val(data.brand_name);
                $('#edit_vendor_name').val(data.vendor_name);
                $('#edit_item_description').val(data.item_desc);
                $('#edit_sending_date').val(data.sending_date);
                $('#edit_billing_number').val(data.billing_number);
                $('#edit_billing_amount').val(data.billing_amount);
                $('#edit_servicing_vendor_name').val(data.servicing_vendor_name);
                $('#edit_details').val(data.details);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_return', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete service?")) {
            $.ajax({
                type: "get",
                url: "delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Item return information delete successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    $('#return_table').DataTable().ajax.reload();
                    setInterval('location.reload()', 1000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
</script>




