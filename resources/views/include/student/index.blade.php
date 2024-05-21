<link href="{{asset('backend/all_file.css')}}" rel="stylesheet" type="text/css">
@if($payment->payment_status==0)
    <div class="page-content">
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-lg-inline">
                        <div class="page-title d-flex">
                            <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa Software (Counselor Panel) </h4>
                        </div>
                        <div class="navbar-right">
                            <a href="{{url('frontdesk_student_list')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 style="text-align:center;">Your System Is Currently Disable For Payment Issue. Please Contact Account Departments.</h3>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if($payment->payment_status==1)
    @if($data->status==0 )
        @include('include.student.profile_pending')
    @endif
    @if($data->status==1)
        @include('include.student.profile_done')
    @endif
@endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script>
    "use strict";

    function scroll_to_class(element_class, removed_height) {
        var scroll_to = $(element_class).offset().top - removed_height;
        if ($(window).scrollTop() != scroll_to) {
            $('.form-wizard').stop().animate({scrollTop: scroll_to}, 0);
        }
    }

    function bar_progress(progress_line_object, direction) {
        var number_of_steps = progress_line_object.data('number-of-steps');
        var now_value = progress_line_object.data('now-value');
        var new_value = 0;
        if (direction == 'right') {
            new_value = now_value + (100 / number_of_steps);
        } else if (direction == 'left') {
            new_value = now_value - (100 / number_of_steps);
        }
        progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
    }

    jQuery(document).ready(function () {

        /*
            Form
        */
        $('.form-wizard fieldset:first').fadeIn('slow');

        $('.form-wizard .required').on('focus', function () {
            $(this).removeClass('input-error');
        });

        // next step
        $('.form-wizard .btn-next').on('click', function () {
            var parent_fieldset = $(this).parents('fieldset');
            var next_step = true;
            // navigation steps / progress steps
            var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
            var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');

            // fields validation
            parent_fieldset.find('.required').each(function () {
                if ($(this).val() == "") {
                    $(this).addClass('input-error');
                    next_step = false;
                } else {
                    $(this).removeClass('input-error');
                }
            });
            // fields validation

            if (next_step) {
                parent_fieldset.fadeOut(400, function () {
                    // change icons
                    current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                    // progress bar
                    bar_progress(progress_line, 'right');
                    // show next step
                    $(this).next().fadeIn();
                    // scroll window to beginning of the form
                    scroll_to_class($('.form-wizard'), 20);
                });
            }

        });

        // previous step
        $('.form-wizard .btn-previous').on('click', function () {
            // navigation steps / progress steps
            var current_active_step = $(this).parents('.form-wizard').find('.form-wizard-step.active');
            var progress_line = $(this).parents('.form-wizard').find('.form-wizard-progress-line');

            $(this).parents('fieldset').fadeOut(400, function () {
                // change icons
                current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
                // progress bar
                bar_progress(progress_line, 'left');
                // show previous step
                $(this).prev().fadeIn();
                // scroll window to beginning of the form
                scroll_to_class($('.form-wizard'), 20);
            });
        });

        // submit
        $('.form-wizard').on('submit', function (e) {

            // fields validation
            $(this).find('.required').each(function () {
                if ($(this).val() == "") {
                    e.preventDefault();
                    $(this).addClass('input-error');
                } else {
                    $(this).removeClass('input-error');
                }
            });
            // fields validation
        });
    });

    // image uploader scripts

    var $dropzone = $('.image_picker'),
        $droptarget = $('.drop_target'),
        $dropinput = $('#inputFile'),
        $dropimg = $('.image_preview'),
        $remover = $('[data-action="remove_current_image"]');

    $dropzone.on('dragover', function () {
        $droptarget.addClass('dropping');
        return false;
    });

    $dropzone.on('dragend dragleave', function () {
        $droptarget.removeClass('dropping');
        return false;
    });

    $dropzone.on('drop', function (e) {
        $droptarget.removeClass('dropping');
        $droptarget.addClass('dropped');
        $remover.removeClass('disabled');
        e.preventDefault();

        var file = e.originalEvent.dataTransfer.files[0],
            reader = new FileReader();

        reader.onload = function (event) {
            $dropimg.css('background-image', 'url(' + event.target.result + ')');
        };

        console.log(file);
        reader.readAsDataURL(file);

        return false;
    });

    $dropinput.change(function (e) {
        $droptarget.addClass('dropped');
        $remover.removeClass('disabled');
        $('.image_title input').val('');

        var file = $dropinput.get(0).files[0],
            reader = new FileReader();

        reader.onload = function (event) {
            $dropimg.css('background-image', 'url(' + event.target.result + ')');
        }

        reader.readAsDataURL(file);
    });

    $remover.on('click', function () {
        $dropimg.css('background-image', '');
        $droptarget.removeClass('dropped');
        $remover.addClass('disabled');
        $('.image_title input').val('');
    });

    $('.image_title input').blur(function () {
        if ($(this).val() != '') {
            $droptarget.removeClass('dropped');
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#profileForm').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ url('student_profile_store')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#profileForm').trigger("reset");
                swal({
                    icon: 'success',
                    title: 'Student Profile Stored Successfully !!!',
                    showConfirmButton: true,
                    timer: 2500
                });
                setInterval('location.reload()', 2000);
                // $("#ajax-book-model").modal('hide');
                // var oTable = $('#datatable-ajax-crud').dataTable();
                // oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).ready(function () {
        $("#proficiency_test").change(function () {
            $(this).find("option:selected").each(function () {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".proficiency_test_box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".proficiency_test_box").hide();
                }
            });
        }).change();
        $("#standardized_test").change(function () {
            $(this).find("option:selected").each(function () {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".standardized_test_box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".standardized_test_box").hide();
                }
            });
        }).change();
    });

