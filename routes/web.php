<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('signin');
    });
    Route::get('/admin', function () {
        return view('admin/login');
    });
    Route::get('/signin', function () {
        return view('signin');
    });

    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

//====================================={{+(Employee Department Section Start)+}}========================================
    Route::get('employee_department', 'employeeController@employee_department')->name('employee_department');
    Route::get('employee_department_list', 'employeeController@employee_department_list')->name('employee_department_list');
    Route::post('employee_department_store', 'employeeController@employee_department_store')->name('employee_department_store');
    Route::get('employee_department_edit/{id}', 'employeeController@employee_department_edit')->name('employee_department_edit');
    Route::post('employee_department_update', 'employeeController@employee_department_update')->name('employee_department_update');
    Route::get('employee_department_delete/{id}', 'employeeController@employee_department_delete')->name('employee_department_delete');
    Route::get('employee_inactive/{id}', 'employeeController@employee_inactive')->name('employee_inactive');
    Route::get('employee_active/{id}', 'employeeController@employee_active')->name('employee_active');
    Route::get('emp_show/{id}', 'employeeController@emp_show')->name('emp_show');

//====================================={{+(Employee Designation Section Start)+}}========================================
    Route::get('employee_designation', 'employeeController@employee_designation')->name('employee_designation');
    Route::get('employee_designation_list', 'employeeController@employee_designation_list')->name('employee_designation_list');
    Route::post('employee_designation_store', 'employeeController@employee_designation_store')->name('employee_designation_store');
    Route::get('employee_designation_edit/{id}', 'employeeController@employee_designation_edit')->name('employee_designation_edit');
    Route::post('employee_designation_update', 'employeeController@employee_designation_update')->name('employee_designation_update');
    Route::get('employee_designation_delete/{id}', 'employeeController@employee_designation_delete')->name('employee_designation_delete');

//====================================={{+(Branch Section Start)+}}========================================
    Route::get('branch', 'branchController@branch')->name('branch');
    Route::get('branch_list', 'branchController@branch_list')->name('branch_list');
    Route::post('branch_store', 'branchController@branch_store')->name('branch_store');
    Route::get('branch_edit/{id}', 'branchController@branch_edit')->name('branch_edit');
    Route::post('branch_update', 'branchController@branch_update')->name('branch_update');
    Route::get('add_branch_transfer/{id}', 'branchController@add_branch_transfer')->name('add_branch_transfer');
    Route::post('add_branch_transfer/branch_transfer', 'branchController@branch_transfer')->name('branch_transfer');
    Route::get('branch_delete/{id}', 'branchController@branch_delete')->name('branch_delete');
    Route::post('branch_close', 'branchController@branch_close')->name('branch_close');

//====================================={{+(Region Section Start)+}}========================================
    Route::get('region_list', 'branchController@region_list')->name('region_list');
    Route::post('region_store', 'branchController@region_store')->name('region_store');
    Route::get('region_edit/{id}', 'branchController@region_edit')->name('region_edit');
    Route::post('region_update', 'branchController@region_update')->name('region_update');
    Route::get('region_delete/{id}', 'branchController@region_delete')->name('region_delete');

//====================================={{+(Zone Section Start)+}}========================================
    Route::get('zone_list', 'branchController@zone_list')->name('zone_list');
    Route::post('zone_store', 'branchController@zone_store')->name('zone_store');
    Route::get('zone_edit/{id}', 'branchController@zone_edit')->name('zone_edit');
    Route::post('zone_update', 'branchController@zone_update')->name('zone_update');
    Route::get('zone_delete/{id}', 'branchController@zone_delete')->name('zone_delete');

//====================================={{+(Project Section Start)+}}========================================
    Route::get('project', 'projectController@project')->name('project');
    Route::get('project_list', 'projectController@project_list')->name('project_list');
    Route::post('project_store', 'projectController@project_store')->name('project_store');
    Route::get('project_edit/{id}', 'projectController@project_edit')->name('project_edit');
    Route::post('project_update', 'projectController@project_update')->name('project_update');
    Route::get('project_delete/{id}', 'projectController@project_delete')->name('project_delete');


