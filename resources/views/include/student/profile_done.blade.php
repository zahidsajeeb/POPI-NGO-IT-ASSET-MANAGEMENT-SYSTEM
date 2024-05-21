<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa Software (Student Panel) </h4>
                    </div>
                </div>
            </div>
            <div class="content">
                @foreach($important_data as $key=>$row)
                    @if($row->student_id == true)
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title" style="font-weight:bold;text-align:center;">Important Documents Required</h5>
                                        <hr>
                                        @if ($errors->any())
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="alert alert-secondary" role="alert" style="list-style:none; border-radius:0px; background:darkred !important; color:whitesmoke;" ,><i class="fa fa-close"></i> {{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
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
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                                                                File View
                                                            </button>
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
                                                            @if($check->as_status==0)
                                                                <a href="javascript:void(0)" class="btn btn-danger btn-xs imp_delete_file" data-id="<?php echo $row->id;?>" style="border-radius:0px;"><i class="icon-trash ml-2"></i> File Delete</a>
                                                            @else
                                                                -
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            </form>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
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
                                                <td>
                                                    @if($profile_data->grading_scheme=='Secondary_Education_Letter_Scale')
                                                        Secondary Education Letter Scale F - A+
                                                    @endif
                                                    @if($profile_data->grading_scheme=='Secondary_Education_Percentage_Scale')
                                                        Secondary Education Percentage Scale 0-100
                                                    @endif
                                                    @if($profile_data->grading_scheme=='Secondary_Education_Grade_Point')
                                                        Secondary Education Grade Point 5.0 Scale
                                                    @endif
                                                    @if($profile_data->grading_scheme=='Other')
                                                        Other
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background:#f4f4f4;font-weight:bold;">Grade Average:</td>
                                                <td>
                                                    @if(isset($profile_data->grade_avg_1)===true)
                                                        {{$profile_data->grade_avg_1}}
                                                    @endif
                                                    @if(isset($profile_data->grade_avg_2)===true)
                                                        {{$profile_data->grade_avg_2}}
                                                    @endif
                                                    @if(isset($profile_data->grade_avg_3)===true)
                                                        {{$profile_data->grade_avg_3}}
                                                    @endif
                                                    @if(isset($profile_data->grade_avg_4)===true)
                                                        {{$profile_data->grade_avg_4}}
                                                    @endif
                                                    @if(isset($profile_data->grade_avg_5)===true)
                                                        {{$profile_data->grade_avg_5}}
                                                    @endif
                                                    @if(isset($profile_data->grade_avg_6)===true)
                                                        {{$profile_data->grade_avg_6}}
                                                    @endif
                                                    @if(isset($profile_data->grade_avg_7)===true)
                                                        {{$profile_data->grade_avg_7}}
                                                    @endif
                                                </td>
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
                                                    <td>
                                                        @if($profile_data->previousOne_grading_scheme=='Previous_One_Secondary_Education_Letter_Scale')
                                                            Secondary Education Letter Scale F - A+
                                                        @endif
                                                        @if($profile_data->previousOne_grading_scheme=='Previous_One_Secondary_Education_Percentage_Scale')
                                                            Secondary Education Percentage Scale 0-100
                                                        @endif
                                                        @if($profile_data->previousOne_grading_scheme=='Previous_One_Secondary_Education_Grade_Point')
                                                            Secondary Education Grade Point 5.0 Scale
                                                        @endif
                                                        @if($profile_data->previousOne_grading_scheme=='Previous_One_Other')
                                                            Other
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Grade Average:</td>
                                                    <td>
                                                        @if(isset($profile_data->previousOne_grade_avg_1)===true)
                                                            {{$profile_data->previousOne_grade_avg_1}}
                                                        @endif
                                                        @if(isset($profile_data->previousOne_grade_avg_2)===true)
                                                            {{$profile_data->previousOne_grade_avg_2}}
                                                        @endif
                                                        @if(isset($profile_data->previousOne_grade_avg_3)===true)
                                                            {{$profile_data->previousOne_grade_avg_3}}
                                                        @endif
                                                        @if(isset($profile_data->previousOne_grade_avg_4)===true)
                                                            {{$profile_data->previousOne_grade_avg_4}}
                                                        @endif
                                                        @if(isset($profile_data->previousOne_grade_avg_5)===true)
                                                            {{$profile_data->previousOne_grade_avg_5}}
                                                        @endif
                                                        @if(isset($profile_data->previousOne_grade_avg_6)===true)
                                                            {{$profile_data->previousOne_grade_avg_6}}
                                                        @endif
                                                        @if(isset($profile_data->previousOne_grade_avg_7)===true)
                                                            {{$profile_data->previousOne_grade_avg_7}}
                                                        @endif
                                                    </td>
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
                                                    <td>
                                                        @if($profile_data->previousTwo_grading_scheme=='Previous_Two_Secondary_Education_Letter_Scale')
                                                            Secondary Education Letter Scale F - A+
                                                        @endif
                                                        @if($profile_data->previousTwo_grading_scheme=='Previous_Two_Secondary_Education_Percentage_Scale')
                                                            Secondary Education Percentage Scale 0-100
                                                        @endif
                                                        @if($profile_data->previousTwo_grading_scheme=='Previous_Two_Secondary_Education_Grade_Point')
                                                            Secondary Education Grade Point 5.0 Scale
                                                        @endif
                                                        @if($profile_data->previousTwo_grading_scheme=='Previous_Two_Other')
                                                            Other
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Grade Average:</td>
                                                    <td>
                                                        @if(isset($profile_data->previousTwo_grade_avg_1)===true)
                                                            {{$profile_data->previousTwo_grade_avg_1}}
                                                        @endif
                                                        @if(isset($profile_data->previousTwo_grade_avg_2)===true)
                                                            {{$profile_data->previousTwo_grade_avg_2}}
                                                        @endif
                                                        @if(isset($profile_data->previousTwo_grade_avg_3)===true)
                                                            {{$profile_data->previousTwo_grade_avg_3}}
                                                        @endif
                                                        @if(isset($profile_data->previousTwo_grade_avg_4)===true)
                                                            {{$profile_data->previousTwo_grade_avg_4}}
                                                        @endif
                                                        @if(isset($profile_data->previousTwo_grade_avg_5)===true)
                                                            {{$profile_data->previousTwo_grade_avg_5}}
                                                        @endif
                                                        @if(isset($profile_data->previousTwo_grade_avg_6)===true)
                                                            {{$profile_data->previousTwo_grade_avg_6}}
                                                        @endif
                                                        @if(isset($profile_data->previousTwo_grade_avg_7)===true)
                                                            {{$profile_data->previousTwo_grade_avg_7}}
                                                        @endif
                                                    </td>
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
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px"><i class="icon-file-pdf ml-2"></i>
                                                                File View
                                                            </button>
                                                        @endif
                                                        <div id="modal_theme_primary<?php echo $row->id; ?>"
                                                             class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary text-white">
                                                                        <h6 class="modal-title">Primary header</h6>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">.
                                                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <br> <br>
{{--                                                    <textarea name="passport_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;" placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->passport_comment}}</textarea>--}}
                                                        @if($profile_data->passport_comment==true)
                                                            <span style="font-weight:bold;color:red;">Note:</span>
                                                            <p>{{$profile_data->passport_comment}}</p>
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background:#f4f4f4;font-weight:bold;">SSC Certificate:</td>
                                                <td colspan="5">
                                                    @foreach($document_data as $row)
                                                        @if($row->type=='ssc_certificate')
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                                                                File View
                                                            </button>
                                                        @endif
                                                        <div id="modal_theme_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary text-white">
                                                                        <h6 class="modal-title">Primary header</h6>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">.
                                                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <br> <br>
{{--                                                    <textarea name="ssc_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;" placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->ssc_comment}}</textarea>--}}
                                                        @if($profile_data->ssc_comment==true)
                                                            <span style="font-weight:bold;color:red;">Note:</span>
                                                            <p>{{$profile_data->ssc_comment}}</p>
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background:#f4f4f4;font-weight:bold;">HSC Certificate:</td>
                                                <td colspan="5">
                                                    @foreach($document_data as $row)
                                                        @if($row->type=='hsc_certificate')
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                                                                File View
                                                            </button>
                                                        @endif
                                                        <div id="modal_theme_primary<?php echo $row->id; ?>"
                                                             class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary text-white">
                                                                        <h6 class="modal-title">Primary header</h6>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">.
                                                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <br> <br>
{{--                                                    <textarea name="hsc_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;" placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->hsc_comment}}</textarea>--}}
                                                        @if($profile_data->hsc_comment==true)
                                                            <span style="font-weight:bold;color:red;">Note:</span>
                                                            <p>{{$profile_data->hsc_comment}}</p>
                                                        @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background:#f4f4f4;font-weight:bold;">University Certificate:</td>
                                                <td colspan="5">
                                                    @foreach($document_data as $row)
                                                        @if($row->type=='uni_certificate')
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i
                                                                    class="icon-file-pdf ml-2"></i> File View
                                                            </button>
                                                        @endif
                                                        <div id="modal_theme_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary text-white">
                                                                        <h6 class="modal-title">Primary header</h6>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">.
                                                                        <embed src="{{ url('upload/'.$row->file_name) }}" frameborder="0" width="100%" height="780">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <br> <br>
{{--                                                    <textarea name="university_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;" placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->university_comment}}</textarea>--}}
                                                        @if($profile_data->university_comment==true)
                                                            <span style="font-weight:bold;color:red;">Note:</span>
                                                            <p>{{$profile_data->university_comment}}</p>
                                                        @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
