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

    class project_distribution_controller extends Controller
    {
        public function index()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $project_distribution_list = DB::table('tbl_item_distribution')
                    ->select('*')
                    ->where('distribution_type', 'project')
                    ->get();
                $available_items = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_item.brand_id', '=', 'tbl_brand.id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->select('tbl_item.*', 'tbl_brand.brand_name', 'tbl_item_name.item_name')
                    ->where('tbl_item.availability', '1')
                    ->where('tbl_item.distribution', '0')
                    ->get();
                return view('distribution.project.index', compact('project_distribution_list', 'available_items', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function project_available_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_item.brand_name', '=', 'tbl_brand.id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name')
                    ->select('tbl_item.*','tbl_brand.brand_name','tbl_item_name.item_name')
                    ->where('availability', '1')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('project_distribution/distribution', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Distribution</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function project_distribution_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->leftJoin('tbl_project', 'tbl_project.id', '=', 'tbl_item_distribution.project_id')
                    ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_project.project_name', 'tbl_brand.brand_name', 'tbl_item_distribution.distribution_date','tbl_item_distribution.distribution_qty','tbl_item_distribution.item_type', 'tbl_item_distribution.id','tbl_item.distribution')
                   ->where('tbl_item_distribution.distribution_type','Project')
                    ->whereColumn('tbl_item_distribution.distribution_qty', '!=', 'tbl_item_distribution.distribution_recycle_qty')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if($row->distribution==0) {
                            $btn = '<a href="' . url('project_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }
                        if($row->distribution==1){
                            $btn = '<a href="' . url('project_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function distribution($id)
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $data = DB::table('tbl_item')->select('*')->where('id', $id)->first();
                $item_name = DB::table('tbl_item_name')->select('item_name', 'id','fixed_asset')->where('id', $data->item_name_id)->first();
                $brand_name = DB::table('tbl_brand')->select('brand_name', 'id')->where('id', $data->brand_id)->first();
                $project_name = DB::table('tbl_project')->select('*')->get();
                $item_check = DB::table('tbl_item_distribution')->where('item_id', '=', $data->id)->count();
                return view('distribution.project.distribution', compact('data', 'item_name', 'brand_name', 'project_name', 'item_check', 'notice_list'));
            } else {
                return view('signin');
            }

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
                ->select('distribution_qty', DB::raw('sum(distribution_qty) as distribution_qty'))
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
                    "project_id" => $request->project_id,
                    "branch_id" => $request->branch_id,
                    "distribution_date" => $request->distribution_date,
                    "item_type" => $request->item_type,
                    "distribution_qty" => $request->distribution_qty,
                    "distribution_type" => "Project",
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
//                dd($total_purchase);
                $edit_item_name = DB::table('tbl_item_name')->select('item_name')->where('id', $data->item_name_id)->first();
                $edit_brand_name = DB::table('tbl_brand')->select('brand_name')->where('id', $data->brand_id)->first();
                $edit_project_name = DB::table('tbl_project')->select('*')->where('id', $data->project_id)->first();
                $edit_branch_name = DB::table('tbl_branch')->select('branch_name', 'id')->where('id', $data->branch_id)->first();
                $item_check = DB::table('tbl_item_distribution')->where('item_id', '=', $data->id)->count();
                $project_name = DB::table('tbl_project')->select('*')->get();
                return view('distribution.project.edit',
                    compact('edit_item_name', 'edit_branch_name', 'edit_brand_name', 'edit_project_name','data','total_purchase','total_distribution','project_name', 'notice_list'));
            } else {
                return view('signin');
            }

        }

        public function update(Request $request)
        {
            $id = $request->id;
            if ($request->edit_project_id != null) {
                DB::table('tbl_item_distribution')
                    ->where('id', $id)
                    ->update([
                        "project_id" => $request->edit_project_id,
                        "branch_id" => $request->edit_branch_id,
                        "distribution_date" => $request->distribution_date,
                        "distribution_qty" => $request->distribution_qty,
                    ]);
            }
            if ($request->edit_project_id == null) {
                DB::table('tbl_item_distribution')
                    ->where('id', $id)
                    ->update([
                        "project_id" => $request->project_id,
                        "branch_id" => $request->branch_id,
                        "distribution_date" => $request->distribution_date,
                        "distribution_qty" => $request->distribution_qty,
                    ]);
            }
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Project Distribution Updated Successfully'
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
