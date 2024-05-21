<h4 class="mt-2" style="font-weight:bold;">Education Summary :<span>Step 2 - 5</span></h4>
<hr class="mt-5">
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <td>Country of Education:</td>
                <td>{{$profile_data->education_country}}</td>
            </tr>
            <tr>
                <td>Highest Level of Education:</td>
                <td>{{$profile_data->education_level}}</td>
            </tr>
            <tr>
                <td>Grading Scheme:</td>
                <td>
                    @if($profile_data->grading_scheme=="Secondary_Education_Letter_Scale")
                       Secondary Education Letter Scale F - A+
                    @endif
                    @if($profile_data->grading_scheme=="Secondary_Education_Percentage_Scale")
                        Secondary Education Percentage Scale 0-100
                    @endif
                    @if($profile_data->grading_scheme=="Secondary_Education_Grade_Point")
                        Secondary Education Grade Point 5.0 Scale
                    @endif
                    @if($profile_data->grading_scheme=="Higher_Education_Letter_Scale")
                        Higher Education Letter Scale F - A+
                    @endif
                    @if($profile_data->grading_scheme=="Higher_Education_Grade_Point")
                        Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)
                    @endif
                    @if($profile_data->grading_scheme=="Higher_Education_Percentage_Scale")
                        Higher Education Percentage Scale 0-100
                    @endif
                    @if($profile_data->grading_scheme=="Other")
                        Other
                    @endif
                </td>
            </tr>
            <tr>
                <td>Grade Average:</td>
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
            </tr>
            <tr>
                <td>Grade Scale (Out of):</td>
                <td>{{$profile_data->grade_scale}}"</td>
            </tr>
            <tr>
                <td>I have graduated from this institution?</td>
                <td>{{$profile_data->grade_institute}}</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3 style="text-align:center;"><span style="color:red;">If Edit Please Fill Up This. . .</span></h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Country of Education</label>
            <input type="text" name="education_country" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Highest Level of Education</label>
        </div>
        <select class="js-example-basic-single form-control" id="select1" name="education_level" style="display: block;!important;">
            <option disabled selected>-Select-</option>
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
            <label style="color:black;font-weight:500;">Grading Scheme</label>
            <select class="form-control colorselector" name="grading_scheme" id="select2">
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
                <label style="color:black;font-weight:500;">Grade Average</label>
                <select class="form-control" name="grade_avg_1">
                    <option disabled selected>-Select-</option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B">B</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
            </div>
        </div>
        <div id="Secondary_Education_Percentage_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_2" class="form-control" autocomplete="off">
            </div>
        </div>
        <div id="Secondary_Education_Grade_Point" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_3" class="form-control" autocomplete="off">
            </div>
        </div>
        <div id="Higher_Education_Letter_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <select class="form-control" name="grade_avg_4">
                    <option selected disabled>-Select-</option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
            </div>
        </div>
        <div id="Higher_Education_Percentage_Scale" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_5" class="form-control" autocomplete="off">
            </div>
        </div>
        <div id="Higher_Education_Grade_Point" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_6" class="form-control" autocomplete="off">
            </div>
        </div>
        <div id="Other" class="colors" style="display: none;">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Grade Average</label>
                <input type="number" name="grade_avg_7" class="form-control" autocomplete="off">
                <label style="color:black;font-weight:500;">Grade Scale (Out of)</label>
                <select class="form-control" name="grade_scale">
                    <option disabled selected>-Select-</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">I have graduated from this institution?</label>
            <select class="form-control" name="grade_institute">
                <option disabled selected>-Select-</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
