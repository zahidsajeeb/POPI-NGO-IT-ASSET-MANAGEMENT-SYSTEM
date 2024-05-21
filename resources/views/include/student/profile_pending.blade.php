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
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-secondary" role="alert" style="list-style:none; border-radius:0px; background:darkred !important; color:whitesmoke;" ,><i class="fa fa-close"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <section class="form-box" style="width:100%;">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-sm-offset-12 col-md-12 col-md-offset-12 col-lg-12 col-lg-offset-12 form-wizard">
                                    {{--                                    <form role="form" action="{{ url('student_profile_store')}}" method="POST" id="profileForm1212121" enctype="multipart/form-data">--}}
                                    <form role="form" action="" method="post" id="profileForm" enctype="multipart/form-data">
                                        <h3>Student Profile</h3>
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
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="mt-2" style="font-weight:bold;">Personal Information:
                                                        <span>Step 1 - 5</span></h4>
                                                    <hr class="mt-5">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">First Name <span>*</span></label>
                                                        <input type="text" name="f_name" class="form-control required" value="{{old('f_name')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Middle Name</label>
                                                        <input type="text" name="m_name" class="form-control" value="{{old('m_name')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Last Name <span>*</span></label>
                                                        <input type="text" name="l_name" class="form-control value="{{old('l_name')}}" required" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Date of Birth <span>*</span></label>
                                                        <input type="date" name="dob" class="form-control required" value="{{old('dob')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">First Language <span>*</span></label>
                                                        <input type="text" name="first_language" class="form-control required" value="{{old('first_language')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Citizenship <span>*</span></label>
                                                        <input type="text" name="citizenship" class="form-control required" value="{{old('citizenship')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Passport No <span>*</span></label>
                                                        <input type="text" name="passport_no" class="form-control required" value="{{old('passport_no')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Passport Exp Date</label>
                                                        <input type="date" name="passport_exp" class="form-control" value="{{old('passport_exp')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Marital Status <span>*</span></label>
                                                        <select class="form-control required" name="marital_status" value="{{old('marital_status')}}" style="border-radius:0px;">
                                                            <option value="">-Select-</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Unmarried">Unmarried</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Gender <span>*</span></label>
                                                        <select class="form-control required" name="gender" value="{{old('gender')}}" style="border-radius:0px;">
                                                            <option value="">-Select-</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="mt-2" style="font-weight:bold;">Address Details:</h4>
                                                    <hr class="mt-5">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Address <span>*</span></label>
                                                        <textarea class="form-control required" name="address" value="{{old('address')}}" style="border-radius:0px; border-color: #604c4c69 !important;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">City/Town <span>*</span></label>
                                                        <input type="text" name="city" class="form-control required" value="{{old('city')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Country <span>*</span></label>
                                                        <input type="text" name="country" required class="form-control required" value="{{old('country')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Province/State</label>
                                                        <input type="text" name="state" class="form-control" value="{{old('state')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Postal/Zip Code <span>*</span></label>
                                                        <input type="text" name="zip_code" class="form-control required" value="{{old('zip_code')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Email</label>
                                                        <input type="email" name="email" class="form-control" value="{{old('email')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Phone Number <span>*</span></label>
                                                        <input type="number" name="phone_no" class="form-control required" value="{{old('phone_no')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-wizard-buttons">
                                                <button type="button" class="btn btn-next" style="border-radius:0px; border-color: #604c4c69 !important;"><i class="icon icon-forward"></i> Next</button>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <h4 class="mt-2" style="font-weight:bold;">Education Summary :<span>Step 2 - 5</span></h4>
                                            <hr class="mt-5">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Country of Education <span>*</span></label>
                                                        <input type="text" name="education_country" class="form-control required" value="{{old('education_country')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Highest Level of Education <span>*</span></label>
                                                    </div>
                                                    <select class="js-example-basic-single form-control required" id="select1" name="education_level" style="display: block;!important;">
                                                        <option disabled selected>Select</option>
                                                        <optgroup label="Primary">
                                                            <option value="Grade 1">Grade 1</option>
                                                            <option value="Grade 2">Grade 2</option>
                                                            <option value="Grade 3">Grade 3</option>
                                                            <option value="Grade 4">Grade 4</option>
                                                            <option value="Grade 5">Grade 5</option>
                                                            <option value="Grade 6">Grade 6</option>
                                                            <option value="Grade 7">Grade 7</option>
                                                            <option value="Grade 8">Grade 8</option>
                                                        </optgroup>
                                                        <optgroup label="Secondary">
                                                            <option value="Grade 9">Grade 9</option>
                                                            <option value="Grade 10">Grade 10</option>
                                                            <option value="Grade 11">Grade 11</option>
                                                            <option value="Grade 12">Grade 12/High School</option>
                                                        </optgroup>
                                                        <optgroup label="Undergraduate">
                                                            <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                            <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                            <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                            <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                            <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                        </optgroup>
                                                        <optgroup label="Postgraduate">
                                                            <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                            <option value="Master Degree">Master Degree</option>
                                                            <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Grading Scheme <span>*</span></label>
                                                        <select class="form-control colorselector required" name="grading_scheme" id="select2">
                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 1">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 1">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 1">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 1">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 2">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 2">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 2">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 2">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 3">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 3">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 3">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 3">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 4">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 4">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 4">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 4">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 5">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 5">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 5">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 5">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 6">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 6">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 6">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 6">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 7">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 7">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 7">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 7">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 8">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 8">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 8">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 8">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 9">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 9">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 9">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 9">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 10">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 10">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 10">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 10">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 11">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 11">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 11">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 11">Other</option>

                                                            <option value="Secondary_Education_Letter_Scale" data-section1="Grade 12">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Secondary_Education_Percentage_Scale" data-section1="Grade 12">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Secondary_Education_Grade_Point" data-section1="Grade 12">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Other" data-section1="Grade 12">Other</option>

                                                            <option value="Higher_Education_Letter_Scale" data-section1="1-Year Post-Secondary Certificate">Higher Education Letter Scale F - A+</option>
                                                            <option value="Higher_Education_Grade_Point" data-section1="1-Year Post-Secondary Certificate">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Higher_Education_Percentage_Scale" data-section1="1-Year Post-Secondary Certificate">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Other" data-section1="1-Year Post-Secondary Certificate">Other</option>

                                                            <option value="Higher_Education_Letter_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Letter Scale F - A+</option>
                                                            <option value="Higher_Education_Grade_Point" data-section1="2-Year Undergraduate Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Higher_Education_Percentage_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Other" data-section1="2-Year Undergraduate Diploma">Other</option>

                                                            <option value="Higher_Education_Letter_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Letter Scale F - A+</option>
                                                            <option value="Higher_Education_Grade_Point" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Higher_Education_Percentage_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Other" data-section1="3-Year Undergraduate Advanced Diploma">Other</option>

                                                            <option value="Higher_Education_Letter_Scale" data-section1="3-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                                                            <option value="Higher_Education_Grade_Point" data-section1="3-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Higher_Education_Percentage_Scale" data-section1="3-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Other" data-section1="3-Year Bachalors Degree">Other</option>

                                                            <option value="Higher_Education_Letter_Scale" data-section1="4-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                                                            <option value="Higher_Education_Grade_Point" data-section1="4-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Higher_Education_Percentage_Scale" data-section1="4-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Other" data-section1="4-Year Bachalors Degree">Other</option>

                                                            <option value="Higher_Education_Letter_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Letter Scale F - A+</option>
                                                            <option value="Higher_Education_Grade_Point" data-section1="Postgraduate Certificate/Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Higher_Education_Percentage_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Other" data-section1="Postgraduate Certificate/Diploma">Other</option>

                                                            <option value="Higher_Education_Letter_Scale" data-section1="Master Degree">Higher Education Letter Scale F - A+</option>
                                                            <option value="Higher_Education_Grade_Point" data-section1="Master Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Higher_Education_Percentage_Scale" data-section1="Master Degree">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Other" data-section1="Master Degree">Other</option>

                                                            <option value="Higher_Education_Letter_Scale" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Letter Scale F - A+</option>
                                                            <option value="Higher_Education_Grade_Point" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Higher_Education_Percentage_Scale" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Other" data-section1="Doctoral Degree (Phd, M.D . .)">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div id="Secondary_Education_Letter_Scale" class="colors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <select class="form-control" name="grade_avg_1">
                                                                <option selected disabled>-Select</option>
                                                                <option>A+</option>
                                                                <option>A</option>
                                                                <option>A-</option>
                                                                <option>B+</option>
                                                                <option>B</option>
                                                                <option>B-</option>
                                                                <option>C+</option>
                                                                <option>C</option>
                                                                <option>C-</option>
                                                                <option>D</option>
                                                                <option>F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Secondary_Education_Percentage_Scale" class="colors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="grade_avg_2" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Secondary_Education_Grade_Point" class="colors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="grade_avg_3" class="form-control"  autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Higher_Education_Letter_Scale" class="colors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <select class="form-control" name="grade_avg_4">
                                                                <option selected disabled>-Select</option>
                                                                <option>A+</option>
                                                                <option>A</option>
                                                                <option>A-</option>
                                                                <option>B+</option>
                                                                <option>B</option>
                                                                <option>B-</option>
                                                                <option>C+</option>
                                                                <option>C</option>
                                                                <option>C-</option>
                                                                <option>D</option>
                                                                <option>F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Higher_Education_Percentage_Scale" class="colors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="grade_avg_5" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Higher_Education_Grade_Point" class="colors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="grade_avg_6" class="form-control"  autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Other" class="colors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="grade_avg_7" class="form-control"  autocomplete="off">
                                                            <label style="color:black;font-weight:500;">Grade Scale (Out of)</label>
                                                            <select class="form-control" name="grade_scale">
                                                                <option selected disabled>-Select</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>7</option>
                                                                <option>10</option>
                                                                <option>20</option>
                                                                <option>100</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">I have graduated from this institution? <span>*</span></label>
                                                        <select class="form-control required" name="grade_institute" value="{{old('grade_institute')}}">
                                                            <option selected disabled>-Select</option>
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <span style="color:red;">***(For Grade Student,we need last two result)***</span>
                                            <h4 class="mt-2" style="font-weight:bold;">Education Summary -1 :</h4> <span style="color:red;">***(For Grade Student,we need last two result)***</span>
                                            <hr class="mt-5">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Country of Education <span>*</span></label>
                                                        <input type="text" name="previousOne_education_country" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Highest Level of Education <span>*</span></label>
                                                    </div>
                                                    <select class="previousOne form-control" id="previousOneselect1" name="previousOne_education_level" style="display: block;!important;">
                                                        <option disabled selected>Select</option>
                                                        <optgroup label="Primary">
                                                            <option value="Grade 1">Grade 1</option>
                                                            <option value="Grade 2">Grade 2</option>
                                                            <option value="Grade 3">Grade 3</option>
                                                            <option value="Grade 4">Grade 4</option>
                                                            <option value="Grade 5">Grade 5</option>
                                                            <option value="Grade 6">Grade 6</option>
                                                            <option value="Grade 7">Grade 7</option>
                                                            <option value="Grade 8">Grade 8</option>
                                                        </optgroup>
                                                        <optgroup label="Secondary">
                                                            <option value="Grade 9">Grade 9</option>
                                                            <option value="Grade 10">Grade 10</option>
                                                            <option value="Grade 11">Grade 11</option>
                                                            <option value="Grade 12">Grade 12/High School</option>
                                                        </optgroup>
                                                        <optgroup label="Undergraduate">
                                                            <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                            <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                            <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                            <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                            <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                        </optgroup>
                                                        <optgroup label="Postgraduate">
                                                            <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                            <option value="Master Degree">Master Degree</option>
                                                            <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Grading Scheme <span>*</span></label>
                                                        <select class="form-control previousOnecolorselector" name="previousOne_grading_scheme" id="previousOneselect2">
                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 100">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 100">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 100">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 100">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 2">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 2">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 2">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 2">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 3">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 3">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 3">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 3">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 4">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 4">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 4">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 4">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 5">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 5">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 5">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 5">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 6">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 6">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 6">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 6">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 7">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 7">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 7">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 7">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 8">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 8">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 8">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 8">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 9">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 9">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 9">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 9">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 10">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 10">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 10">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 10">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 11">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 11">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 11">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 11">Other</option>

                                                            <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 12">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 12">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 12">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_One_Other" data-section1="Grade 12">Other</option>

                                                            <option value="Previous_One_Higher_Education_Letter_Scale" data-section1="1-Year Post-Secondary Certificate">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Higher_Education_Grade_Point" data-section1="1-Year Post-Secondary Certificate">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_One_Higher_Education_Percentage_Scale" data-section1="1-Year Post-Secondary Certificate">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Other" data-section1="1-Year Post-Secondary Certificate">Other</option>

                                                            <option value="Previous_One_Higher_Education_Letter_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Higher_Education_Grade_Point" data-section1="2-Year Undergraduate Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_One_Higher_Education_Percentage_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Other" data-section1="2-Year Undergraduate Diploma">Other</option>

                                                            <option value="Previous_One_Higher_Education_Letter_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Higher_Education_Grade_Point" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_One_Higher_Education_Percentage_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Other" data-section1="3-Year Undergraduate Advanced Diploma">Other</option>

                                                            <option value="Previous_One_Higher_Education_Letter_Scale" data-section1="3-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Higher_Education_Grade_Point" data-section1="3-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_One_Higher_Education_Percentage_Scale" data-section1="3-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Other" data-section1="3-Year Bachalors Degree">Other</option>

                                                            <option value="Previous_One_Higher_Education_Letter_Scale" data-section1="4-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Higher_Education_Grade_Point" data-section1="4-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_One_Higher_Education_Percentage_Scale" data-section1="4-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Other" data-section1="4-Year Bachalors Degree">Other</option>

                                                            <option value="Previous_One_Higher_Education_Letter_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Higher_Education_Grade_Point" data-section1="Postgraduate Certificate/Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_One_Higher_Education_Percentage_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Other" data-section1="Postgraduate Certificate/Diploma">Other</option>

                                                            <option value="Previous_One_Higher_Education_Letter_Scale" data-section1="Master Degree">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Higher_Education_Grade_Point" data-section1="Master Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_One_Higher_Education_Percentage_Scale" data-section1="Master Degree">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Other" data-section1="Master Degree">Other</option>

                                                            <option value="Previous_One_Higher_Education_Letter_Scale" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_One_Higher_Education_Grade_Point" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_One_Higher_Education_Percentage_Scale" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_One_Other" data-section1="Doctoral Degree (Phd, M.D . .)">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div id="Previous_One_Secondary_Education_Letter_Scale" class="previousOnecolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <select class="form-control" name="previousOne_grade_avg_1">
                                                                <option selected disabled>-Select</option>
                                                                <option>A+</option>
                                                                <option>A</option>
                                                                <option>A-</option>
                                                                <option>B+</option>
                                                                <option>B</option>
                                                                <option>B-</option>
                                                                <option>C+</option>
                                                                <option>C</option>
                                                                <option>C-</option>
                                                                <option>D</option>
                                                                <option>F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Previous_One_Secondary_Education_Percentage_Scale" class="previousOnecolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousOne_grade_avg_2" class="form-control"  autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Previous_One_Secondary_Education_Grade_Point" class="previousOnecolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousOne_grade_avg_3" class="form-control"  autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Previous_One_Higher_Education_Letter_Scale" class="previousOnecolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <select class="form-control" name="previousOne_grade_avg_4">
                                                                <option selected disabled>-Select</option>
                                                                <option>A+</option>
                                                                <option>A</option>
                                                                <option>A-</option>
                                                                <option>B+</option>
                                                                <option>B</option>
                                                                <option>B-</option>
                                                                <option>C+</option>
                                                                <option>C</option>
                                                                <option>C-</option>
                                                                <option>D</option>
                                                                <option>F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Previous_One_Higher_Education_Percentage_Scale" class="previousOnecolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousOne_grade_avg_5" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Previous_One_Higher_Education_Grade_Point" class="previousOnecolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousOne_grade_avg_6" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Previous_One_Other" class="previousOnecolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousOne_grade_avg_7" class="form-control" autocomplete="off">
                                                            <label style="color:black;font-weight:500;">Grade Scale (Out of)</label>
                                                            <select class="form-control" name="previousOne_grade_scale">
                                                                <option selected disabled>-Select</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>7</option>
                                                                <option>10</option>
                                                                <option>20</option>
                                                                <option>100</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">I have graduated from this institution? <span>*</span></label>
                                                        <select class="form-control" name="previousOne_grade_institute">
                                                            <option disabled selected>-Select-</option>
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <h4 class="mt-2" style="font-weight:bold;">Education Summary -2 :</h4>
                                            <hr class="mt-5">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Country of Education <span>*</span></label>
                                                        <input type="text" name="previousTwo_education_country" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Highest Level of Education <span>*</span></label>
                                                    </div>
                                                    <select class="previousTwo form-control" id="previousTwoselect1" name="previousTwo_education_level" style="display: block;!important;">
                                                        <option disabled selected>Select</option>
                                                        <optgroup label="Primary">
                                                            <option value="Grade 1">Grade 1</option>
                                                            <option value="Grade 2">Grade 2</option>
                                                            <option value="Grade 3">Grade 3</option>
                                                            <option value="Grade 4">Grade 4</option>
                                                            <option value="Grade 5">Grade 5</option>
                                                            <option value="Grade 6">Grade 6</option>
                                                            <option value="Grade 7">Grade 7</option>
                                                            <option value="Grade 8">Grade 8</option>
                                                        </optgroup>
                                                        <optgroup label="Secondary">
                                                            <option value="Grade 9">Grade 9</option>
                                                            <option value="Grade 10">Grade 10</option>
                                                            <option value="Grade 11">Grade 11</option>
                                                            <option value="Grade 12">Grade 12/High School</option>
                                                        </optgroup>
                                                        <optgroup label="Undergraduate">
                                                            <option value="1-Year Post-Secondary Certificate">1-Year Post-Secondary Certificate</option>
                                                            <option value="2-Year Undergraduate Diploma">2-Year Undergraduate Diploma</option>
                                                            <option value="3-Year Undergraduate Advanced Diploma">3-Year Undergraduate Advanced Diploma</option>
                                                            <option value="3-Year Bachalors Degree">3-Year Bachalors Degree</option>
                                                            <option value="4-Year Bachalors Degree">4-Year Bachalors Degree</option>
                                                        </optgroup>
                                                        <optgroup label="Postgraduate">
                                                            <option value="Postgraduate Certificate/Diploma">Postgraduate Certificate/Diploma</option>
                                                            <option value="Master Degree">Master Degree</option>
                                                            <option value="Doctoral Degree (Phd, M.D . .)">Doctoral Degree (Phd, M.D . .)</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Grading Scheme <span>*</span></label>
                                                        <select class="form-control previousTwocolorselector" name="previousTwo_grading_scheme" id="previousTwoselect2">
                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 1">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 1">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 1">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 1">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 2">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 2">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 2">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 2">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 3">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 3">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 3">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 3">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 4">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 4">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 4">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 4">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 5">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 5">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 5">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 5">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 6">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 6">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 6">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 6">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 7">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 7">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 7">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 7">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 8">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 8">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 8">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 8">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 9">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 9">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 9">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 9">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 10">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 10">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 10">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 10">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 11">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 11">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 11">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 11">Other</option>

                                                            <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Grade 12">Secondary Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Secondary_Education_Percentage_Scale" data-section1="Grade 12">Secondary Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Secondary_Education_Grade_Point" data-section1="Grade 12">Secondary Education Grade Point 5.0 Scale</option>
                                                            <option value="Previous_Two_Other" data-section1="Grade 12">Other</option>

                                                            <option value="Previous_Two_Higher_Education_Letter_Scale" data-section1="1-Year Post-Secondary Certificate">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="1-Year Post-Secondary Certificate">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="1-Year Post-Secondary Certificate">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Other" data-section1="1-Year Post-Secondary Certificate">Other</option>

                                                            <option value="Previous_Two_Higher_Education_Letter_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="2-Year Undergraduate Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Other" data-section1="2-Year Undergraduate Diploma">Other</option>

                                                            <option value="Previous_Two_Higher_Education_Letter_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Other" data-section1="3-Year Undergraduate Advanced Diploma">Other</option>

                                                            <option value="Previous_Two_Higher_Education_Letter_Scale" data-section1="3-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="3-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_Twoe_Higher_Education_Percentage_Scale" data-section1="3-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Other" data-section1="3-Year Bachalors Degree">Other</option>

                                                            <option value="Previous_Two_Higher_Education_Letter_Scale" data-section1="4-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="4-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="4-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Other" data-section1="4-Year Bachalors Degree">Other</option>

                                                            <option value="Previous_Two_Higher_Education_Letter_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="Postgraduate Certificate/Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Other" data-section1="Postgraduate Certificate/Diploma">Other</option>

                                                            <option value="Previous_Two_Higher_Education_Letter_Scale" data-section1="Master Degree">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="Master Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="Master Degree">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Other" data-section1="Master Degree">Other</option>

                                                            <option value="Previous_Two_Higher_Education_Letter_Scale" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Letter Scale F - A+</option>
                                                            <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                                                            <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Percentage Scale 0-100</option>
                                                            <option value="Previous_Two_Other" data-section1="Doctoral Degree (Phd, M.D . .)">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div id="Previous_Two_Secondary_Education_Letter_Scale" class="previousTwocolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <select class="form-control" name="previousTwo_grade_avg_1">
                                                                <option selected disabled>-Select</option>
                                                                <option>A+</option>
                                                                <option>A</option>
                                                                <option>A-</option>
                                                                <option>B+</option>
                                                                <option>B</option>
                                                                <option>B-</option>
                                                                <option>C+</option>
                                                                <option>C</option>
                                                                <option>C-</option>
                                                                <option>D</option>
                                                                <option>F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Previous_Two_Secondary_Education_Percentage_Scale" class="previousTwocolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousTwo_grade_avg_2" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Previous_Two_Secondary_Education_Grade_Point" class="previousTwocolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousTwo_grade_avg_3" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Previous_Two_Higher_Education_Letter_Scale" class="previousTwocolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <select class="form-control" name="previousTwo_grade_avg_4">
                                                                <option selected disabled>-Select</option>
                                                                <option>A+</option>
                                                                <option>A</option>
                                                                <option>A-</option>
                                                                <option>B+</option>
                                                                <option>B</option>
                                                                <option>B-</option>
                                                                <option>C+</option>
                                                                <option>C</option>
                                                                <option>C-</option>
                                                                <option>D</option>
                                                                <option>F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="Previous_Two_Higher_Education_Percentage_Scale" class="previousTwocolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousTwo_grade_avg_5" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Previous_Two_Higher_Education_Grade_Point" class="previousTwocolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousTwo_grade_avg_6" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div id="Previous_Two_Other" class="previousTwocolors" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="color:black;font-weight:500;">Grade Average <span>*</span></label>
                                                            <input type="number" name="previousTwo_grade_avg_7" class="form-control" autocomplete="off">
                                                            <label style="color:black;font-weight:500;">Grade Scale (Out of)</label>
                                                            <select class="form-control" name="previousTwo_grade_scale">
                                                                <option selected disabled>-Select</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>7</option>
                                                                <option>10</option>
                                                                <option>20</option>
                                                                <option>100</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">I have graduated from this institution? <span>*</span></label>
                                                        <select class="form-control" name="previousTwo_grade_institute">
                                                            <option selected disabled>-Select</option>
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary btn-sm" id="add" style="border-radius:0px;"><i class="fa fa-plus" aria-hidden="true"></i> Add Attended</button>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="btn btn-danger" id="btn_two" style="cursor:pointer;border-radius:0px;"><p><i class="fa fa-close"></i> Remove</p></div>
                                                </div>
                                                <h4 class="mt-2" style="font-weight:bold;">Schools Attended :</h4>
                                                <div id="box" style="width:100%;">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Country of Institution: <span>*</span></label>
                                                                <input type="text" name="addmore[0][institution_country]" class="form-control required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Name of Institution: <span>*</span></label>
                                                                <input type="text" name="addmore[0][institution_name]" class="form-control required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Level of Education: <span>*</span></label>
                                                                <input type="text" name="addmore[0][education_level]" class="form-control required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Primary Language of Instructions: <span>*</span></label>
                                                                <input type="text" name="addmore[0][primary_language_instruction]" class="form-control required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Attended Institution From: <span>*</span></label>
                                                                <input type="date" name="addmore[0][institution_from]" class="form-control required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Attended Institution To: <span>*</span></label>
                                                                <input type="date" name="addmore[0][institution_to]" class="form-control required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Degree Name:</label>
                                                                <input type="text" name="addmore[0][institution_degree]" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Address: <span>*</span></label>
                                                                <input type="text" name="addmore[0][institution_address]" class="form-control required" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">City/Town: <span>*</span></label>
                                                                <input type="text" name="addmore[0][institution_city]" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Province</label>
                                                                <input type="text" name="addmore[0][institution_province]" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label style="color:black;font-weight:500;">Zip Code:</label>
                                                                <input type="text" name="addmore[0][institution_zip]" class="form-control" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="fileUploadsContainer"></div>
                                            <div class="form-wizard-buttons">
                                                <button type="button" class="btn btn-previous"><i class="icon icon-backward2"></i> Previous</button>
                                                <button type="button" class="btn btn-next"><i class="icon icon-forward"></i> Next</button>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <h4>Test Scores: <span>Step 3 - 5</span></h4>
                                            <hr class="mt-5">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">English Exam Type: <span>*</span></label>
                                                        <input type="text" name="eng_exam_type" class="form-control required" value="{{old('eng_exam_type')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Date of Exam: <span>*</span></label>
                                                        <input type="date" name="exam_date" class="form-control required" value="{{old('exam_date')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Listening: <span>*</span></label>
                                                        <input type="number" name="l_score" class="form-control required" value="{{old('l_score')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Reading: <span>*</span></label>
                                                        <input type="number" name="r_score" class="form-control required" value="{{old('r_score')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
                                                        <input type="number" name="w_score" class="form-control required" value="{{old('w_score')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Speaking: <span>*</span></label>
                                                        <input type="number" name="s_score" class="form-control required" value="{{old('s_score')}}" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <h4 style="font-weight:bold;">Additional Qualifications:</h4>
                                            <hr class="mt-5">
                                            <input type="checkbox" id="gre" class="required">
                                            <label> I have GRE exam scores</label><br>
                                            <input type="checkbox" id="gmat" class="required">
                                            <label> I have GMAT exam scores</label><br>

                                            <div class="row gre-hidden-menu" style="display: none;">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">GRE Exam Date: <span>*</span></label>
                                                        <input type="date" name="gre_exam_date" class="form-control" value="0" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Verbal: <span>*</span></label>
                                                        <input type="number" name="gre_verval_score" value="0" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Quantitative: <span>*</span></label>
                                                        <input type="number" name="gre_quantitative_score" value="0" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
                                                        <input type="number" name="gre_writing_score" value="0" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gmat-hidden-menu" style="display: none;">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">GMAT Exam Date: <span>*</span></label>
                                                        <input type="date" name="gmat_exam_date" class="form-control" value="0" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Verbal: <span>*</span></label>
                                                        <input type="number" name="gmat_verval_score" value="0" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Quantitative: <span>*</span></label>
                                                        <input type="number" name="gmat_quantitative_score" value="0" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Writing: <span>*</span></label>
                                                        <input type="number" name="gmat_writing_score" value="0" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Total: <span>*</span></label>
                                                        <input type="number" name="gmat_total_score" value="0" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-wizard-buttons">
                                                <button type="button" class="btn btn-previous"><i class="icon icon-backward2"></i> Previous</button>
                                                <button type="button" class="btn btn-next"><i class="icon icon-forward"></i> Next</button>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <h4>Background Information: <span>Step 4 - 5</span></h4>
                                            <hr class="mt-5">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Have you been refused a visa from Canada, the USA, the United Kingdom, New Zealand, Australia or Ireland? <span>*</span></label>
                                                        <select class="form-control required" name="visa_refused">
                                                            <option value="">-Select-</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Do you have a valid Study Permit / Visa?</label>
                                                        <select name="permit" class="custom-select">
                                                            <option value="">-Select Visa-</option>
                                                            <option value="USA F1 Visa">USA F1 Visa</option>
                                                            <option value="Canadian Study Permit or Visitor Visa">Canadian Study Permit or Visitor Visa</option>
                                                            <option value="UK Student Visa (Tier 4) or Short Term Study Visa">UK Student Visa (Tier 4) or Short Term Study Visa</option>
                                                            <option value="Australian Student Visa">Australian Student Visa</option>
                                                            <option value="I don't have this">I don't have this</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="width:100%;">
                                                        <label style="color:black;font-weight:500;">If you answered "Yes" to any of the questions above, please provide more details below:</label>
                                                        <textarea class="form-control" name="more_details" style="width:100%;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="form-wizard-buttons">
                                                <button type="button" class="btn btn-previous"><i class="icon icon-backward2"></i> Previous</button>
                                                <button type="button" class="btn btn-next"><i class="icon icon-forward"></i> Next</button>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <h4>Upload Documents: <span>Step 5 - 5</span></h4>
                                            <hr class="mt-5">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">Passport Required (Automated): <span>*</span></label><br>
                                                        <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                        <input type="file" name="passport_img[]" class="form-control required" autocomplete="off" multiple>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">SSC Certificate: <span>*</span></label><br>
                                                        <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                        <input type="file" name="ssc_certificate_img[]" class="form-control required" autocomplete="off" multiple>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">HSC Certificate: <span>*</span></label><br>
                                                        <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                        <input type="file" name="hsc_certificate_img[]" class="form-control required" autocomplete="off" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label style="color:black;font-weight:500;">University Certificate: <span>*</span></label><br>
                                                        <span style="color:red;">(***File Must be jpg, jpeg, png, pdf***)</span>
                                                        <input type="file" name="uni_certificate_img[]" class="form-control required" autocomplete="off" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="form-wizard-buttons">
                                                <button type="button" class="btn btn-previous"><i class="icon icon-backward2"></i> Previous</button>
                                                <button type="submit" id="saveBtn" class="btn btn-submit second"><i class="fa fa-check"></i> Submit</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