//====================================={{+(Item Section Start)+}}========================================
    Route::get('item', 'itemController@item')->name('item');

    Route::get('fixed_item_list', 'itemController@fixed_item_list')->name('fixed_item_list');
    Route::get('non_fixed_item_list', 'itemController@non_fixed_item_list')->name('non_fixed_item_list');

    Route::post('fixed_item_store', 'itemController@fixed_item_store')->name('fixed_item_store');
    Route::post('non_fixed_item_store', 'itemController@non_fixed_item_store')->name('non_fixed_item_store');

    Route::get('fixed_item_edit/{id}', 'itemController@fixed_item_edit')->name('fixed_item_edit');
    Route::get('non_fixed_item_edit/{id}', 'itemController@non_fixed_item_edit')->name('non_fixed_item_edit');

    Route::post('fixed_item_update', 'itemController@fixed_item_update')->name('fixed_item_update');
    Route::post('non_fixed_item_update', 'itemController@non_fixed_item_update')->name('non_fixed_item_update');

    Route::get('item_delete/{id}', 'itemController@item_delete')->name('item_delete');
    Route::get('item_show/{id}', 'itemController@item_show')->name('item_show');


//====================================={{+(Brand Section Start)+}}========================================
    Route::get('brand_list', 'itemController@brand_list')->name('brand_list');
    Route::post('brand_store', 'itemController@brand_store')->name('brand_store');
    Route::get('brand_edit/{id}', 'itemController@brand_edit')->name('brand_edit');
    Route::post('brand_update', 'itemController@brand_update')->name('brand_update');
    Route::get('brand_delete/{id}', 'itemController@brand_delete')->name('brand_delete');


//====================================={{+(Vendor Section Start)+}}========================================
    Route::get('vendor_list', 'itemController@vendor_list')->name('vendor_list');
    Route::post('vendor_store', 'itemController@vendor_store')->name('vendor_store');
    Route::get('vendor_edit/{id}', 'itemController@vendor_edit')->name('vendor_edit');
    Route::post('vendor_update', 'itemController@vendor_update')->name('vendor_update');
    Route::get('vendor_delete/{id}', 'itemController@vendor_delete')->name('vendor_delete');


//====================================={{+(Item Name Section Start)+}}========================================
    Route::get('item_name_list', 'itemController@item_name_list')->name('item_name_list');
    Route::post('item_name_store', 'itemController@item_name_store')->name('item_name_store');
    Route::get('item_name_edit/{id}', 'itemController@item_name_edit')->name('item_name_edit');
    Route::post('item_name_update', 'itemController@item_name_update')->name('item_name_update');
    Route::get('item_name_delete/{id}', 'itemController@item_name_delete')->name('item_name_delete');


//====================================={{+(Branch Distribution Section Start)+}}========================================
    Route::get('branch_distribution', 'branch_distribution_Controller@index')->name('branch_distribution');
    Route::get('branch_distribution/distribution/{id}', 'branch_distribution_Controller@distribution')->name('distribution');
    Route::get('branch_distribution/edit/{id}', 'branch_distribution_Controller@edit')->name('edit');
    Route::post('branch_distribution/edit/update', 'branch_distribution_Controller@update')->name('update');
    Route::get('branch_distribution/delete/{id}', 'branch_distribution_Controller@delete')->name('delete');
    Route::get('branch_distribution_list', 'branch_distribution_Controller@branch_distribution_list')->name('branch_distribution_list');
    Route::get('available_item_list', 'branch_distribution_Controller@available_item_list')->name('available_item_list');
    Route::post('branch_distribution/distribution/store', 'branch_distribution_Controller@store')->name('store');

    Route::get('user_branch_distribution_list', 'branch_distribution_Controller@user_branch_distribution_list')->name('user_branch_distribution_list');