</div>
@if($profile_data->previousOne_education_level==true)
    <h4 class="mt-2" style="font-weight:bold;">Education Summary -1 :</h4>
    <hr class="mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <td>Country of Education:</td>
                    <td>{{$profile_data->previousOne_education_country}}</td>
                </tr>
                <tr>
                    <td>Highest Level of Education:</td>
                    <td>{{$profile_data->previousOne_education_level}}</td>
                </tr>
                <tr>
                    <td>Grading Scheme:</td>
                    <td>
                        @if($profile_data->previousOne_grading_scheme=="Previous_One_Secondary_Education_Letter_Scale")
                            Secondary Education Letter Scale F - A+
                        @endif
                        @if($profile_data->previousOne_grading_scheme=="Previous_One_Secondary_Education_Percentage_Scale")
                            Secondary Education Percentage Scale 0-100
                        @endif
                        @if($profile_data->previousOne_grading_scheme=="Previous_One_Secondary_Education_Grade_Point")
                            Secondary Education Grade Point 5.0 Scale
                        @endif
                        @if($profile_data->previousOne_grading_scheme=="Previous_One_Higher_Education_Letter_Scale")
                            Higher Education Letter Scale F - A+
                        @endif
                        @if($profile_data->previousOne_grading_scheme=="Previous_One_Higher_Education_Grade_Point")
                            Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)
                        @endif
                        @if($profile_data->previousOne_grading_scheme=="Previous_One_Higher_Education_Percentage_Scale")
                            Higher Education Percentage Scale 0-100
                        @endif
                        @if($profile_data->previousOne_grading_scheme=="Previous_One_Other")
                            Other
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Grade Average:</td>
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
                </tr>
                <tr>
                    <td>Grade Scale (Out of):</td>
                    <td>{{$profile_data->previousOne_grade_scale}}</td>
                </tr>
                <tr>
                    <td>I have graduated from this institution?</td>
                    <td>{{$profile_data->previousOne_grade_institute}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align:center;"><span style="color:red;">If Edit Please Fill Up This. . .</span></h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Country of Education</label>
                <input type="text" name="previousOne_education_country" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Highest Level of Education</label>
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
                <label style="color:black;font-weight:500;">Grading Scheme</label>
                <select class="form-control previousOnecolorselector" name="previousOne_grading_scheme" id="previousOneselect2">
                    <option value="Previous_One_Secondary_Education_Letter_Scale" data-section1="Grade 1">Secondary Education Letter Scale F - A+</option>
                    <option value="Previous_One_Secondary_Education_Percentage_Scale" data-section1="Grade 1">Secondary Education Percentage Scale 0-100</option>
                    <option value="Previous_One_Secondary_Education_Grade_Point" data-section1="Grade 1">Secondary Education Grade Point 5.0 Scale</option>
                    <option value="Previous_One_Other" data-section1="Grade 1">Other</option>

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
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <select class="form-control" name="previousOne_grade_avg_1">
                        <option disabled selected>-Select-</option>
                        <option value="A+">A+</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                </div>
            </div>
            <div id="Previous_One_Secondary_Education_Percentage_Scale" class="previousOnecolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <input type="number" name="previousOne_grade_avg_2" class="form-control" autocomplete="off">
                </div>
            </div>
            <div id="Previous_One_Secondary_Education_Grade_Point" class="previousOnecolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <input type="number" name="previousOne_grade_avg_3" class="form-control" autocomplete="off">
                </div>
            </div>
            <div id="Previous_One_Higher_Education_Letter_Scale" class="previousOnecolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <select class="form-control" name="previousOne_grade_avg_4">
                        <option disabled selected>-Select-</option>
                        <option value="A+">A+</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                </div>
            </div>
            <div id="Previous_One_Higher_Education_Percentage_Scale" class="previousOnecolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <input type="number" name="previousOne_grade_avg_5" class="form-control" autocomplete="off">
                </div>
            </div>
            <div id="Previous_One_Higher_Education_Grade_Point" class="previousOnecolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <input type="number" name="previousOne_grade_avg_6" class="form-control" autocomplete="off">
                </div>
            </div>
            <div id="Previous_One_Other" class="previousOnecolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <input type="number" name="previousOne_grade_avg_7" class="form-control" autocomplete="off">
                    <label style="color:black;font-weight:500;">Grade Scale (Out of)</label>
                    <select class="form-control" name="previousOne_grade_scale">
                        <option selected disabled>-Select</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label style="color:black;font-weight:500;">I have graduated from this institution?</label>
                <select class="form-control" name="previousOne_grade_institute">
                    <option disabled selected>-Select-</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>
        </div>
    </div>
@endif
@if($profile_data->previousTwo_education_level==true)
    <h4 class="mt-2" style="font-weight:bold;">Education Summary -2 :</h4>
    <hr class="mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <td>Country of Education:</td>
                    <td>{{$profile_data->previousTwo_education_country}}</td>
                </tr>
                <tr>
                    <td>Highest Level of Education:</td>
                    <td>{{$profile_data->previousTwo_education_level}}</td>
                </tr>
                <tr>
                    <td>Grading Scheme:</td>
                    <td>
                        @if($profile_data->previousTwo_grading_scheme=="Previous_Two_Secondary_Education_Letter_Scale")
                            Secondary Education Letter Scale F - A+
                        @endif
                        @if($profile_data->previousTwo_grading_scheme=="Previous_Two_Secondary_Education_Percentage_Scale")
                            Secondary Education Percentage Scale 0-100
                        @endif
                        @if($profile_data->previousTwo_grading_scheme=="Previous_Two_Secondary_Education_Grade_Point")
                            Secondary Education Grade Point 5.0 Scale
                        @endif
                        @if($profile_data->previousTwo_grading_scheme=="Previous_Two_Higher_Education_Letter_Scale")
                            Higher Education Letter Scale F - A+
                        @endif
                        @if($profile_data->previousTwo_grading_scheme=="Previous_Two_Higher_Education_Grade_Point")
                            Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)
                        @endif
                        @if($profile_data->previousTwo_grading_scheme=="Previous_Two_Higher_Education_Percentage_Scale")
                            Higher Education Percentage Scale 0-100
                        @endif
                        @if($profile_data->previousTwo_grading_scheme=="Previous_Two_Other")
                            Other
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Grade Average:</td>
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
                </tr>
                <tr>
                    <td>Grade Scale (Out of):</td>
                    <td>{{$profile_data->previousTwo_grade_scale}}</td>
                </tr>
                <tr>
                    <td>I have graduated from this institution?</td>
                    <td>{{$profile_data->previousTwo_grade_institute}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Country of Education</label>
                <input type="text" name="previousTwo_education_country" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label style="color:black;font-weight:500;">Highest Level of Education</label>
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
                <label style="color:black;font-weight:500;">Grading Scheme </label>
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

                    <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Letter Scale F - A+</option>
                    <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="2-Year Undergraduate Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                    <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="2-Year Undergraduate Diploma">Higher Education Percentage Scale 0-100</option>
                    <option value="Previous_Two_Other" data-section1="2-Year Undergraduate Diploma">Other</option>

                    <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Letter Scale F - A+</option>
                    <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                    <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="3-Year Undergraduate Advanced Diploma">Higher Education Percentage Scale 0-100</option>
                    <option value="Previous_Two_Other" data-section1="3-Year Undergraduate Advanced Diploma">Other</option>

                    <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="3-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                    <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="3-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                    <option value="Previous_Twoe_Higher_Education_Percentage_Scale" data-section1="3-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                    <option value="Previous_Two_Other" data-section1="3-Year Bachalors Degree">Other</option>

                    <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="4-Year Bachalors Degree">Higher Education Letter Scale F - A+</option>
                    <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="4-Year Bachalors Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                    <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="4-Year Bachalors Degree">Higher Education Percentage Scale 0-100</option>
                    <option value="Previous_Two_Other" data-section1="4-Year Bachalors Degree">Other</option>

                    <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Letter Scale F - A+</option>
                    <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="Postgraduate Certificate/Diploma">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                    <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="Postgraduate Certificate/Diploma">Higher Education Percentage Scale 0-100</option>
                    <option value="Previous_Two_Other" data-section1="Postgraduate Certificate/Diploma">Other</option>

                    <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Master Degree">Higher Education Letter Scale F - A+</option>
                    <option value="Previous_Two_Higher_Education_Grade_Point" data-section1="Master Degree">Higher Education Grade Point 4.0 Scale (2.0 as Passing Grade)</option>
                    <option value="Previous_Two_Higher_Education_Percentage_Scale" data-section1="Master Degree">Higher Education Percentage Scale 0-100</option>
                    <option value="Previous_Two_Other" data-section1="Master Degree">Other</option>

                    <option value="Previous_Two_Secondary_Education_Letter_Scale" data-section1="Doctoral Degree (Phd, M.D . .)">Higher Education Letter Scale F - A+</option>
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
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <select class="form-control" name="previousTwo_grade_avg_1">
                        <option disabled selected>-Select-</option>
                        <option value="A+">A+</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                </div>
            </div>
            <div id="Previous_Two_Secondary_Education_Percentage_Scale" class="previousTwocolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <input type="number" name="previousTwo_grade_avg_2" class="form-control" autocomplete="off">
                </div>
            </div>
            <div id="Previous_Two_Secondary_Education_Grade_Point" class="previousTwocolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <input type="number" name="previousTwo_grade_avg_3" class="form-control" autocomplete="off">
                </div>
            </div>
            <div id="Previous_Two_Higher_Education_Letter_Scale" class="previousTwocolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <select class="form-control" name="previousTwo_grade_avg_4">
                        <option selected disabled>-Select</option>
                        <option value="A+">A+</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                </div>
            </div>
            <div id="Previous_Two_Higher_Education_Percentage_Scale" class="previousTwocolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average</label>
                    <input type="number" name="previousTwo_grade_avg_5" class="form-control" autocomplete="off">
                </div>
            </div>
            <div id="Previous_Two_Higher_Education_Grade_Point" class="previousTwocolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average </label>
                    <input type="number" name="previousTwo_grade_avg_6" class="form-control" autocomplete="off">
                </div>
            </div>
            <div id="Previous_Two_Other" class="previousTwocolors" style="display: none;">
                <div class="form-group">
                    <label style="color:black;font-weight:500;">Grade Average </label>
                    <input type="number" name="previousTwo_grade_avg_7" class="form-control" autocomplete="off">
                    <label style="color:black;font-weight:500;">Grade Scale (Out of)</label>
                    <select class="form-control" name="previousTwo_grade_scale">
                        <option selected disabled>-Select</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label style="color:black;font-weight:500;">I have graduated from this institution?</label>
                <select class="form-control" name="previousTwo_grade_institute">
                    <option disabled selected>-Select-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary btn-sm" id="add" style="border-radius:0px;"><i class="icon icon-plus2"></i> Add School</button>
        <div class="btn btn-danger" id="btn_two" style="cursor:pointer; border-radius:0px;"><p><i class="fa fa-close"></i> Remove</p></div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="box" style="width:100%;">
            @foreach($education_data as $key=>$row)
                <h4 style="font-weight:bold;">Schools Attended {{++$key}} :</h4>
                <hr style="margin-top:30px;">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Country of Institution:</label>
                            <input type="text" name="addmore[0][institution_country]" value="{{$row->institution_country}}" class="form-control required" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Name of Institution</label>
                            <input type="text" name="addmore[0][institution_name]" value="{{$row->institution_name}}" class="form-control required" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Level of Education</label>
                            <input type="text" name="addmore[0][education_level]" value="{{$row->education_level}}" class="form-control required" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Primary Language of Instructions:</label>
                            <input type="text" name="addmore[0][primary_language_instruction]" value="{{$row->primary_language_instruction}}" class="form-control required" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Attended Institution From:</label>
                            <input type="text" name="addmore[0][institution_from]" value="{{$row->institution_from}}" class="form-control date required" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Attended Institution To</label>
                            <input type="text" name="addmore[0][institution_to]" value="{{$row->institution_to}}" class="form-control date required" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Degree Name:</label>
                            <input type="text" name="addmore[0][degree_name]" value="{{$row->institution_degree}}" class="form-control required" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Address:</label>
                            <input type="text" name="addmore[0][institution_address]" value="{{$row->institution_address}}" class="form-control required" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">City/Town:</label>
                            <input type="text" name="addmore[0][institution_city]" value="{{$row->institution_city}}" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Province</label>
                            <input type="text" name="addmore[0][institution_province]" value="{{$row->institution_province}}" class="form-control required" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label style="color:black;font-weight:500;">Zip Code:</label>
                            <input type="text" name="addmore[0][institution_zip]" value="{{$row->institution_zip}}" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div id="fileUploadsContainer"></div>
<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="button" class="btn btn-next" style="border-radius:0px;"><i class="icon icon-forward"></i> Next</button>
</div>
