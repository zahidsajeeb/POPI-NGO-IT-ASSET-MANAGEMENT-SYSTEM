<?php

    namespace App\Http\Controllers;

    use App\Mail\UserInfo;
    use DataTables;
    use PDF;
    use File;
    use NumberFormatter;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\Rule;
    use Mail;
    use Auth;
    use Validator;
    use Rakibhstu\Banglanumber\NumberToBangla;
    use Riskihajar\Terbilang\Facades\Terbilang;

    class reportController extends Controller
    {
// {{======================(Purchase Report Start)========================}}
        public function purchase()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $brand_list = DB::table('tbl_brand')->select('*')->get();
                $vendor_list = DB::table('tbl_vendor')->select('*')->get();
                $item_list = DB::table('tbl_item_name')->select('*')->get();
                $data = DB::table('tbl_item')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_brand.brand_name')
                    ->get();
                return view('report.purchase', compact('data', 'brand_list', 'item_list', 'vendor_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function purchase_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->leftJoin('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_brand.brand_name', 'tbl_vendor.vendor_name')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('branch_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
// {{======================(Purchase Report End)========================}}

// {{======================[+++Service Report Start+++]========================}}
        public function branch_service_report()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $region_list = DB::table('tbl_region')->select('*')->get();
                return view('report.service.branch', compact('region_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function branch_servicing_list(Request $request)
        {
            if(Auth::user()->role==='Admin' || Auth::user()->role==='Superadmin'){
                if ($request->ajax()) {
                    $data = DB::table('tbl_servicing')
                        ->join('tbl_item_distribution', 'tbl_item_distribution.id', '=', 'tbl_servicing.distribution_id')
                        ->join('tbl_item', 'tbl_item.id', '=', 'tbl_servicing.item_id')
                        ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                        ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                        ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                        ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                        ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                        ->where('tbl_servicing.servicing_status', '=','1')
                        ->where('tbl_item_distribution.distribution_type', 'Branch')
                        ->select('tbl_servicing.*', 'tbl_item_name.item_name', 'tbl_item.asset_code',
                            'tbl_item.serial_no', 'tbl_vendor.vendor_name', 'tbl_branch.branch_name', 'tbl_region.region_name', 'tbl_zone.zone_name')
                        ->orderBy('tbl_servicing.id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->return_date == '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
                                <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }
                            if ($row->return_date != '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }

                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='IT officer'){
                $user_name = Auth::user()->name;
                if ($request->ajax()) {
                    $data = DB::table('tbl_servicing')
                        ->join('tbl_item_distribution', 'tbl_item_distribution.id', '=', 'tbl_servicing.distribution_id')
                        ->join('tbl_item', 'tbl_item.id', '=', 'tbl_servicing.item_id')
                        ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                        ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                        ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                        ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                        ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                        ->join('user_region', 'user_region.region_id', '=', 'tbl_item_distribution.region_id')
                        ->where('tbl_servicing.servicing_status', '=','1')
                        ->where('tbl_item_distribution.distribution_type', 'Branch')
                        ->where('user_region.user_name','=',$user_name)
                        ->select('tbl_servicing.*', 'tbl_item_name.item_name', 'tbl_item.asset_code',
                            'tbl_item.serial_no', 'tbl_vendor.vendor_name', 'tbl_branch.branch_name', 'tbl_region.region_name', 'tbl_zone.zone_name')
                        ->orderBy('tbl_servicing.id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->return_date == '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
                                <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }
                            if ($row->return_date != '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }

                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }
        }

        public function head_office_service_report()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                return view('report.service.head_office', compact('notice_list'));
            } else {
                return view('signin');
            }
        }

        public function head_office_servicing_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_servicing')
                    ->join('tbl_item_distribution', 'tbl_item_distribution.id', '=', 'tbl_servicing.distribution_id')
                    ->join('tbl_item', 'tbl_item.id', '=', 'tbl_servicing.item_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                    ->where('tbl_servicing.servicing_status', '=','1')
                    ->where('tbl_item_distribution.distribution_type', 'Head office')
                    ->select('tbl_servicing.*', 'tbl_item_name.item_name', 'tbl_item.asset_code',
                        'tbl_item.serial_no', 'tbl_vendor.vendor_name', 'tbl_employee.employee_name', 'tbl_employee.employee_id')
                    ->orderBy('tbl_servicing.id', 'desc')
                    ->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if ($row->return_date == '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
                                <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }
                        if ($row->return_date != '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function project_service_report()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $project_list = DB::table('tbl_project')->select('*')->get();
                return view('report.service.project', compact('project_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function project_servicing_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_servicing')
                    ->join('tbl_item_distribution', 'tbl_item_distribution.id', '=', 'tbl_servicing.distribution_id')
                    ->join('tbl_item', 'tbl_item.id', '=', 'tbl_servicing.item_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                    ->join('tbl_project', 'tbl_project.id', '=', 'tbl_item_distribution.project_id')
                    ->where('tbl_servicing.servicing_status', '=','1')
                    ->where('tbl_item_distribution.distribution_type', 'Project')
                    ->select('tbl_servicing.*', 'tbl_item_name.item_name', 'tbl_item.asset_code',
                        'tbl_item.serial_no', 'tbl_vendor.vendor_name', 'tbl_branch.branch_name', 'tbl_project.project_name')
                    ->orderBy('tbl_servicing.id', 'desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if ($row->return_date == '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
                                <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }
                        if ($row->return_date != '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
// {{======================[Service Report End]========================}}


// {{======================(Return Report Start)========================}}
        public function branch_return_report()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $region_list = DB::table('tbl_region')->select('*')->get();
                return view('report.return.branch', compact('region_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function branch_return_list(Request $request)
        {
            if(Auth::user()->role==='Admin' || Auth::user()->role==='Superadmin'){
                if ($request->ajax()) {
                    $data = DB::table('tbl_item_distribution')
                        ->join('tbl_item', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                        ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                        ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                        ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                        ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                        ->where('tbl_item_distribution.distribution_type', 'Branch')
                        ->where('tbl_item_distribution.return_date', '!=', '')
                        ->select('tbl_item_distribution.*', 'tbl_item_name.item_name', 'tbl_item.asset_code', 'tbl_item.serial_no', 'tbl_branch.branch_name', 'tbl_region.region_name', 'tbl_zone.zone_name')
                        ->orderBy('tbl_item_distribution.id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->return_date == '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
                                <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }
                            if ($row->return_date != '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }

                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='IT officer'){
                $user_name = Auth::user()->name;
                if ($request->ajax()) {
                    $data = DB::table('tbl_item_distribution')
                        ->join('tbl_item', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                        ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                        ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                        ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                        ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                        ->join('user_region', 'user_region.region_id', '=', 'tbl_item_distribution.region_id')
                        ->where('tbl_item_distribution.distribution_type', 'Branch')
                        ->where('tbl_item_distribution.return_date', '!=', '')
                        ->where('user_region.user_name','=',$user_name)
                        ->select('tbl_item_distribution.*', 'tbl_item_name.item_name', 'tbl_item.asset_code', 'tbl_item.serial_no', 'tbl_branch.branch_name', 'tbl_region.region_name', 'tbl_zone.zone_name')
                        ->orderBy('tbl_item_distribution.id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->return_date == '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
                                <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }
                            if ($row->return_date != '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }

                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }

        }

        public function head_office_return_report()
        {
            if (Auth::check()) {
                return view('report.return.head_office');
            } else {
                return view('signin');
            }
        }

        public function head_office_return_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->join('tbl_item', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->join('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                    ->join('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_employee.department_id')
                    ->where('tbl_item_distribution.distribution_type', 'Head office')
                    ->where('tbl_item_distribution.return_date', '!=', '')
                    ->select('tbl_item_distribution.*', 'tbl_item_name.item_name', 'tbl_item.asset_code', 'tbl_item.serial_no', 'tbl_employee_department.department_name', 'tbl_employee.employee_name', 'tbl_employee.employee_id')
                    ->orderBy('tbl_item_distribution.id', 'desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if ($row->return_date == '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
                                <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }
                        if ($row->return_date != '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function project_return_report()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $project_list = DB::table('tbl_project')->select('*')->get();
                return view('report.return.project', compact('project_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function project_return_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->join('tbl_item', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->join('tbl_project', 'tbl_project.id', '=', 'tbl_item_distribution.project_id')
                    ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_project.branch_id')
                    ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                    ->where('tbl_item_distribution.distribution_type', 'Project')
                    ->where('tbl_item_distribution.return_date', '!=', '')
                    ->select('tbl_item_distribution.*', 'tbl_item_name.item_name', 'tbl_item.asset_code', 'tbl_item.serial_no', 'tbl_branch.branch_name', 'tbl_project.project_name')
                    ->orderBy('tbl_item_distribution.id', 'desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if ($row->return_date == '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
                                <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }
                        if ($row->return_date != '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

// {{======================(Recycle Report Start)========================}}
        public function recycle()
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            if (Auth::check()) {
                return view('report.recycle', compact('notice_list'));
            } else {
                return view('signin');
            }
        }
        public function recycle_list(Request $request)
        {
            if(Auth::user()->role==='Admin' || Auth::user()->role==='Superadmin'){
                if ($request->ajax()) {
                    $data = DB::table('tbl_item')
                        ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                        ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                        ->leftJoin('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                        ->leftJoin('tbl_recycle', 'tbl_recycle.distribution_id', '=', 'tbl_item_distribution.id')
                        ->leftJoin('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
//                    ->where('tbl_item_name.fixed_asset', '=', '1')
//                    ->where('tbl_item.recycle', '=', '1')
                        ->where('tbl_item.recycle_qty', '!=', '0')
                        ->where('tbl_item_distribution.distribution_recycle_qty', '!=', '0')
                        ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_brand.brand_name', 'tbl_recycle.recycle_date','tbl_recycle.recycle_qty' , 'tbl_recycle.recycle_location','tbl_branch.branch_name')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->recycle_date == '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="recycle" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Recycle Item</a>';
                                return $btn;
                            }
                            if ($row->recycle_date != '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="delete_recycle" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-repeat"></i> Reset Date</a>';
                                return $btn;
                            }

                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }

            if(Auth::user()->role==='IT officer'){
                if ($request->ajax()) {
                    $user_name = Auth::user()->name;
                    $data = DB::table('tbl_item')
                        ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                        ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                        ->leftJoin('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                        ->leftJoin('tbl_recycle', 'tbl_recycle.distribution_id', '=', 'tbl_item_distribution.id')
                        ->leftJoin('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                        ->leftJoin('user_region', 'user_region.branch_id', '=', 'tbl_item_distribution.branch_id')
                        ->where('tbl_item.recycle_qty', '!=', '0')
                        ->where('tbl_item_distribution.distribution_recycle_qty', '!=', '0')
                        ->where('user_region.user_name','=',$user_name)
                        ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_brand.brand_name', 'tbl_recycle.recycle_date','tbl_recycle.recycle_qty' , 'tbl_recycle.recycle_location','tbl_branch.branch_name')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->recycle_date == '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="recycle" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Recycle Item</a>';
                                return $btn;
                            }
                            if ($row->recycle_date != '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="delete_recycle" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-repeat"></i> Reset Date</a>';
                                return $btn;
                            }

                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }

        }


        // {{======================(Costing Report Start)========================}}
        public function branch_costing()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $region_list = DB::table('tbl_region')->select('*')->get();
                return view('report.costing.branch', compact('region_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }
        public function branch_costing_list(Request $request)
        {
            if(Auth::user()->role==='Admin' || Auth::user()->role==='Superadmin'){
                if ($request->ajax()) {
                    $data = DB::table('tbl_item_distribution')
                        ->leftJoin('tbl_item', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                        ->leftJoin('tbl_item_name', 'tbl_item_distribution.item_name_id', '=', 'tbl_item_name.id')
                        ->leftJoin('tbl_region', 'tbl_item_distribution.region_id', '=', 'tbl_region.id')
                        ->leftJoin('tbl_zone', 'tbl_item_distribution.zone_id', '=', 'tbl_zone.id')
                        ->leftJoin('tbl_branch', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                        ->where('tbl_item.recycle', '=', '0')
                        ->where('tbl_item_distribution.distribution_type','=', 'Branch')
                        ->where('tbl_item_distribution.diff', '!=', '0')
                        ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_item_distribution.return_qty', 'tbl_item_distribution.distribution_recycle_qty', 'tbl_item_distribution.distribution_qty', 'tbl_item_distribution.return_qty', 'tbl_item_distribution.distribution_date', 'tbl_branch.branch_name',
                            'tbl_region.region_name', 'tbl_zone.zone_name')
                        ->get();

                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->recycle_date == '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="recycle" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Recycle Item</a>';
                                return $btn;
                            }
                            if ($row->recycle_date != '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="delete_recycle" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-repeat"></i> Reset Date</a>';
                                return $btn;
                            }

                        })
                        ->addColumn('qty', function ($row) {
                            $row_one = $row->distribution_qty;
                            $row_two = $row->return_qty;
                            $row_three = $row->recycle_qty;
                            if($row->return_qty==0){
                                $result  = ($row->distribution_qty)-0-($row->distribution_recycle_qty);
                            }
                            else{
                                $result  = ($row->distribution_qty) - ($row->return_qty) - ($row->distribution_recycle_qty);
                            }

//                        $btn_4 = ($row->distribution_qty) - ($row->return_qty);
                            return $result;
                        })
                        ->addColumn('unit_price', function ($row) {
                            $unit_price = ($row->price) / ($row->qty);
                            $btn_2 = $unit_price;
                            return $btn_2;
                        })
                        ->addColumn('total_price', function ($row) {
                            $unit_price = ($row->price) / ($row->qty);
                            $total_price = ($unit_price) * (($row->distribution_qty)-($row->return_qty)-($row->distribution_recycle_qty));
                            $btn_3 = $total_price;
                            return $btn_3;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='IT officer'){
                $user_name = Auth::user()->name;
                if ($request->ajax()) {
                    $data = DB::table('tbl_item_distribution')
                        ->leftJoin('tbl_item', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                        ->leftJoin('tbl_item_name', 'tbl_item_distribution.item_name_id', '=', 'tbl_item_name.id')
                        ->leftJoin('tbl_region', 'tbl_item_distribution.region_id', '=', 'tbl_region.id')
                        ->leftJoin('tbl_zone', 'tbl_item_distribution.zone_id', '=', 'tbl_zone.id')
                        ->leftJoin('tbl_branch', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                        ->leftJoin('user_region', 'user_region.region_id', '=', 'tbl_item_distribution.region_id')
                        ->where('tbl_item.recycle', '=', '0')
                        ->where('tbl_item_distribution.distribution_type','=', 'Branch')
                        ->where('tbl_item_distribution.diff', '!=', '0')
                        ->where('user_region.user_name','=',$user_name)
                        ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_item_distribution.return_qty', 'tbl_item_distribution.distribution_recycle_qty', 'tbl_item_distribution.distribution_qty', 'tbl_item_distribution.return_qty', 'tbl_item_distribution.distribution_date', 'tbl_branch.branch_name',
                            'tbl_region.region_name', 'tbl_zone.zone_name')
                        ->get();

                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->recycle_date == '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="recycle" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Recycle Item</a>';
                                return $btn;
                            }
                            if ($row->recycle_date != '') {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="delete_recycle" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-repeat"></i> Reset Date</a>';
                                return $btn;
                            }

                        })
                        ->addColumn('qty', function ($row) {
                            $row_one = $row->distribution_qty;
                            $row_two = $row->return_qty;
                            $row_three = $row->recycle_qty;
                            if($row->return_qty==0){
                                $result  = ($row->distribution_qty)-0-($row->distribution_recycle_qty);
                            }
                            else{
                                $result  = ($row->distribution_qty) - ($row->return_qty) - ($row->distribution_recycle_qty);
                            }

//                        $btn_4 = ($row->distribution_qty) - ($row->return_qty);
                            return $result;
                        })
                        ->addColumn('unit_price', function ($row) {
                            $unit_price = ($row->price) / ($row->qty);
                            $btn_2 = $unit_price;
                            return $btn_2;
                        })
                        ->addColumn('total_price', function ($row) {
                            $unit_price = ($row->price) / ($row->qty);
                            $total_price = ($unit_price) * (($row->distribution_qty)-($row->return_qty)-($row->distribution_recycle_qty));
                            $btn_3 = $total_price;
                            return $btn_3;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }

        }

        public function head_office_costing()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $emp_list = DB::table('tbl_employee')->select('*')->get();
                $emp_dept_list = DB::table('tbl_employee_department')->select('*')->get();
                return view('report.costing.head_office', compact('emp_list','emp_dept_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }
        public function head_office_costing_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                    ->join('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_item_distribution.department_id')
                    ->where('tbl_item.recycle', '=', '0')
                    ->where('tbl_item_distribution.distribution_type','=', 'Head office')
                    ->where('tbl_item_distribution.diff', '!=', '0')
                    ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_item_distribution.return_qty',
                        'tbl_item_distribution.distribution_recycle_qty', 'tbl_item_distribution.distribution_qty',
                        'tbl_item_distribution.return_qty', 'tbl_item_distribution.distribution_date',
                        'tbl_employee.employee_name','tbl_employee.employee_id', 'tbl_employee_department.department_name')
                    ->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if ($row->recycle_date == '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="recycle" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Recycle Item</a>';
                            return $btn;
                        }
                        if ($row->recycle_date != '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="delete_recycle" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-repeat"></i> Reset Date</a>';
                            return $btn;
                        }

                    })
                    ->addColumn('qty', function ($row) {
                        $row_one = $row->distribution_qty;
                        $row_two = $row->return_qty;
                        $row_three = $row->recycle_qty;
                        if($row->return_qty==0){
                            $result  = ($row->distribution_qty)-0-($row->distribution_recycle_qty);
                        }
                        else{
                            $result  = ($row->distribution_qty) - ($row->return_qty) - ($row->distribution_recycle_qty);
                        }

//                        $btn_4 = ($row->distribution_qty) - ($row->return_qty);
                        return $result;
                    })
                    ->addColumn('unit_price', function ($row) {
                        $unit_price = ($row->price) / ($row->qty);
                        $btn_2 = $unit_price;
                        return $btn_2;
                    })
                    ->addColumn('total_price', function ($row) {
                        $unit_price = ($row->price) / ($row->qty);
                        $total_price = ($unit_price) * (($row->distribution_qty)-($row->return_qty)-($row->distribution_recycle_qty));
                        $btn_3 = $total_price;
                        return $btn_3;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function project_costing()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $project_list = DB::table('tbl_project')->select('*')->get();
                return view('report.costing.project', compact('project_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }
        public function project_costing_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_project', 'tbl_project.id', '=', 'tbl_item_distribution.project_id')
                    ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                    ->where('tbl_item.recycle', '=', '0')
                    ->where('tbl_item_distribution.distribution_type','=', 'Project')
                    ->where('tbl_item_distribution.diff', '!=', '0')
                    ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_item_distribution.return_qty',
                        'tbl_item_distribution.distribution_recycle_qty', 'tbl_item_distribution.distribution_qty',
                        'tbl_item_distribution.return_qty', 'tbl_item_distribution.distribution_date',
                        'tbl_branch.branch_name', 'tbl_project.project_name')
                    ->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if ($row->recycle_date == '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="recycle" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Recycle Item</a>';
                            return $btn;
                        }
                        if ($row->recycle_date != '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="delete_recycle" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-repeat"></i> Reset Date</a>';
                            return $btn;
                        }

                    })
                    ->addColumn('qty', function ($row) {
                        $row_one = $row->distribution_qty;
                        $row_two = $row->return_qty;
                        $row_three = $row->recycle_qty;
                        if($row->return_qty==0){
                            $result  = ($row->distribution_qty)-0-($row->distribution_recycle_qty);
                        }
                        else{
                            $result  = ($row->distribution_qty) - ($row->return_qty) - ($row->distribution_recycle_qty);
                        }

//                        $btn_4 = ($row->distribution_qty) - ($row->return_qty);
                        return $result;
                    })
                    ->addColumn('unit_price', function ($row) {
                        $unit_price = ($row->price) / ($row->qty);
                        $btn_2 = $unit_price;
                        return $btn_2;
                    })
                    ->addColumn('total_price', function ($row) {
                        $unit_price = ($row->price) / ($row->qty);
                        $total_price = ($unit_price) * (($row->distribution_qty)-($row->return_qty)-($row->distribution_recycle_qty));
                        $btn_3 = $total_price;
                        return $btn_3;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        // {{======================(Item Report Start)========================}}
        public function item()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                return view('report.item', compact('notice_list'));
            } else {
                return view('signin');
            }
        }
        public function item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
//                    ->where('tbl_item_name.fixed_asset', '1')
                    ->orderBy('tbl_item.id', 'desc')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item.id', 'tbl_item.asset_code',
                        'tbl_item.serial_no', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_item.qty', 'tbl_item.price', 'tbl_item.recycle_qty')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('report/item_report', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> History</a>';
                        return $btn;
                    })
                    ->addColumn('status', function ($row) {
                        if ($row->recycle_qty==0) {
                            $active = "Active";
                            $btn_1 = '<a href="#" class="btn btn-sm btn-success" style="border-radius:0px;text-align:center;">' . $active . '</a>';
                            return $btn_1;
                        }
                        else {
                            $recycle = "Recycle";
                            $btn_2 = '<a href="#" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;">' . $recycle . '</a>';
                            return $btn_2;
                        }
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }
        }
        public function item_report($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $data = DB::table('tbl_item')
                ->select('*')
                ->where('id', $id)
                ->first();
            $item_name = DB::table('tbl_item_name')
                ->join('tbl_item', 'tbl_item.item_name_id', '=', 'tbl_item_name.id')
                ->select('tbl_item_name.item_name')
                ->where('tbl_item.id', $id)
                ->first();

            $distribution = DB::table('tbl_item_distribution')
                ->select('*')
                ->where('item_id', $id)
                ->get();

            $branch_distribution_list = DB::table('tbl_item_distribution')
                ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->leftJoin('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                ->leftJoin('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                ->leftJoin('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                ->where('tbl_item.id', $id)
                ->where('tbl_item_distribution.distribution_type', 'Branch')
                ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_branch.branch_name', 'tbl_branch.closing_date', 'tbl_zone.zone_name', 'tbl_brand.brand_name', 'tbl_region.region_name',
                    'tbl_item_distribution.distribution_date','tbl_item_distribution.return_date', 'tbl_item_distribution.item_type', 'tbl_item_distribution.id',
                     'tbl_item_distribution.distribution_type')
                ->get();

            $head_office_distribution_list = DB::table('tbl_item_distribution')
                ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->leftJoin('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                ->leftJoin('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_item_distribution.department_id')
                ->where('tbl_item.id', $id)
                ->where('tbl_item_distribution.distribution_type', 'Head office')
                ->select('tbl_item.*', 'tbl_item_name.item_name','tbl_brand.brand_name',
                    'tbl_item_distribution.distribution_date','tbl_item_distribution.return_date', 'tbl_item_distribution.item_type', 'tbl_item_distribution.id',
                    'tbl_employee.employee_name', 'tbl_employee_department.department_name', 'tbl_item_distribution.distribution_type')
                ->get();

            $project_distribution_list = DB::table('tbl_item_distribution')
                ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->leftJoin('tbl_project', 'tbl_project.id', '=', 'tbl_item_distribution.project_id')
                ->leftJoin('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_item_distribution.department_id')
                ->where('tbl_item.id', $id)
                ->where('tbl_item_distribution.distribution_type', 'Project')
                ->select('tbl_item.*', 'tbl_item_name.item_name','tbl_project.project_name', 'tbl_brand.brand_name',
                    'tbl_item_distribution.distribution_date','tbl_item_distribution.return_date', 'tbl_item_distribution.item_type', 'tbl_item_distribution.id',
                    'tbl_item_distribution.distribution_type')
                ->get();

            $servicing_list =DB::table('tbl_servicing')
                ->select('*')
                ->where('item_id', $id)
                ->get();



            $recycle_list =DB::table('tbl_recycle')
                ->select('*')
                ->where('item_id', $id)
                ->get();




            $brand_name = DB::table('tbl_brand')
                ->select('*')
                ->where('id', $data->brand_id)
                ->first();
            $vendor_name = DB::table('tbl_vendor')
                ->select('*')
                ->where('id', $data->vendor_id)
                ->first();
            return view('report.item_report', compact('data', 'brand_name', 'vendor_name', 'distribution', 'branch_distribution_list','head_office_distribution_list','project_distribution_list','item_name','servicing_list','recycle_list', 'notice_list'));
        }

    }
