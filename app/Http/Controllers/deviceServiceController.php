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

class deviceServiceController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $last_serial_no = DB::table('tbl_device_service')
                ->select('id')
                ->orderBy('id', 'desc')
                ->first();
            $mobile_no = DB::table('tbl_device_service')
                ->select('mobile_no')
                ->groupBy('mobile_no')
                ->get();
            return view('device_service.index', compact('last_serial_no', 'mobile_no', 'notice_list'));
        } else {
            return view('signin');
        }
    }

    public function device_service_list(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tbl_device_service')
                ->select('*')
                ->where('serial_no', '<>', '')
                ->orderBy('id', 'DESC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('device_service_edit', $row->serial_no) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                <a href="' . url('device_service_show', $row->serial_no) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                                <button type="submit" data-id="' . $row->serial_no . '" id="delete_device_service" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function device_service_store(Request $request)
    {
        $user_id = Auth::user()->user_name;
        $validator = Validator::make($request->all(), [

        ]);
        if ($validator->passes()) {
            $last_serial_no = DB::table('tbl_device_service')
                ->select('id')
                ->orderBy('id', 'desc')
                ->first();
            $serial_no = $last_serial_no->id + 1;

            if (isset($request->e_mobile_no)) {
                DB::table('tbl_device_service')->insert([
                    "serial_no" => "serial-" . $serial_no,
                    "receiver_name" => $request->e_receiver_name,
                    "address" => $request->e_address,
                    "mobile_no" => $request->e_mobile_no,
                    "vendor_name" => $request->e_vendor_name,
                    "date" => $request->date,
                    "created_by" => $user_id,
                ]);
                foreach ($request->addmore as $key => $value) {
                    DB::table('tbl_device_service_item')->insert([
                        "serial_no" => "serial-" . $serial_no,
                        "description" => $value['description'],
                        "qty" => $value['qty'],
                    ]);
                }
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Branch Stored Successfully'
                    ]
                );
            }
            else{
                DB::table('tbl_device_service')->insert([
                    "serial_no" => "serial-" . $serial_no,
                    "vendor_name" => $request->vendor_name,
                    "receiver_name" => $request->receiver_name,
                    "address" => $request->address,
                    "mobile_no" => $request->mobile_no,
                    "date" => $request->date,
                    "created_by" => $user_id,
                ]);
                foreach ($request->addmore as $key => $value) {
                    DB::table('tbl_device_service_item')->insert([
                        "serial_no" => "serial-" . $serial_no,
                        "description" => $value['description'],
                        "qty" => $value['qty'],
                    ]);
                }
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Branch Stored Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }
    }

    public function device_service_show($id)
    {
        $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
        $data = DB::table('tbl_device_service')
            ->select('*')
            ->where('serial_no', $id)
            ->first();
        $items = DB::table('tbl_device_service_item')
            ->select('*')
            ->where('serial_no', $id)
            ->get();
        return view('device_service.show', compact('data', 'items', 'notice_list'));
    }

    public function device_service_edit($id)
    {
        $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
        $data = DB::table('tbl_device_service')
            ->select('*')
            ->where('serial_no', $id)
            ->first();
        $items = DB::table('tbl_device_service_item')
            ->select('*')
            ->where('serial_no', $id)
            ->get();
        return view('device_service.edit', compact('data', 'items', 'notice_list'));
    }


    public function device_service_update(Request $request)
    {
        $id = $request->id;

        $scores = $request->input('edit_addmore');
        foreach ($scores as $value) {
            DB::table('tbl_device_service_item')->where('id', $value['id'])->update([
                "description" => $value['description'],
                "qty" => $value['qty'],
            ]);
        }
        DB::table('tbl_device_service')
            ->where('id', $id)
            ->update([
                "vendor_name" => $request->vendor_name,
                "receiver_name" => $request->receiver_name,
                "address" => $request->address,
                "mobile_no" => $request->mobile_no,
                "date" => $request->date,
            ]);

        if ($request->addmore){
            foreach ($request->addmore as $key => $value) {
                if($value['description'] != null && $value['qty'] !=null ){
                    DB::table('tbl_device_service_item')->insert([
                        "serial_no" => $request->serial_no,
                        "description" => $value['description'],
                        "qty" => $value['qty'],
                    ]);
                }
            }
        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Branch Updated Successfully'
            ]
        );
    }

    public function item_delete($id)
    {
        DB::table('tbl_device_service_item')->where('id', '=', $id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'Employee designation deleted successfully !!!!!!!!!!'
            ]
        );
    }

    public function delete_device_service($id)
    {
        DB::table('tbl_device_service_item')->where('serial_no', '=', $id)->delete();
        DB::table('tbl_device_service')->where('serial_no', '=', $id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'Employee designation deleted successfully !!!!!!!!!!'
            ]
        );
    }

    public function blank_device_service()
    {
        $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
        return view('device_service.blank', compact('notice_list'));
    }

    public function d_fetch_receiver_name(Request $request)
    {
        $data['receiver_name'] = DB::table('tbl_device_service')
            ->where('mobile_no', $request->id)
            ->orderBy('id',  'desc')
            ->limit(1)
            ->get(["receiver_name", "receiver_name", "id"]);

        return response()->json($data);
    }

    public function d_fetch_address(Request $request)
    {
        $data['address'] = DB::table('tbl_device_service')
            ->where('mobile_no', $request->id)
            ->orderBy('id',  'desc')
            ->limit(1)
            ->get(["address", "address", "id"]);

        return response()->json($data);
    }

    public function d_fetch_company(Request $request)
    {
        $data['vendor_name'] = DB::table('tbl_device_service')
            ->where('mobile_no', $request->id)
            ->orderBy('id',  'desc')
            ->limit(1)
            ->get(["vendor_name", "vendor_name", "id"]);

        return response()->json($data);
    }


}
