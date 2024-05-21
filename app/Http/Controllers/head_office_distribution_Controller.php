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

    class head_office_distribution_Controller extends Controller
    {
        public function index()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $available_items = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_item.brand_id', '=', 'tbl_brand.id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->select('tbl_item.*', 'tbl_brand.brand_name', 'tbl_item_name.item_name')
                    ->where('tbl_item.availability', '1')
                    ->where('tbl_item.distribution', '0')
                    ->where('tbl_item.recycle','=','0')
                    ->get();
                return view('distribution.head_office.index', compact('available_items', 'notice_list'));
            } else {
                return view('signin');
            }
        }
        public function head_office_distribution_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->leftJoin('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                    ->leftJoin('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_item_distribution.department_id')
                    ->orderBy('tbl_item.id','desc')
                    ->where('tbl_item_distribution.distribution_type','=','Head office')
                    ->whereColumn('tbl_item_distribution.distribution_qty', '!=', 'tbl_item_distribution.distribution_recycle_qty')
                     ->select('tbl_item.*', 'tbl_employee.employee_name', 'tbl_employee.employee_id', 'tbl_employee_department.department_name', 'tbl_brand.brand_name', 'tbl_item_distribution.distribution_date', 'tbl_item_distribution.item_type', 'tbl_item_distribution.id', 'tbl_item_name.item_name' ,'tbl_item_distribution.distribution_type','tbl_item_distribution.distribution_qty','tbl_item_distribution.distribution_recycle_qty')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('head_office_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function distribution($id)
        {
            if (Auth::check()) {
//            $data        = DB::table('tbl_item')->select('*')->where('id',$id)->first();
//            $brand_name  = DB::table('tbl_brand')->select('brand_name','id')->where('id',$data->brand_id)->first();
//            $region_name = DB::table('tbl_region')->select('*')->get();
//            $item_check  = DB::table('tbl_item_distribution')->where('item_id', '=', $data->id)->count();
//            $emp_id      = DB::table('tbl_employee')->select('*')->get();

                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $data = DB::table('tbl_item')->select('*')->where('id', $id)->first();
                $item_name = DB::table('tbl_item_name')->select('item_name', 'id','fixed_asset')->where('id', $data->item_name_id)->first();
                $brand_name = DB::table('tbl_brand')->select('brand_name', 'id')->where('id', $data->brand_id)->first();
                $region_name = DB::table('tbl_region')->select('*')->get();
                $item_check = DB::table('tbl_item_distribution')->where('item_id', '=', $data->id)->count();
                $emp_id = DB::table('tbl_employee')->select('*')->get();
                return view('distribution.head_office.distribution', compact('data', 'brand_name', 'region_name', 'item_check', 'emp_id', 'item_name', 'notice_list'));
            } else {
                return view('signin');
            }

        }

        public function store12(Request $request)
        {
            DB::table('tbl_item_distribution')->insert([
                "item_id" => $request->item_id,
                "item_name_id" => $request->item_name_id,
                "brand_id" => $request->brand_id,
                "emp_id" => $request->emp_id,
                "department_id" => $request->department_id,
                "distribution_date" => $request->distribution_date,
                "item_type" => $request->item_type,
                "distribution_qty" => $request->distribution_qty,
                "distribution_type" => "Head office",
            ]);
            if($request->fixed_asset=='0'){
                        DB::table('tbl_item')
                            ->where('id', $request->item_id)
                            ->update([
                                "availability" => "1",
                            ]);
                    }
                    if($request->fixed_asset=='1'){
                        DB::table('tbl_item')
                            ->where('id', $request->item_id)
                            ->update([
                                "availability" => "0",
                            ]);
                    }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item Stored Successfully'
                ]
            );
            return response()->json(['error' => $validator->errors()->all()]);


        }
        public function store(Request $request)
        {
            $item_purchase = DB::table('tbl_item')
                ->select('qty')
                ->where('id', '=', $request->item_id)
                ->first();

            $stock = DB::table('tbl_item')
                ->select('b_qty')
                ->where('id', '=', $request->item_id)
                ->first();

            $distribution = DB::table('tbl_item_distribution')
                ->select('*', DB::raw('sum(distribution_qty) as distribution_qty'))
                ->where('item_id', '=', $request->item_id)
                ->groupBy('item_id')
                ->first();

            $update_b_qty = (($stock->b_qty)-($request->distribution_qty));

            if (($request->distribution_qty) > $stock->b_qty) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if (($request->distribution_qty) <= $stock->b_qty) {
                DB::table('tbl_item_distribution')->insert([
                    "item_id" => $request->item_id,
                    "item_name_id" => $request->item_name_id,
                    "brand_id" => $request->brand_id,
                    "emp_id" => $request->emp_id,
                    "department_id" => $request->department_id,
                    "distribution_date" => $request->distribution_date,
                    "item_type" => $request->item_type,
                    "distribution_qty" => $request->distribution_qty,
                    "distribution_type" => "Head office",
                ]);

                if(($stock->b_qty)-($request->distribution_qty)==0){
                    DB::table('tbl_item')
                        ->where('id', $request->item_id)
                        ->update([
                            "availability" => '0',
                            "b_qty" => $update_b_qty,
                        ]);
                }
                else{
                    DB::table('tbl_item')
                        ->where('id', $request->item_id)
                        ->update([
                            "availability" => '1',
                            "b_qty" => $update_b_qty,
                        ]);
                }
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Item Stored Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function edit($id)
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $data = DB::table('tbl_item_distribution')->select('*')->where('id', $id)->first();
                $total_purchase = DB::table('tbl_item')->select('qty')->where('id', '=', $data->item_id)->first();
                $total_distribution = DB::table('tbl_item_distribution')
                    ->select('distribution_qty', DB::raw('sum(distribution_qty) as distribution_qty'))
                    ->where('item_id', '=', $data->item_id)
                    ->groupBy('item_id')
                    ->first();
                $asset_code = DB::table('tbl_item')->select('asset_code')->where('id', $data->item_id)->first();
                $edit_item_name = DB::table('tbl_item_name')->select('item_name')->where('id', $data->item_name_id)->first();
                $edit_brand_name = DB::table('tbl_brand')->select('brand_name')->where('id', $data->brand_id)->first();
                $edit_emp = DB::table('tbl_employee')->select('employee_id', 'employee_name', 'id')->where('id', $data->emp_id)->first();
                $edit_department = DB::table('tbl_employee_department')->select('department_name', 'id')->where('id', $data->department_id)->first();
                $item_check = DB::table('tbl_item_distribution')->where('item_id', '=', $data->id)->count();
                $emp_id = DB::table('tbl_employee')->select('*')->get();
                return view('distribution.head_office.edit',
                    compact('edit_item_name', 'edit_emp', 'edit_brand_name', 'edit_department', 'data', 'emp_id', 'asset_code','total_purchase','total_distribution', 'notice_list'));
            } else {
                return view('signin');
            }

        }

        public function update(Request $request)
        {
            $id = $request->id;
            if ($request->edit_emp_id != null) {
                DB::table('tbl_item_distribution')
                    ->where('id', $id)
                    ->update([
                        "emp_id" => $request->edit_emp_id,
                        "department_id" => $request->edit_department_id,
                        "distribution_date" => $request->distribution_date,
                        "distribution_qty" => $request->distribution_qty,
                    ]);
            }
            if ($request->edit_emp_id == null) {
                DB::table('tbl_item_distribution')
                    ->where('id', $id)
                    ->update([
                        "emp_id" => $request->emp_id,
                        "department_id" => $request->department_id,
                        "distribution_date" => $request->distribution_date,
                        "distribution_qty" => $request->distribution_qty,
                    ]);
            }


            return response()->json(
                [
                    'success' => true,
                    'message' => 'Region Updated Successfully'
                ]
            );
        }

        public function delete($id)
        {
            $data = DB::table('tbl_item_distribution')->select('*')->where('id', $id)->first();

            $stock = DB::table('tbl_item')
                ->select('b_qty', 'qty')
                ->where('id', '=', $data->item_id)
                ->first();

            $update_b_qty = (($stock->b_qty)+($data->distribution_qty));

            if ($data->item_type == "New") {
                if(($stock->b_qty)!=($stock->qty)){
                    DB::table('tbl_item')
                        ->where('id', $data->item_id)
                        ->update([
                            "availability" => "1",
                            "b_qty"        => $update_b_qty,
                        ]);
                    DB::table('tbl_item_distribution')->where('id', '=', $id)->delete();
                }
                if(($stock->b_qty)==($stock->qty)  ){
                    DB::table('tbl_item_distribution')->where('id', '=', $id)->delete();
                }

            }
            if ($data->item_type == "Old") {
                if(($stock->b_qty)!=($stock->qty)){
                    DB::table('tbl_item')
                        ->where('id', $data->item_id)
                        ->update([
                            "availability" => "1",
                            "b_qty"        => $update_b_qty,
                        ]);
                    DB::table('tbl_item_distribution')->where('id', '=', $id)->delete();
                }
                if(($stock->b_qty)==($stock->qty)  ){
                    DB::table('tbl_item_distribution')->where('id', '=', $id)->delete();
                }
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Zone Deleted Successfully'
                ]
            );
        }


        public function fetch_emp_name(Request $request)
        {
            $data['employee_name'] = DB::table('tbl_employee')
                ->where('id', $request->id)
                ->get(["employee_name", "employee_name", "id"]);
            return response()->json($data);
        }

        public function fetch_emp_id(Request $request)
        {
            $data['employee_id'] = DB::table('tbl_employee')
                ->where('id', $request->id)
                ->get(["employee_id", "employee_id", "id"]);
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
    }
