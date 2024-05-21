<meta charset="utf-8">
<meta name="description" content="@lang('metas.description')">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>POPI SOFTWARE Admin Panel</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="{{asset('backend/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('backend/assets/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>--}}
<!-- /global stylesheets -->

<!-- Core JS files -->
<script src="{{asset('backend/global_assets/js/main/jquery.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
{{--<script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{asset('backend/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/notifications/jgrowl.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/wizards/steps.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/inputs/inputmask.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{asset('backend/assets/js/app.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/form_wizard.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/dashboard.js')}}"></script>
{{--<script src="{{asset('backend/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/global_assets/js/demo_pages/datatables_basic.js')}}"></script>--}}
<script src="{{asset('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

{{--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>--}}





<style>
    .select2-container {
        width: 100% !important;
        border-radius:0px !important; ;
    }
    .select2-selection--single {
        border-radius: 0px !important;
        border-color: #604c4c69 !important;
    }
    thead{
        background: #8080802e !important;
        color: black !important;
    }
</style>

<script>
    $(document).ready(function () {
        $('#summernote').summernote();
    });
</script>




