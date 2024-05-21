<h4>Test Scores: <span>Step 3 - 5</span></h4>
<hr class="mt-5">
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label style="color:black;font-weight:500;">English Exam Type:</label>
            <input type="text" name="eng_exam_type" value="{{$profile_data->eng_exam_type}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Date of Exam:</label>
            <input type="text" name="exam_date" value="{{$profile_data->exam_date}}" class="form-control date required" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Listening:</label>
            <input type="number" name="l_score" value="{{$profile_data->l_score}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Reading:</label>
            <input type="number" name="r_score" value="{{$profile_data->r_score}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Writing:</label>
            <input type="number" name="w_score" value="{{$profile_data->w_score}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Speaking:</label>
            <input type="number" name="s_score" value="{{$profile_data->s_score}}" class="form-control required" autocomplete="off">
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
            <label style="color:black;font-weight:500;">GRE Exam Date:</label>
            <input type="text" name="gre_exam_date" value="{{$profile_data->gre_exam_date}}" class="form-control date" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Verbal</label>
            <input type="number" name="gre_verval_score" value="{{$profile_data->gre_verval_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Quantitative</label>
            <input type="number" name="gre_quantitative_score" value="{{$profile_data->gre_quantitative_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Writing</label>
            <input type="number" name="gre_writing_score" value="{{$profile_data->gre_writing_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
</div>
<div class="row gmat-hidden-menu" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">GMAT Exam Date:</label>
            <input type="text" name="gmat_exam_date" value="{{$profile_data->gmat_exam_date}}" class="form-control date" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Verbal</label>
            <input type="number" name="gmat_verval_score" value="{{$profile_data->gmat_verval_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Quantitative</label>
            <input type="number" name="gmat_quantitative_score" value="{{$profile_data->gmat_quantitative_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Writing</label>
            <input type="number" name="gmat_writing_score" value="{{$profile_data->gmat_writing_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Total</label>
            <input type="number" name="gmat_total_score" value="{{$profile_data->gmat_total_score}}" class="form-control" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="button" class="btn btn-next" style="border-radius:0px;"><i class="icon icon-forward"></i> Next</button>
</div>
