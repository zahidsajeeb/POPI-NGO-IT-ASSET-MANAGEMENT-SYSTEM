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
use Rakibhstu\Banglanumber\NumberToBangla;
use Riskihajar\Terbilang\Facades\Terbilang;
class adminController
{
    public function employee()
    {
        $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
        return view('employee', compact('new_msg_count'));
    }
    public function employee_list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')
                ->select('*')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->role == 'Admin') {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_employee" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>';
                        return $btn;
                    } else {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_employee" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
								<button type="submit" data-id="' . $row->id . '" id="delete_employee" class="dropdown-item"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    }

                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function employee_store(Request $request)
    {
        DB::table('users')->insert([
            "name" => $request->name,
            "user_name" => $request->user_name,
            "password" => Hash::make($request->password),
            "confirm_password" => $request->password,
            "role" => $request->role,
            "counter_no" => $request->counter_no,
        ]);
        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }
    public function employee_edit($id)
    {
        $data = DB::table('users')->where('id', '=', $id)->first();
        return response()->json($data);
    }
    public function employee_update(Request $request)
    {
        $id = $request->id;
        if (!isset($request->image)) {
            DB::table('users')
                ->where('id', $id)
                ->update([
                    "name" => $request->name,
                    "user_name" => $request->user_name,
                    "role" => $request->role,
                    "counter_no" => $request->counter_no,
                    "password" => Hash::make($request->password),
                    "confirm_password" => $request->password,
                ]);
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }
    public function employee_delete($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data deleted successfully'
            ]
        );
    }


    public function all_student_list(Request $request)
    {
        $counter_no = Auth::user()->counter_no;
        if ($request->ajax()) {
            $data = DB::table('student_entry')
                ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                ->select('student_entry.*', 'tbl_counselor.*')
                ->where('student_entry.accept', '1')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->cc_status == 1 && $row->payment_status == 1 && $row->hc_status == 0) {
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '" class="dropdown-item"><i class="fa fa-eye"></i> Profile Show</a>
								<a href="' . url('head_counselor_approved', $row->student_id) . '" data-id="' . $row->student_id . '" onclick="approval()" class="dropdown-item" ><i class="fa fa-check"></i> Job Done</a>';
                        return $btn;
                    }
                    if ($row->cc_status == 1 && $row->payment_status == 1 && $row->hc_status == 1) {
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '" class="dropdown-item"><i class="fa fa-eye"></i> Profile Show</a>';
                        return $btn;
                    }
                    if ($row->cc_status == 0 || $row->payment_status == 0) {
                        $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '" class="dropdown-item"><i class="fa fa-eye"></i> Profile Show</a>';
                        return $btn;
                    }

                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    }

}
