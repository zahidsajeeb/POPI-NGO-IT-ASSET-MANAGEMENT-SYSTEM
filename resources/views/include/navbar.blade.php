<nav class="navbar navbar-default navbar-mobile navbar-fixed white no-background bootsnav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i> </button>
            <a class="navbar-brand" href="index-2.html"> <img src="{{asset('frontend/assets/img/logo-light.png')}}" class="logo logo-display" alt=""> <img src="{{asset('frontend/assets/img/logo.png')}}" class="logo logo-scrolled" alt=""> </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                <li class="dropdown active"> <a href="index-2.html">Home</a> </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Employer</a>
                    <ul class="dropdown-menu animated fadeOutUp">
                        <li><a href="employer.html">Employer</a></li>
                        <li><a href="employer-detail.html">Employer Detail</a></li>
                        <li><a href="create-company.html">Create Company</a></li>
                        <li><a href="manage-resume.html">Manage Resume</a></li>
                        <li><a href="add-job.html">Add Job</a></li>
                        <li><a href="resume-detail.html">Resume Detail</a></li>
                    </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Candidate</a>
                    <ul class="dropdown-menu animated fadeOutUp">
                        <li><a href="candidate.html">Candidate</a></li>
                        <li><a href="browse-job.html">Browse Jobs</a></li>
                        <li><a href="manage-job.html">Manage Jobs</a></li>
                        <li><a href="browse-category.html">Browse Categories</a></li>
                    </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                    <ul class="dropdown-menu animated fadeOutUp">
                        <li><a href="profile-settings.html">Profile Settings</a></li>
                        <li><a href="job-detail.html">Job Detail</a></li>
                        <li><a href="job-layout-one.html">Job Layout One</a></li>
                        <li><a href="404.html">404</a></li>
                    </ul>
                </li>
                <li class="dropdown"> <a href="contact.html">Contact</a> </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="br-right"><a class="btn-signup red-btn" href="javascript:void(0)" data-toggle="modal" data-target="#signin"><i class="login-icon ti-user"></i>Login</a></li>
                <li class="sign-up"><a class="btn-signup red-btn" href="signup.html"><span class="ti-briefcase"></span>Register</a></li>
            </ul>
        </div>
    </div>
</nav>