//====================================={{+(Head Office Distribution Section Start)+}}========================================
    Route::get('head_office_distribution', 'head_office_distribution_Controller@index')->name('branch_distribution');
    Route::get('head_office_distribution/distribution/{id}', 'head_office_distribution_Controller@distribution')->name('distribution');
    Route::get('head_office_distribution/edit/{id}', 'head_office_distribution_Controller@edit')->name('edit');
    Route::post('head_office_distribution/edit/update', 'head_office_distribution_Controller@update')->name('update');
    Route::get('head_office_distribution/delete/{id}', 'head_office_distribution_Controller@delete')->name('delete');
    Route::get('head_office_distribution_list', 'head_office_distribution_Controller@head_office_distribution_list')->name('head_office_distribution_list');
    Route::post('head_office_distribution/distribution/store', 'head_office_distribution_Controller@store')->name('store');
    Route::get('fetch_emp_name', 'head_office_distribution_Controller@fetch_emp_name')->name('fetch_emp_name');
    Route::get('fetch_emp_id', 'head_office_distribution_Controller@fetch_emp_id')->name('fetch_emp_id');
    Route::get('fetch_dept_name', 'head_office_distribution_Controller@fetch_dept_name')->name('fetch_dept_name');
    Route::get('head_office_available_item_list', 'head_office_distribution_Controller@head_office_available_item_list')->name('head_office_available_item_list');


//====================================={{+(Project Distribution Section Start)+}}========================================
    Route::get('project_distribution', 'project_distribution_controller@index')->name('project_distribution');
    Route::get('project_distribution/distribution/{id}', 'project_distribution_controller@distribution')->name('distribution');
    Route::post('project_distribution/distribution/store', 'project_distribution_controller@store')->name('store');
    Route::get('project_distribution/edit/{id}', 'project_distribution_controller@edit')->name('edit');
    Route::post('project_distribution/edit/update', 'project_distribution_controller@update')->name('update');
    Route::get('project_distribution/delete/{id}', 'project_distribution_controller@delete')->name('delete');
    Route::get('project_distribution_list', 'project_distribution_controller@project_distribution_list')->name('project_distribution_list');
    Route::post('project_distribution/distribution/store', 'project_distribution_controller@store')->name('store');
    Route::get('fetch_emp_name', 'project_distribution_controller@fetch_emp_name')->name('fetch_emp_name');
    Route::get('fetch_dept_name', 'project_distribution_controller@fetch_dept_name')->name('fetch_dept_name');
    Route::get('project_available_item_list', 'project_distribution_controller@project_available_item_list')->name('project_available_item_list');
    Route::get('fetch_project_branch_name', 'distributionController@fetch_project_branch_name')->name('fetch_project_branch_name');

//====================================={{+(Recycle Section Start)+}}========================================
    Route::get('recycle/index', 'recycleController@index')->name('index');
    Route::get('recycle/branch_item_list', 'recycleController@branch_item_list')->name('branch_item_list');
    Route::get('recycle/head_item_list', 'recycleController@head_item_list')->name('head_item_list');
    Route::get('recycle/project_item_list', 'recycleController@project_item_list')->name('project_item_list');
    Route::get('recycle/recycle_list', 'recycleController@recycle_list')->name('recycle_list');
    Route::get('recycle/add/{id}', 'recycleController@add')->name('add');
    Route::get('recycle/get_info/{id}', 'recycleController@get_info')->name('get_info');
    Route::post('recycle/add/store', 'recycleController@store')->name('store');
    Route::get('recycle/delete/{id}', 'recycleController@delete')->name('delete');
    Route::get('recycle/sell_info/{id}', 'recycleController@sell_info')->name('sell_info');
    Route::post('recycle/sell_store', 'recycleController@sell_store')->name('sell_store');
    Route::get('recycle/sell_details/{id}', 'recycleController@sell_details')->name('sell_details');


