<?php
error_reporting(0);
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <script src="{{asset('backend/global_assets/js/plugins/media/glightbox.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/demo_pages/gallery.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        input{
            border-radius:0px !important;
        }
        select{
            border-radius:0px !important;
        }
        .select2-container {
            width: 100% !important;
            margin-top: -30px;
            border-radius:0px !important;
        }

        .proficiency_test_box {
            color: #000000;
            padding: 20px;
            display: none;
            margin-top: 20px;
        }

        .standardized_test_box {
            color: #000000;
            padding: 20px;
            display: none;
            margin-top: 20px;
        }

        .IELTS {
            background: #04040412;
        }

        .TOEFL {
            background: #04040412;
        }

        .PTE {
            background: #04040412;
        }

        .GMAT {
            background: #04040412;
        }

        .GRE {
            background: #04040412;
        }

        .form-box {
            padding-top: 40px;
            padding-bottom: 40px;
            /*background: rgb(234,88,4); !* Old browsers *!*/
            /*background: -moz-linear-gradient(top,  rgba(234,88,4,1) 0%, rgba(234,40,3,1) 51%, rgba(234,88,4,1) 100%); !* FF3.6-15 *!*/
            /*background: -webkit-linear-gradient(top,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); !* Chrome10-25,Safari5.1-6 *!*/
            /*background: linear-gradient(to bottom,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); !* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ *!*/
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ea5804', endColorstr='#ea5804', GradientType=0); /* IE6-9 */
        }

        .form-wizard {
            padding: 25px;
            background: #fff;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            box-shadow: 0px 0px 6px 3px #777;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            color: #888;
            line-height: 30px;
            text-align: center;
        }

        .form-wizard strong {
            font-weight: 500;
        }

        .form-wizard a, .form-wizard a:hover, .form-wizard a:focus {
            color: #ea2803;
            text-decoration: none;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
            transition: all .3s;
        }

        .form-wizard h1, .form-wizard h2 {
            margin-top: 10px;
            font-size: 38px;
            font-weight: 100;
            color: #555;
            line-height: 50px;
        }

        .form-wizard h3 {
            font-size: 25px;
            font-weight: 300;
            color: #ea2803;
            line-height: 30px;
            margin-top: 0;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .form-wizard h4 {
            float: left;
            font-size: 20px;
            font-weight: 300;
            color: #ea2803;
            line-height: 26px;
            width: 100%;
        }

        .form-wizard h4 span {
            float: right;
            font-size: 18px;
            font-weight: 300;
            color: #555;
            line-height: 26px;
        }

        .form-wizard table tr th {
            font-weight: normal;
        }

        .form-wizard img {
            max-width: 100%;
        }

        .form-wizard ::-moz-selection {
            background: #ea2803;
            color: #fff;
            text-shadow: none;
        }

        .form-wizard ::selection {
            background: #ea2803;
            color: #fff;
            text-shadow: none;
        }


        .form-control {
            height: 44px;
            width: 100%;
            margin: 0;
            padding: 0 20px;
            vertical-align: middle;
            background: #fff;
            border: 1px solid #ddd;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            line-height: 44px;
            color: #888;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
            transition: all .3s;
        }

        .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
            position: absolute;
            margin-top: 9px;
            margin-left: -20px;
        }

        .form-control option:hover, .form-control option:checked {
            box-shadow: 0 0 10px 100px #ea2803 inset;
        }

        .form-control:focus {
            outline: 0;
            background: #fff;
            border: 1px solid #ccc;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .form-control:-moz-placeholder {
            color: #888;
        }

        .form-control:-ms-input-placeholder {
            color: #888;
        }

        .form-control::-webkit-input-placeholder {
            color: #888;
        }

        .form-wizard label {
            font-weight: 300;
        }

        .form-wizard label span {
            color: #ea2803;
        }


        .form-wizard .btn {
            min-width: 105px;
            height: 40px;
            margin: 0;
            padding: 0 20px;
            vertical-align: middle;
            border: 0;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            line-height: 40px;
            color: #fff;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            text-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            -o-transition: all .3s;
            -moz-transition: all .3s;
            -webkit-transition: all .3s;
            -ms-transition: all .3s;
            transition: all .3s;
        }

        .form-wizard .btn:hover {
            background: #f34727;
            color: #fff;
        }

        .form-wizard .btn:active {
            outline: 0;
            background: #f34727;
            color: #fff;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .form-wizard .btn:focus,
        .form-wizard .btn:active:focus,
        .form-wizard .btn.active:focus {
            outline: 0;
            background: #f34727;
            color: #fff;
        }

        .form-wizard .btn.btn-next,
        .form-wizard .btn.btn-next:focus,
        .form-wizard .btn.btn-next:active:focus,
        .form-wizard .btn.btn-next.active:focus {
            background: #ea2803;
        }

        .form-wizard .btn.btn-submit,
        .form-wizard .btn.btn-submit:focus,
        .form-wizard .btn.btn-submit:active:focus,
        .form-wizard .btn.btn-submit.active:focus {
            background: #ea2803;
        }

        .form-wizard .btn.btn-previous,
        .form-wizard .btn.btn-previous:focus,
        .form-wizard .btn.btn-previous:active:focus,
        .form-wizard .btn.btn-previous.active:focus {
            background: #bbb;
        }

        .form-wizard .success h3 {
            color: #4F8A10;
            text-align: center;
            margin: 20px auto !important;
        }

        .form-wizard .success .success-icon {
            color: #4F8A10;
            font-size: 100px;
            border: 5px solid #4F8A10;
            border-radius: 100px;
            text-align: center !important;
            width: 110px;
            margin: 25px auto;
        }

        .form-wizard .progress-bar {
            background-color: #ea2803;
        }

        .form-wizard-steps {
            margin: auto;
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }

        .form-wizard-step {
            padding-top: 10px !important;
            border: 2px solid #fff;
            background: #ccc;
            -ms-transform: skewX(-30deg); /* IE 9 */
            -webkit-transform: skewX(-30deg); /* Safari */
            transform: skewX(-30deg); /* Standard syntax */
        }

        .form-wizard-step.active {
            background: #ea2803;
        }

        .form-wizard-step.activated {
            background: #ea2803;
        }

        .form-wizard-progress {
            position: absolute;
            top: 36px;
            left: 0;
            width: 100%;
            height: 0px;
            background: #ea2803;
        }

        .form-wizard-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 0px;
            background: #ea2803;
        }

        .form-wizard-tolal-steps-3 .form-wizard-step {
            position: relative;
            float: left;
            width: 18%;
            padding: 0 5px;
        }

        .form-wizard-tolal-steps-4 .form-wizard-step {
            position: relative;
            float: left;
            width: 18%;
            padding: 0 5px;
        }

        .form-wizard-tolal-steps-5 .form-wizard-step {
            position: relative;
            float: left;
            width: 18%;
            padding: 0 5px;
        }

        .form-wizard-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #777;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            -ms-transform: skewX(30deg); /* IE 9 */
            -webkit-transform: skewX(30deg); /* Safari */
            transform: skewX(30deg); /* Standard syntax */
        }

        .form-wizard-step.activated .form-wizard-step-icon {
            background: #ea2803;
            border: 1px solid #fff;
            color: #fff;
            line-height: 38px;
        }

        .form-wizard-step.active .form-wizard-step-icon {
            background: #fff;
            border: 1px solid #fff;
            color: #ea2803;
            line-height: 38px;
        }

        .form-wizard-step p {
            color: #fff;
            -ms-transform: skewX(30deg); /* IE 9 */
            -webkit-transform: skewX(30deg); /* Safari */
            transform: skewX(30deg); /* Standard syntax */
        }

        .form-wizard-step.activated p {
            color: #fff;
        }

        .form-wizard-step.active p {
            color: #fff;
        }

        .form-wizard fieldset {
            display: none;
            text-align: left;
            border: 0px !important
        }

        .form-wizard-buttons {
            text-align: right;
        }

        .form-wizard .input-error {
            border-color: #ea2803;
        }

        /** image uploader **/
        .image-upload a[data-action] {
            cursor: pointer;
            color: #555;
            font-size: 18px;
            line-height: 24px;
            transition: color 0.2s;
        }

        .image-upload a[data-action] i {
            width: 1.25em;
            text-align: center;
        }

        .image-upload a[data-action]:hover {
            color: #ea2803;
        }

        .image-upload a[data-action].disabled {
            opacity: 0.35;
            cursor: default;
        }

        .image-upload a[data-action].disabled:hover {
            color: #555;
        }

        .settings_wrap {
            margin-top: 20px;
        }

        .image_picker .settings_wrap {
            overflow: hidden;
            position: relative;
        }

        .image_picker .settings_wrap .drop_target,
        .image_picker .settings_wrap .settings_actions {
            float: left;
        }

        .image_picker .settings_wrap .drop_target {
            margin-right: 18px;
        }

        .image_picker .settings_wrap .settings_actions {
            float: left;
            margin-top: 100px;
            margin-left: 20px;
        }

        .settings_actions.vertical a {
            display: block;
        }

        .drop_target {
            position: relative;
            cursor: pointer;
            transition: all 0.2s;
            width: 250px;
            height: 250px;
            background: #f2f2f2;
            border-radius: 100%;
            margin: 0 auto 25px auto;
            overflow: hidden;
            border: 8px solid #E0E0E0;
        }

        .drop_target input[type="file"] {
            visibility: hidden;
        }

        .drop_target::before {
            content: 'Drop Hear';
            font-family: FontAwesome;
            position: absolute;
            display: block;
            width: 100%;
            line-height: 220px;
            text-align: center;
            font-size: 40px;
            color: rgba(0, 0, 0, 0.3);
            transition: color 0.2s;
        }

        .drop_target:hover,
        .drop_target.dropping {
            background: #f80;
            border-top-color: #cc6d00;
        }

        .drop_target:hover:before,
        .drop_target.dropping:before {
            color: rgba(0, 0, 0, 0.6);
        }

        .drop_target .image_preview {
            width: 100%;
            height: 100%;
            background: no-repeat center;
            background-size: contain;
            position: relative;
            z-index: 2;
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
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold">Home</span> - Student Profile Edit</h4>
                    </div>
                    <div class="navbar-right">
                        <a href="{{url('home')}}" class="btn btn-danger navbar-right" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back To Previous Page</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <section class="form-box" style="width:100%;">
                        <div class="container">
                            <div class="row">
                                <div
                                    class="col-sm-12 col-sm-offset-12 col-md-12 col-md-offset-12 col-lg-12 col-lg-offset-12 form-wizard">
                                    <form role="form" action="" method="post" id="profileForm" enctype="multipart/form-data">
                                        <h3>Student Profile Update</h3>
                                        <p>Fill all form field to go next step</p>
                                        <div class="form-wizard-steps form-wizard-tolal-steps-4">
                                            <div class="form-wizard-progress">
                                                <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                                            </div>
                                            <div class="form-wizard-step active">
                                                <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                                <p>General Information</p>
                                            </div>
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                                                <p>Education History</p>
                                            </div>
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                                                <p>Test Scores</p>
                                            </div>
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-snowflake" aria-hidden="true"></i></div>
                                                <p>Background Information</p>
                                            </div>
                                            <div class="form-wizard-step">
                                                <div class="form-wizard-step-icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
                                                <p>Upload Documents</p>
                                            </div>
                                        </div>
                                        <fieldset>
                                            @include('include.student.edit.general_information')
                                        </fieldset>
                                        <fieldset>
                                            @include('include.student.edit.educational_background')
                                        </fieldset>
                                        <fieldset>
                                            @include('include.student.edit.test_score')
                                        </fieldset>
                                        <fieldset>
                                            @include('include.student.edit.background_information')
                                        </fieldset>
                                        <fieldset>
                                            @include('include.student.edit.upload_documents')
                                        </fieldset>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <!-- Footer -->
            @include('admin.include.footer')
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
                        url: "{{ url('student_profile_update')}}",
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
                            url: "delete_file/" + id,
                            success: function (data) {
                                toastr.error("File Deleted Successfully!!!");
                                location.reload();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            </script>
        </div>
    </div>
</div>
</body>
</html>

