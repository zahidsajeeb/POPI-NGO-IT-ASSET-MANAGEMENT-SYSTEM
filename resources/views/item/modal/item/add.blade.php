<div id="modal_fixed_item_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-plus"></i> Item Add Form</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="fixed_item_add_form">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Asset Code:</label> <br>
                                    <input type="text" name="asset_code" class="form-control" value="Asst-00<?php echo $count->id + 1; ?>" readonly style="background:gray; color:white;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Bill No:</label> <br>
                                    <input type="text" name="bill_no" class="form-control required">
                                </div>
                            </div>
                            <h4 class="font-bold">Item Information</h4>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Brand Name:</label> <br>
                                    <select name="brand_id" class="form-control required brand_name_one" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select-</option>
                                        @foreach($brand_list as $row)
                                            <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Vendor Name:</label> <br>
                                    <select name="vendor_id" class="form-control required vendor_name_one" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select-</option>
                                        @foreach($vendor_list as $row)
                                            <option value="{{$row->id}}">{{$row->vendor_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Item Name:</label> <br>
                                    <select name="item_name_id" class="form-control required item_name_one" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select-</option>
                                        @foreach($fixed_asset_item_name_list as $row)
                                            <option value="{{$row->id}}">{{$row->item_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Price:</label> <br>
                                    <input type="text" class="form-control required" name="price"></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Description:</label> <br>
                                    <textarea type="text" class="form-control required" name="item_desc"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Purchase Date:</label> <br>
                                    <input type="date" name="purchase_date" class="form-control required" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Exp Warrenty Date:</label> <br>
                                    <input type="date" name="exp_date" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Serial Number:</label> <br>
                                    <input type="text" name="serial_no" class="form-control required" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Qty:</label> <br>
                                    <input type="text" name="qty" value="1" class="form-control required" readonly required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Support Device:</label> <br>
                                    <select class="form-control" name="support" required>
                                        <option value="">-Select-</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" id="save" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_non_fixed_item_add" class="modal fade" tabindex="-1" style=" border-radius: 0px !important;">
    <div class="modal-dialog modal-lg" style=" border-radius: 0px !important;">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white" style=" border-radius: 0px !important;">
                <h6 class="modal-title"><i class="fa fa-plus"></i> Item Add Form</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="non_fixed_item_add_form">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Asset Code:</label> <br>
                                    <input type="text" name="asset_code" class="form-control" value="Asst-00<?php echo $count->id + 1; ?>" readonly style="background:gray; color:white;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Bill No:</label> <br>
                                    <input type="text" name="bill_no" class="form-control required">
                                </div>
                            </div>
                            <h4 class="font-bold">Item Information</h4>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Brand Name:</label> <br>
                                    <select name="brand_id" class="form-control required brand_name_two" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select-</option>
                                        @foreach($brand_list as $row)
                                            <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Vendor Name:</label> <br>
                                    <select name="vendor_id" class="form-control required vendor_name_two" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select-</option>
                                        @foreach($vendor_list as $row)
                                            <option value="{{$row->id}}">{{$row->vendor_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Item Name:</label> <br>
                                    <select name="item_name_id" class="form-control required item_name_two" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select-</option>
                                        @foreach($non_fixed_asset_item_name_list as $row)
                                            <option value="{{$row->id}}">{{$row->item_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Price:</label> <br>
                                    <input type="text" class="form-control required" name="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Description:</label> <br>
                                    <textarea type="text" class="form-control required" name="item_desc"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Purchase Date:</label> <br>
                                    <input type="date" name="purchase_date" class="form-control required" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Qty:</label> <br>
                                    <input type="text" name="qty" class="form-control required" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Support Device:</label> <br>
                                    <select class="form-control" name="support" required>
                                        <option>-Select-</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" id="save" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_fixed_item_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white">
                <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Item Edit Form</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="fixed_item_edit_form">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Asset Code:</label> <br>
                                    <input type="text" name="asset_code" class="form-control" id="edit_asset_code" readonly style="background:gray; color:white;">
                                    <input type="hidden" name="id" id="item_id" class="form-control" readonly style="background:gray; color:white;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Bill No:</label> <br>
                                    <input type="text" name="bill_no" id="edit_bill_no" class="form-control required">
                                </div>
                            </div>
                            <h4 class="font-bold">Item Information</h4>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Brand Name:</label> <br>
                                    <select name="brand_id" class="form-control required" id="edit_brand_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        @foreach($brand_list as $row)
                                            <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Vendor Name:</label> <br>
                                    <select name="vendor_id" class="form-control required" id="edit_vendor_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select-</option>
                                        @foreach($vendor_list as $row)
                                            <option value="{{$row->id}}">{{$row->vendor_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Item Name:</label> <br>
                                    <select name="item_name_id" class="form-control required" required id="edit_item_name_id" style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        @foreach($fixed_asset_item_name_list as $row)
                                            <option value="{{$row->id}}">{{$row->item_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Price:</label> <br>
                                    <input type="text" class="form-control" name="price" id="edit_price" style="width:100%;"></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Description:</label> <br>
                                    <textarea class="form-control" name="item_desc" id="edit_item_desc" style="width:100%;"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Purchase Date:</label> <br>
                                    <input type="date" name="purchase_date" class="form-control required" id="edit_purchase_date" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Exp Date:</label> <br>
                                    <input type="date" name="exp_date" class="form-control required" id="edit_exp_date" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Serial Number:</label> <br>
                                    <input type="text" name="serial_no" class="form-control" id="edit_serial_no" autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Qty:</label> <br>
                                    <input type="text" name="qty" class="form-control required" id="edit_qty" required readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" id="save" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_non_fixed_item_edit" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-indigo text-white">
                <h6 class="modal-title"><i class="fa fa-cart-plus"></i> Item Edit Form</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" id="non_fixed_item_edit_form">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Asset Code:</label> <br>
                                    <input type="text" name="asset_code" class="form-control" id="edit_n_asset_code" readonly style="background:gray; color:white;">
                                    <input type="hidden" name="id" id="n_item_id" class="form-control" readonly style="background:gray; color:white;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Bill No:</label> <br>
                                    <input type="text" name="bill_no" id="edit_n_bill_no" class="form-control required">
                                </div>
                            </div>
                            <h4 class="font-bold">Item Information</h4>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Brand Name:</label> <br>
                                    <select name="brand_id" class="form-control required" id="edit_n_brand_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        @foreach($brand_list as $row)
                                            <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Vendor Name:</label> <br>
                                    <select name="vendor_id" class="form-control required" id="edit_n_vendor_name" required style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        <option disabled selected>-Select-</option>
                                        @foreach($vendor_list as $row)
                                            <option value="{{$row->id}}">{{$row->vendor_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Item Name:</label> <br>
                                    <select name="item_name_id" class="form-control required" required id="edit_n_item_name_id" style="border-radius: 0px !important; border-color: #604c4c69 !important;">
                                        @foreach($non_fixed_asset_item_name_list as $row)
                                            <option value="{{$row->id}}">{{$row->item_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Price:</label> <br>
                                    <input type="text" class="form-control" name="price" id="edit_n_price" style="width:100%;"></input>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label style="font-weight:bold;">Description:</label> <br>
                                    <textarea class="form-control" name="item_desc" id="edit_n_item_desc" style="width:100%;"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Purchase Date:</label> <br>
                                    <input type="date" name="purchase_date" class="form-control required" id="edit_n_purchase_date" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-weight:bold;">Qty:</label> <br>
                                    <input type="text" name="qty" class="form-control required" id="edit_n_qty">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" id="save" class="btn btn-sm btn-success" style=" border-radius: 0px !important;"><i class="icon-checkbox-checked"></i> Submit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style=" border-radius: 0px !important;"><i class="fa fa-close"></i> Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var SITEURL = '{{URL::to('')}}';
    $(document).ready(function() {
        $(".brand_name_one").select2({
            dropdownParent: $("#modal_fixed_item_add")
        });
        $(".vendor_name_one").select2({
            dropdownParent: $("#modal_fixed_item_add")
        });
        $(".item_name_one").select2({
            dropdownParent: $("#modal_fixed_item_add")
        });
        $(".brand_name_two").select2({
            dropdownParent: $("#modal_non_fixed_item_add")
        });
        $(".vendor_name_two").select2({
            dropdownParent: $("#modal_non_fixed_item_add")
        });
        $(".item_name_two").select2({
            dropdownParent: $("#modal_non_fixed_item_add")
        });
    });
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $('.brand_name').select2({
        //     placeholder: "Search Item Name . .",
        //     width: '100%',
        // });
        var table = $('#fixed_item_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('fixed_item_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'bill_no', name: 'bill_no'},
                {data: 'serial_no', name: 'serial_no'},
                {data: 'item_name', name: 'item_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'vendor_name', name: 'vendor_name'},
                {data: 'qty', name: 'qty'},
                {data: 'price', name: 'price'},
                {data: 'purchase_date', name: 'purchase_date'},
                {data: 'exp_date', name: 'exp_date'},
                {data: 'warranty', name: 'warranty', orderable: false, searchable: true},
            ]
        });
        var table = $('#non_fixed_item_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('non_fixed_item_list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'action', name: 'action', orderable: false, searchable: true},
                {data: 'asset_code', name: 'asset_code'},
                {data: 'bill_no', name: 'bill_no'},
                {data: 'item_name', name: 'item_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'vendor_name', name: 'vendor_name'},
                {data: 'qty', name: 'qty'},
                {data: 'price', name: 'price'},
                {data: 'unit_price', name: 'unit_price', orderable: false, searchable: true},
                // {
                //     data: "cc_status",
                //     render: function (data) {
                //         if (data == 1)
                //             return '<span class="badge badge-success">Done</span>'
                //         if (data == 0)
                //             return '<span class="badge badge-danger">Pending</span>'
                //     }
                // },
                {data: 'purchase_date', name: 'purchase_date'},
            ]
        });
    });
    //(************* Item (Add/Edit/Delete) Section ***************)
    if ($("#fixed_item_add_form").length > 0) {
        $("#fixed_item_add_form").validate({
                rules: {
                    item_name: {
                        required: true,
                    },
                    brand_name: {
                        required: true,
                    },
                    vendor_name: {
                        required: true,
                    },
                },
                messages: {
                    item_name: {
                        required: "*** Item Name is Required ***"
                    },
                    brand_name: {
                        required: "*** Brand Name is Required ***"
                    },
                    vendor_name: {
                        required: "*** Vendor Name is Required ***"
                    },
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: 'fixed_item_store',
                        type: "POST",
                        data: $('#fixed_item_add_form').serialize(),
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            if ($.isEmptyObject(data.error)) {
                                $('#fixed_item_add_form').trigger("reset");
                                swal({
                                    icon: 'success',
                                    title: 'Item Stored Successfully !!!',
                                    showConfirmButton: true,
                                    timer: 2500
                                });
                                $('#fixed_item_table').DataTable().ajax.reload();
                                setInterval('location.reload()', 1000);
                            } else {
                                printErrorMsg(data.error);
                            }
                        },

                        success: function (data) {

                            if ($.isEmptyObject(data.error)) {
                                if (data['status'] == 'success') {
                                    $('#store').html('Sending..');
                                    $('#modal_fixed_item_add').modal('hide');
                                    swal({
                                        icon: 'success',
                                        title: 'Item Stored Successfully !!!',
                                        showConfirmButton: true,
                                        timer: 2500
                                    })
                                        .then(() => {
                                            setInterval('location.reload()', 2000)
                                        })
                                }
                                if (data['status'] == 'error') {
                                    swal({
                                        icon: 'error',
                                        title: 'Sorry!!! Warranty Date is less then Purchase Date !!!',
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                                }
                                if (data['status'] == 'warning') {
                                    swal({
                                        icon: 'error',
                                        title: 'Sorry!!! Asset Code alerady stored  !!!',
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                                }
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
            }
        )
    }
    if ($("#non_fixed_item_add_form").length > 0) {
        $("#non_fixed_item_add_form").validate({
            rules: {
                item_name: {
                    required: true,
                },
                brand_name: {
                    required: true,
                },
                vendor_name: {
                    required: true,
                },
            },
            messages: {
                item_name: {
                    required: "*** Item Name is Required ***"
                },
                brand_name: {
                    required: "*** Brand Name is Required ***"
                },
                vendor_name: {
                    required: "*** Vendor Name is Required ***"
                },
            },
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // $('#store').html('Sending..');
                $.ajax({
                    url: 'non_fixed_item_store',
                    type: "POST",
                    data: $('#non_fixed_item_add_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if ($.isEmptyObject(data.error)) {
                            if (data['status'] == 'success') {
                                $('#store').html('Sending..');
                                $('#modal_non_fixed_item_add').modal('hide');
                                    swal({
                                        icon: 'success',
                                        title: 'Item Stored Successfully !!!',
                                        showConfirmButton: true,
                                        timer: 2500
                                    })
                                        .then(() => {
                                            setInterval('location.reload()', 2000)
                                        })
                                }
                                if (data['status'] == 'error') {
                                    swal({
                                        icon: 'error',
                                        title: 'Sorry!!! Warranty Date is less then Purchase Date !!!',
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                                }
                                if (data['status'] == 'warning') {
                                    swal({
                                        icon: 'error',
                                        title: 'Sorry!!! Asset Code alerady stored !!!',
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                                }
                        }
                        else {
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

    if ($("#fixed_item_edit_form").length > 0) {
        $("#fixed_item_edit_form").validate({
            rules: {
                item_name: {
                    required: true,
                },
                brand_name: {
                    required: true,
                },
                vendor_name: {
                    required: true,
                },
            },
            messages: {
                item_name: {
                    required: "*** Item Name is Required ***"
                },
                brand_name: {
                    required: "*** Brand Name is Required ***"
                },
                vendor_name: {
                    required: "*** Vendor Name is Required ***"
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
                    url: 'fixed_item_update',
                    type: "POST",
                    data: $('#fixed_item_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#fixed_item_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Item Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#item_table').DataTable().ajax.reload();
                        $('#modal_fixed_item_edit').modal('hide');
                        setInterval('location.reload()', 1000);
                        // setInterval('location.reload()', 2000);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    if ($("#non_fixed_item_edit_form").length > 0) {
        $("#non_fixed_item_edit_form").validate({
            rules: {
                item_name: {
                    required: true,
                },
                brand_name: {
                    required: true,
                },
                vendor_name: {
                    required: true,
                },
            },
            messages: {
                item_name: {
                    required: "*** Item Name is Required ***"
                },
                brand_name: {
                    required: "*** Brand Name is Required ***"
                },
                vendor_name: {
                    required: "*** Vendor Name is Required ***"
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
                    url: 'non_fixed_item_update',
                    type: "POST",
                    data: $('#non_fixed_item_edit_form').serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#non_fixed_item_edit_form').trigger("reset");
                        swal({
                            icon: 'success',
                            title: 'Item Update Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#item_table').DataTable().ajax.reload();
                        $('#modal_non_fixed_item_edit').modal('hide');
                        setInterval('location.reload()', 1000);
                        // setInterval('location.reload()', 2000);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    }
    $('body').on('click', '#fixed_edit_item', function () {
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "fixed_item_edit/" + id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_fixed_item_edit').modal('show');
                $('#item_id').val(data.id);
                $('#edit_asset_code').val(data.asset_code);
                $('#edit_bill_no').val(data.bill_no);
                $('#edit_item_name_id').val(data.item_name_id);
                $('#edit_brand_name').val(data.brand_id);
                $('#edit_vendor_name').val(data.vendor_id);
                $('#edit_item_desc').val(data.item_desc);
                $('#edit_purchase_date').val(data.purchase_date);
                $('#edit_exp_date').val(data.exp_date);
                $('#edit_serial_no').val(data.serial_no);
                $('#edit_price').val(data.price);
                $('#edit_qty').val(data.qty);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#non_fixed_edit_item', function () {
        var id = $(this).data('id');
        $.ajax({
            type: "get",
            url: "non_fixed_item_edit/" + id,
            success: function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#modal_non_fixed_item_edit').modal('show');
                $('#n_item_id').val(data.id);
                $('#edit_n_asset_code').val(data.asset_code);
                $('#edit_n_bill_no').val(data.bill_no);
                $('#edit_n_item_name_id').val(data.item_name_id);
                $('#edit_n_brand_name').val(data.brand_id);
                $('#edit_n_vendor_name').val(data.vendor_id);
                $('#edit_n_item_desc').val(data.item_desc);
                $('#edit_n_purchase_date').val(data.purchase_date);
                $('#edit_n_exp_date').val(data.exp_date);
                $('#edit_n_serial_no').val(data.serial_no);
                $('#edit_n_price').val(data.price);
                $('#edit_n_qty').val(data.qty);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '#delete_item', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this Item?")) {
            $.ajax({
                type: "get",
                url: "item_delete/" + id,
                success: function (data) {
                    if (data['status'] == 'success') {
                        swal({
                            icon: 'success',
                            title: 'Item Delete Successfully !!!',
                            showConfirmButton: true,
                            timer: 2500
                        });
                        $('#item_table').DataTable().ajax.reload();
                        setInterval('location.reload()', 1000);
                    }
                    if (data['status'] == 'error') {
                        swal({
                            icon: 'error',
                            title: 'Sorry!!! This item already in distribution section !!!',
                            showConfirmButton: true,
                            timer: 4000
                        });
                    }

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
</script>
