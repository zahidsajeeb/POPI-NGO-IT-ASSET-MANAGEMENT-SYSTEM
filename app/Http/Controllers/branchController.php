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

    class branchController extends Controller
    {
        //{{===================Branch Section======================
        public function branch()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $region_list = DB::table('tbl_region')->select('*')->get();
                $zone_list = DB::table('tbl_zone')->select('*')->get();
                return view('branch.index', compact('region_list', 'zone_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function branch_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_branch')
                    ->join('tbl_region', 'tbl_branch.region_id', '=', 'tbl_region.id')
                    ->join('tbl_zone', 'tbl_branch.zone_id', '=', 'tbl_zone.id')
                    ->join('tbl_employee', 'tbl_employee.employee_id', '=', 'tbl_branch.created_by')
                    ->select('tbl_zone.*', 'tbl_region.*', 'tbl_branch.branch_name', 'tbl_branch.id', 'tbl_branch.note', 'tbl_branch.phone', 'tbl_employee.employee_name','tbl_branch.status','tbl_branch.closing_date','tbl_branch.closing_reason')
                    ->orderBy('tbl_branch.id', 'desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $check = DB::table('tbl_branch')
                            ->join('tbl_item_distribution', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                            ->where('tbl_item_distribution.distribution_type', '=', 'Branch')
                            ->where('tbl_item_distribution.diff', '=', '')
                            ->where('tbl_item_distribution.branch_id', '=', $row->id)
                            ->select(DB::raw('count(tbl_item_distribution.id) as count'))
                            ->first();
                        if ($row->status == '1') {
                            if ($check->count == 0) {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_branch" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="' . url('add_branch_transfer', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-envelope"></i> Transfaring</a>
                           <a href="javascript:void(0)" data-id="' . $row->id . '" id="close_branch" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-close"></i> Close</a>
                            <button type="submit" data-id="' . $row->id . '" id="delete_branch" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            } else {
                                $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_branch" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="' . url('add_branch_transfer', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-envelope"></i> Transfaring</a>
                           <button title="Some items exists in this branch" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-close"></i> Close</button>
                            <button type="submit" data-id="' . $row->id . '" id="delete_branch" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }

                        }
                        if ($row->status == '0') {
                            $btn = '<a style="color:darkred;font-size:20px;font-weight:bold;border: 1px solid; padding: 5px;"> Branch Close  </a>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function branch_store(Request $request)
        {
            $user_id = Auth::user()->user_name;
            $validator = Validator::make($request->all(), [
                "branch_name" => 'required|unique:tbl_branch,branch_name',
            ]);
            if ($validator->passes()) {
                DB::table('tbl_branch')->insert([
                    "branch_name" => $request->branch_name,
                    "region_id" => $request->region_id,
                    "zone_id" => $request->zone_id,
                    "phone" => $request->phone,
                    "created_by" => $user_id,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Branch Stored Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function branch_edit($id)
        {
            $data = DB::table('tbl_branch')->where('id', '=', $id)->first();
            $zone_list = DB::table('tbl_zone')->where('region_name', '=', $data->region_id)->first();
            return response()->json($data);
        }

        public function branch_update(Request $request)
        {
            $id = $request->id;
            DB::table('tbl_branch')
                ->where('id', $id)
                ->update([
                    "branch_name" => $request->branch_name,
                    "region_id" => $request->region_id,
                    "zone_id" => $request->zone_id,
                    "phone" => $request->phone,
                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Branch Updated Successfully'
                ]
            );
        }

        public function add_branch_transfer($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $data = DB::table('tbl_branch')->where('id', '=', $id)->first();
            $zone_list = DB::table('tbl_zone')
                ->where('region_name', '=', $data->region_id)
                ->get();
            $region_name = DB::table('tbl_region')->where('id', '=', $data->region_id)->first();

            return view('branch.modal.transfer.add', compact('data','zone_list','region_name', 'notice_list'));
        }

        public function branch_transfer(Request $request)
        {
            $id = $request->id;
            $distributon_check = DB::table('tbl_item_distribution')
                ->select('*')
                ->where('distribution_type', 'Branch')
                ->where('branch_id', $id)
                ->where('diff', '!=', '0')
                ->get();
            DB::table('tbl_branch')
                ->where('id', $id)
                ->update([
                    "previous_branch_name" => $request->previous_branch_name,
                    "branch_name" => $request->branch_name,
                    "region_id" => $request->region_id,
                    "zone_id" => $request->zone_id,
                    "note" => $request->note,
                ]);

            if($distributon_check){
                foreach ($distributon_check as $row){
                    DB::table('tbl_item_distribution')
                        ->where('branch_id', $id)
                        ->where('diff','!=', '0')
                        ->update([
                            "zone_id" => $request->zone_id,
                            "region_id" => $request->region_id,
                        ]);
                    DB::table('tbl_old_item_distribution')->insert([
                        "zone_id" => $request->zone_id,
                        "region_id" => $request->region_id,
                        "branch_id" => $id,
                        "distribution_id" => $row->id,
                        "brand_id" => $row->brand_id,
                        "distribution_qty" => $row->distribution_qty,
                    ]);
                }
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Branch Updated Successfully'
                ]
            );
        }

        public function branch_delete($id)
        {
            $branch_check = DB::table('tbl_item_distribution')->where('branch_id', '=', $id)->count();
            if ($branch_check == 1) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if ($branch_check == 0) {
                DB::table('tbl_branch')->where('id', '=', $id)->delete();
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
        }

        public function branch_close(Request $request)
        {
            $id = $request->id;
            DB::table('tbl_branch')
                ->where('id', $id)
                ->update([
                    "closing_date"   => $request->closing_date,
                    "closing_reason" => $request->closing_reason,
                    "status"         => '0',
                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Branch Updated Successfully'
                ]
            );
        }

        //{{===================Region Section======================
        public function region_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_region')
                    ->join('tbl_employee', 'tbl_employee.employee_id', '=', 'tbl_region.created_by')
                    ->select('tbl_region.*', 'tbl_employee.employee_name')
                    ->orderBy('tbl_region.id', 'desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('edit', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_region" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->addColumn('delete', function ($row) {
                        $btn = '<button type="submit" data-id="' . $row->id . '" id="delete_region" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['edit', 'delete'])
                    ->make(true);
            }
        }

        public function region_store(Request $request)
        {
            $user_id = Auth::user()->user_name;
            $validator = Validator::make($request->all(), [
                "region_name" => 'required|unique:tbl_region,region_name',
            ]);
            if ($validator->passes()) {
                DB::table('tbl_region')->insert([
                    "region_name" => $request->region_name,
                    "created_by" => $user_id,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Region Stored Successfully'
                    ]
                );
            }

            return response()->json(['error' => $validator->errors()->all()]);


        }

        public function region_edit($id)
        {
            $data = DB::table('tbl_region')->where('id', '=', $id)->first();
            return response()->json($data);
        }

        public function region_update(Request $request)
        {
            $id = $request->id;
            if (!isset($request->image)) {
                DB::table('tbl_region')
                    ->where('id', $id)
                    ->update([
                        "region_name" => $request->region_name,
                    ]);
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Region Updated Successfully'
                ]
            );
        }

        public function region_delete($id)
        {
            $region_check = DB::table('tbl_branch')->where('region_id', '=', $id)->count();
            if ($region_check == 1) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if ($region_check == 0) {
                DB::table('tbl_region')->where('id', '=', $id)->delete();
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
        }

        //{{===================Zone Section======================
        public function zone_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_zone')
                    ->join('tbl_region', 'tbl_zone.region_name', '=', 'tbl_region.id')
                    ->join('tbl_employee', 'tbl_employee.employee_id', '=', 'tbl_zone.created_by')
                    ->select('tbl_zone.*', 'tbl_region.region_name', 'tbl_employee.employee_name')
                    ->orderBy('tbl_zone.id', 'desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('edit', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_zone" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->addColumn('delete', function ($row) {
                        $btn = '<button type="submit" data-id="' . $row->id . '" id="delete_zone" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['edit', 'delete'])
                    ->make(true);
            }
        }

        public function zone_store(Request $request)
        {
            $user_id = Auth::user()->user_name;
            $validator = Validator::make($request->all(), [
                "zone_name" => 'required|unique:tbl_zone,zone_name',
            ]);
            if ($validator->passes()) {
                DB::table('tbl_zone')->insert([
                    "zone_name" => $request->zone_name,
                    "region_name" => $request->region_name,
                    "created_by" => $user_id,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Zone Stored Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function zone_edit($id)
        {
//        $data = DB::table('tbl_zone')
//            ->join('tbl_region', 'tbl_zone.region_name', '=', 'tbl_region.id')
//            ->select('tbl_zone.*', 'tbl_region.region_name', 'tbl_region.id')
//            ->where('tbl_zone.id', '=', $id)
//            ->first();

            $data = DB::table('tbl_zone')->where('id', '=', $id)->first();
            return response()->json($data);
        }

        public function zone_update(Request $request)
        {
            $id = $request->id;
            if (!isset($request->image)) {
                DB::table('tbl_zone')
                    ->where('id', $id)
                    ->update([
                        "zone_name" => $request->zone_name,
                        "region_name" => $request->region_name,
                    ]);
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Zone Updated Successfully'
                ]
            );
        }

        public function zone_delete($id)
        {
            $zone_check = DB::table('tbl_branch')->where('zone_id', '=', $id)->count();
            if ($zone_check == 1) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if ($zone_check == 0) {
                DB::table('tbl_zone')->where('id', '=', $id)->delete();
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
        }

    }
