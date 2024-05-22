<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
    <div class="sidebar-content">
        <div class="sidebar-section sidebar-user my-1">
            <div class="sidebar-section-body">
                <div class="media">
                    <a href="#" class="mr-3">
                        <img src="{{asset('backend/global_assets/images/demo/users/face11.jpg')}}" class="rounded-circle" alt="">
                    </a>
                    <div class="media-body">
                        <div class="font-weight-semibold">UserID: {{Auth::user()->user_name}}</div>
                        <div class="font-size-sm line-height-sm opacity-50">

                            @if(Auth::user()->role == "Assistant Counselor")
                                Admission Section
                            @else
                                {{Auth::user()->role}}
                            @endif
                        </div>
                    </div>
                    <div class="ml-3 align-self-center">
                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                            <i class="icon-transmission"></i>
                        </button>
                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                            <i class="icon-cross2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                @if(Auth::user()->role==='Admin' || Auth::user()->role==='Superadmin')
                    <li class="nav-item nav-item-submenu">
                    <li class="nav-item">
                        <a class="{{ (request()->is('home')) ? 'active' : '' }}     nav-link" href="{{url('home')}}" class="nav-link"><i class="icon-home4"></i><span>Home</span></a>
                    </li>
                    <li class="{{(request()->is('item'))||(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                        <a href="javascript:" class="{{(request()->is('item'))||(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-link"><i class="icon-list"></i> <span>Item Section</span></a>
                        <ul class="nav nav-group-sub navChild" data-submenu-title="Themes">
                            <li class="nav-item"><a class="{{ (request()->is('item')) ? 'active' : '' }} nav-link" href="{{url('item')}}" class="nav-link"><i class="fa fa-bars"></i><span>Item Add</span></a></li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Item Distribution</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('branch_distribution')}}" class="{{ (request()->is('branch_distribution')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch Distribution</a></li>
                                    <li class="nav-item"><a href="{{url('head_office_distribution')}}" class="{{ (request()->is('head_office_distribution')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office Distribution</a></li>
                                    <li class="nav-item"><a href="{{url('project_distribution')}}" class="{{ (request()->is('project_distribution')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project Distribution</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="{{ (request()->is('grn/index')) ? 'active' : '' }} nav-link" href="{{url('grn/index')}}" class="nav-link"><i class="fa fa-bars"></i><span>GRN</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->is('return/index')) ? 'active' : '' }} nav-link" href="{{url('return/index')}}" class="nav-link"><i class="fa fa-bars"></i><span>Item Return</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->is('servicing/index')) ? 'active' : '' }} nav-link" href="{{url('servicing/index')}}" class="nav-link"><i class="fa fa-bars"></i><span>Item Servicing</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->is('recycle/index')) ? 'active' : '' }} nav-link" href="{{url('recycle/index')}}" class="nav-link"><i class="fa fa-bars"></i><span>Item Recycle</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="javascript:" class="nav-link"><i class="icon-list"></i> <span>Form Section</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Themes">
                            <li class="nav-item"><a class="{{ (request()->is('other/asset_received')) ? 'active' : '' }} nav-link" href="{{url('other/asset_received')}}" class="nav-link"><i class="fa fa-bars"></i><span>Asset Received Form</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->is('other/toner_purchase')) ? 'active' : '' }} nav-link" href="{{url('other/toner_purchase')}}" class="nav-link"><i class="fa fa-bars"></i><span>Toner Purchase Request Form</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->is('other/visiting_working_info')) ? 'active' : '' }} nav-link" href="{{url('other/visiting_working_info')}}" class="nav-link"><i class="fa fa-bars"></i><span>Branch/Project Visiting/Working Form</span></a></li>
                            <li class="nav-item"><a class="{{ (request()->is('other/purchase_request')) ? 'active' : '' }} nav-link" href="{{url('other/purchase_request')}}" class="nav-link"><i class="fa fa-bars"></i><span>Purchase Request Form</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="javascript:" class="nav-link"><i class="icon-list"></i> <span>Report Section</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Themes">
                            <li class="nav-item"><a href="{{url('report/purchase')}}" class="{{ (request()->is('report/purchase')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Purchase Report</a></li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Distribution Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('distribution/history/branch')}}" class="{{ (request()->is('report/service/branch')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch</a></li>
                                    <li class="nav-item"><a href="{{url('distribution/history/head_office')}}" class="{{ (request()->is('report/service/head_office')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office</a></li>
                                    <li class="nav-item"><a href="{{url('distribution/history/project')}}" class="{{ (request()->is('report/service/project')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project</a></li>
                                </ul>
                            </li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Return Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('report/return/branch')}}" class="{{ (request()->is('report/service/branch')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch</a></li>
                                    <li class="nav-item"><a href="{{url('report/return/head_office')}}" class="{{ (request()->is('report/service/head_office')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office</a></li>
                                    <li class="nav-item"><a href="{{url('report/return/project')}}" class="{{ (request()->is('report/service/project')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project</a></li>
                                </ul>
                            </li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Service Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('report/service/branch')}}" class="{{ (request()->is('report/service/branch')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch Report</a></li>
                                    <li class="nav-item"><a href="{{url('report/service/head_office')}}" class="{{ (request()->is('report/service/head_office')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office Report</a></li>
                                    <li class="nav-item"><a href="{{url('report/service/project')}}" class="{{ (request()->is('report/service/project')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project Report</a></li>
                                </ul>
                            </li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Costing Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('report/branch_costing')}}" class="{{ (request()->is('report/branch_costing')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch Costing Report</a></li>
                                    <li class="nav-item"><a href="{{url('report/head_office_costing')}}" class="{{ (request()->is('report/head_office_costing')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office Costing Report</a></li>
                                    <li class="nav-item"><a href="{{url('report/project_costing')}}" class="{{ (request()->is('report/project_costing')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project Report</a></li>
                                </ul>
                            </li>
                            {{--                            <li class="nav-item"><a href="{{url('report/return')}}" class="{{ (request()->is('report/return')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Return Report</a></li>--}}
                            <li class="nav-item"><a href="{{url('report/recycle')}}" class="{{ (request()->is('report/recycle')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Recycle Report</a></li>
                            <li class="nav-item"><a href="{{url('report/item')}}" class="{{ (request()->is('report/item')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Item Report</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="{{ (request()->is('gatepass/index')) ? 'active' : '' }} nav-link" href="{{url('gatepass/index')}}" class="nav-link"><i class="fa fa-bars"></i><span>Gate Pass</span></a></li>
                    <li class="nav-item"><a class="{{ (request()->is('device_service/index')) ? 'active' : '' }} nav-link" href="{{url('device_service/index')}}" class="nav-link"><i class="fa fa-bars"></i><span>Device Service</span></a></li>
{{--                    <li class="nav-item"><a class="{{ (request()->is('other/working_plan')) ? 'active' : '' }} nav-link" href="{{url('other/working_plan')}}" class="nav-link"><i class="fa fa-bars"></i><span>Monthly Working Plan</span></a></li>--}}
                    <li class="nav-item">
                        <a class="{{ (request()->is('branch')) ? 'active' : '' }}   nav-link" href="{{url('branch')}}" class="nav-link"><i class="fa fa-bars"></i><span>Branch List</span></a>
                        <a class="{{ (request()->is('employee')) ? 'active' : '' }} nav-link" href="{{url('employee')}}" class="nav-link"><i class="fa fa-bars"></i><span>Employee List</span></a>
                        <a class="{{ (request()->is('project')) ? 'active' : '' }}   nav-link" href="{{url('project')}}" class="nav-link"><i class="fa fa-bars"></i><span>Project List</span></a>
                        <a class="{{ (request()->is('user/index')) ? 'active' : '' }}   nav-link" href="{{url('user/index')}}" class="nav-link"><i class="fa fa-bars"></i><span>User List</span></a>
                        <a class="{{ (request()->is('notice')) ? 'active' : '' }}     nav-link" href="{{url('notice')}}" class="nav-link"><i class="fa fa-bars"></i><span>Notice</span></a>
                    </li>
                @endif
                @if(Auth::user()->role==='General')
                    <li class="nav-item nav-item-submenu">
                        <li class="nav-item">
                            <a class="{{ (request()->is('home')) ? 'active' : '' }}     nav-link" href="{{url('home')}}" class="nav-link"><i class="icon-home4"></i><span>Home</span></a>
                        </li>
                        <a href="javascript:" class="nav-link"><i class="icon-list"></i> <span>Report Section</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Themes">
                            <li class="nav-item"><a href="{{url('report/purchase')}}" class="{{ (request()->is('report/purchase')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Purchase Report</a></li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Distribution Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('distribution/history/branch')}}" class="{{ (request()->is('report/service/branch')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch</a></li>
                                    <li class="nav-item"><a href="{{url('distribution/history/head_office')}}" class="{{ (request()->is('report/service/head_office')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office</a></li>
                                    <li class="nav-item"><a href="{{url('distribution/history/project')}}" class="{{ (request()->is('report/service/project')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project</a></li>
                                </ul>
                            </li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Return Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('report/return/branch')}}" class="{{ (request()->is('report/service/branch')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch</a></li>
                                    <li class="nav-item"><a href="{{url('report/return/head_office')}}" class="{{ (request()->is('report/service/head_office')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office</a></li>
                                    <li class="nav-item"><a href="{{url('report/return/project')}}" class="{{ (request()->is('report/service/project')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project</a></li>
                                </ul>
                            </li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Service Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('report/service/branch')}}" class="{{ (request()->is('report/service/branch')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch Report</a></li>
                                    <li class="nav-item"><a href="{{url('report/service/head_office')}}" class="{{ (request()->is('report/service/head_office')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office Report</a></li>
                                    <li class="nav-item"><a href="{{url('report/service/project')}}" class="{{ (request()->is('report/service/project')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project Report</a></li>
                                </ul>
                            </li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Costing Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('report/branch_costing')}}" class="{{ (request()->is('report/branch_costing')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch Costing Report</a></li>
                                    <li class="nav-item"><a href="{{url('report/head_office_costing')}}" class="{{ (request()->is('report/head_office_costing')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office Costing Report</a></li>
                                    <li class="nav-item"><a href="{{url('report/project_costing')}}" class="{{ (request()->is('report/project_costing')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project Report</a></li>
                                </ul>
                            </li>
                            {{--<li class="nav-item"><a href="{{url('report/return')}}" class="{{ (request()->is('report/return')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Return Report</a></li>--}}
                            <li class="nav-item"><a href="{{url('report/recycle')}}" class="{{ (request()->is('report/recycle')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Recycle Report</a></li>
                            <li class="nav-item"><a href="{{url('report/item')}}" class="{{ (request()->is('report/item')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Item Report</a></li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->role==='IT officer')
                        <li class="nav-item">
                            <a class="{{ (request()->is('home')) ? 'active' : '' }}     nav-link" href="{{url('home')}}" class="nav-link"><i class="icon-home4"></i><span>Home</span></a>
                        </li>
                    <li class="nav-item"><a class="{{ (request()->is('other/password_change')) ? 'active' : '' }} nav-link" href="{{url('other/password_change')}}" class="nav-link"><i class="fa fa-bars"></i><span>Password Change</span></a></li>
                    <li class="nav-item"><a class="{{ (request()->is('other/asset_received')) ? 'active' : '' }} nav-link" href="{{url('other/asset_received')}}" class="nav-link"><i class="fa fa-bars"></i><span>Asset Received Form</span></a></li>
                    <li class="nav-item"><a class="{{ (request()->is('other/toner_purchase')) ? 'active' : '' }} nav-link" href="{{url('other/toner_purchase')}}" class="nav-link"><i class="fa fa-bars"></i><span>Toner Purchase Request Form</span></a></li>
                    <li class="nav-item"><a class="{{ (request()->is('other/visiting_working_info')) ? 'active' : '' }} nav-link" href="{{url('other/visiting_working_info')}}" class="nav-link"><i class="fa fa-bars"></i><span>Branch/Project Visiting/Working Form</span></a></li>
                    <li class="nav-item"><a class="{{ (request()->is('other/purchase_request')) ? 'active' : '' }} nav-link" href="{{url('other/purchase_request')}}" class="nav-link"><i class="fa fa-bars"></i><span>Purchase Request Form</span></a></li>
                    <li class="nav-item"><a class="{{ (request()->is('gatepass/index')) ? 'active' : '' }} nav-link" href="{{url('gatepass/index')}}" class="nav-link"><i class="fa fa-bars"></i><span>Gate Pass</span></a></li>
                    <li class="nav-item nav-item-submenu">
                        <a href="javascript:" class="nav-link"><i class="icon-list"></i> <span>Report Section</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Themes">
                            <li class="nav-item"><a href="{{url('report/purchase')}}" class="{{ (request()->is('report/purchase')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Purchase Report</a></li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Distribution Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('distribution/history/branch')}}" class="{{ (request()->is('report/service/branch')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch</a></li>
{{--                                    <li class="nav-item"><a href="{{url('distribution/history/head_office')}}" class="{{ (request()->is('report/service/head_office')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office</a></li>--}}
                                    <li class="nav-item"><a href="{{url('distribution/history/project')}}" class="{{ (request()->is('report/service/project')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project</a></li>
                                </ul>
                            </li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Return Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('report/return/branch')}}" class="{{ (request()->is('report/service/branch')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch</a></li>
{{--                                    <li class="nav-item"><a href="{{url('report/return/head_office')}}" class="{{ (request()->is('report/service/head_office')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office</a></li>--}}
                                    <li class="nav-item"><a href="{{url('report/return/project')}}" class="{{ (request()->is('report/service/project')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project</a></li>
                                </ul>
                            </li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Service Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('report/service/branch')}}" class="{{ (request()->is('report/service/branch')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch Report</a></li>
{{--                                    <li class="nav-item"><a href="{{url('report/service/head_office')}}" class="{{ (request()->is('report/service/head_office')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office Report</a></li>--}}
                                    <li class="nav-item"><a href="{{url('report/service/project')}}" class="{{ (request()->is('report/service/project')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project Report</a></li>
                                </ul>
                            </li>
                            <li class="{{(request()->is('head_office_distribution'))||(request()->is('branch_distribution')) ? 'active' : ''}} nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="fa fa-bars"></i> Costing Report</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="{{url('report/branch_costing')}}" class="{{ (request()->is('report/branch_costing')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Branch Costing Report</a></li>
{{--                                    <li class="nav-item"><a href="{{url('report/head_office_costing')}}" class="{{ (request()->is('report/head_office_costing')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Head office Costing Report</a></li>--}}
                                    <li class="nav-item"><a href="{{url('report/project_costing')}}" class="{{ (request()->is('report/project_costing')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Project Report</a></li>
                                </ul>
                            </li>
                            {{--<li class="nav-item"><a href="{{url('report/return')}}" class="{{ (request()->is('report/return')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Return Report</a></li>--}}
                            <li class="nav-item"><a href="{{url('report/recycle')}}" class="{{ (request()->is('report/recycle')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Recycle Report</a></li>
                            <li class="nav-item"><a href="{{url('report/item')}}" class="{{ (request()->is('report/item')) ? 'active' : '' }} nav-link"><i class="icon-checkbox-checked"></i> Item Report</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<script>
    $(function () {
        $(".navParent").hover(function () {
            $('.navChild').stop().slideToggle('slow');
        });
        $(".navChild").hover(function () {
            $(this).css('display', 'block');
        });
    });
</script>
