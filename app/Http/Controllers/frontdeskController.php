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

class frontdeskController extends Controller
{
    public function token_available(Request $request)
    {
        if ($request->get('token')) {
            $token = $request->get('token');
            $data = DB::table("student_entry")
                ->where('student_id', $token)
                ->count();
            if ($data > 0) {
                echo 'not_unique';
            }
            if ($data < 0) {
                echo 'unique';
            }
        }
    }

    public function frontdesk()
    {
        $last_id = DB::table('student_entry')->select('*')->orderBy('id', 'desc')->first();
        $token = DB::table('student_entry')->select('id')->orderBy('id', 'desc')->first();
        $counselor = DB::table('tbl_counselor')->select('*')->orderBy('counter_no', 'asc')->get();
        return view('front-desk', compact('token', 'last_id', 'counselor'));
    }

    public function frontdesk_store(Request $request)
    {
        if (Auth::check()) {
            date_default_timezone_set("Asia/Dhaka");
            $last_id = $request->last_id + 1;
            $date = date("Y-m-d");
            $this->validate($request, [
                "student_id" => 'required|unique:student_entry,student_id',
                "student_email" => 'required|unique:student_entry,student_email',
                "phone_no" => 'required|unique:student_entry,phone_no',
                'student_img' => 'required|mimes:jpeg,jpg,png|max:1024',
            ],
                ['student_email.required' => 'This email already exist in database !!! ...', 'phone_no.required' => 'This phone no already exist in database !!! ...',]);
            $destinationPath = 'public/upload/';
            $student_img = rand() . '.' . $request->student_img->extension();
            $request->student_img->move(public_path('upload'), $student_img);
            DB::table('student_entry')->insert([
                "student_name" => $request->student_name,
                "student_email" => $request->student_email,
                "student_id" => $request->student_id,
                "counselor_name" => $request->counselor_name,
                "dob" => $request->dob,
                "phone_no" => $request->phone_no,
                "purpose" => $request->purpose,
                "accept" => "0",
                "date" => $date,
                "student_img" => $student_img,
                "cc_status" => "0",
                "as_status" => "0",
                "vs_status" => "0",
                "as_proceed" => "0",
                "vs_proceed" => "0",
                "note" => "0",
                "commitment" => "0",
                "next_app_date" => "0",
                "active" => "1",
            ]);
            $data = DB::table('student_entry')->select('*')->where('id', '=', $last_id)->where('active', '1')->first();
            return view('frontdesk.student_registration_show', compact('data'));
        } else {
            return view('signin');
        }

    }

