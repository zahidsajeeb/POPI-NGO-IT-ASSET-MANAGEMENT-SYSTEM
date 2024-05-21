<?php
error_reporting(0);
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
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
                        <h3 style="text-align:center;font-weight:bold;">Welcome To Visa Software (Student Panel)</h3>
                    </div>
                    @if(Auth::user()->role==='Counselor')
                        <div class="header-elements d-none">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-success" id="check_student_profile"><i class="fa fa-check"></i> Approved</button>
                            </div>
                        </div>
                    @endif
                    @if(Auth::user()->role==='Student')
                        @if($data->status ==1)
                            <div class="header-elements d-none">
                                <div class="d-flex justify-content-center">
                                    <a href="{{url('student_profile_edit')}}/<?php echo $data->student_id;?>" class="btn btn-success" style="border-radius:0px;"><i class="fa fa-edit"></i> Edit Profile</a>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            <div class="content">
                @if(Auth::user()->role==='Student')
                    @if($data->status ==1)
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="alert alert-secondary" role="alert" style="list-style:none; border-radius:0px; background:darkred !important; color:whitesmoke;",><i class="fa fa-close"></i> {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title" style="font-weight:bold;text-align:center;">Important Documents Required</h5>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered" id="sample_table">
                                            <thead>
                                            <th>#</th>
                                            <th>Required File Name</th>
                                            <th>Note</th>
                                            <th>File Upload</th>
                                            <th>File View</th>
                                            <th>Action</th>
                                            </thead>
                                            @foreach($important_data as $key=>$row)
                                                <form action="{{ url('important_file_update')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <tr>
                                                        <td>{{++$key}}</td>
                                                        <td>{{$row->req_file_name}}</td>
                                                        <td>{{$row->note}}</td>
                                                        <td>
                                                            <input type="file" name="imp_file" class="form-control" required autocomplete="off">
                                                            <input type="hidden" name="id" class="form-control" autocomplete="off" value="{{$row->id}}">
                                                        </td>
                                                        <td>
                                                            @if($row->imp_file==true)
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i> File View</button>
                                                                <div id="modal_theme_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                                <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <div class="modal-body">.
                                                                                <embed src="upload/<?php echo $row->imp_file ?>" frameborder="0" width="100%" height="780">
                                                                                <hr>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($row->imp_file!=true)
                                                                <button type="submit" class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-check"></i> File Submit</button>
                                                            @else
                                                                <a href="javascript:void(0)" class="btn btn-danger btn-xs imp_delete_file" data-id="<?php echo $row->id;?>" style="border-radius:0px;"><i class="icon-trash ml-2"></i> File Delete</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </form>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title" style="font-weight:bold;text-align:center;">Student Profile Show</h5>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <form action="{{url('student_document_store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Personal Information:</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">First Name:</td>
                                                        <td>{{$profile_data->f_name}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Middle Name:</td>
                                                        <td>{{$profile_data->m_name}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Last Name:</td>
                                                        <td>{{$profile_data->l_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">DoB:</td>
                                                        <td>{{$profile_data->dob}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">First Language:</td>
                                                        <td>{{$profile_data->first_language}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Citizenship:</td>
                                                        <td>{{$profile_data->citizenship}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Passport No:</td>
                                                        <td>{{$profile_data->passport_no}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Passport Exp Date:</td>
                                                        <td>{{$profile_data->passport_exp}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Marital Status:</td>
                                                        <td>{{$profile_data->marital_status}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Gender:</td>
                                                        <td>{{$profile_data->gender}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                                                        <td colspan="5">
                                                            @if($profile_data->personal_info_comment==true)
                                                                <span style="font-weight:bold;color:red;">Note:</span>
                                                                <p>{{$profile_data->personal_info_comment}}</p>
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Education Summary</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Country of Education:</td>
                                                        <td>{{$profile_data->education_country}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Highest Level of Education:</td>
                                                        <td>{{$profile_data->education_level}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Grading Scheme:</td>
                                                        <td>{{$profile_data->grading_scheme}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Grade Average:</td>
                                                        <td>{{$profile_data->grade_avg}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Grade Scale:</td>
                                                        <td>{{$profile_data->grade_scale}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Grade Institution:</td>
                                                        <td>{{$profile_data->grade_institute}}</td>
                                                    </tr>
                                                    @if($profile_data->previousOne_education_level==true)
                                                        <tr>
                                                            <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Previous One Education Summary</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Country of Education:</td>
                                                            <td>{{$profile_data->previousOne_education_country}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Highest Level of Education:</td>
                                                            <td>{{$profile_data->previousOne_education_level}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Grading Scheme:</td>
                                                            <td>{{$profile_data->previousOne_grading_scheme}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Grade Average:</td>
                                                            <td>{{$profile_data->previousOne_grade_avg}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Grade Scale:</td>
                                                            <td>{{$profile_data->previousOne_grade_scale}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Grade Institution:</td>
                                                            <td>{{$profile_data->previousOne_grade_institute}}</td>
                                                        </tr>
                                                    @endif
                                                    @if($profile_data->previousOne_education_level==true)
                                                        <tr>
                                                            <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Previous Two Education Summary</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Country of Education:</td>
                                                            <td>{{$profile_data->previousTwo_education_country}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Highest Level of Education:</td>
                                                            <td>{{$profile_data->previousTwo_education_level}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Grading Scheme:</td>
                                                            <td>{{$profile_data->previousTwo_grading_scheme}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Grade Average:</td>
                                                            <td>{{$profile_data->previousTwo_grade_avg}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Grade Scale:</td>
                                                            <td>{{$profile_data->previousTwo_grade_scale}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Grade Institution:</td>
                                                            <td>{{$profile_data->previousTwo_grade_institute}}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                                                        <td colspan="5">
                                                            @if($profile_data->education_summary_comment==true)
                                                                <span style="font-weight:bold;color:red;">Note:</span>
                                                                <p>{{$profile_data->education_summary_comment}}</p>
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;">Schools Attended :</td>
                                                    </tr>
                                                    @foreach($education_data as $row)
                                                        :
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
                                                            <td>{{$row->institution_country}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
                                                            <td>{{$row->institution_name}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
                                                            <td>{{$row->education_level}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
                                                            <td>{{$row->institution_country}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
                                                            <td>{{$row->institution_name}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
                                                            <td>{{$row->education_level}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
                                                            <td>{{$row->institution_degree}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
                                                            <td>{{$row->institution_address}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
                                                            <td>{{$row->institution_city}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
                                                            <td>{{$row->institution_province}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
                                                            <td>{{$row->institution_zip}}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                                                        <td colspan="6">
                                                            @if($profile_data->school_attended_comment==true)
                                                                <span style="font-weight:bold;color:red;">Note:</span>
                                                                <p>{{$profile_data->school_attended_comment}}</p>
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Test Scores</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">English Exam Type:</td>
                                                        <td>{{$profile_data->eng_exam_type}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Date of Exam:</td>
                                                        <td>{{$profile_data->exam_date}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Listening:</td>
                                                        <td>{{$profile_data->l_score}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Reading:</td>
                                                        <td>{{$profile_data->r_score}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Writing:</td>
                                                        <td>{{$profile_data->w_score}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Speaking:</td>
                                                        <td>{{$profile_data->s_score}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red">Comment:</td>
                                                        <td colspan="6">
                                                            @if($profile_data->test_score_comment==true)
                                                                <span style="font-weight:bold;color:red;">Note:</span>
                                                                <p>{{$profile_data->test_score_comment}}</p>
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Additional Qualifications</td>
                                                    </tr>
                                                    @if(isset($profile_data->gre_exam_date)!=0)
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">GRE Exam Date:</td>
                                                            <td>{{$profile_data->gre_exam_date}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Verbal:</td>
                                                            <td>{{$profile_data->gre_verval_score}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Quantitative:</td>
                                                            <td>{{$profile_data->gre_quantitative_score}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Writing:</td>
                                                            <td>{{$profile_data->gre_writing_score}}</td>
                                                        </tr>
                                                    @endif
                                                    @if(isset($profile_data->gmat_exam_date)!=0)
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">GMAT Exam Date:</td>
                                                            <td>{{$profile_data->gmat_exam_date}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Verbal:</td>
                                                            <td>{{$profile_data->gmat_verval_score}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Quantitative:</td>
                                                            <td>{{$profile_data->gmat_quantitative_score}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Writing:</td>
                                                            <td>{{$profile_data->gmat_writing_score}}</td>
                                                            <td style="background:#f4f4f4;font-weight:bold;">Total:</td>
                                                            <td>{{$profile_data->gmat_total_score}}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red">Comment:</td>
                                                        <td colspan="6">
                                                            @if($profile_data->additional_qualification_comment==true)
                                                                <span style="font-weight:bold;color:red;">Note:</span>
                                                                <p>{{$profile_data->additional_qualification_comment}}</p>
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Background Information</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;word-break: break-all;">Have you been refused a visa from Canada, <br> the USA, the United Kingdom, New Zealand, <br> Australia or Ireland?</td>
                                                        <td>{{$profile_data->visa_refused}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Do you have a valid Study Permit / Visa?:</td>
                                                        <td>{{$profile_data->permit}}</td>
                                                        <td style="background:#f4f4f4;font-weight:bold;"> Details:</td>
                                                        <td>{{$profile_data->more_details}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red">Comment:</td>
                                                        <td colspan="6">
                                                            @if($profile_data->background_information_comment==true)
                                                                <span style="font-weight:bold;color:red;">Note:</span>
                                                                <p>{{$profile_data->background_information_comment}}</p>
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Documents Images</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Passport Image</td>
                                                        <td colspan="5">
                                                            @foreach($document_data as $row)
                                                                @if($row->type=='passport')
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i
                                                                            class="icon-file-pdf ml-2"></i> File View
                                                                    </button>
                                                                    @if($profile_data->passport==true)
                                                                        <span style="font-weight:bold;color:red;">Note:</span>
                                                                        <p>{{$profile_data->passport}}</p>
                                                                    @endif
                                                                @endif
                                                                <div id="modal_theme_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                                <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <div class="modal-body">.
                                                                                <embed src="upload/<?php echo $row->file_name ?>" frameborder="0" width="100%" height="780">
                                                                                <hr>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px;"><i class="fa fa-close"></i> Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">SSC Certificate:</td>
                                                        <td colspan="5">
                                                            @foreach($document_data as $row)
                                                                @if($row->type=='ssc_certificate')
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i
                                                                            class="icon-file-pdf ml-2"></i> File View
                                                                    </button>
                                                                    @if($profile_data->ssc_certificate==true)
                                                                        <span style="font-weight:bold;color:red;">Note:</span>
                                                                        <p>{{$profile_data->ssc_certificate}}</p>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">HSC Certificate:</td>
                                                        <td colspan="5">
                                                            @foreach($document_data as $row)
                                                                @if($row->type=='hsc_certificate')
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;">File View <i
                                                                            class="icon-file-pdf ml-2"></i></button>
                                                                    @if($profile_data->hsc_certificate==true)
                                                                        <span style="font-weight:bold;color:red;">Note:</span>
                                                                        <p>{{$profile_data->hsc_certificate}}</p>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">University Certificate:</td>
                                                        <td colspan="5">
                                                            @foreach($document_data as $row)
                                                                @if($row->type=='uni_certificate')
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;">File View <i
                                                                            class="icon-file-pdf ml-2"></i></button><br>
                                                                    @if($profile_data->university_comment==true)
                                                                        <span style="font-weight:bold;color:red;">Note:</span>
                                                                        <p>{{$profile_data->university_comment}}</p>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        @include('admin.include.footer')
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
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
    </div>
</div>
</body>
</html>
