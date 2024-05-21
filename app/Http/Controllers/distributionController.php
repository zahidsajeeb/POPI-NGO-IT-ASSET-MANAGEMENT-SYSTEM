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

    class distributionController extends Controller
    {
        public function distribution()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $asset_code = DB::table('tbl_item')->select('*')->get();
                $region = DB::table('tbl_region')->select('*')->get();
                $emp_id = DB::table('tbl_employee')->select('*')->get();
                return view('distribution.index', compact('asset_code', 'emp_id', 'region', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function branch_distribution_list(Request $request)
        {
                if ($request->ajax()) {
                    $data = DB::table('tbl_item_distribution')
                        ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                        ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_name')
                        ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                        ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                        ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                        ->select('tbl_item.*', 'tbl_branch.branch_name', 'tbl_zone.zone_name', 'tbl_brand.brand_name', 'tbl_region.region_name', 'tbl_item_distribution.distribution_date', 'tbl_item_distribution.item_type', 'tbl_item_distribution.id')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="#" id="edit_distribution"   class="btn btn-sm btn-teal"   data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <a href="#" id="delete_distribution" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
        }

        public function head_office_distribution_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item_distribution.brand_id')
                    ->join('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                    ->join('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_item_distribution.department_id')
                    ->select('tbl_item.*', 'tbl_employee.employee_name', 'tbl_employee.employee_id', 'tbl_employee_department.department_name', 'tbl_brand.brand_name', 'tbl_item_distribution.distribution_date', 'tbl_item_distribution.item_type', 'tbl_item_distribution.id')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="#" id="edit_distribution"   class="btn btn-sm btn-teal"   data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete_distribution" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function branch_distribution_store(Request $request)
        {
            DB::table('tbl_item_distribution')->insert([
                "asset_code" => $request->asset_code,
                "item_id" => $request->item_id,
                "brand_id" => $request->brand_id,
                "region_id" => $request->region_id,
                "zone_id" => $request->zone_id,
                "branch_id" => $request->branch_id,
                "distribution_date" => $request->distribution_date,
                "item_type" => $request->item_type,
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item Stored Successfully'
                ]
            );
            return response()->json(['error' => $validator->errors()->all()]);


        }

        public function head_office_distribution_store(Request $request)
        {
            DB::table('tbl_item_distribution')->insert([
                "asset_code" => $request->asset_code,
                "item_id" => $request->item_id,
                "brand_id" => $request->brand_id,
                "emp_id" => $request->emp_id,
                "department_id" => $request->department_id,
                "distribution_date" => $request->distribution_date,
                "item_type" => $request->item_type,
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item Stored Successfully'
                ]
            );
            return response()->json(['error' => $validator->errors()->all()]);


        }

        public function distribution_edit($id)
        {
            $data = DB::table('tbl_item_distribution')
                ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item_distribution.brand_id')
                ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                ->where('tbl_item_distribution.id', '=', $id)
                ->select('tbl_item.*', 'tbl_brand.*', 'tbl_branch.*', 'tbl_zone.*', 'tbl_region.*', 'tbl_item_distribution.distribution_date', 'tbl_item_distribution.item_type', 'tbl_item_distribution.id')
                ->first();
            return response()->json($data);
        }

        public function distribution_update(Request $request)
        {
            $id = $request->id;
            DB::table('tbl_item_distribution')
                ->where('id', $id)
                ->update([
                    "item_id" => $request->item_id,
                    "brand_id" => $request->brand_id,
                    "region_id" => $request->region_id,
                    "zone_id" => $request->zone_id,
                    "branch_id" => $request->branch_id,
                    "distribution_date" => $request->distribution_date,
                    "item_type" => $request->item_type,
                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Branch Updated Successfully'
                ]
            );
        }

        public function distribution_delete($id)
        {
            DB::table('tbl_item_distribution')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Region deleted successfully'
                ]
            );
        }


        public function fetch_item_name(Request $request)
        {
            $data['item_name'] = DB::table('tbl_item')
                ->where('id', $request->asset_code)
                ->get(["item_name", "item_name", "id"]);
            return response()->json($data);
        }

        public function fetch_brand_name(Request $request)
        {
            $data['brand_name'] = DB::table('tbl_item')
                ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_name')
                ->select('tbl_brand.brand_name', 'tbl_brand.id')
                ->where('tbl_item.id', $request->asset_code)
                ->get(["brand_name", "brand_name", "id"]);
            return response()->json($data);
        }

        public function fetch_zone_name(Request $request)
        {
            $data['zone_name'] = DB::table('tbl_zone')
                ->where('region_name', $request->id)
                ->get(["zone_name", "zone_name", "id"]);

            return response()->json($data);
        }

        public function fetch_branch_name(Request $request)
        {
            $data['branch_name'] = DB::table('tbl_branch')
                ->where('zone_id', $request->id)
                ->where('status',1)
                ->get(["branch_name", "branch_name", "id"]);
            return response()->json($data);
        }

        public function fetch_project_branch_name(Request $request)
        {
            $data['branch_name'] = DB::table('tbl_project')
                ->join('tbl_branch','tbl_branch.id','=','tbl_project.branch_id')
                ->where('tbl_project.id', $request->id)
                ->get(["tbl_branch.branch_name", "tbl_branch.branch_name", "tbl_branch.id"]);
//            dd($data);
            return response()->json($data);
        }


        public function fetch_emp_name(Request $request)
        {
            $data['employee_name'] = DB::table('tbl_employee')
                ->where('id', $request->id)
                ->get(["employee_name", "employee_name", "id"]);
            return response()->json($data);
        }

        public function fetch_dept_name(Request $request)
        {
            $data['department_name'] = DB::table('tbl_employee')
                ->join('tbl_employee_department', 'tbl_employee.department_id', '=', 'tbl_employee_department.id')
                ->select('tbl_employee_department.department_name', 'tbl_employee_department.id')
                ->where('tbl_employee.id', $request->id)
                ->get(["department_name", "department_name", "tbl_employee_department.id"]);
            return response()->json($data);
        }

        public function fetch_emp_id(Request $request)
        {
            $data['employee_id'] = DB::table('tbl_employee')
                ->where('id', $request->id)
                ->get(["employee_id", "employee_id", "id"]);
            return response()->json($data);
        }


        public function branch_history()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $region_list = DB::table('tbl_region')->select('*')->get();
                $zone_list = DB::table('tbl_zone')->select('*')->get();
                $branch_list = DB::table('tbl_branch')->select('*')->get();
                $distribution_list = DB::table('tbl_item_distribution')
                    ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                    ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                    ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                    ->where('tbl_item_distribution.distribution_type','Branch')
                    ->select('tbl_item.*', 'tbl_item_distribution.*','tbl_item_name.item_name','tbl_branch.branch_name', 'tbl_zone.zone_name', 'tbl_brand.brand_name', 'tbl_region.region_name')
                    ->get();
                return view('distribution.branch_history',compact('region_list','zone_list','branch_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }
        public function head_office_history()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $emp_list = DB::table('tbl_employee')->select('*')->get();
                $emp_dept_list = DB::table('tbl_employee_department')->select('*')->get();
                return view('distribution.head_office_history', compact('emp_list','emp_dept_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }
        public function project_history()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $project_list = DB::table('tbl_project')->select('*')->get();
//                $branch_list = DB::table('tbl_branch')->select('*')->get();
                return view('distribution.project_history',compact('project_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function branch_history_list(Request $request)
        {
            if(Auth::user()->role==='Admin' || Auth::user()->role==='Superadmin'){
                if ($request->ajax()){
                    $data = DB::table('tbl_item_distribution')
                        ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                        ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                        ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                        ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                        ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                        ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                        ->where('tbl_item_distribution.distribution_type','=', 'Branch')
                        ->where('tbl_item.recycle', '=', 0)
                        ->where('tbl_item_distribution.diff', '!=', '0')
                        ->select('tbl_item.*', 'tbl_item_distribution.*','tbl_item_name.item_name','tbl_branch.branch_name', 'tbl_branch.phone', 'tbl_zone.zone_name', 'tbl_brand.brand_name', 'tbl_region.region_name')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('balance', function ($row) {
                            $row_one = $row->distribution_qty;
                            $row_two = $row->return_qty;
                            $row_three = $row->distribution_recycle_qty;
                            if($row->return_qty==""){
                                $result  = $row_one-0-$row_three;
                            }
                            else{
                                $result  = $row_one-$row_two-$row_three;
                            }
                            return $result;
                        })
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('branch_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        })
                        ->rawColumns(['action','balance'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='IT officer'){
                $user_name = Auth::user()->name;
                if ($request->ajax()){
                    $data = DB::table('tbl_item_distribution')
                        ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                        ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                        ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                        ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                        ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                        ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                        ->join('user_region', 'user_region.region_id', '=', 'tbl_item_distribution.region_id')
                        ->where('tbl_item_distribution.distribution_type','=', 'Branch')
                        ->where('tbl_item.recycle', '=', 0)
                        ->where('tbl_item_distribution.diff', '!=', '0')
                        ->where('user_region.user_name','=',$user_name)
                        ->select('tbl_item.*', 'tbl_item_distribution.*','tbl_item_name.item_name','tbl_branch.branch_name', 'tbl_branch.phone', 'tbl_zone.zone_name', 'tbl_brand.brand_name', 'tbl_region.region_name')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('balance', function ($row) {
                            $row_one = $row->distribution_qty;
                            $row_two = $row->return_qty;
                            $row_three = $row->distribution_recycle_qty;
                            if($row->return_qty==""){
                                $result  = $row_one-0-$row_three;
                            }
                            else{
                                $result  = $row_one-$row_two-$row_three;
                            }
                            return $result;
                        })
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('branch_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        })
                        ->rawColumns(['action','balance'])
                        ->make(true);
                }
            }

        }
        public function head_office_history_list(Request $request)
        {
            if ($request->ajax()){
                $data = DB::table('tbl_item_distribution')
                    ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                    ->join('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_employee.department_id')
                    ->where('tbl_item_distribution.distribution_type','Head office')
                    ->where('tbl_item_distribution.diff', '!=', '0')
                    ->where('tbl_item.recycle', '=', 0)
                    ->whereColumn('tbl_item_distribution.distribution_qty', '!=', 'tbl_item_distribution.distribution_recycle_qty')
                    ->select('tbl_item.*', 'tbl_brand.brand_name', 'tbl_item_distribution.*',
                        'tbl_employee.employee_name','tbl_employee.employee_id','tbl_item_name.item_name','tbl_employee_department.department_name')
                    ->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('balance', function ($row) {
                        $row_one = $row->distribution_qty;
                        $row_two = $row->return_qty;
                        $row_three = $row->distribution_recycle_qty;
                        if($row->return_qty==""){
                            $result  = $row_one-0-$row_three;
                        }
                        else{
                            $result  = $row_one-$row_two-$row_three;
                        }
                        return $result;
                    })
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('branch_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
        public function project_history_list(Request $request)
        {
            if ($request->ajax()){
                $data = DB::table('tbl_item_distribution')
                    ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_project', 'tbl_project.id', '=', 'tbl_item_distribution.project_id')
                    ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                    ->where('tbl_item_distribution.distribution_type','Project')
                    ->where('tbl_item.recycle', '=', 0)
                    ->where('tbl_item_distribution.diff', '!=', '0')
                    ->select('tbl_item.*', 'tbl_item_distribution.*','tbl_item_name.item_name','tbl_branch.branch_name', 'tbl_project.project_name', 'tbl_brand.brand_name')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('balance', function ($row) {
                        $row_one = $row->distribution_qty;
                        $row_two = $row->return_qty;
                        $row_three = $row->distribution_recycle_qty;
                        if($row->return_qty==""){
                            $result  = $row_one-0-$row_three;
                        }
                        else{
                            $result  = $row_one-$row_two-$row_three;
                        }
                        return $result;
                    })
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('branch_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }


        public function fetch_search_zone_name(Request $request)
        {
            $data['zone_name'] = DB::table('tbl_region')
                ->join('tbl_zone','tbl_zone.region_name','=','tbl_region.id')
                ->where('tbl_region.region_name', $request->id)
                ->get(["tbl_zone.zone_name", "tbl_zone.zone_name", "tbl_zone.zone_name"]);

            return response()->json($data);
        }
        public function fetch_search_branch_name(Request $request)
        {
            $data['branch_name'] = DB::table('tbl_zone')
                ->join('tbl_branch','tbl_branch.zone_id','=','tbl_zone.id')
                ->where('tbl_zone.zone_name', $request->id)
                ->where('tbl_branch.status','=','1')
                ->get(["tbl_branch.branch_name", "tbl_branch.branch_name", "tbl_branch.id"]);
            return response()->json($data);
        }


        public function fetch_project_search_branch_name(Request $request)
        {
            $data['branch_name'] = DB::table('tbl_project')
                ->join('tbl_branch','tbl_branch.id','=','tbl_project.branch_id')
                ->where('tbl_project.project_name', $request->id)
                ->get(["tbl_branch.branch_name", "tbl_branch.branch_name", "tbl_branch.id"]);
            return response()->json($data);
        }

        public function fetch_related_zone_name(Request $request)
        {
            $data['zone_name'] = DB::table('tbl_region')
                ->join('tbl_zone','tbl_zone.region_name','=','tbl_region.id')
                ->where('tbl_region.id', $request->id)
                ->get(["tbl_zone.zone_name", "tbl_zone.zone_name", "tbl_zone.id"]);

            return response()->json($data);
        }

        public function fetch_search_emp_id(Request $request)
        {
            $data['employee_id'] = DB::table('tbl_employee')
                ->where('employee_name', $request->id)
                ->get(["employee_id", "employee_id", "employee_id"]);
            return response()->json($data);
        }
        public function fetch_search_emp_dept(Request $request)
        {
            $data['department_name'] = DB::table('tbl_employee')
                ->join('tbl_employee_department','tbl_employee_department.id','=','tbl_employee.department_id')
                ->where('tbl_employee.employee_name', $request->id)
                ->get(["department_name", "department_name", "department_name"]);
            return response()->json($data);
        }
        public function fetch_search_brand_name(Request $request)
        {
            $data['brand_name'] = DB::table('tbl_item')
                ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                ->groupBy('tbl_item.brand_id')
                ->select('tbl_brand.brand_name')
                ->where('tbl_item_name.item_name', $request->id)
                ->get(["brand_name", "brand_name", "brand_name"]);
            return response()->json($data);
        }
        public function fetch_search_vendor_name(Request $request)
        {
            $data['vendor_name'] = DB::table('tbl_item')
                ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                ->groupBy('tbl_item.vendor_id')
                ->select('tbl_vendor.vendor_name')
                ->where('tbl_item_name.item_name', $request->id)
                ->get(["vendor_name", "vendor_name", "vendor_name"]);
            return response()->json($data);
        }
        public function fetch_search_p_branch_name(Request $request)
        {
            $data['branch_name'] = DB::table('tbl_project')
                ->join('tbl_branch','tbl_branch.id','=','tbl_project.branch_id')
                ->where('tbl_project.project_name', $request->id)
                ->get(["branch_name", "branch_name", "branch_name"]);
            return response()->json($data);
        }

    }