//====================================={{+(Distribution Section Start)+}}========================================
    Route::get('return/index', 'returnController@index')->name('index');
    Route::get('return/branch_item_list', 'returnController@branch_item_list')->name('branch_item_list');
    Route::get('return/head_item_list', 'returnController@head_item_list')->name('head_item_list');
    Route::get('return/project_item_list', 'returnController@project_item_list')->name('project_item_list');
    Route::get('return/distribution_list', 'returnController@distribution_list')->name('distribution_list');
    Route::get('return/return_list', 'returnController@return_list')->name('return_list');
    Route::get('return/add/{id}', 'returnController@add')->name('add');
    Route::post('return/add/store', 'returnController@store')->name('store');
    Route::get('return/delete/{id}', 'returnController@delete')->name('delete');

    Route::get('distribution/history/branch', 'distributionController@branch_history')->name('branch_history');
    Route::get('distribution/history/branch_history_list', 'distributionController@branch_history_list')->name('branch_history_list');

    Route::get('distribution/history/head_office', 'distributionController@head_office_history')->name('head_office_history');
    Route::get('distribution/history/head_office_history_list', 'distributionController@head_office_history_list')->name('head_office_history_list');

    Route::get('distribution/history/project', 'distributionController@project_history')->name('project_history');
    Route::get('distribution/history/project_history_list', 'distributionController@project_history_list')->name('project_history_list');

    Route::get('fetch_item_name', 'distributionController@fetch_item_name')->name('fetch_item_name');
    Route::get('fetch_brand_name', 'distributionController@fetch_brand_name')->name('fetch_brand_name');

    Route::get('fetch_zone_name', 'distributionController@fetch_zone_name')->name('fetch_zone_name');
    Route::get('fetch_branch_name', 'distributionController@fetch_branch_name')->name('fetch_branch_name');

    Route::get('fetch_search_zone_name', 'distributionController@fetch_search_zone_name')->name('fetch_search_zone_name');
    Route::get('fetch_related_zone_name', 'distributionController@fetch_related_zone_name')->name('fetch_related_zone_name');
    Route::get('fetch_search_branch_name', 'distributionController@fetch_search_branch_name')->name('fetch_search_branch_name');
    Route::get('fetch_project_search_branch_name', 'distributionController@fetch_project_search_branch_name')->name('fetch_project_search_branch_name');
    Route::get('fetch_search_emp_id', 'distributionController@fetch_search_emp_id')->name('fetch_search_emp_id');
    Route::get('fetch_search_emp_dept', 'distributionController@fetch_search_emp_dept')->name('fetch_search_emp_dept');
    Route::get('fetch_search_brand_name', 'distributionController@fetch_search_brand_name')->name('fetch_search_brand_name');
    Route::get('fetch_search_vendor_name', 'distributionController@fetch_search_vendor_name')->name('fetch_search_vendor_name');
    Route::get('fetch_search_p_branch_name', 'distributionController@fetch_search_p_branch_name')->name('fetch_search_p_branch_name');


//====================================={{+(Servicing Section Start)+}}========================================
    Route::get('servicing/index', 'servicingController@index')->name('index');
    Route::get('servicing_list', 'servicingController@servicing_list')->name('servicing_list');
    Route::get('servicing/branch_item_list', 'servicingController@branch_item_list')->name('branch_item_list');
    Route::get('servicing/head_item_list', 'servicingController@head_item_list')->name('head_item_list');
    Route::get('servicing/project_item_list', 'servicingController@project_item_list')->name('project_item_list');
    Route::get('servicing/add/{id}', 'servicingController@add')->name('add');
    Route::post('servicing/add/servicing_store', 'servicingController@servicing_store')->name('servicing_store');
    Route::get('servicing/servicing_return/{id}', 'servicingController@servicing_return')->name('servicing_return');
    Route::post('servicing/servicing_return_store', 'servicingController@servicing_return_store')->name('servicing_return_store');
    Route::get('servicing/servicing_edit/{id}', 'servicingController@servicing_edit')->name('servicing_edit');
    Route::post('servicing/servicing_update', 'servicingController@servicing_update')->name('servicing_update');
    Route::get('servicing/servicing_delete/{id}', 'servicingController@servicing_delete')->name('servicing_delete');
    Route::get('servicing/distribution/{id}', 'servicingController@distribution')->name('distribution');
    Route::get('servicing/distribution_history/{id}', 'servicingController@distribution_history')->name('distribution_history');


