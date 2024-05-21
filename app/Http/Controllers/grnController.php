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

class grnController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            return view('grn.index',compact('notice_list'));
        } else {
            return view('signin');
        }
    }
    public function bill_list_purchase(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tbl_item')
                ->join('tbl_vendor','tbl_vendor.id','=','tbl_item.vendor_id')
                ->select('tbl_item.bill_no','tbl_item.price','tbl_item.id','tbl_vendor.vendor_name')
                ->orderBy('tbl_item.id','desc')
                ->where('tbl_item.grn','=','0')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="add_grn_purchase" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> GRN Add</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function bill_list_servicing(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tbl_servicing')
                ->select('billing_number','billing_amount','servicing_vendor_name','id')
                ->orderBy('id','desc')
                ->where('grn','=','0')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="add_grn_servicing" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> GRN Add</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function grn_list_purchase(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tbl_item')
                ->join('tbl_grn','tbl_grn.item_id','=','tbl_item.id')
                ->select('tbl_item.bill_no','tbl_grn.id', 'tbl_grn.grn_no')
                ->where('tbl_grn.type','=','purchase')
                ->orderBy('tbl_grn.id','desc')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_grn_purchase" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                    <button type="submit" data-id="' . $row->id . '" id="delete_grn_purchase" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function grn_list_servicing(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tbl_servicing')
                ->join('tbl_grn','tbl_grn.item_id','=','tbl_servicing.id')
                ->select('tbl_servicing.billing_number','tbl_grn.id', 'tbl_grn.grn_no')
                ->where('tbl_grn.type','=','servicing')
                ->orderBy('tbl_grn.id','desc')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_grn_servicing" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                    <button type="submit" data-id="' . $row->id . '" id="delete_grn_servicing" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function grn_purchase_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // "grn_no" => 'required|unique:tbl_grn,grn_no',
        ]);
        if ($validator->passes()) {
            DB::table('tbl_grn')->insert([
                "item_id" => $request->item_id,
                "grn_no"  => $request->grn_no,
                "type"  => "purchase",
            ]);
            DB::table('tbl_item')
                ->where('id', $request->item_id)
                ->update([
                    "grn" => '1',
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'GRN Stored Successfully'
                ]
            );
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
    public function grn_servicing_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // "grn_no" => 'required|unique:tbl_grn,grn_no',
        ]);
        if ($validator->passes()) {
            DB::table('tbl_grn')->insert([
                "item_id" => $request->item_id,
                "grn_no"  => $request->grn_no,
                "type"  => "servicing",
            ]);
            DB::table('tbl_servicing')
                ->where('id', $request->item_id)
                ->update([
                    "grn" => '1',
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'GRN Stored Successfully'
                ]
            );
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
    public function bill_info_purchase($id)
    {
        $data = DB::table('tbl_item')
            ->select('bill_no','id')
            ->where('id', '=', $id)
            ->first();
        return response()->json($data);
    }
    public function bill_info_servicing($id)
    {
        $data = DB::table('tbl_servicing')
            ->select('billing_number','id')
            ->where('id', '=', $id)
            ->first();
        return response()->json($data);
    }
    public function grn_info_purchase($id)
    {
        $data = DB::table('tbl_grn')
            ->select('grn_no','id')
            ->where('id', '=', $id)
            ->first();
        return response()->json($data);
    }
    public function grn_info_servicing($id)
    {
        $data = DB::table('tbl_grn')
            ->select('grn_no','id')
            ->where('id', '=', $id)
            ->first();
        return response()->json($data);
    }
    public function grn_purchase_update(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make($request->all(), [
//            "grn_no" => 'required|unique:tbl_grn,grn_no' . ($id ? ",$id" : ''),
            // "grn_no" => 'required|unique:tbl_grn,grn_no',
        ]);

        if ($validator->passes()) {
            DB::table('tbl_grn')
                ->where('id', $id)
                ->update([
                    "grn_no" => $request->grn_no,
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'GRN Updated Successfully'
                ]
            );
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
    public function grn_servicing_update(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make($request->all(), [
//            "grn_no" => 'required|unique:tbl_grn,grn_no' . ($id ? ",$id" : ''),
            // "grn_no" => 'required|unique:tbl_grn,grn_no',
        ]);

        if ($validator->passes()) {
            DB::table('tbl_grn')
                ->where('id', $id)
                ->update([
                    "grn_no" => $request->grn_no,
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'GRN Updated Successfully'
                ]
            );
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
    public function grn_purchase_delete($id)
    {
        $info=DB::table('tbl_grn')->select('item_id')->where('id','=',$id)->first();
        DB::table('tbl_item')
            ->where('id', '=', $info->item_id)
            ->update([
                "grn" => '0',
            ]);
        DB::table('tbl_grn')->where('id', '=', $id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'GRN Deleted Successfully !!!!!!!!!!'
            ]
        );
    }
    public function grn_servicing_delete($id)
    {
        $info=DB::table('tbl_grn')->select('item_id')->where('id','=',$id)->first();
        DB::table('tbl_servicing')
            ->where('id', '=', $info->item_id)
            ->update([
                "grn" => '0',
            ]);
        DB::table('tbl_grn')->where('id', '=', $id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'GRN Deleted Successfully !!!!!!!!!!'
            ]
        );
    }
}
