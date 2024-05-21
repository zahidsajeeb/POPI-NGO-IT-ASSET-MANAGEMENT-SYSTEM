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

    class projectController extends Controller
    {
        public function project()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $branch_list = DB::table('tbl_branch')->select('*')->get();
                return view('project.index', compact('branch_list','notice_list'));
            } else {
                return view('signin');
            }
        }
        public function project_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_project')
                    ->join('tbl_employee', 'tbl_employee.employee_id', '=', 'tbl_project.created_by')
                    ->select('tbl_project.*','tbl_employee.employee_name')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_project" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <button type="submit" data-id="' . $row->id . '" id="delete_project" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->addColumn('d_time', function ($row) {
                        $today_date = date('Y-m-d');
                        $today_date_format = date_create("$today_date");
                        $start_date = date_create("$row->project_start");
                        $end_date   = date_create("$row->project_end");
                        $difference_one = date_diff($start_date,$end_date);
                        $difference_two = date_diff($today_date_format,$end_date);
                        $result         = $difference_two->format("%R%a days");
                        if ($result <= 15) {
                            $btn_2 = '<a href="#" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;">' . $result . '</a>';
                            return $btn_2;
                        } else {
                            return $result;
                        }
//                        return $result;
                    })
                    ->rawColumns(['action','d_time'])
                    ->make(true);
            }
        }

        public function project_store(Request $request)
        {
            $user_id = Auth::user()->user_name;
            $validator = Validator::make($request->all(), [
                "project_name" => 'required|unique:tbl_project,project_name',
            ]);
            if ($validator->passes()) {
                DB::table('tbl_project')->insert([
                    "project_name"  => $request->project_name,
                    "branch_id"     => $request->branch_id,
                    "project_start" => $request->project_start,
                    "project_end"   => $request->project_end,
                    "created_by"   => $user_id,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Project Stored Successfully'
                    ]
                );
            }

            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function project_edit($id)
        {
            $data = DB::table('tbl_project')
                ->where('id', '=', $id)
                ->select('*')
                ->first();
            return response()->json($data);
        }

        public function project_update(Request $request)
        {
            $id = $request->id;
                DB::table('tbl_project')
                    ->where('id', $id)
                    ->update([
                        "project_name"  => $request->project_name,
                        "branch_id"     => $request->branch_id,
                        "project_start" => $request->project_start,
                        "project_end"   => $request->project_end,
                    ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Project Updated Successfully'
                ]
            );
        }

        public function project_delete($id)
        {
            $project_check = DB::table('tbl_item_distribution')->where('project_id', '=', $id)->count();
            if ($project_check != 0) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if ($project_check == 0) {
                DB::table('tbl_project')->where('id', '=', $id)->delete();
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
        }

    }