//==================================={{+(Employee Section Start)+}}=========================================
    Route::get('employee', 'employeeController@employee')->name('employee');
    Route::get('employee_list', 'employeeController@employee_list')->name('employee_list');
    Route::post('employee_store', 'employeeController@employee_store')->name('employee_store');
    Route::get('employee_edit/{id}', 'employeeController@employee_edit')->name('employee_edit');
    Route::post('employee_update', 'employeeController@employee_update')->name('employee_update');
    Route::get('employee_delete/{id}', 'employeeController@employee_delete')->name('employee_delete');
    Route::get('all_student_list', 'adminController@all_student_list')->name('all_student_list');
    Route::get('admin_student_list', 'admissionController@admin_student_list')->name('admin_student_list');
//=================================={{-(Employee Section End)-}}=============================================

//==================================={{+(Gatepass Section Start)+}}=========================================
    Route::get('gatepass/index', 'gatepassController@index')->name('index');
    Route::post('gatepass/gatepass_store', 'gatepassController@gatepass_store')->name('gatepass_store');
    Route::get('gatepass_list', 'gatepassController@gatepass_list')->name('gatepass_list');
    Route::get('gatepass_show/{id}', 'gatepassController@gatepass_show')->name('gatepass_show');
    Route::get('gatepass_edit/{id}', 'gatepassController@gatepass_edit')->name('gatepass_edit');
    Route::get('gatepass_edit/item_delete/{id}', 'gatepassController@item_delete')->name('item_delete');
    Route::post('gatepass_edit/gatepass_update', 'gatepassController@gatepass_update')->name('gatepass_update');
    Route::get('gatepass/delete_gatepass/{id}', 'gatepassController@delete_gatepass')->name('delete_gatepass');
    Route::get('blank_gatepass', 'gatepassController@blank_gatepass')->name('blank_gatepass');

    Route::get('gatepass/pdf/{id}', 'gatepassController@pdf')->name('pdf');

    Route::get('fetch_address', 'gatepassController@fetch_address')->name('fetch_address');
    Route::get('fetch_receiver_name', 'gatepassController@fetch_receiver_name')->name('fetch_receiver_name');
    Route::get('fetch_company', 'gatepassController@fetch_company')->name('fetch_company');

//==================================={{+(Device Service Section Start)+}}=========================================
    Route::get('device_service/index', 'deviceServiceController@index')->name('index');
    Route::post('device_service/device_service_store', 'deviceServiceController@device_service_store')->name('device_service_store');
    Route::get('device_service_list', 'deviceServiceController@device_service_list')->name('device_service_list');
    Route::get('device_service_show/{id}', 'deviceServiceController@device_service_show')->name('device_service_show');
    Route::get('device_service_edit/{id}', 'deviceServiceController@device_service_edit')->name('device_service_edit');
    Route::get('device_service_edit/item_delete/{id}', 'deviceServiceController@item_delete')->name('item_delete');
    Route::post('device_service_edit/device_service_update', 'deviceServiceController@device_service_update')->name('device_service_update');
    Route::get('device_service/delete_device_service/{id}', 'deviceServiceController@delete_device_service')->name('delete_device_service');
    Route::get('blank_device_service', 'deviceServiceController@blank_device_service')->name('blank_device_service');

    Route::get('d_fetch_address', 'deviceServiceController@d_fetch_address')->name('d_fetch_address');
    Route::get('d_fetch_receiver_name', 'deviceServiceController@d_fetch_receiver_name')->name('d_fetch_receiver_name');
    Route::get('d_fetch_company', 'deviceServiceController@d_fetch_company')->name('d_fetch_company');