    public function frontdesk_list(Request $request)
    {
        if (Auth::check()) {
            if ($request->ajax()) {
                $data = DB::table('student_entry')
                    ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                    ->select('student_entry.*', 'tbl_counselor.counselor_name')
                    ->where('student_entry.active', '1')
                    ->orderBy('student_entry.id', 'desc')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('student_img', function ($row) {
                        $url = asset('upload/' . $row->student_img);
                        return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';
                    })
                    ->addColumn('action', function ($row) {
                        $url = 'pdf_show/' . $row->id . '.';
                        $btn = '<a href="' . url('recounseling', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-file-code"></i> Reconciliation</a>
                            <a href="' . url('student_edit', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
							<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" target="_blank" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF/Print</a>';
                        return $btn;
                    })
                    ->rawColumns(['student_img', 'action'])
                    ->make(true);
            }
        } else {
            return view('signin');
        }
    }

    public function frontdesk_student_list()
    {
        if (Auth::check()) {
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('frontdesk_student_list', compact('new_msg_count'));
        } else {
            return view('signin');
        }
    }

    public function pdf_show($id)
    {
        $data = DB::table('student_entry')->where('id', '=', $id)->where('active', '1')->first();
        $count = DB::table('student_entry')->select(DB::raw('COUNT(id) as count'))->where('student_id', $id)->first();
        $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf = PDF::loadView('pdf_show', compact('data', 'pdf'));
        return $pdf->stream('student_profile.pdf');
    }

    public function recounseling($id)
    {
        if (Auth::check()) {
            $counselor = DB::table('tbl_counselor')->select('*')->orderBy('counter_no', 'asc')->get();
            $data = DB::table('student_entry')
                ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                ->select('student_entry.*', 'tbl_counselor.*')
                ->where('student_entry.id', $id)
                ->first();
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('frontdesk.recounseling', compact('data', 'counselor', 'id', 'new_msg_count'));
        } else {
            return view('signin');
        }

    }

    public function recounseling_store(Request $request)
    {
        if (Auth::check()) {
            $date = date("Y-m-d");
            DB::table('student_entry')->insert([
                "student_name" => $request->student_name,
                "student_email" => $request->student_email,
                "student_id" => $request->student_id,
                "counselor_name" => $request->counselor_name,
                "dob" => $request->dob,
                "phone_no" => $request->phone_no,
                "purpose" => $request->purpose,
                "accept" => "0",
                "date" => $date,
                "student_img" => $request->student_img,
                "cc_status" => "0",
                "as_status" => "0",
                "vs_status" => "0",
                "as_proceed" => "0",
                "vs_proceed" => "0",
                "active" => "1",
            ]);
            DB::table('student_entry')
                ->where('id', $request->id)
                ->update([
                    "active" => "0",
                ]);
            $notification = array(
                'message' => 'Re Admission Done Successfully!',
                'alert-type' => 'success'
            );
            return redirect('frontdesk_student_list')->with($notification);
        } else {
            return view('signin');
        }
    }

    public function student_edit($id)
    {
        if (Auth::check()) {
            $data = DB::table('student_entry')
                ->select('*')
                ->where('id', $id)
                ->first();
            return view('frontdesk.student_edit', compact('data'));
        } else {
            return view('signin');
        }

    }

    public function student_update(Request $request)
    {
        if (Auth::check()) {
            date_default_timezone_set("Asia/Dhaka");
            $date = date("Y-m-d");
            $id = $request->id;
            $student_img = $request->file('student_img');
            if (isset($student_img)) {
                $image_data = DB::table('student_entry')
                    ->select('*')
                    ->where('id', $id)
                    ->first();
                unlink(public_path("upload/$image_data->student_img"));
                $destinationPath = 'public/upload/';
                $imageName = time() . '.' . $request->student_img->extension();
                $request->student_img->move(public_path('upload'), $imageName);
                $data = DB::table('student_entry')
                    ->where('id', $id)
                    ->where('active', 1)
                    ->update([
                        "student_name" => $request->student_name,
                        "student_email" => $request->student_email,
                        "dob" => $request->dob,
                        "phone_no" => $request->phone_no,
                        "student_img" => $imageName,
                    ]);
                if ($data == true) {
                    $notification = array(
                        'message' => 'Student Information Update Successfully !!!!!',
                        'alert-type' => 'info'
                    );
                    return redirect()->back()->with($notification);
                } else {
                    $notification = array(
                        'message' => 'Student Information Not Updated !!!!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }

            } else {
                $data = DB::table('student_entry')
                    ->where('id', $id)
                    ->update([
                        "student_name" => $request->student_name,
                        "student_email" => $request->student_email,
                        "dob" => $request->dob,
                        "phone_no" => $request->phone_no,
                    ]);
                if ($data == true) {
                    $notification = array(
                        'message' => 'Student Information Update Successfully!',
                        'alert-type' => 'info'
                    );
                } else {
                    $notification = array(
                        'message' => 'Student Information Not Updated!',
                        'alert-type' => 'error'
                    );
                }
                return redirect()->back()->with($notification);
            }
        } else {
            return view('signin');
        }

    }

    public function student_visa()
    {
        if (Auth::check()) {
        } else {
            return view('signin');
        }
        $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
        return view('frontdesk.student_visa_list', compact('new_msg_count'));
    }
    public function student_visa_list(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'Admin') {
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                        ->select('student_entry.*', 'tbl_counselor.counselor_name')
                        ->where('student_entry.active', '1')
                        ->where('student_entry.purpose', 'Student Visa')
                        ->orderBy('student_entry.id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('student_img', function ($row) {
                            $url = asset('upload/' . $row->student_img);
                            return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';
                        })
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('recounseling', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-file-code"></i> Reconciliation</a>
                            <a href="' . url('student_edit', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
							<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" target="_blank" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF/Print</a>';
                            return $btn;
                        })
                        ->rawColumns(['student_img', 'action'])
                        ->make(true);
                }
            }
            if (Auth::user()->role === 'Counselor') {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('counselor_name', $counter_no)
                        ->where('active', '1')
                        ->where('purpose', 'Student Visa')
                        ->where('admission_type', 'admission')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if (Auth::user()->role === 'Admission Section') {
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Student Visa')
                        ->where('admission_type', 'admission')
                        ->where('as_proceed', '1')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if (Auth::user()->role === 'Visa Section') {
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Student Visa')
                        ->where('admission_type', 'admission')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if (Auth::user()->role === 'Operator') {
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                        ->select('student_entry.*', 'tbl_counselor.counselor_name')
                        ->where('student_entry.active', '1')
                        ->where('student_entry.purpose', 'Student Visa')
                        ->orderBy('student_entry.id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('student_img', function ($row) {
                            $url = asset('upload/' . $row->student_img);
                            return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';
                        })
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('recounseling', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-file-code"></i> Reconciliation</a>
                            <a href="' . url('student_edit', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
							<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" target="_blank" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF/Print</a>';
                            return $btn;
                        })
                        ->rawColumns(['student_img', 'action'])
                        ->make(true);
                }
            }
        } else {
            return view('signin');
        }
    }

    public function immigration()
    {
        if (Auth::check()) {
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('frontdesk.immigration_list', compact('new_msg_count'));
        } else {
            return view('signin');
        }
    }
    public function immigration_list(Request $request)
    {
        if (Auth::check()) {
            if(Auth::user()->role==='Admin'){
                if ($request->ajax()) {
                        $data = DB::table('student_entry')
                            ->select('*')
                            ->where('active', '1')
                            ->where('purpose', 'Immigration')
                            ->where('admission_type', 'admission')
                            ->get();
                        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row) {
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            })
                            ->addColumn('chat', function ($row) {
                                $url_1 = 'chat/' . $row->student_id;
                                $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                                return $btn;
                            })
                            ->rawColumns(['image', 'action', 'chat'])
                            ->make(true);
                    }
            }
            if(Auth::user()->role === 'Operator') {
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                        ->select('student_entry.*', 'tbl_counselor.counselor_name')
                        ->where('student_entry.active', '1')
                        ->where('student_entry.purpose', 'Immigration')
                        ->orderBy('student_entry.id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('student_img', function ($row) {
                            $url = asset('upload/' . $row->student_img);
                            return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';
                        })
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('recounseling', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-file-code"></i> Reconciliation</a>
                            <a href="' . url('student_edit', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
							<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" target="_blank" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF/Print</a>';
                            return $btn;
                        })
                        ->rawColumns(['student_img', 'action'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='Counselor'){
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                        $data = DB::table('student_entry')
                            ->select('*')
                            ->where('counselor_name', $counter_no)
                            ->where('active', '1')
                            ->where('purpose', 'Immigration')
                            ->where('admission_type', 'admission')
                            ->get();
                        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row) {
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            })
                            ->addColumn('chat', function ($row) {
                                $url_1 = 'chat/' . $row->student_id;
                                $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                                return $btn;
                            })
                            ->rawColumns(['image', 'action', 'chat'])
                            ->make(true);
                    }
            }
            if(Auth::user()->role==='Admission Section'){
                if ($request->ajax()) {
                        $data = DB::table('student_entry')
                            ->select('*')
                            ->where('active', '1')
                            ->where('purpose', 'Immigration')
                            ->where('admission_type', 'admission')
                            ->where('as_proceed', '1')
                            ->get();
                        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row) {
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            })
                            ->addColumn('chat', function ($row) {
                                $url_1 = 'chat/' . $row->student_id;
                                $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                                return $btn;
                            })
                            ->rawColumns(['image', 'action', 'chat'])
                            ->make(true);
                    }
            }
            if(Auth::user()->role==='Visa Section'){
                if ($request->ajax()) {
                        $data = DB::table('student_entry')
                            ->select('*')
                            ->where('active', '1')
                            ->where('purpose', 'Immigration')
                            ->where('admission_type', 'admission')
                            ->get();
                        return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function ($row) {
                                $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                                return $btn;
                            })
                            ->addColumn('chat', function ($row) {
                                $url_1 = 'chat/' . $row->student_id;
                                $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                                return $btn;
                            })
                            ->rawColumns(['image', 'action', 'chat'])
                            ->make(true);
                    }
            }
        }
        else {
            return view('signin');
        }
    }

    public function meditourism()
    {
        if (Auth::check()) {
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('frontdesk.meditourism_list', compact('new_msg_count'));
        } else {
            return view('signin');
        }

    }
    public function meditourism_list(Request $request)
    {
        if (Auth::check()) {
            if(Auth::user()->role==='Admin'){
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Medi Tourism')
                        ->where('admission_type', 'admission')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='Operator') {
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                        ->select('student_entry.*', 'tbl_counselor.counselor_name')
                        ->where('student_entry.active', '1')
                        ->where('student_entry.purpose', 'Medi Tourism')
                        ->orderBy('student_entry.id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('student_img', function ($row) {
                            $url = asset('upload/' . $row->student_img);
                            return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';
                        })
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('recounseling', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-file-code"></i> Reconciliation</a>
                            <a href="' . url('student_edit', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
							<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" target="_blank" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF/Print</a>';
                            return $btn;
                        })
                        ->rawColumns(['student_img', 'action'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='Counselor'){
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('counselor_name', $counter_no)
                        ->where('active', '1')
                        ->where('purpose', 'Medi Tourism')
                        ->where('admission_type', 'admission')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='Admission Section'){
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Medi Tourism')
                        ->where('admission_type', 'admission')
                        ->where('as_proceed', '1')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='Visa Section'){
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Medi Tourism')
                        ->where('admission_type', 'admission')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
        } else {
            return view('signin');
        }

    }

    public function job()
    {
        if (Auth::check()) {
            $new_msg_count = DB::table('tbl_chat')->select(DB::raw('COUNT(id) as count'))->where('approval', '0')->where('form', 'Student')->first();
            return view('frontdesk.job_list', compact('new_msg_count'));
        } else {
            return view('signin');
        }

    }
    public function job_list(Request $request)
    {
        if (Auth::check()) {
            if(Auth::user()->role==='Admin'){
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Job Search')
                        ->where('admission_type', 'admission')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='Operator') {
                if($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->crossJoin('tbl_counselor', 'student_entry.counselor_name', '=', 'tbl_counselor.counter_no')
                        ->select('student_entry.*', 'tbl_counselor.counselor_name')
                        ->where('student_entry.active', '1')
                        ->where('student_entry.purpose', 'Job Search')
                        ->orderBy('student_entry.id', 'desc')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('student_img', function ($row) {
                            $url = asset('upload/' . $row->student_img);
                            return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';
                        })
                        ->addColumn('action', function ($row) {
                            $url = 'pdf_show/' . $row->id . '.';
                            $btn = '<a href="' . url('recounseling', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-file-code"></i> Reconciliation</a>
                            <a href="' . url('student_edit', $row->id) . '" id="pdf" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>
							<a href="' . $url . '" data-id="' . $row->id . '" id="pdf" target="_blank" class="dropdown-item"><i class="fa fa-file-pdf"></i> PDF/Print</a>';
                            return $btn;
                        })
                        ->rawColumns(['student_img', 'action'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='Counselor'){
                $counter_no = Auth::user()->counter_no;
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('counselor_name', $counter_no)
                        ->where('active', '1')
                        ->where('purpose', 'Job Search')
                        ->where('admission_type', 'admission')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='Admission Section'){
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Job Search')
                        ->where('admission_type', 'admission')
                        ->where('as_proceed', '1')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
            if(Auth::user()->role==='Visa Section'){
                if ($request->ajax()) {
                    $data = DB::table('student_entry')
                        ->select('*')
                        ->where('active', '1')
                        ->where('purpose', 'Job Search')
                        ->where('admission_type', 'admission')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('student_profile_show', $row->student_id) . '" data-id="' . $row->id . '"  class="btn btn-success btn-sm" style="border-radius:0px;"><i class="fa fa-eye"></i> View</a>';
                            return $btn;
                        })
                        ->addColumn('chat', function ($row) {
                            $url_1 = 'chat/' . $row->student_id;
                            $btn = '<a href="' . $url_1 . '" data-id="' . $row->student_id . '" id="pdf" class="btn btn-teal btn-sm" style="border-radius:0px;"><i class="fa fa-envelope"></i> Message</a>';
                            return $btn;
                        })
                        ->rawColumns(['image', 'action', 'chat'])
                        ->make(true);
                }
            }
        }
        else {
            return view('signin');
        }
    }
}

?>
