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

    class itemController extends Controller
    {
        public function item()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $fixed_asset_item_name_list = DB::table('tbl_item_name')->select('*')->where('fixed_asset', '1')->get();
                $non_fixed_asset_item_name_list = DB::table('tbl_item_name')->select('*')->where('fixed_asset', '0')->get();
                $brand_list = DB::table('tbl_brand')->select('*')->get();
                $vendor_list = DB::table('tbl_vendor')->select('*')->get();
                // $count = DB::table('tbl_item')->select('*')->count();
                $count = DB::table('tbl_item')->select('id')->orderBy('id', 'desc')->first();
                return view('item.index', compact('brand_list', 'vendor_list', 'fixed_asset_item_name_list', 'non_fixed_asset_item_name_list', 'count', 'notice_list'));
            } else {
                return view('signin');
            }

        }

        //{{===================Item Section======================
        public function fixed_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->where('tbl_item_name.fixed_asset', '1')
                    ->orderBy('tbl_item.id', 'desc')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item.id', 'tbl_item.asset_code',
                        'tbl_item.serial_no', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_item.qty', 'tbl_item.price', 'tbl_item.bill_no')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="fixed_edit_item" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="' . url('item_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                            <button type="submit" data-id="' . $row->id . '" id="delete_item" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->addColumn('warranty', function ($row) {
                        $today_date = date('Y-m-d');
                        $today_date_format = date_create("$today_date");

                        $purchase_date = date_create("$row->purchase_date");
                        $exp_date = date_create("$row->exp_date");
                        $difference_one = date_diff($purchase_date, $exp_date);
                        $difference_two = date_diff($today_date_format, $exp_date);
                        $result = $difference_two->format("%R%a days");
                        if ($result <= 15) {
                            $btn_2 = '<a href="#" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;">' . $result . '</a>';
                            return $btn_2;
                        } else {
                            return $result;
                        }

                    })
                    ->rawColumns(['action', 'warranty'])
                    ->make(true);
            }
        }

        public function non_fixed_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->where('tbl_item_name.fixed_asset', '0')
                    ->orderBy('tbl_item.id', 'desc')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item.id', 'tbl_item.asset_code',
                        'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_item.qty', 'tbl_item.price' , 'tbl_item.bill_no')
                    ->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="non_fixed_edit_item" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="' . url('item_show', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-eye"></i> Show</a>
                            <button type="submit" data-id="' . $row->id . '" id="delete_item" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->addColumn('unit_price', function ($row) {
                        $unit_price = ($row->price) / ($row->qty);
                        $btn_3 = $unit_price;
                        return $btn_3;
                    })
                    ->addColumn('warranty', function ($row) {
                        $today_date = date('Y-m-d');
                        $today_date_format = date_create("$today_date");

                        $purchase_date = date_create("$row->purchase_date");
                        $exp_date = date_create("$row->exp_date");
                        $difference_one = date_diff($purchase_date, $exp_date);
                        $difference_two = date_diff($today_date_format, $exp_date);
                        $result = $difference_two->format("%R%a days");
                        if ($result <= 15) {
                            $btn_2 = '<a href="#" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;">' . $result . '</a>';
                            return $btn_2;
                        } else {
                            return $result;
                        }

                    })
                    ->rawColumns(['action', 'warranty', 'unit_price'])
                    ->make(true);
            }
        }

        public function fixed_item_store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                "serial_no" => 'required|unique:tbl_item,serial_no',
            ]);
            if ($validator->passes()) {
                if (($request->purchase_date) > ($request->exp_date)) {
                    return response()->json(
                        [
                            'status' => 'error',
                            'message' => 'Data deleted successfully'
                        ]
                    );
                }
                if (($request->purchase_date) < ($request->exp_date)) {
                    $last_id = DB::table('tbl_item')->select('id')->orderBy('id', 'desc')->first();
                    $asset_code = $request->asset_code;
                    $i_asset_code = $last_id->id + 2;

                    $check = DB::table('tbl_item')->select('asset_code')->where('asset_code','=',$asset_code)->first();
                    if($check!=null){
                      DB::table('tbl_item')->insert([
                        "asset_code" => "Asst-00" .$i_asset_code,
                        "bill_no" => $request->bill_no,
                        "item_name_id" => $request->item_name_id,
                        "brand_id" => $request->brand_id,
                        "vendor_id" => $request->vendor_id,
                        "item_desc" => $request->item_desc,
                        "purchase_date" => $request->purchase_date,
                        "exp_date" => $request->exp_date,
                        "serial_no" => $request->serial_no,
                        "qty" => $request->qty,
                        "b_qty" => $request->qty,
                        "price" => $request->price,
                        "support" => $request->support,
                        "grn" => "0",
                        ]);
                    }
                    else{
                        DB::table('tbl_item')->insert([
                        "asset_code" => $asset_code,
                        "bill_no" => $request->bill_no,
                        "item_name_id" => $request->item_name_id,
                        "brand_id" => $request->brand_id,
                        "vendor_id" => $request->vendor_id,
                        "item_desc" => $request->item_desc,
                        "purchase_date" => $request->purchase_date,
                        "exp_date" => $request->exp_date,
                        "serial_no" => $request->serial_no,
                        "qty" => $request->qty,
                        "b_qty" => $request->qty,
                        "price" => $request->price,
                        "support" => $request->support,
                        "grn" => "0",
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

        public function non_fixed_item_store(Request $request)
        {
            $validator = Validator::make($request->all(), [
//            "serial_no" => 'required|unique:tbl_item,serial_no',
            ]);
            if ($validator->passes()) {
                $last_id = DB::table('tbl_item')->select('id')->orderBy('id', 'desc')->first();
                  $asset_code = $request->asset_code;
                  $i_asset_code = $last_id->id + 2;

                  $check = DB::table('tbl_item')->select('asset_code')->where('asset_code','=',$asset_code)->first();
                  if($check!=null){
                       DB::table('tbl_item')->insert([
                        "asset_code" => "Asst-00" .$i_asset_code,
                        "bill_no" => $request->bill_no,
                        "item_name_id" => $request->item_name_id,
                        "brand_id" => $request->brand_id,
                        "vendor_id" => $request->vendor_id,
                        "item_desc" => $request->item_desc,
                        "purchase_date" => $request->purchase_date,
                        "exp_date" => $request->exp_date,
                        "serial_no" => $request->serial_no,
                        "qty" => $request->qty,
                        "b_qty" => $request->qty,
                        "price" => $request->price,
                        "support" => $request->support,
                        "grn" => "0",
                        ]);
                    }

                    else{
                        DB::table('tbl_item')->insert([
                        "asset_code" => $asset_code,
                        "bill_no" => $request->bill_no,
                        "item_name_id" => $request->item_name_id,
                        "brand_id" => $request->brand_id,
                        "vendor_id" => $request->vendor_id,
                        "item_desc" => $request->item_desc,
                        "purchase_date" => $request->purchase_date,
                        "exp_date" => $request->exp_date,
                        "serial_no" => $request->serial_no,
                        "qty" => $request->qty,
                        "b_qty" => $request->qty,
                        "price" => $request->price,
                        "support" => $request->support,
                        "grn" => "0",
                    ]);
                    }
                return response()->json(
                        [
                            'status' => 'success',
                            'message' => 'Purchase Request Stored Successfully'
                        ]
                    );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function fixed_item_edit($id)
        {
            $data = DB::table('tbl_item')
                ->where('id', '=', $id)
                ->first();
            return response()->json($data);
        }

        public function fixed_item_update(Request $request)
        {
            $id = $request->id;
            if (!isset($request->image)) {
                DB::table('tbl_item')
                    ->where('id', $id)
                    ->update([
                        "bill_no" => $request->bill_no,
                        "item_name_id" => $request->item_name_id,
                        "brand_id" => $request->brand_id,
                        "vendor_id" => $request->vendor_id,
                        "item_desc" => $request->item_desc,
                        "purchase_date" => $request->purchase_date,
                        "exp_date" => $request->exp_date,
                        "serial_no" => $request->serial_no,
                        "qty" => $request->qty,
                        "price" => $request->price,
                        "grn" => "0",
                    ]);
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item Updated Successfully'
                ]
            );
        }

        public function non_fixed_item_edit($id)
        {
            $data = DB::table('tbl_item')
                ->where('id', '=', $id)
                ->first();
            return response()->json($data);
        }

        public function non_fixed_item_update(Request $request)
        {
            $id = $request->id;
            if (!isset($request->image)) {
                DB::table('tbl_item')
                    ->where('id', $id)
                    ->update([
                        "bill_no" => $request->bill_no,
                        "item_name_id" => $request->item_name_id,
                        "brand_id" => $request->brand_id,
                        "vendor_id" => $request->vendor_id,
                        "item_desc" => $request->item_desc,
                        "purchase_date" => $request->purchase_date,
                        "qty" => $request->qty,
                        "price" => $request->price,
                        "grn" => "0",
                    ]);
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item Updated Successfully'
                ]
            );
        }

        public function item_delete($id)
        {
            $item_check = DB::table('tbl_item_distribution')->where('item_id', '=', $id)->count();
            if ($item_check != 0) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if ($item_check == 0) {
                DB::table('tbl_item')->where('id', '=', $id)->delete();
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
        }

        public function item_show($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $data = DB::table('tbl_item')
                ->select('*')
                ->where('id', $id)
                ->first();
            $item_name = DB::table('tbl_item_name')
                ->join('tbl_item', 'tbl_item.item_name_id', '=', 'tbl_item_name.id')
                ->select('tbl_item_name.item_name')
                ->where('tbl_item.id', $id)
                ->first();

            $distribution = DB::table('tbl_item_distribution')
                ->select('*')
                ->where('item_id', $id)
                ->get();

            $distribution_list = DB::table('tbl_item_distribution')
                ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->leftJoin('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                ->leftJoin('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                ->leftJoin('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                ->leftJoin('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                ->leftJoin('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_item_distribution.department_id')
                ->where('tbl_item.id', $id)
                ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_branch.branch_name', 'tbl_zone.zone_name', 'tbl_brand.brand_name', 'tbl_region.region_name',
                    'tbl_item_distribution.distribution_date', 'tbl_item_distribution.item_type', 'tbl_item_distribution.id',
                    'tbl_employee.employee_name', 'tbl_employee_department.department_name', 'tbl_item_distribution.distribution_type')
                ->get();

//            dd($distribution_list);

            $brand_name = DB::table('tbl_brand')
                ->select('*')
                ->where('id', $data->brand_id)
                ->first();
            $vendor_name = DB::table('tbl_vendor')
                ->select('*')
                ->where('id', $data->vendor_id)
                ->first();
            return view('item.show', compact('data', 'brand_name', 'vendor_name', 'distribution', 'distribution_list', 'item_name', 'notice_list'));
        }

        //{{===================Brand Section======================
        public function brand_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_brand')
                    ->select('*')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('edit', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_brand" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->addColumn('delete', function ($row) {
                        $btn = '<button type="submit" data-id="' . $row->id . '" id="delete_brand" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['edit', 'delete'])
                    ->make(true);
            }
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

        public function brand_edit($id)
        {
            $data = DB::table('tbl_brand')->where('id', '=', $id)->first();
            return response()->json($data);
        }

        public function brand_update(Request $request)
        {
            $id = $request->id;
            $validator = Validator::make($request->all(), [
                "brand_name" => 'required|unique:tbl_brand,brand_name' . ($id ? ",$id" : ''),
            ]);

            if ($validator->passes()) {
                DB::table('tbl_brand')
                    ->where('id', $id)
                    ->update([
                        "brand_name" => $request->brand_name,
                    ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Brand Name Updated Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function brand_delete($id)
        {
            $brand_check = DB::table('tbl_item')->where('brand_id', '=', $id)->count();
            if ($brand_check != 0) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if ($brand_check == 0) {
                DB::table('tbl_brand')->where('id', '=', $id)->delete();
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
        }

        //{{===================Vendor Section======================
        public function vendor_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_vendor')
                    ->select('*')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('edit', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_vendor" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->addColumn('delete', function ($row) {
                        $btn = '<button type="submit" data-id="' . $row->id . '" id="delete_vendor" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['edit', 'delete'])
                    ->make(true);
            }
        }

        public function vendor_store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                "vendor_name" => 'required|unique:tbl_vendor,vendor_name',
            ]);
            if ($validator->passes()) {
                DB::table('tbl_vendor')->insert([
                    "vendor_name" => $request->vendor_name,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Vendor Name Stored Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function vendor_edit($id)
        {
            $data = DB::table('tbl_vendor')->where('id', '=', $id)->first();
            return response()->json($data);
        }

        public function vendor_update(Request $request)
        {
            $id = $request->id;
            $validator = Validator::make($request->all(), [
                "vendor_name" => 'required|unique:tbl_vendor,vendor_name' . ($id ? ",$id" : ''),
            ]);
            if ($validator->passes()) {
                DB::table('tbl_vendor')
                    ->where('id', $id)
                    ->update([
                        "vendor_name" => $request->vendor_name,
                    ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Vendor Name Updated Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function vendor_delete($id)
        {
            $vendor_check = DB::table('tbl_item')->where('vendor_id', '=', $id)->count();
            if ($vendor_check != 0) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if ($vendor_check == 0) {
                DB::table('tbl_vendor')->where('id', '=', $id)->delete();
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
        }

        //{{===================Item Name Section======================
        public function item_name_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_name')
                    ->select('*')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('edit', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="edit_item_name" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>';
                        return $btn;
                    })
                    ->addColumn('delete', function ($row) {
                        $btn = '<button type="submit" data-id="' . $row->id . '" id="delete_item_name" class="btn btn-sm btn-danger" style="border-radius:0px;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;
                    })
                    ->rawColumns(['edit', 'delete'])
                    ->make(true);
            }
        }

        public function item_name_store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                "item_name" => 'required|unique:tbl_item_name,item_name',
            ]);
            if ($validator->passes()) {
                DB::table('tbl_item_name')->insert([
                    "item_name" => $request->item_name,
                    "fixed_asset" => $request->fixed_asset,
                ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Item Name Stored Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function item_name_edit($id)
        {
            $data = DB::table('tbl_item_name')->where('id', '=', $id)->first();
            return response()->json($data);
        }

        public function item_name_update(Request $request)
        {
            $id = $request->id;
            $validator = Validator::make($request->all(), [
                "item_name" => 'required|unique:tbl_item_name,item_name' . ($id ? ",$id" : ''),
            ]);

            if ($validator->passes()) {
                DB::table('tbl_item_name')
                    ->where('id', $id)
                    ->update([
                        "item_name" => $request->item_name,
                        "fixed_asset" => $request->fixed_asset,
                    ]);
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Item Name Updated Successfully'
                    ]
                );
            }
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function item_name_delete($id)
        {
            $brand_check = DB::table('tbl_item')->where('item_name_id', '=', $id)->count();
            if ($brand_check != 0) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if ($brand_check == 0) {
                DB::table('tbl_item_name')->where('id', '=', $id)->delete();
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
        }
    }
