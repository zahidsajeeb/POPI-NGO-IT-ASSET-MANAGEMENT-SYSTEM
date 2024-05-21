<h4>Background Information: <span>Step 4 - 5</span></h4>
<hr class="mt-5">
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Have you been refused a visa from Canada, the USA, the United Kingdom, New Zealand, Australia or Ireland?</label>
            <select class="form-control required" value="{{$profile_data->visa_refused}}" name="visa_refused">
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
            <select name="permit" value="{{$profile_data->permit}}" class="custom-select required">
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
            <textarea class="form-control required" name="more_details" style="width:100%;">{{$profile_data->more_details}}</textarea>
        </div>
    </div>
</div>
<br/>
<div class="form-wizard-buttons">
    <button type="button" class="btn btn-previous" style="border-radius:0px;"><i class="icon icon-backward2"></i> Previous</button>
    <button type="button" class="btn btn-next" style="border-radius:0px;"><i class="icon icon-forward"></i> Next</button>
</div>
