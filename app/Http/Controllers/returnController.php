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

    class returnController extends Controller
    {
        public function index()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $asset_code_list = DB::table('tbl_item')->select('*')->get();
                $region_list = DB::table('tbl_region')->select('*')->get();
                $zone_list = DB::table('tbl_zone')->select('*')->get();
                $branch_list = DB::table('tbl_branch')->select('*')->get();
                $item_list = DB::table('tbl_item_name')->select('*')->get();
                $project_list = DB::table('tbl_project')->select('*')->get();
                return view('return.index', compact('asset_code_list', 'region_list', 'item_list', 'zone_list', 'branch_list', 'project_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function branch_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->join('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                    ->join('tbl_region', 'tbl_item_distribution.region_id', '=', 'tbl_region.id')
                    ->join('tbl_zone', 'tbl_item_distribution.zone_id', '=', 'tbl_zone.id')
                    ->join('tbl_branch', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                    ->where('tbl_item_distribution.distribution_type', 'Branch')
                    ->where('tbl_item_distribution.distribution_qty', '!=', 'tbl_item_distribution.distribution_recycle_qty')
                    ->where('tbl_item_distribution.diff', '=', '')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item_distribution.id',
                        'tbl_item.asset_code', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_region.region_name', 'tbl_zone.zone_name', 'tbl_branch.branch_name', 'tbl_item_name.item_name')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('return/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Return Add</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function head_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->leftJoin('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->leftJoin('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                    ->leftJoin('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                    ->where('tbl_item_distribution.distribution_type', 'Head office ')
                    ->where('tbl_item_distribution.distribution_qty', '!=', 'tbl_item_distribution.distribution_recycle_qty')
                    ->where('tbl_item_distribution.diff', '=', '')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item.id', 'tbl_item.asset_code', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_item_distribution.id', 'tbl_employee.employee_name')
                    ->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('return/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Return Add</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function project_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->join('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                    ->join('tbl_project', 'tbl_item_distribution.project_id', '=', 'tbl_project.id')
                    ->join('tbl_branch', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                    ->where('tbl_item_distribution.distribution_type', 'Project')
                    ->where('tbl_item_distribution.distribution_qty', '!=', 'tbl_item_distribution.distribution_recycle_qty')
                    ->where('tbl_item_distribution.diff', '=', '')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item.id',
                        'tbl_item.asset_code', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_branch.branch_name', 'tbl_project.project_name', 'tbl_item_name.item_name', 'tbl_item_distribution.id')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('return/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Return Add</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function distribution_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->select('tbl_item.asset_code', 'tbl_item_distribution.*', 'tbl_brand.brand_name', 'tbl_item_name.item_name')
                    ->where('tbl_item_distribution.return_date', null)
                    ->where('tbl_item_name.fixed_asset', '1')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('return/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Return</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function return_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->select('tbl_item.asset_code', 'tbl_item_distribution.*', 'tbl_brand.brand_name', 'tbl_item_name.item_name', 'tbl_item.serial_no')
//                    ->where('tbl_item_name.fixed_asset', '1')
                    ->where('tbl_item_distribution.return_date', '!=', '')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '  <button type="submit" data-id="' . $row->id . '" id="delete_return" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function add($id)
        {
            if (Auth::check()) {

                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();

                $data = DB::table('tbl_item_distribution')
                    ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->select('tbl_item_distribution.*', 'tbl_item.asset_code')
                    ->where('tbl_item_distribution.id', $id)
                    ->first();

                $distribution = DB::table('tbl_item_distribution')
                    ->select('distribution_qty')
                    ->where('tbl_item_distribution.id', $id)
                    ->first();

//                $diff = (($distribution->distribution_qty)-($data->diff));
                if($data->diff==""){
                    $diff = (($distribution->distribution_qty)-0);
                }
                else{
//                    $diff = (($distribution->distribution_qty)-($data->return_qty));
                    $diff = (($distribution->distribution_qty) - ($data->return_qty) - ($data->distribution_recycle_qty));
                }

                $employee_info = DB::table('tbl_item_distribution')
                    ->join('tbl_employee', 'tbl_item_distribution.emp_id', '=', 'tbl_employee.id')
                    ->join('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_employee.department_id')
                    ->select( 'tbl_employee.*','tbl_employee_department.department_name')
                    ->where('tbl_item_distribution.id', $id)
                    ->first();

                $branch_info = DB::table('tbl_item_distribution')
                    ->join('tbl_branch', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                    ->join('tbl_region', 'tbl_item_distribution.region_id', '=', 'tbl_region.id')
                    ->join('tbl_zone', 'tbl_item_distribution.zone_id', '=', 'tbl_zone.id')
                    ->where('tbl_item_distribution.id', $id)
                    ->select('tbl_item_distribution.*', 'tbl_branch.branch_name', 'tbl_region.region_name', 'tbl_zone.zone_name')
                    ->first();
                $project_info = DB::table('tbl_item_distribution')
                    ->join('tbl_project', 'tbl_item_distribution.project_id', '=', 'tbl_project.id')
                    ->join('tbl_branch', 'tbl_project.branch_id', '=', 'tbl_branch.id')
                    ->where('tbl_item_distribution.id', $id)
                    ->select('tbl_item_distribution.*', 'tbl_branch.branch_name', 'tbl_project.project_name')
                    ->first();
//            dd($data);
                return view('return.add', compact('data', 'branch_info', 'employee_info', 'project_info', 'distribution', 'diff', 'notice_list'));
            } else {
                return view('signin');
            }

        }

        public function store(Request $request)
        {
//            dd($request);

            $previous_return_qty = DB::table('tbl_item_distribution')
                ->select('return_qty')
                ->where('id', '=', $request->id)
                ->first();

            $previous_diff = DB::table('tbl_item_distribution')
                ->select('diff')
                ->where('id', '=', $request->id)
                ->first();

            $distribution_recycle = DB::table('tbl_item_distribution')
                ->select('distribution_recycle_qty')
                ->where('id', '=', $request->id)
                ->first();


            $stock = DB::table('tbl_item')
                ->select('b_qty')
                ->where('id', '=', $request->item_id)
                ->first();

            if(($request->distribution_qty)!=($request->distribution_recycle_qty)){
                if ((($request->distribution_qty)-($request->distribution_recycle_qty)) < ($request->return_qty)) {
                    return response()->json(
                        [
                            'status' => 'error',
                            'message' => 'Data deleted successfully'
                        ]
                    );
                }
                else {
                    if($distribution_recycle->distribution_recycle_qty == 0){
                        DB::table('tbl_item_distribution')
                            ->where('id', $request->id)
                            ->update([
                                "return_date" => $request->return_date,
//                                "return_type" => $request->return_type,
                                "return_qty"  => (($previous_return_qty->return_qty)+($request->return_qty)),
                                "diff"  => ($request->distribution_qty)-(($request->return_qty)+($request->distribution_recycle_qty)),
                            ]);
                    }
                    else{
                        DB::table('tbl_item_distribution')
                            ->where('id', $request->id)
                            ->update([
                                "return_date" => $request->return_date,
//                                "return_type" => $request->return_type,
                                "return_qty"  => (($previous_return_qty->return_qty)+($request->return_qty)),
                                "diff"  => ($request->distribution_qty)-(($request->return_qty)+($request->distribution_recycle_qty)),
                            ]);

                    }

                    DB::table('tbl_item_return')->insert([
                        "return_date" => $request->return_date,
                        "return_type" => $request->return_type,
                        "return_qty"  => $request->return_qty,
                        "item_id"  => $request->item_id,
                        "distribution_id"  => $request->id,
                    ]);
                    if($request->return_type == "Redistribution"){
                        DB::table('tbl_item')
                            ->where('id', $request->item_id)
                            ->update([
                                "availability" => "1",
                                "distribution" => "0",
                                "b_qty" => (($stock->b_qty) + ($request->return_qty)),
                                "return_type" => $request->return_type,
                            ]);
                        return response()->json(
                            [
                                'status' => 'success',
                                'message' => 'Item Stored Successfully'
                            ]
                        );
                    }
                    else{
                        DB::table('tbl_item')
                            ->where('id', $request->item_id)
                            ->update([
//                            "availability" => "0",
                                "distribution" => "0",
//                            "b_qty" => (($stock->b_qty) + ($request->return_qty)),
                                "return_type" => $request->return_type,
                            ]);
                        return response()->json(
                            [
                                'status' => 'success',
                                'message' => 'Item Stored Successfully'
                            ]
                        );

                    }
                }
            }
            if(($request->distribution_qty)==($request->distribution_recycle_qty)){
                if (($request->distribution_qty) < ($request->return_qty)) {
                    return response()->json(
                        [
                            'status' => 'error',
                            'message' => 'Data deleted successfully'
                        ]
                    );
                }
                else {
                    if($distribution_recycle->distribution_recycle_qty == 0){
                        DB::table('tbl_item_distribution')
                            ->where('id', $request->id)
                            ->update([
                                "return_date" => $request->return_date,
//                                "return_type" => $request->return_type,
                                "return_qty"  => (($previous_return_qty->return_qty)+($request->return_qty)),
                                "diff"  => ($request->distribution_qty)-(($request->return_qty)+($request->distribution_recycle_qty)),
                            ]);
                    }
                    else{
                        DB::table('tbl_item_distribution')
                            ->where('id', $request->id)
                            ->update([
                                "return_date" => $request->return_date,
//                                "return_type" => $request->return_type,
                                "return_qty"  => (($previous_return_qty->return_qty)+($request->return_qty)),
                                "diff"  => ($request->distribution_qty)-(($request->return_qty)+($request->distribution_recycle_qty)),
                            ]);

                    }

                    DB::table('tbl_item_return')->insert([
                        "return_date" => $request->return_date,
                        "return_type" => $request->return_type,
                        "return_qty"  => $request->return_qty,
                        "item_id"  => $request->item_id,
                        "distribution_id"  => $request->id,
                    ]);
                    if($request->return_type == "Redistribution"){
                        DB::table('tbl_item')
                            ->where('id', $request->item_id)
                            ->update([
                                "availability" => "1",
                                "distribution" => "0",
                                "b_qty" => (($stock->b_qty) + ($request->return_qty)),
                                "return_type" => $request->return_type,
                            ]);
                        return response()->json(
                            [
                                'status' => 'success',
                                'message' => 'Item Stored Successfully'
                            ]
                        );
                    }
                    else{
                        DB::table('tbl_item')
                            ->where('id', $request->item_id)
                            ->update([
//                            "availability" => "0",
                                "distribution" => "0",
//                            "b_qty" => (($stock->b_qty) + ($request->return_qty)),
                                "return_type" => $request->return_type,
                            ]);
                        return response()->json(
                            [
                                'status' => 'success',
                                'message' => 'Item Stored Successfully'
                            ]
                        );

                    }
                }
            }



            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function delete(Request $request)
        {
            $item_info = DB::table('tbl_item_distribution')->where('id', $request->id)->first();
            DB::table('tbl_item_distribution')
                ->where('id', $request->id)
                ->update([
                    "return_date" => '',
                ]);
            DB::table('tbl_item')
                ->where('id', $item_info->item_id)
                ->update([
                    "availability" => "0",
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item Stored Successfully'
                ]
            );
            return response()->json(['error' => $validator->errors()->all()]);


        }
    }