</script>
<script>
    function extraTicketAttachment() {
        i = 0;
        i++;
        jQuery("#fileUploadsContainer").append('' +
            '<div class="box">' +
            '<h4 class="mt-2" style="font-weight:bold;">Schools Attended :</h4> ' +
            '<hr class="mt-5"> <div class="row"> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Country of Institution:</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_country]" class="form-control" autocomplete="off"> ' +
            '</div> ' +
            '</div>' +
            ' <div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Name of Institution</label>' +
            '<input type="text" name="addmore[' + i + '][institution_name]" class="form-control" autocomplete="off"> ' +
            '</div> </div> <div class="col-lg-4"> <div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Level of Education</label>' +
            ' <input type="text" name="addmore[' + i + '][education_level]" class="form-control" autocomplete="off">' +
            ' </div> ' +
            '</div> ' +
            '</div>' +
            '<div class="row">' +
            ' <div class="col-lg-4"> ' +
            '<div class="form-group">' +
            ' <label style="color:black;font-weight:500;">Primary Language of Instructions:</label> ' +
            '<input type="text" name="addmore[' + i + '][primary_language_instruction]" class="form-control" autocomplete="off"> ' +
            '</div> </div> <div class="col-lg-4"> ' +
            '<div class="form-group">' +
            ' <label style="color:black;font-weight:500;">Attended Institution From:</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_from]" class="form-control date" autocomplete="off"> ' +
            '</div> ' +
            '</div> ' +
            '<div class="col-lg-4">' +
            ' <div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Attended Institution To</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_to]" class="form-control date" autocomplete="off"> ' +
            '</div> ' +
            '</div>' +
            '</div> ' +
            '<div class="row"> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Degree Name:</label>' +
            '<input type="text" name="addmore[' + i + '][institution_degree]" class="form-control" autocomplete="off">' +
            '</div>' +
            '</div> ' +
            '</div> ' +
            '<div class="row"> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Address:</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_address]" class="form-control" autocomplete="off"> ' +
            '</div>' +
            ' </div> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group">' +
            ' <label style="color:black;font-weight:500;">City/Town:</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_city]" class="form-control" autocomplete="off"> ' +
            '</div> ' +
            '</div> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Province</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_province]" class="form-control" autocomplete="off">' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '<div class="row"> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Zip Code:</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_zip]" class="form-control" autocomplete="off"> ' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</div>'
        )
    }

    $("#add").click(function () {
        i = 0;
        i++;
        $("#box").append('' +
            '<div class="box">' +
            '<h4 class="mt-2" style="font-weight:bold;">Schools Attended :</h4> ' +
            '<hr class="mt-5"> <div class="row"> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Country of Institution:</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_country]" class="form-control" autocomplete="off"> ' +
            '</div> ' +
            '</div>' +
            ' <div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Name of Institution</label>' +
            '<input type="text" name="addmore[' + i + '][institution_name]" class="form-control" autocomplete="off"> ' +
            '</div> </div> <div class="col-lg-4"> <div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Level of Education</label>' +
            ' <input type="text" name="addmore[' + i + '][education_level]" class="form-control" autocomplete="off">' +
            ' </div> ' +
            '</div> ' +
            '</div>' +
            '<div class="row">' +
            ' <div class="col-lg-4"> ' +
            '<div class="form-group">' +
            ' <label style="color:black;font-weight:500;">Primary Language of Instructions:</label> ' +
            '<input type="text" name="addmore[' + i + '][primary_language_instruction]" class="form-control" autocomplete="off"> ' +
            '</div> </div> <div class="col-lg-4"> ' +
            '<div class="form-group">' +
            ' <label style="color:black;font-weight:500;">Attended Institution From:</label> ' +
            '<input type="date" name="addmore[' + i + '][institution_from]" class="form-control" autocomplete="off"> ' +
            '</div> ' +
            '</div> ' +
            '<div class="col-lg-4">' +
            ' <div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Attended Institution To</label> ' +
            '<input type="date" name="addmore[' + i + '][institution_to]" class="form-control" autocomplete="off"> ' +
            '</div> ' +
            '</div>' +
            '</div> ' +
            '<div class="row"> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Degree Name:</label>' +
            '<input type="text" name="addmore[' + i + '][institution_degree]" class="form-control" autocomplete="off">' +
            '</div>' +
            '</div> ' +
            '</div> ' +
            '<div class="row"> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Address:</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_address]" class="form-control" autocomplete="off"> ' +
            '</div>' +
            ' </div> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group">' +
            ' <label style="color:black;font-weight:500;">City/Town:</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_city]" class="form-control" autocomplete="off"> ' +
            '</div> ' +
            '</div> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Province</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_province]" class="form-control" autocomplete="off">' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '<div class="row"> ' +
            '<div class="col-lg-4"> ' +
            '<div class="form-group"> ' +
            '<label style="color:black;font-weight:500;">Zip Code:</label> ' +
            '<input type="text" name="addmore[' + i + '][institution_zip]" class="form-control" autocomplete="off"> ' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</div>'
        )
    });
    $('#btn_two').on('click', function () {
        $('.box:last').remove();
    });
    $(document).ready(function () {
        $('#gre').click(function () {
            $('.gre-hidden-menu').slideToggle("slow");
        });
        $('#gmat').click(function () {
            $('.gmat-hidden-menu').slideToggle("slow");
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(function () {
            $(".datepicker").datepicker();
        });
    })
    $(function () {
        $(".date").datepicker({
            dateFormat: 'yy-mm-dd',
        });
    });
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
        $('.previousOne').select2();
        $('.previousTwo').select2();
    });

    $(document).ready(function () {
        var $order_name = $('#order-name');
        var $output = $('#output');
        var $select1 = $('#select1');
        var $select2 = $('#select2');
        var $select3 = $('#select3');
        var $options2 = $select2.find('option');
        var $options3 = $select3.find('option');
        $select1.on('change', function (event) {
            $select2.html(
                $options2.filter(
                    function () {
                        return $(this).data('section1') == $select1[0].selectedOptions[0].value;
                    }
                )
            );
            $select2.trigger('change');
        }).trigger('change');
        $select2.on('change', function (event) {
            $select3.html(
                $options3.filter(
                    function () {
                        return $(this).val() == $select2[0].selectedOptions[0].value;
                    }
                )
            );
        }).trigger('change');
        // $order_name.on('keyup', function(){
        //     $output.val(`utm_source=${$select1[0].selectedOptions[0].innerHTML}_${$select2[0].selectedOptions[0].innerHTML}&utm_medium=${$select3[0].selectedOptions[0].innerHTML}&utm_campaign=${$order_name.val()}`);
        // });

        var $previousOneselect1 = $('#previousOneselect1');
        var $previousOneselect2 = $('#previousOneselect2');
        var $previousOneselect3 = $('#previousOneselect3');
        var $previousOneoptions2 = $previousOneselect2.find('option');
        var $previousOneoptions3 = $previousOneselect3.find('option');
        $previousOneselect1.on('change', function (event) {
            $previousOneselect2.html(
                $previousOneoptions2.filter(
                    function () {
                        return $(this).data('section1') == $previousOneselect1[0].selectedOptions[0].value;
                    }
                )
            );
            $previousOneselect2.trigger('change');
        }).trigger('change');
        $previousOneselect2.on('change', function (event) {
            $previousOneselect3.html(
                $previousOneoptions3.filter(
                    function () {
                        return $(this).val() == $previousOneselect2[0].selectedOptions[0].value;
                    }
                )
            );
        }).trigger('change');

        var $previousTwoselect1 = $('#previousTwoselect1');
        var $previousTwoselect2 = $('#previousTwoselect2');
        var $previousTwoselect3 = $('#previousTwoselect3');
        var $previousTwooptions2 = $previousTwoselect2.find('option');
        var $previousTwooptions3 = $previousTwoselect3.find('option');
        $previousTwoselect1.on('change', function (event) {
            $previousTwoselect2.html(
                $previousTwooptions2.filter(
                    function () {
                        return $(this).data('section1') == $previousTwoselect1[0].selectedOptions[0].value;
                    }
                )
            );
            $previousTwoselect2.trigger('change');
        }).trigger('change');
        $previousTwoselect2.on('change', function (event) {
            $previousTwoselect3.html(
                $previousTwooptions3.filter(
                    function () {
                        return $(this).val() == $previousTwoselect2[0].selectedOptions[0].value;
                    }
                )
            );
        }).trigger('change');


    });
    $(function () {
        $('.colorselector').change(function () {
            $('.colors').hide();
            $('#' + $(this).val()).show();
        });
        $('.previousOnecolorselector').change(function () {
            $('.previousOnecolors').hide();
            $('#' + $(this).val()).show();
        });
        $('.previousTwocolorselector').change(function () {
            $('.previousTwocolors').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script>
    $('body').on('click', '.delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "delete_important_file/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Employee Information Delete Successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    setInterval('location.reload()', 2000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
    $('body').on('click', '.imp_delete_file', function () {
        var id = $(this).data("id");
        if (confirm("Do you really want to delete this item?")) {
            $.ajax({
                type: "get",
                url: "important_file_delete/" + id,
                success: function (data) {
                    swal({
                        icon: 'error',
                        title: 'Important File Delete Successfully !!!',
                        showConfirmButton: true,
                        timer: 2500
                    });
                    setInterval('location.reload()', 2000);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
</script>