//==================================={{+(Report Section Start)+}}=========================================
    Route::get('report/purchase', 'reportController@purchase')->name('purchase');
    Route::get('report/purchase_list', 'reportController@purchase_list')->name('purchase_list');

    Route::get('report/service/branch', 'reportController@branch_service_report')->name('branch_service_report');
    Route::get('report/service/head_office', 'reportController@head_office_service_report')->name('head_office_service_report');
    Route::get('report/service/project', 'reportController@project_service_report')->name('project_service_report');
    Route::get('report/branch_servicing_list', 'reportController@branch_servicing_list')->name('branch_servicing_list');
    Route::get('report/project_servicing_list', 'reportController@project_servicing_list')->name('project_servicing_list');
    Route::get('report/head_office_servicing_list', 'reportController@head_office_servicing_list')->name('head_office_servicing_list');

    Route::get('report/return/branch', 'reportController@branch_return_report')->name('branch_return_report');
    Route::get('report/branch_return_list', 'reportController@branch_return_list')->name('branch_return_list');

    Route::get('report/return/head_office', 'reportController@head_office_return_report')->name('head_office_return_report');
    Route::get('report/head_office_return_list', 'reportController@head_office_return_list')->name('head_office_return_list');

    Route::get('report/return/project', 'reportController@project_return_report')->name('project_return_report');
    Route::get('report/project_return_list', 'reportController@project_return_list')->name('project_return_list');

    Route::get('report/branch_costing', 'reportController@branch_costing')->name('branch_costing');
    Route::get('report/branch_costing_list', 'reportController@branch_costing_list')->name('branch_costing_list');
    Route::get('report/head_office_costing', 'reportController@head_office_costing')->name('head_office_costing');
    Route::get('report/head_office_costing_list', 'reportController@head_office_costing_list')->name('head_office_costing_list');
    Route::get('report/project_costing', 'reportController@project_costing')->name('project_costing');
    Route::get('report/project_costing_list', 'reportController@project_costing_list')->name('project_costing_list');

    Route::get('report/item', 'reportController@item')->name('item');
    Route::get('item_list', 'reportController@item_list')->name('item_list');
    Route::get('report/item_report/{id}', 'reportController@item_report')->name('item_report');

    Route::get('report/return', 'reportController@return')->name('return');
    Route::get('report/recycle', 'reportController@recycle')->name('recycle');
    Route::get('report/recycle_list', 'reportController@recycle_list')->name('recycle_list');


//==================================={{+(Useless Module)+}}=========================================
    Route::get('other/toner_purchase', 'otherController@toner_purchase')->name('toner_purchase');
    Route::post('other/toner_purchase_store', 'otherController@toner_purchase_store')->name('toner_purchase_store');
    Route::get('toner_purchase_list', 'otherController@toner_purchase_list')->name('toner_purchase_list');
    Route::get('toner_purchase_show/{id}', 'otherController@toner_purchase_show')->name('toner_purchase_show');
    Route::get('other/toner_purchase_delete/{id}', 'otherController@toner_purchase_delete')->name('toner_purchase_delete');

    Route::get('other/purchase_request', 'otherController@purchase_request')->name('purchase_request');
    Route::post('other/purchase_request_store', 'otherController@purchase_request_store')->name('purchase_request_store');
    Route::get('purchase_request_list', 'otherController@purchase_request_list')->name('purchase_request_list');
    Route::get('purchase_request_show/{id}', 'otherController@purchase_request_show')->name('purchase_request_show');
    Route::get('other/purchase_request_delete/{id}', 'otherController@purchase_request_delete')->name('purchase_request_delete');
    Route::get('purchase_request_edit/{id}', 'otherController@purchase_request_edit')->name('purchase_request_edit');
    Route::post('purchase_request_edit/purchase_request_update', 'otherController@purchase_request_update')->name('purchase_request_update');
    Route::get('purchase_request_edit/pr_item_delete/{id}', 'otherController@pr_item_delete')->name('pr_item_delete');
    Route::get('fetch_pr_branch_name', 'otherController@fetch_pr_branch_name')->name('fetch_pr_branch_name');

    Route::get('other/visiting_working_info', 'otherController@visiting_working_info')->name('visiting_working_info');
    Route::get('visiting_working_info_list', 'otherController@visiting_working_info_list')->name('visiting_working_info_list');
    Route::post('other/visiting_working_info_store', 'otherController@visiting_working_info_store')->name('visiting_working_info_store');
    Route::get('visiting_working_info_show/{id}', 'otherController@visiting_working_info_show')->name('visiting_working_info_show');
    Route::get('other/visiting_working_info_delete/{id}', 'otherController@visiting_working_info_delete')->name('visiting_working_info_delete');
    Route::get('other/visiting_working_info_update/{id}', 'otherController@visiting_working_info_update')->name('visiting_working_info_update');

    Route::get('other/asset_received', 'otherController@asset_received')->name('asset_received');
    Route::post('other/asset_received_store', 'otherController@asset_received_store')->name('asset_received_store');
    Route::get('asset_received_list', 'otherController@asset_received_list')->name('asset_received_list');
    Route::get('asset_received_show/{id}', 'otherController@asset_received_show')->name('asset_received_show');
    Route::get('asset_received_edit/{id}', 'otherController@asset_received_edit')->name('asset_received_edit');
    Route::get('asset_received_edit/item_delete/{id}', 'otherController@item_delete')->name('item_delete');
    Route::post('asset_received_edit/asset_received_update', 'otherController@asset_received_update')->name('asset_received_update');
    Route::get('other/asset_received_delete/{id}', 'otherController@asset_received_delete')->name('asset_received_delete');

    Route::get('other/password_change', 'otherController@password_change')->name('password_change');
    Route::post('other/password_update', 'otherController@password_update')->name('password_update');


    Route::get('other/working_plan', 'otherController@working_plan')->name('working_plan');
    Route::post('other/working_plan_store', 'otherController@working_plan_store')->name('working_plan_store');


