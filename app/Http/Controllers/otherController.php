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

    class otherController extends Controller
    {
//======================{{Toner Purchase Section}}======================
        public function toner_purchase()
        {
            if (Auth::check()) {
//            $fixed_asset_item_name_list = DB::table('tbl_item_name')->select('*')->where('fixed_asset','1')->get();
//            $non_fixed_asset_item_name_list = DB::table('tbl_item_name')->select('*')->where('fixed_asset','0')->get();
//            $brand_list = DB::table('tbl_brand')->select('*')->get();
//            $vendor_list = DB::table('tbl_vendor')->select('*')->get();
//            $count = DB::table('tbl_item')->select('*')->count();
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $branch_list = DB::table('tbl_branch')->select('branch_name')->get();
                $region_list = DB::table('tbl_region')->select('*')->get();
                return view('other.toner_purchase', compact('branch_list','region_list', 'notice_list'));
            } else {
                return view('signin');
            }

        }

        public function toner_purchase_store(Request $request)
        {
            $user_id = Auth::user()->user_name;
            $validator = Validator::make($request->all(), [
                // "vendor_name" => 'required',
            ]);
            $region_name = DB::table('tbl_region')->select('region_name')->where('id','=',$request->region_name)->first();
            $zone_name   = DB::table('tbl_zone')->select('zone_name')->where('id','=',$request->zone_name)->first();
            if ($validator->passes()) {
                DB::table('tbl_toner_purchase')->insert([
                    "requester_name" => $request->requester_name,
                    "designation" => $request->designation,
                    "branch_name" => $request->branch_name,
                    "region_name" => $region_name->region_name,
                    "zone_name" => $zone_name->zone_name,
                    "item_model" => $request->item_model,
                    "request_date" => $request->request_date,
                    "required_date" => $request->required_date,
                    "qty" => $request->qty,
                    "price" => $request->price,
                    "price_word" => $request->price_word,
                    "created_by" => $user_id,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Toner Purchase Stored Successfully !!!'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function toner_purchase_list(Request $request)
        {
            if ($request->ajax()) {
                $user_id = Auth::user()->user_name;
                $user_role = Auth::user()->role;
                if($user_role=='Admin'){
                    $data = DB::table('tbl_toner_purchase')
                        ->select('*')
                        ->orderBy('id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('toner_purchase_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                            <button type="submit" data-id="' . $row->id . '" id="delete_toner" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
                else{
                    $data = DB::table('tbl_toner_purchase')
                        ->select('*')
                        ->where('created_by','=',$user_id)
                        ->orderBy('id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('toner_purchase_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                            <button type="submit" data-id="' . $row->id . '" id="delete_toner" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }
        }

        public function toner_purchase_show($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $user_id = Auth::user()->user_name;
            $user_info = DB::table('tbl_employee')
                ->join('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_employee.department_id')
                ->select('tbl_employee.*', 'tbl_employee_department.*')
                ->where('tbl_employee.employee_id', $user_id)
                ->first();

            $data = DB::table('tbl_toner_purchase')
                ->select('*')
                ->where('id', $id)
                ->first();
            return view('other.toner_purchase_show', compact('data', 'user_info', 'notice_list'));
        }

        public function toner_purchase_delete($id)
        {
            DB::table('tbl_toner_purchase')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Toner Purchase Deleted Successfully . . .'
                ]
            );
        }

//======================{{Purchase Section}}======================
        public function purchase_request()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $region_list = DB::table('tbl_region')->select('*')->get();
//            $fixed_asset_item_name_list = DB::table('tbl_item_name')->select('*')->where('fixed_asset','1')->get();
//            $non_fixed_asset_item_name_list = DB::table('tbl_item_name')->select('*')->where('fixed_asset','0')->get();
//            $brand_list = DB::table('tbl_brand')->select('*')->get();
                $branch_list = DB::table('tbl_branch')->select('*')->get();
//            $count = DB::table('tbl_item')->select('*')->count();
                $last_serial_no = DB::table('tbl_purchase_request')
                    ->select('id')
                    ->orderBy('id', 'desc')
                    ->first();
                return view('other.purchase_request', compact('last_serial_no', 'branch_list', 'notice_list', 'region_list'));
            } else {
                return view('signin');
            }

        }

        public function purchase_request_store(Request $request)
        {
            $region_name = DB::table('tbl_region')->select('region_name')->where('id','=',$request->region_id)->first();
            $user_id = Auth::user()->user_name;
            $validator = Validator::make($request->all(), [
//                "vendor_name" => 'required',
            ]);
            if ($validator->passes()) {
                $last_serial_no = DB::table('tbl_purchase_request')
                    ->select('id')
                    ->orderBy('id', 'desc')
                    ->first();
                $serial_no = $last_serial_no->id + 1;

                if (($request->request_date) > ($request->required_date)) {
                    return response()->json(
                        [
                            'status' => 'error',
                            'message' => 'Data deleted successfully'
                        ]
                    );
                }
                if (($request->request_date) < ($request->required_date)) {
                    DB::table('tbl_purchase_request')->insert([
                        "serial_no" => "serial-" . $serial_no,
                        "requester_name" => $request->requester_name,
                        "branch_id" => $request->branch_id,
                        "region_id" => $region_name->region_name,
                        "region" => $request->region_id,
                        "designation" => $request->designation,
                        "value_in_word" => $request->value_in_word,
                        "request_date" => $request->request_date,
                        "required_date" => $request->required_date,
                        "created_by" => $user_id,
                    ]);
                    foreach ($request->addmore as $key => $value) {
                        DB::table('tbl_purchase_request_item')->insert([
                            "serial_no" => "serial-" . $serial_no,
                            "particulars" => $value['particulars'],
                            "purpose" => $value['purpose'],
                            "qty" => $value['qty'],
                            "approx_value" => $value['approx_value'],
                        ]);
                    }
                    return response()->json(
                        [
                            'status' => 'success',
                            'message' => 'Purchase Request Stored Successfully'
                        ]
                    );
                }
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function purchase_request_list(Request $request)
        {
            if ($request->ajax()) {
                $user_id = Auth::user()->user_name;
                $user_role = Auth::user()->role;
                if($user_role=='Admin'){
                    $data = DB::table('tbl_purchase_request')
                        ->select('*')
                        ->where('serial_no', '<>', '')
                        ->orderBy('id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('purchase_request_edit', $row->serial_no) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="' . url('purchase_request_show', $row->serial_no) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                                <button type="submit" data-id="' . $row->serial_no . '" id="delete_purchase" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
                else{
                    $data = DB::table('tbl_purchase_request')
                        ->select('*')
                        ->where('serial_no', '<>', '')
                        ->where('created_by','=',$user_id)
                        ->orderBy('id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('purchase_request_show', $row->serial_no) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                                <button type="submit" data-id="' . $row->serial_no . '" id="delete_purchase" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }
        }

        public function purchase_request_show($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $user_id = Auth::user()->user_name;
            $user_info = DB::table('tbl_employee')
                ->join('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_employee.department_id')
                ->select('tbl_employee.*', 'tbl_employee_department.*')
                ->where('tbl_employee.employee_id', $user_id)
                ->first();
            $data = DB::table('tbl_purchase_request')
                ->select('*')
                ->where('serial_no', $id)
                ->first();
            $items = DB::table('tbl_purchase_request_item')
                ->select('*')
                ->where('serial_no', $id)
                ->get();
            $total_qty = DB::table('tbl_purchase_request_item')
                ->select('qty', DB::raw('SUM(qty) AS qty'))
                ->where('serial_no', $id)
                ->first();
            $total_apox = DB::table('tbl_purchase_request_item')
                ->select('approx_value', DB::raw('SUM(approx_value) AS approx_value'))
                ->where('serial_no', $id)
                ->first();
            return view('other.purchase_request_show', compact('data', 'items', 'user_info', 'total_qty', 'total_apox', 'notice_list'));
        }

        public function purchase_request_edit($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $branch_list = DB::table('tbl_branch')->select('*')->get();
            $region_list = DB::table('tbl_region')->select('*')->get();
            $data = DB::table('tbl_purchase_request')
                ->select('*')
                ->where('serial_no', $id)
                ->first();
            $items = DB::table('tbl_purchase_request_item')
                ->select('*')
                ->where('serial_no', $id)
                ->get();
            return view('other.purchase_request_edit', compact('data', 'items', 'branch_list', 'region_list', 'notice_list'));
        }
        public function purchase_request_update(Request $request)
        {
            $region_name = DB::table('tbl_region')->select('region_name')->where('id','=',$request->region_id)->first();
            $id = $request->id;
            $scores = $request->input('edit_addmore');
            foreach ($scores as $value) {
                DB::table('tbl_purchase_request_item')->where('id', $value['id'])->update([
                    "particulars" => $value['particulars'],
                    "purpose" => $value['purpose'],
                    "qty" => $value['qty'],
                    "approx_value" => $value['approx_value'],
                ]);
            }
            DB::table('tbl_purchase_request')
                ->where('id', $id)
                ->update([
                    "requester_name" => $request->requester_name,
                    "branch_id" => $request->branch_id,
                    "region_id" => $region_name->region_name,
                    "region" => $request->region_id,
                    "designation" => $request->designation,
                    "value_in_word" => $request->value_in_word,
                    "request_date" => $request->request_date,
                    "required_date" => $request->required_date,
                ]);

            if ($request->addmore == true) {
                foreach ($request->addmore as $key => $value) {
                    DB::table('tbl_purchase_request_item')->insert([
                        "serial_no" => $request->serial_no,
                        "particulars" => $value['particulars'],
                        "purpose" => $value['purpose'],
                        "qty" => $value['qty'],
                        "approx_value" => $value['approx_value'],
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

        public function purchase_request_delete($id)
        {
            DB::table('tbl_purchase_request')->where('serial_no', '=', $id)->delete();
            DB::table('tbl_purchase_request_item')->where('serial_no', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Purchase Request Deleted Successfully !!!!!!!!!!'
                ]
            );
        }
        public function pr_item_delete($id)
        {
            DB::table('tbl_purchase_request_item')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee designation deleted successfully !!!!!!!!!!'
                ]
            );
        }

        public function fetch_pr_branch_name(Request $request)
        {
            $data['branch_name'] = DB::table('tbl_branch')
                ->where('region_id', $request->id)
                ->get(["branch_name", "branch_name", "id"]);
            return response()->json($data);
        }

        //======================{{Branch/Project Visiting Section}}======================
        public function visiting_working_info()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
//            $fixed_asset_item_name_list = DB::table('tbl_item_name')->select('*')->where('fixed_asset','1')->get();
//            $non_fixed_asset_item_name_list = DB::table('tbl_item_name')->select('*')->where('fixed_asset','0')->get();
            $branch_list = DB::table('tbl_branch')->select('branch_name')->get();
            $zone_list = DB::table('tbl_zone')->select('zone_name')->get();
            $region_list = DB::table('tbl_region')->select('region_name')->get();
//            $count = DB::table('tbl_item')->select('*')->count();
                return view('other.visiting_working_info', compact('branch_list','zone_list', 'region_list', 'notice_list'));
            } else {
                return view('signin');
            }

        }

        public function visiting_working_info_list(Request $request)
        {
            if ($request->ajax()) {
                $user_id = Auth::user()->user_name;
                $user_role = Auth::user()->role;
                if($user_role=='Admin'){
                    $data = DB::table('tbl_visiting_working')
                        ->select('*')
                        ->orderBy('id', 'DESC')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->ending_time == '') {
                                $btn = '<a href="' . url('visiting_working_info_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                               <button type="submit" data-id="' . $row->id . '" id="job_done" class="btn btn-sm btn-teal" style="border-radius:0px;"><i class="icon-check"></i> Job Done</button>
                                <button type="submit" data-id="' . $row->id . '" id="delete" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            } else {
                                $btn = '<a href="' . url('visiting_working_info_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }

                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
                else{
                    $data = DB::table('tbl_visiting_working')
                        ->select('*')
                        ->where('created_by','=',$user_id)
                        ->orderBy('id', 'DESC')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            if ($row->ending_time == '') {
                                $btn = '<a href="' . url('visiting_working_info_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                               <button type="submit" data-id="' . $row->id . '" id="job_done" class="btn btn-sm btn-teal" style="border-radius:0px;"><i class="icon-check"></i> Job Done</button>
                                <button type="submit" data-id="' . $row->id . '" id="delete" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            } else {
                                $btn = '<a href="' . url('visiting_working_info_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                                return $btn;
                            }

                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }

            }
        }

        public function visiting_working_info_store(Request $request)
        {
            $user_id = Auth::user()->user_name;
            $validator = Validator::make($request->all(), [
//            "vendor_name" => 'required',
            ]);
            if ($validator->passes()) {
                date_default_timezone_set('asia/dhaka');
                $starting_time = date('Y-m-d h:i:sa');

                DB::table('tbl_visiting_working')->insert([
                    "present_info_type" => $request->present_info_type,
                    "name" => $request->name,
                    "user_name" => $request->user_name,
                    "zone_name" => $request->zone_name,
                    "region_name" => $request->region_name,
                    "designation" => $request->designation,
                    "cell_number" => $request->cell_number,
                    "d_s_name" => $request->d_s_name,
                    "service_req" => $request->service_req,
                    "d_s_status_before" => $request->d_s_status_before,
                    "d_s_status_after" => $request->d_s_status_after,
                    "visiting_start_date" => $request->visiting_start_date,
                    "visiting_end_date" => $request->visiting_end_date,

                    "visiting_start_time" => $request->visiting_start_time,
                    "visiting_end_time" => $request->visiting_end_time,
                    "visiting_night_hold" => $request->visiting_night_hold,

                    "it_comment" => $request->it_comment,
                    "user_comment" => $request->user_comment,

                    "starting_time" => $starting_time,
                    "created_by" => $user_id,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Toner Purchase Stored Successfully !!!'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function visiting_working_info_show($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $user_id = Auth::user()->user_name;
            $user_info = DB::table('tbl_employee')
                ->join('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_employee.department_id')
                ->select('tbl_employee.*', 'tbl_employee_department.*')
                ->where('tbl_employee.employee_id', $user_id)
                ->first();

            $data = DB::table('tbl_visiting_working')
                ->select('*')
                ->where('id', $id)
                ->first();
            return view('other.visiting_working_info_show', compact('data', 'user_info', 'notice_list'));
        }

        public function visiting_working_info_delete($id)
        {
            DB::table('tbl_visiting_working')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Purchase Request Deleted Successfully !!!!!!!!!!'
                ]
            );
        }

        public function visiting_working_info_update($id)
        {
            date_default_timezone_set('asia/dhaka');
            $ending_time = date('Y-m-d h:i:sa');
            DB::table('tbl_visiting_working')
                ->where('id', $id)
                ->update([
                    "ending_time" => $ending_time,
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Purchase Request Update Successfully !!!!!!!!!!'
                ]
            );
        }

        //======================{{Asset Received Section}}======================
        public function asset_received()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $last_serial_no = DB::table('tbl_asset_received')
                    ->select('id')
                    ->orderBy('id', 'desc')
                    ->first();
                $branch_list = DB::table('tbl_branch')->select('branch_name')->get();
                $zone_list = DB::table('tbl_zone')->select('zone_name')->get();
                $region_list = DB::table('tbl_region')->select('region_name')->get();
                return view('asset_received.index', compact('last_serial_no','branch_list','zone_list','region_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

       public function asset_received_list(Request $request)
        {
            $user_id = Auth::user()->user_name;
            $user_role = Auth::user()->role;
            if ($user_role == 'Admin') {
                if ($request->ajax()) {
                    $data = DB::table('tbl_asset_received')
                        ->select('*')
                        ->where('serial_no', '<>', '')
                        ->orderBy('id', 'DESC')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('asset_received_edit', $row->serial_no) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <a href="' . url('asset_received_show', $row->serial_no) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                                <button type="submit" data-id="' . $row->serial_no . '" id="delete_gatepass" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }
            else {
                if ($request->ajax()) {
                    $data = DB::table('tbl_asset_received')
                        ->select('*')
                        ->where('serial_no', '<>', '')
                        ->where('created_by', '=', $user_id)
                        ->orderBy('id', 'DESC')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('asset_received_edit', $row->serial_no) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <a href="' . url('asset_received_show', $row->serial_no) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                                <button type="submit" data-id="' . $row->serial_no . '" id="delete_gatepass" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
            }
        }

        public function asset_received_store(Request $request)
        {
            $user_id = Auth::user()->user_name;
            $validator = Validator::make($request->all(), [
                // "vendor_name" => 'required',
            ]);
            if ($validator->passes()) {
                $last_serial_no = DB::table('tbl_asset_received')
                    ->select('id')
                    ->orderBy('id', 'desc')
                    ->first();
                $serial_no = $last_serial_no->id + 1;
                DB::table('tbl_asset_received')->insert([
                    "serial_no" => "serial-" . $serial_no,
                    "receiver_name" => $request->receiver_name,
                    "region_name" => $request->region_name,
                    "zone_name" => $request->zone_name,
                    "branch_name" => $request->branch_name,
                    "address" => $request->address,
                    "mobile_no" => $request->mobile_no,
                    "date" => $request->date,
                    "created_by" => $user_id,
                ]);
                foreach ($request->addmore as $key => $value) {
                    DB::table('tbl_asset_received_item')->insert([
                        "serial_no" => "serial-" . $serial_no,
                        "description" => $value['description'],
                        "qty" => $value['qty'],
                        "model" => $value['model'],
                        "item_serial_no" => $value['item_serial_no'],
                        "remarks" => $value['remarks'],
                    ]);
                }
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Asset Received Stored Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function asset_received_show($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $data = DB::table('tbl_asset_received')
                ->select('*')
                ->where('serial_no', $id)
                ->first();
            $items = DB::table('tbl_asset_received_item')
                ->select('*')
                ->where('serial_no', $id)
                ->get();
            return view('asset_received.show', compact('data', 'items', 'notice_list'));
        }

        public function asset_received_edit($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $data = DB::table('tbl_asset_received')
                ->select('*')
                ->where('serial_no', $id)
                ->first();
            $items = DB::table('tbl_asset_received_item')
                ->select('*')
                ->where('serial_no', $id)
                ->get();
            $branch_list = DB::table('tbl_branch')->select('branch_name')->get();
            $zone_list = DB::table('tbl_zone')->select('zone_name')->get();
            $region_list = DB::table('tbl_region')->select('region_name')->get();
            return view('asset_received.edit', compact('data', 'items','branch_list','zone_list','region_list', 'notice_list'));
        }

        public function asset_received_update(Request $request)
        {
            $id = $request->id;
            $scores = $request->input('edit_addmore');
            foreach ($scores as $value) {
                DB::table('tbl_asset_received_item')->where('id', $value['id'])->update([
                    "description" => $value['description'],
                    "qty" => $value['qty'],
                    "model" => $value['model'],
                    "item_serial_no" => $value['item_serial_no'],
                    "remarks" => $value['remarks'],
                ]);
            }
            DB::table('tbl_asset_received')
                ->where('id', $id)
                ->update([
                    "receiver_name" => $request->receiver_name,
                    "region_name" => $request->region_name,
                    "zone_name" => $request->zone_name,
                    "branch_name" => $request->branch_name,
                    "address" => $request->address,
                    "mobile_no" => $request->mobile_no,
                    "date" => $request->date,
                ]);

            if ($request->addmore == true) {
                foreach ($request->addmore as $key => $value) {
                    DB::table('tbl_asset_received_item')->insert([
                        "serial_no" => $request->serial_no,
                        "description" => $value['description'],
                        "qty" => $value['qty'],
                        "model" => $value['model'],
                        "item_serial_no" => $value['item_serial_no'],
                        "remarks" => $value['remarks'],
                    ]);
                }
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Asset Received Updated Successfully'
                ]
            );
        }

        public function item_delete($id)
        {
            DB::table('tbl_asset_received_item')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item deleted successfully !!!!!!!!!!'
                ]
            );
        }

        public function asset_received_delete($id)
        {
            DB::table('tbl_asset_received_item')->where('serial_no', '=', $id)->delete();
            DB::table('tbl_asset_received')->where('serial_no', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee designation deleted successfully !!!!!!!!!!'
                ]
            );
        }

        //======================{{User List Section}}======================
        public function index()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $user_list = DB::table('tbl_employee')
                    ->select('*')
                    ->orderBy('id', 'desc')
                    ->get();
                $region_list = DB::table('tbl_region')->select('*')->get();
                return view('user.index', compact('user_list', 'notice_list', 'region_list'));
            } else {
                return view('signin');
            }
        }

        public function user_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('users')
                    ->leftJoin('tbl_employee','tbl_employee.id','=','users.name')
                    ->select('users.*','tbl_employee.employee_name')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if ($row->role == 'Admin' || $row->role == 'General' || $row->role == 'IT officer') {
                            $btn = '<a href="' . url('user_edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_user" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function user_store(Request $request)
        {
//            dd($request);
            $validator = Validator::make($request->all(), [
//            "vendor_name" => 'required',
            ]);
            if ($validator->passes()) {
                DB::table('users')->insert([
                    "name" => $request->name,
                    "user_name" => $request->user_name,
                    "role" => $request->role,
                    "password" => Hash::make($request->password),
                    "confirm_password" => $request->password,
                    "active" => '1',
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
                foreach ($request->region_id as $key => $value) {
                    DB::table('user_region')->insert([
                        "user_name" => $request->name,
//                        "region_id" => $request->region_id,
//                        "zone_id" => $request->zone_id,
                        "region_id" => $value,
                    ]);
                }
//                foreach ($request->branch_id as $key => $value) {
//                    DB::table('user_branch')->insert([
//                        "user_name" => $request->name,
//                        "region_id" => $request->region_id,
//                        "zone_id" => $request->zone_id,
//                        "branch_id" => $value,
//                    ]);
//                }
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'User Stored Successfully !!!'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

//        public function user_edit($id)
//        {
//            $data = DB::table('users')
//                ->join('user_region','user_region.user_name','=','users.name')
//                ->select('users.*','user_region.region_id')
//                ->where('users.id', '=', $id)
//                ->first();
//            $region_data = DB::table('user_region')
//                ->join('users','user_region.user_name','=','users.name')
//                ->join('tbl_region','tbl_region.id','=','user_region.region_id')
//                ->select('user_region.region_id','tbl_region.region_name')
//                ->where('users.id', '=', $id)
//                ->get();
//
//            dd($data);
//            return response()->json($data);
//        }
        public function user_edit($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $region_list = DB::table('tbl_region')->select('*')->get();
            $data = DB::table('users')
                ->join('tbl_employee','tbl_employee.id','=','users.name')
                ->select('users.*','tbl_employee.employee_name')
                ->where('users.id', '=', $id)
                ->first();

            $region_data = DB::table('user_region')
                ->join('users','user_region.user_name','=','users.name')
                ->join('tbl_region','tbl_region.id','=','user_region.region_id')
                ->select('user_region.region_id','tbl_region.region_name')
                ->where('users.id', '=', $id)
                ->get();
            return view('user.user_edit', compact('data', 'region_data', 'notice_list','region_list'));
        }

        public function user_update(Request $request)
        {
            $id = $request->id;
            $user_name = $request->user_name;
            if(isset($request->password)==true && isset($request->region_id)==true){
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        "role" => $request->role,
                        "password" => Hash::make($request->password),
                        "confirm_password" => $request->password,
                    ]);
                DB::table('user_region')->where('user_name', '=', $request->name)->delete();
                foreach ($request->region_id as $key => $value) {
                    DB::table('user_region')->insert([
                        "user_name" => $request->name,
                        "region_id" => $value,
                    ]);
                }
            }
            if(isset($request->password)==false && isset($request->region_id)==false){
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        "role" => $request->role,
                    ]);
            }
            if(isset($request->password)==true && isset($request->region_id)==false){
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        "role" => $request->role,
                        "password" => Hash::make($request->password),
                        "confirm_password" => $request->password,
                    ]);
            }
            if(isset($request->password)==false && isset($request->region_id)==true){
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        "role" => $request->role,
                    ]);
                DB::table('user_region')->where('user_name', '=', $request->name)->delete();
                foreach ($request->region_id as $key => $value) {
                    DB::table('user_region')->insert([
                        "user_name" => $request->name,
                        "region_id" => $value,
                    ]);
                }
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'User Updated Successfully'
                ]
            );
        }

        public function user_delete($id)
        {
            DB::table('users')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Data deleted successfully'
                ]
            );

        }


        //======================{{Notice Section}}======================

        public function notice()
        {
            if (Auth::check()) {
//                $notice_list = DB::table('tbl_notice')
//                    ->select('*')
//                    ->orderBy('id', 'desc')
//                    ->get();
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                return view('notice.index', compact('notice_list'));
            } else {
                return view('signin');
            }
        }
        public function notice_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_notice')
                    ->select('*')
                     ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<button type="submit" data-id="' . $row->id . '" id="delete_notice" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
        public function notice_store(Request $request)
        {
            $validator = Validator::make($request->all(), [
            ]);
            if ($validator->passes()) {
                DB::table('tbl_notice')->insert([
                    "notice" => $request->notice,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'User Stored Successfully !!!'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }
        public function notice_delete($id)
        {
            DB::table('tbl_notice')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Data deleted successfully'
                ]
            );

        }


        //{{===========Password Change Section================
        public function password_change()
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $id = Auth::user()->id;
            $data = DB::table('users')->where('id', '=', $id)->first();
            return view('password_change', compact('data',  'notice_list'));
        }
        public function password_update(Request $request)
        {

            $id = $request->id;
            DB::table('users')
                ->where('id', $id)
                ->update([
                    "password"         => Hash::make($request->password),
                    "confirm_password" => $request->password,
                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Branch Updated Successfully'
                ]
            );
        }

        //{{=============Monthly Working Plan==================
        public function working_plan()
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $officer_list = DB::table('users')
                            ->join('tbl_employee', 'tbl_employee.id', '=', 'users.name')
                            ->select('users.*', 'tbl_employee.employee_name')
                            ->where('users.role','=','IT officer')
                            ->get();
            $branch_list = DB::table('tbl_branch')->select('branch_name')->get();
            $region_list = DB::table('tbl_region')->select('region_name')->get();
            return view('working_plan.index', compact('notice_list','branch_list','region_list','officer_list'));
        }
        public function working_plan_store(Request $request)
        {
            $validator = Validator::make($request->all(), [
            ]);
            if ($validator->passes()) {
                DB::table('work_plan')->insert([
                    "officer_name" => $request->officer_name,
                    "month_name" => $request->month_name,
                    "date" => $request->date,
                    "branch_name" => $request->branch_name,
                    "region_name" => $request->region_name,
                    "working_status" => $request->working_status,
                    "remarks" => $request->remarks,
//                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Working Plan Stored Successfully !!!'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function working_plan_edit($id)
        {
            $data = DB::table('users')->where('id', '=', $id)->first();
            return response()->json($data);
        }

        public function working_plan_update(Request $request)
        {
            $id = $request->id;
            DB::table('users')
                ->where('id', $id)
                ->update([
                    "role" => $request->role,
                    "region_id" => $request->region_id,
                    "password" => Hash::make($request->password),
                    "confirm_password" => $request->password,
                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Branch Updated Successfully'
                ]
            );
        }

        public function working_plan_delete($id)
        {
            DB::table('users')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Data deleted successfully'
                ]
            );

        }



    }
