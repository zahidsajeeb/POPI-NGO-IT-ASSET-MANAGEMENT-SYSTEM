<?php
error_reporting(0);
$student_id = $profile_data->student_id;
$education_data = DB::table('tbl_student_education')
    ->select('*')
    ->where('student_id', $student_id)
    ->get();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        .error {
            color: red;
            font-weight: bold;
        }

        .card {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
        }

        textarea {
            border-radius: 0px !important;
            border-color: #604c4c69 !important;
            padding: 15px;
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
                        <h4><i class="icon-home"></i><span class="font-weight-semibold"> Home</span> - Student Profile Show</h4>
                    </div>

                    <div class="header-elements d-none">
                        <div class="d-flex justify-content-center">
                            @if(Auth::user()->role==='Counselor' || Auth::user()->role==='Admin')
                                @if($profile_data==true)
                                    @if($check->as_proceed==0 && $check->vs_proceed==0)
                                        <button class="btn btn-lg btn-teal" id="admission_section_proceed" style="border-radius:0px;"><i class="fa fa-check"></i> Go to Admission Section</button>&nbsp
                                        <button class="btn btn-lg btn-teal" id="visa_section_proceed" style="border-radius:0px;"><i class="fa fa-check"></i> Go to Visa Section</button>&nbsp;
                                    @endif
                                    @if($check->as_proceed==1 && $check->vs_proceed==0)
                                        <button class="btn btn-lg btn-teal" id="visa_section_proceed" style="border-radius:0px;"><i class="fa fa-check"></i> Go to Visa Section</button>&nbsp;
                                    @endif
                                @endif
                                <a href="{{url('student')}}" class="btn btn-lg btn-danger" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back</a>
                            @endif
                            @if(Auth::user()->role==='Admission Section' || Auth::user()->role==='Visa Section')
                                @if($check->as_status==0)
                                    <button class="btn btn-lg btn-teal" id="check_student_profile_by_admission_section" style="border-radius:0px;"><i class="fa fa-check"></i> Approved</button> &nbsp;
                                @endif
                                <a href="{{url('student')}}" class="btn btn-lg btn-danger" style="border-radius:0px;"><i class="icon icon-backward2"></i> Back</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;">Student Profile Show</h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                @if(Auth::user()->role==='Counselor')
                                    <div class="table-responsive">
                                        <form action="{{url('comment_store')}}" method="POST">
                                            @csrf
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Personal Information:</td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;width:15%;">First Name:</td>
                                                    <td>
                                                        @if($profile_data->f_name==false)
                                                            -
                                                        @else
                                                            {{$profile_data->f_name}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;width:15%;">Middle Name:</td>
                                                    <td>
                                                        @if($profile_data->m_name==false)
                                                            -
                                                        @else
                                                            {{$profile_data->m_name}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;width:15%;">Last Name:</td>
                                                    <td>
                                                        @if($profile_data->l_name==false)
                                                            -
                                                        @else
                                                            {{$profile_data->l_name}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;">DoB:</td>
                                                    <td>
                                                        @if($profile_data->dob==false)
                                                            -
                                                        @else
                                                            {{$profile_data->dob}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;">First Language:</td>
                                                    <td>
                                                        @if($profile_data->first_language==false)
                                                            -
                                                        @else
                                                            {{$profile_data->first_language}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Citizenship:</td>
                                                    <td>
                                                        @if($profile_data->citizenship==false)
                                                            -
                                                        @else
                                                            {{$profile_data->citizenship}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Passport No:</td>
                                                    <td>
                                                        @if($profile_data->passport_no==false)
                                                            -
                                                        @else
                                                            {{$profile_data->passport_no}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Passport Exp Date:</td>
                                                    <td>
                                                        @if($profile_data->passport_exp==false)
                                                            -
                                                        @else
                                                            {{$profile_data->passport_exp}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Marital Status:</td>
                                                    <td>
                                                        @if($profile_data->marital_status==false)
                                                            -
                                                        @else
                                                            {{$profile_data->marital_status}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Gender:</td>
                                                    <td>
                                                        @if($profile_data->gender==false)
                                                            -
                                                        @else
                                                            {{$profile_data->gender}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold; font-size:18px; color:red;">Comment:</td>
                                                    <td colspan="5">
                                                        <textarea name="personal_info_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;"
                                                                  placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->personal_info_comment}}</textarea>
                                                        <input type="hidden" name="student_id" value="{{$profile_data->student_id}}">
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
                                                        <td>
                                                            @if($profile_data->previousOne_grading_scheme=='Previous_Two_Secondary_Education_Letter_Scale')
                                                                Secondary Education Letter Scale F - A+
                                                            @endif
                                                            @if($profile_data->previousOne_grading_scheme=='Previous_Two_Secondary_Education_Percentage_Scale')
                                                                Secondary Education Percentage Scale 0-100
                                                            @endif
                                                            @if($profile_data->previousOne_grading_scheme=='Previous_Two_Secondary_Education_Grade_Point')
                                                                Secondary Education Grade Point 5.0 Scale
                                                            @endif
                                                            @if($profile_data->previousOne_grading_scheme=='Previous_Two_Other')
                                                                Other
                                                            @endif
                                                        </td>
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
                                                        <textarea name="education_summary_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;"
                                                                  placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->education_summary_comment}}</textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" style="text-align:center;background:#f4f4f4;font-weight:bold;">Schools Attended :</td>
                                                </tr>
                                                @foreach($education_data as $row)
                                                    :
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Country of Institution:</td>
                                                        <td>
                                                            @if($profile_data->institution_country==false)
                                                                -
                                                            @else
                                                                {{$profile_data->institution_country}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Name of Institution:</td>
                                                        <td>
                                                            @if($profile_data->institution_name==false)
                                                                -
                                                            @else
                                                                {{$profile_data->institution_name}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Level of Education:</td>
                                                        <td>
                                                            @if($profile_data->education_level==false)
                                                                -
                                                            @else
                                                                {{$profile_data->education_level}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Primary Language of Instructions:</td>
                                                        <td>
                                                            @if($profile_data->institution_country==false)
                                                                -
                                                            @else
                                                                {{$profile_data->institution_country}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Attended Institution From:</td>
                                                        <td>
                                                            @if($profile_data->institution_name==false)
                                                                -
                                                            @else
                                                                {{$profile_data->institution_name}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Attended Institution To:</td>
                                                        <td>
                                                            @if($profile_data->institution_country==false)
                                                                -
                                                            @else
                                                                {{$profile_data->education_level}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Degree Name:</td>
                                                        <td>
                                                            @if($profile_data->institution_degree==false)
                                                                -
                                                            @else
                                                                {{$profile_data->institution_degree}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Address:</td>
                                                        <td>
                                                            @if($profile_data->institution_address==false)
                                                                -
                                                            @else
                                                                {{$profile_data->institution_address}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">City/Town:</td>
                                                        <td>
                                                            @if($profile_data->institution_city==false)
                                                                -
                                                            @else
                                                                {{$profile_data->institution_city}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Province:</td>
                                                        <td>
                                                            @if($profile_data->institution_province==false)
                                                                -
                                                            @else
                                                                {{$profile_data->institution_province}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Zip Code:</td>
                                                        <td>
                                                            @if($profile_data->institution_zip==false)
                                                                -
                                                            @else
                                                                {{$profile_data->institution_zip}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                                                    <td colspan="5">
                                                        <textarea name="school_attended_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;"
                                                                  placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->school_attended_comment}}</textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Test Scores</td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;">English Exam Type:</td>
                                                    <td>
                                                        @if($profile_data->eng_exam_type==false)
                                                            -
                                                        @else
                                                            {{$profile_data->eng_exam_type}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Date of Exam:</td>
                                                    <td>
                                                        @if($profile_data->exam_date==false)
                                                            -
                                                        @else
                                                            {{$profile_data->exam_date}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Listening:</td>
                                                    <td>
                                                        @if($profile_data->l_score==false)
                                                            -
                                                        @else
                                                            {{$profile_data->l_score}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Reading:</td>
                                                    <td>
                                                        @if($profile_data->r_score==false)
                                                            -
                                                        @else
                                                            {{$profile_data->r_score}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Writing:</td>
                                                    <td>
                                                        @if($profile_data->w_score==false)
                                                            -
                                                        @else
                                                            {{$profile_data->w_score}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Speaking:</td>
                                                    <td>
                                                        @if($profile_data->s_score==false)
                                                            -
                                                        @else
                                                            {{$profile_data->s_score}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold; font-size:18px; color:red;">Comment:</td>
                                                    <td colspan="6">
                                                        <textarea name="test_score_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;"
                                                                  placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->test_score_comment}}</textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Additional Qualifications</td>
                                                </tr>
                                                @if(isset($profile_data->gre_exam_date)!=0)
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">GRE Exam Date:</td>
                                                        <td>
                                                            {{$profile_data->gre_exam_date}}
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Verbal:</td>
                                                        <td>
                                                            {{$profile_data->gre_verval_score}}
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Quantitative:</td>
                                                        <td>
                                                            {{$profile_data->gre_quantitative_score}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Writing:</td>
                                                        <td>
                                                            {{$profile_data->gre_writing_score}}
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if(isset($profile_data->gmat_exam_date)!=0)
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">GMAT Exam Date:</td>
                                                        <td>
                                                            @if($profile_data->gmat_exam_date==false)
                                                                -
                                                            @else
                                                                {{$profile_data->gmat_exam_date}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Verbal:</td>
                                                        <td>
                                                            @if($profile_data->gmat_verval_score==false)
                                                                -
                                                            @else
                                                                {{$profile_data->gmat_verval_score}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Quantitative:</td>
                                                        <td>
                                                            @if($profile_data->gmat_quantitative_score==false)
                                                                -
                                                            @else
                                                                {{$profile_data->gmat_quantitative_score}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Writing:</td>
                                                        <td>
                                                            @if($profile_data->gmat_writing_score==false)
                                                                -
                                                            @else
                                                                {{$profile_data->gmat_writing_score}}
                                                            @endif
                                                        </td>
                                                        <td style="background:#f4f4f4;font-weight:bold;">Total:</td>
                                                        <td>
                                                            @if($profile_data->gmat_total_score==false)
                                                                -
                                                            @else
                                                                {{$profile_data->gmat_total_score}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                                                    <td colspan="6">
                                                        <textarea name="additional_qualification_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;"
                                                                  placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->additional_qualification_comment}}</textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" style="text-align:center; background:#e7e7e7;font-weight:bold;">Background Information</td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Have you been refused a visa from Canada,<br> the USA, the United Kingdom,<br> New Zealand, Australia or Ireland?</td>
                                                    <td>
                                                        @if($profile_data->visa_refused==false)
                                                            -
                                                        @else
                                                            {{$profile_data->visa_refused}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;">Do you have a valid Study Permit / Visa?:</td>
                                                    <td>
                                                        @if($profile_data->permit==false)
                                                            -
                                                        @else
                                                            {{$profile_data->permit}}
                                                        @endif
                                                    </td>
                                                    <td style="background:#f4f4f4;font-weight:bold;"> Details:</td>
                                                    <td>
                                                        @if($profile_data->more_details==false)
                                                            -
                                                        @else
                                                            {{$profile_data->more_details}}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                                                    <td colspan="6"><textarea name="background_information_comment" style="width:100%;height:150px;border:1px solid #726e6e3b;"
                                                                              placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->background_information_comment}}</textarea>
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
                                                        <textarea name="passport_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;"
                                                                  placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->passport_comment}}</textarea>
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
                                                        <textarea name="ssc_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;"
                                                                  placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->ssc_comment}}</textarea>
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
                                                        <textarea name="hsc_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;"
                                                                  placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->hsc_comment}}</textarea>
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
                                                        <textarea name="university_comment" style="width:100%;height:150px;border:1px solid #726e6e3b; margin-top:5px;"
                                                                  placeholder="Type okay or suggest where need to corrections . . .">{{$profile_data->university_comment}}</textarea>
                                                    </td>
                                                </tr>
                                                @if(Auth::user()->role==='Counselor')
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="7">
                                                            @if($profile_data==true)
                                                                <button type="submit" class="btn btn-lg btn-info" style="border-radius:0px;"><i class="fa fa-check"></i> Comment Submit</button>
                                                            @else
                                                                <button type="submit" disabled class="btn btn-lg btn-info" style="border-radius:0px;"><i class="fa fa-check"></i> Comment Submit</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </form>
                                    </div>
                                @endif
                                @if(Auth::user()->role==='Admission Section')
                                    <div class="table-responsive">
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
                                                <td style="background:#f4f4f4;font-weight:bold; font-size:18px; color:red;">Comment:</td>
                                                <td colspan="5">
                                                    @if($profile_data->personal_info_comment==true)
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
                                                        <p>{{$profile_data->education_summary_comment}}</p>
                                                    @else
                                                        <p>N/A</p>
                                                @endif
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
                                                <td colspan="5">
                                                    @if($profile_data->school_attended_comment==true)
                                                        <p>{{$profile_data->school_attended_comment}}</p>
                                                    @else
                                                        <p>N/A</p>
                                                @endif
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
                                                <td style="background:#f4f4f4;font-weight:bold; font-size:18px; color:red;">Comment:</td>
                                                <td colspan="6">
                                                    @if($profile_data->test_score_comment==true)
                                                        <p>{{$profile_data->test_score_comment}}</p>
                                                    @else
                                                        <p>N/A</p>
                                                @endif
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
                                                <td style="background:#f4f4f4;font-weight:bold;font-size:18px; color:red;">Comment:</td>
                                                <td colspan="6">
                                                    @if($profile_data->additional_qualification_comment==true)
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
                                                <td style="background:#f4f4f4;font-weight:bold;">Have you been refused a visa from Canada, the USA, the United Kingdom, New Zealand, Australia or Ireland?</td>
                                                <td>{{$profile_data->visa_refused}}</td>
                                                <td style="background:#f4f4f4;font-weight:bold;">Do you have a valid Study Permit / Visa?:</td>
                                                <td>{{$profile_data->permit}}</td>
                                                <td style="background:#f4f4f4;font-weight:bold;"> Details:</td>
                                                <td>{{$profile_data->more_details}}</td>
                                            </tr>
                                            <tr>
                                                <td style="background:#f4f4f4;font-weight:bold;font-size:22px; color:red;">Comment:</td>
                                                <td colspan="6">
                                                    @if($profile_data->background_information_comment==true)
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
                                                        <p>{{$profile_data->background_information_comment}}</p>
                                                    @else
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
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
                                                            </button> <br>
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
                                                    @if($profile_data->passport_comment==true)
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
                                                        <p>{{$profile_data->passport_comment}}</p>
                                                    @else
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
                                                        <p>N/A</p>
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
                                                    @if($profile_data->ssc_comment==true)
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
                                                        <p>{{$profile_data->ssc_comment}}</p>
                                                    @else
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
                                                        <p>N/A</p>
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
                                                    @if($profile_data->hsc_comment==true)
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
                                                        <p>{{$profile_data->hsc_comment}}</p>
                                                    @else
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
                                                        <p>N/A</p>
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
                                                    @if($profile_data->university_comment==true)
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
                                                        <p>{{$profile_data->university_comment}}</p>
                                                    @else
                                                        <h5 style="color:red; margin-top:10px;"> Note:</h5>
                                                        <p>N/A</p>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-6">
                                            <h3 style="font-weight:bold; margin-top:35px;"> Important Document:</h3>
                                            <form action="{{url('important_file_store')}}" method="POST">
                                                @csrf
                                                <table class="table table-bordered" id="sample_table">
                                                    <thead>
                                                    <th style="width:20%;">#</th>
                                                    <th style="width:40%;">Required File Name</th>
                                                    <th style="width:40%;">Note</th>
                                                    </thead>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <textarea name="addmore[0][req_file_name]" class="form-control" required placeholder="Please Enter Require File Name . . ." autocomplete="off" style="font-size:14px !important;"></textarea>
                                                            <input type="hidden" name="addmore[0][student_id]" value="{{$profile_data->student_id}}" required readonly class="form-control color-red">
                                                        </td>
                                                        <td>
                                                            <textarea name="addmore[0][note]" class="form-control" required placeholder="Please Enter Note . . ." autocomplete="off" style="font-size:14px !important;"></textarea>
                                                        </td>
                                                        <td>
                                                            <button type="button" name="add" id="add_more_sample" class="btn btn-success btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-plug"></i> Add More</button>
                                                            <br>
                                                            <button type="submit" class="btn btn-sm btn-info" style="border-radius:0px; margin-top:5px; width:100px;"><i class="fa fa-check"></i> Submit</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 style="font-weight:bold; margin-top:35px;"> Important Documents View:</h3>
                                            <table class="table table-bordered" id="sample_table">
                                                <thead>
                                                <th>#</th>
                                                <th>Required File Name</th>
                                                <th>Note</th>
                                                <th>File View</th>
                                                <th>Action</th>
                                                </thead>
                                                @foreach($important_data as $key=>$row)
                                                    <tr>
                                                        <td>{{++$key}}</td>
                                                        <td>{{$row->req_file_name}}</td>
                                                        <td>{{$row->note}}</td>
                                                        <td>
                                                            @if($row->imp_file==true)
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_primary<?php echo $row->id; ?>" style="border-radius:0px;"><i class="icon-file-pdf ml-2"></i>
                                                                    File View
                                                                </button>
                                                                <div id="modal_primary<?php echo $row->id; ?>" class="modal fade" tabindex="-1" style="border-radius:0px;">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-primary text-white" style="border-radius:0px;">
                                                                                <h6 class="modal-title" style="font-size:18px !important;"><i class="fa fa-file-pdf"></i> File View</h6>
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {{--                                                                                <embed src="upload/<?php echo $row->imp_file ?>" frameborder="0" width="100%" height="780">--}}
                                                                                <embed src="{{ url('upload/'.$row->imp_file) }}" frameborder="0" width="100%" height="780">
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
                                                                <button type="button" data-id="{{$row->id}}" id="delete_file" class="btn btn-danger btn-sm" style="width:100px;border-radius:0px;"><i class="fa fa-trash"></i> Delete</button>
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- =========================(Modal Start Counselor Section)============================================--}}
            <div id="modal_check_student_profile" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('counselor_check_profile')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">All Information of this student is Correct ? </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal_admission_section_proceed" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('admission_section_proceed')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">Are You Sure to proceed Student to Admission Section !!!!!!!!!! </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal_visa_section_proceed" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('visa_section_proceed')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">Are You Sure to proceed Student to Visa Section !!!!!!!!!! </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- =========================(Modal Start Admission Section)============================================--}}
            <div id="modal_check_student_profile_by_admission_section" class="modal fade" tabindex="-1" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                <div class="modal-dialog modal-lg" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                    <div class="modal-content" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                        <form action="{{url('admission_check_profile')}}" method="GET">
                            @csrf
                            <div class="modal-header bg-indigo text-white" style="border-color: #604c4c69 !important; border-radius:0px !important;">
                                <h6 class="modal-title"><i class="icin icon-checkbox-checked"></i> Confirmation Form</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2 style="text-align:center;">All Information of this student is Correct ? </h2>
                                <input type="hidden" name="student_id" id="student_id" value="{{$profile_data->student_id}}">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-teal" style="border-radius:0px !important;"><i class="icon icon-checkbox-checked"></i> Accept</button>
                                <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" style="border-radius:0px !important;"><i class="fa fa-close"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            @include('admin.include.footer')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
            <script>
                var SITEURL = '{{URL::to('')}}';
                if ($("#checkForm").length > 0) {
                    $("#checkForm").validate({
                        rules: {
                            name: {
                                required: true,
                            },
                            user_name: {
                                required: true,
                            },
                            role: {
                                required: true,
                            },
                            counter_no: {
                                required: true,
                            },
                            password: {
                                required: true,
                            },
                        },
                        messages: {
                            name: {
                                required: "(***Name is required***)"
                            },
                            user_name: {
                                required: "(***User Name is required***)"
                            },
                            role: {
                                required: "(***Role is required***)"
                            },
                            counter_no: {
                                required: "(***Counter No is required***)"
                            },
                            password: {
                                required: "(***Password is required***)"
                            },
                        },
                        submitHandler: function (form) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $('#check_profile').html('Sending..');
                            $.ajax({
                                url: 'counselor_check_profile',
                                type: "POST",
                                data: $('#checkForm').serialize(),
                                dataType: 'json',
                                success: function (data) {
                                    $('#checkForm').trigger("reset");
                                    $('#modal_check_student_profile').modal('hide');
                                    swal({
                                        icon: 'success',
                                        title: 'Student Profile Check Successfully !!!',
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
                    })
                }

                $(document).on("click", "#check_student_profile", function () {
                    $("#modal_check_student_profile").modal("toggle");
                });
                $(document).on("click", "#check_student_profile_by_admission_section", function () {
                    $("#modal_check_student_profile_by_admission_section").modal("toggle");
                });

                $(document).on("click", "#admission_section_proceed", function () {
                    $("#modal_admission_section_proceed").modal("toggle");
                });
                $(document).on("click", "#visa_section_proceed", function () {
                    $("#modal_visa_section_proceed").modal("toggle");
                });


                //(+++++++++ Toaster Message ++++++++++++++)
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
                $(document).ready(function () {
                    var i = 1;
                    $("#add_more_sample").click(function () {
                        i++;
                        $("#sample_table").append('<tr><td>' + i + '</td>' +
                            '<td><textarea name="addmore[' + i + '][req_file_name]" class="form-control" required placeholder="Please Enter Require File Name . . ." autocomplete="off" style="font-size:14px !important;"></textarea> <input type="hidden" name="addmore[' + i + '][student_id]" value="{{$profile_data->student_id}}" required readonly class="form-control color-red"></td>' +
                            '<td><textarea name="addmore[' + i + '][note]" class="form-control" required placeholder="Please Enter Note . . ." autocomplete="off" style="font-size:14px !important;"></textarea></td>' +
                            '<td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="fa fa-close"></i> Delete</button></td>' +
                            '</tr>'
                        )
                        ;
                        $('.collection-date').datepicker({
                            dateFormat: "yy/mm/dd",
                        });
                        $('.js-select').select2({
                                dropdownParent: $('#milkCollectionModal .modal-content')
                            }
                        );
                    });
                    $(document).on('click', '.remove-tr', function () {
                        $(this).parents('tr').remove();
                    });
                });
                $('body').on('click', '#delete_file', function () {
                    var id = $(this).data("id");
                    if (confirm("Do you really want to delete this item?")) {
                        $.ajax({
                            type: "get",
                            url: "important_file_description_delete/" + id,
                            success: function (data) {
                                swal({
                                    icon: 'error',
                                    title: 'Important File  Delete Successfully !!!',
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
            <!-- /footer -->
        </div>
        <!-- /inner content -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
</body>
</html>



