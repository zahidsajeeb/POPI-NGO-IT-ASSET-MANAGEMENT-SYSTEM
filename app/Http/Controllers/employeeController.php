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

    class employeeController extends Controller
    {
        //==================(Employee Section)=======================
        public function employee()
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $branch = DB::table('tbl_branch')->select('*')->get();
            $department = DB::table('tbl_employee_department')->select('*')->get();
            $designation = DB::table('tbl_employee_designation')->select('*')->get();
            return view('employee.index', compact('branch','department','designation', 'notice_list'));
        }
        public function employee_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_employee')
                    ->leftJoin('tbl_branch', 'tbl_branch.id', '=', 'tbl_employee.branch_id')
                    ->leftJoin('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_employee.department_id')
                    ->leftJoin('tbl_employee_designation', 'tbl_employee_designation.id', '=', 'tbl_employee.designation_id')
                    ->select('tbl_branch.branch_name', 'tbl_employee_department.department_name', 'tbl_employee_designation.designation_name','tbl_employee.*')
                    ->orderBy('tbl_employee.id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if($row->active==1){
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_employee" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <a href="' . url('emp_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_employee" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>
                                <button type="submit" data-id="' . $row->id . '" id="inactive_employee" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-ban"></i> Inactive</button>';
                            return $btn;
                        }
                        if($row->active==0){
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_employee" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <a href="' . url('emp_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_employee" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>
                                <button type="submit" data-id="' . $row->id . '" id="active_employee" class="btn btn-sm btn-success" style="border-radius:0px;text-align:center;"><i class="fa fa-ban"></i> Active</button>';
                            return $btn;
                        }

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
        public function employee_store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                "employee_id" => 'required|unique:tbl_employee,employee_id',
            ]);
            if ($validator->passes()) {
                DB::table('tbl_employee')->insert([
                    "employee_name"  => $request->employee_name,
                    "employee_id"    => $request->employee_id,
                    "department_id"  => $request->department_id,
                    "designation_id" => $request->designation_id,
                    "branch_id"      => $request->branch_id,
                    "phone"          => $request->phone,
                    "active"         => '1',
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Employee Inserted successfully !!!!!'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }
        public function brand_store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                "brand_name" => 'required|unique:tbl_brand,brand_name',
            ]);
            if ($validator->passes()) {
                DB::table('tbl_brand')->insert([
                    "brand_name" => $request->brand_name,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Brand Name Stored Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }
        public function employee_edit($id)
        {
            $data = DB::table('tbl_employee')->where('id', '=', $id)->first();
            return response()->json($data);
        }
        public function employee_update(Request $request)
        {
            $id = $request->id;
            $validator = Validator::make($request->all(), [
                "employee_id" => 'required|unique:tbl_employee,employee_id' . ($id ? ",$id" : ''),
            ]);
            if ($validator->passes()) {
                DB::table('tbl_employee')
                    ->where('id', $id)
                    ->update([
                        "employee_name"  => $request->employee_name,
                        "employee_id"    => $request->employee_id,
                        "department_id"  => $request->department_id,
                        "designation_id" => $request->designation_id,
                        "branch_id"      => $request->branch_id,
                        "phone"          => $request->phone,
                    ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Employee information updated successfully !!!!'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }
        public function employee_delete($id)
        {
            DB::table('tbl_employee')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data deleted successfully'
                ]
            );
        }

        public function employee_inactive($id)
        {
            $emp_id = DB::table('users')->select('id')->where('name','=',$id)->first();
            DB::table('tbl_employee')
                ->where('id', $id)
                ->update([
                    "active"  => '0'
                ]);
            DB::table('users')
                ->where('id', '=', $emp_id->id)
                ->update([
                    "active"  => '0'
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee Inactive successfully'
                ]
            );
        }

        public function employee_active($id)
        {
            $emp_id = DB::table('users')->select('id')->where('name','=',$id)->first();
            DB::table('tbl_employee')
                ->where('id', $id)
                ->update([
                    "active"  => '1'
                ]);
            DB::table('users')
                ->where('id', '=', $emp_id->id)
                ->update([
                    "active"  => '1'
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee Inactive successfully'
                ]
            );
        }
        public function emp_show($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $data = DB::table('tbl_employee')
                ->select('*')
                ->where('id', $id)
                ->first();

            $dept_name = DB::table('tbl_employee')
                ->join('tbl_employee_department','tbl_employee_department.id','=','tbl_employee.department_id')
                ->select('tbl_employee_department.department_name')
                ->where('tbl_employee.id', $id)
                ->first();

            $desc_name = DB::table('tbl_employee')
                ->join('tbl_employee_designation','tbl_employee_designation.id','=','tbl_employee.designation_id')
                ->select('tbl_employee_designation.designation_name')
                ->where('tbl_employee.id', $id)
                ->first();

            $branch_name = DB::table('tbl_employee')
                ->join('tbl_branch','tbl_branch.id','=','tbl_employee.branch_id')
                ->select('tbl_branch.branch_name')
                ->where('tbl_employee.id', $id)
                ->first();


//
//            $distribution = DB::table('tbl_item_distribution')
//                ->select('*')
//                ->where('item_id', $id)
//                ->get();
//
            $distribution_list = DB::table('tbl_item_distribution')
                ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->where('tbl_item_distribution.emp_id',$id)
                ->select('tbl_item.*', 'tbl_item_name.item_name','tbl_brand.brand_name','tbl_item_distribution.distribution_date','tbl_item.item_desc')
                ->get();
//
//
//            $brand_name = DB::table('tbl_brand')
//                ->select('*')
//                ->where('id', $data->brand_id)
//                ->first();
//            $vendor_name = DB::table('tbl_vendor')
//                ->select('*')
//                ->where('id', $data->vendor_id)
//                ->first();
            return view('employee.show', compact('data','dept_name','desc_name','branch_name','distribution_list', 'notice_list'));
        }

        //==================(Employee Department Section)=======================
        public function employee_department()
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $branch = DB::table('tbl_employee_department')->select('*')->get();
            return view('employee.index', compact('branch', 'notice_list'));
        }
        public function employee_department_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_employee_department')
                    ->select('*')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_employee_department" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_employee_department" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
        public function employee_department_store(Request $request)
        {
            DB::table('tbl_employee_department')->insert([
                "department_name" => $request->department_name,
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee Department Inserted successfully !!!!!'
                ]
            );
        }
        public function employee_department_edit($id)
        {
            $data = DB::table('tbl_employee_department')->where('id', '=', $id)->first();
            return response()->json($data);
        }
        public function employee_department_update(Request $request)
        {
            $id = $request->id;
            DB::table('tbl_employee_department')
                ->where('id', $id)
                ->update([
                    "department_name" => $request->department_name,
                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee department updated successfully'
                ]
            );
        }
        public function employee_department_delete($id)
        {
            DB::table('tbl_employee_department')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee department deleted successfully !!!!!!!!!!'
                ]
            );
        }

        //==================(Employee Designation Section)=======================
        public function employee_designation()
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $branch = DB::table('tbl_employee_designation')->select('*')->get();
            return view('employee.index', compact('branch', 'notice_list'));
        }
        public function employee_designation_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_employee_designation')
                    ->select('*')
                    ->orderBy('id','desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_employee_designation" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_employee_designation" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
        public function employee_designation_store(Request $request)
        {
            DB::table('tbl_employee_designation')->insert([
                "designation_name" => $request->designation_name,
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee designation stroed successfully !!!!!'
                ]
            );
        }
        public function employee_designation_edit($id)
        {
            $data = DB::table('tbl_employee_designation')->where('id', '=', $id)->first();
            return response()->json($data);
        }
        public function employee_designation_update(Request $request)
        {
            $id = $request->id;
            DB::table('tbl_employee_designation')
                ->where('id', $id)
                ->update([
                    "designation_name" => $request->designation_name,
                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee designation updated successfully'
                ]
            );
        }
        public function employee_designation_delete($id)
        {
            DB::table('tbl_employee_designation')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee designation deleted successfully !!!!!!!!!!'
                ]
            );
        }



    }