//==================================={{+(User Module)+}}=========================================
    Route::get('user/index', 'otherController@index')->name('index');
    Route::get('user_list', 'otherController@user_list')->name('user_list');
    Route::post('user/user_store', 'otherController@user_store')->name('user_store');
//    Route::get('user/user_edit/{id}', 'otherController@user_edit')->name('user_edit');
    Route::post('user_edit/user_update', 'otherController@user_update')->name('user_update');
    Route::get('user/user_delete/{id}', 'otherController@user_delete')->name('user_delete');
    Route::get('user_edit/{id}', 'otherController@user_edit')->name('user_edit');


    //==================================={{+(Notice Module)+}}=========================================
    Route::get('notice', 'otherController@notice')->name('notice');
    Route::get('notice_list', 'otherController@notice_list')->name('notice_list');
    Route::post('notice_store', 'otherController@notice_store')->name('notice_store');
    Route::get('notice_delete/{id}', 'otherController@notice_delete')->name('notice_delete');


    //====================================={{+(GRN Section Start)+}}========================================
Route::get('grn/index', 'grnController@index')->name('index');

Route::get('bill_list_purchase', 'grnController@bill_list_purchase')->name('bill_list_purchase');
Route::get('bill_list_servicing', 'grnController@bill_list_servicing')->name('bill_list_servicing');

Route::get('grn_list_purchase', 'grnController@grn_list_purchase')->name('grn_list_purchase');
Route::get('grn_list_servicing', 'grnController@grn_list_servicing')->name('grn_list_servicing');

Route::get('grn/add/{id}', 'grnController@add')->name('add');

Route::get('grn/grn_info_purchase/{id}', 'grnController@grn_info_purchase')->name('grn_info_purchase');
Route::get('grn/grn_info_servicing/{id}', 'grnController@grn_info_servicing')->name('grn_info_servicing');

Route::get('grn/bill_info_purchase/{id}', 'grnController@bill_info_purchase')->name('bill_info_purchase');
Route::get('grn/bill_info_servicing/{id}', 'grnController@bill_info_servicing')->name('bill_info_servicing');

Route::get('grn/grn_purchase_info/{id}', 'grnController@grn_purchase_info')->name('grn_purchase_info');
Route::get('grn/grn_servicing_info/{id}', 'grnController@grn_servicing_info')->name('grn_servicing_info');

Route::post('grn/grn_purchase_store', 'grnController@grn_purchase_store')->name('grn_purchase_store');
Route::post('grn/grn_servicing_store', 'grnController@grn_servicing_store')->name('grn_servicing_store');

Route::post('grn/grn_purchase_update', 'grnController@grn_purchase_update')->name('grn_purchase_update');
Route::post('grn/grn_servicing_update', 'grnController@grn_purchase_update')->name('grn_purchase_update');

Route::get('grn/grn_purchase_delete/{id}', 'grnController@grn_purchase_delete')->name('grn_purchase_delete');
Route::get('grn/grn_servicing_delete/{id}', 'grnController@grn_servicing_delete')->name('grn_servicing_delete');
