<div class="row">
    <div class="col-md-12">
        <h4 class="mt-2" style="font-weight:bold;">Personal Information:<span>Step 1 - 5</span></h4>
        <hr class="mt-5">
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">First Name</label>
            <input type="text" name="f_name" value="{{$profile_data->f_name}}" class="form-control required" autocomplete="off">
            <input type="hidden" name="student_id" value="{{$profile_data->student_id}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Middle Name</label>
            <input type="text" name="m_name" value="{{$profile_data->m_name}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Last Name</label>
            <input type="text" name="l_name" value="{{$profile_data->l_name}}" class="form-control required" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Date of Birth</label>
            <input type="text" name="dob" value="{{$profile_data->dob}}" class="form-control date required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">First Language</label>
            <input type="text" name="first_language" value="{{$profile_data->first_language}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Citizenship</label>
            <input type="text" name="citizenship" value="{{$profile_data->citizenship}}" class="form-control required" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Passport No</label>
            <input type="text" name="passport_no" value="{{$profile_data->passport_no}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Passport Exp Date</label>
            <input type="text" name="passport_exp" value="{{$profile_data->passport_exp}}" class="form-control date required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Marital Status</label>
            <select class="form-control required" name="marital_status" value="{{$profile_data->marital_status}}">
                <option value="Married">Married</option>
                <option value="Unmarried">Unmarried</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Gender</label>
            <select class="form-control required" name="gender" value="{{$profile_data->gender}}">
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
            <label style="color:black;font-weight:500;">Address</label>
            <textarea class="form-control required" name="address">{{$profile_data->address}}</textarea>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">City/Town</label>
            <input type="text" name="city" value="{{$profile_data->city}}" class="form-control required" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Country</label>
            <input type="text" name="country" value="{{$profile_data->country}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Province/State</label>
            <input type="text" name="state" value="{{$profile_data->state}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Postal/Zip Code</label>
            <input type="text" name="zip_code" value="{{$profile_data->zip_code}}" class="form-control required" autocomplete="off">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Email</label>
            <input type="text" name="email" value="{{$profile_data->email}}" class="form-control required" autocomplete="off">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label style="color:black;font-weight:500;">Phone Number</label>
            <input type="number" name="phone_no" value="{{$profile_data->phone_no}}" class="form-control required" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-wizard-buttons">
    <button type="button" class="btn btn-next" style="border-radius:0px;"><i class="icon icon-forward"></i> Next</button>
</div>
