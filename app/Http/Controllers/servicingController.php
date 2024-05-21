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
    use phpDocumentor\Reflection\Types\True_;
    use Validator;
    use Rakibhstu\Banglanumber\NumberToBangla;
    use Riskihajar\Terbilang\Facades\Terbilang;

    class servicingController extends Controller
    {
        public function index()
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $asset_code_list = DB::table('tbl_item')->select('*')->get();
            $region_list = DB::table('tbl_region')->select('*')->get();
            $zone_list = DB::table('tbl_zone')->select('*')->get();
            $branch_list = DB::table('tbl_branch')->select('*')->get();
            $item_list = DB::table('tbl_item_name')->select('*')->get();
            $project_list = DB::table('tbl_project')->select('*')->get();
            $distribution_list = DB::table('tbl_item')
                ->join('tbl_item_name','tbl_item_name.id','tbl_item.item_name_id')
                ->join('tbl_item_distribution','tbl_item_distribution.item_id','tbl_item.id')
                ->join('tbl_item_return','tbl_item_return.distribution_id','tbl_item_distribution.id')
                ->join('tbl_servicing','tbl_servicing.distribution_id','=','tbl_item_distribution.id')
                // ->join('tbl_servicing','tbl_servicing.item_id','tbl_item.id')
                ->join('tbl_branch','tbl_branch.id','tbl_servicing.branch_id')
//                ->join('tbl_zone','tbl_zone.id','tbl_item_distribution.zone_id')
//                ->join('tbl_region','tbl_region.id','tbl_item_distribution.region_id')

                ->select('tbl_item.*','tbl_item_name.item_name','tbl_item_return.id','tbl_branch.branch_name','tbl_servicing.servicing_status')
                ->where('tbl_item_return.return_type','Servicing')
                ->where('tbl_item_return.distribution_status',0)
//                ->where('tbl_item.availability','0')
//                ->where('tbl_item_distribution.servicing','1')
                ->get();

//            dd($distribution_list);

            $branch_check = DB::table('tbl_item_distribution')
                ->join('tbl_item_return','tbl_item_return.distribution_id','tbl_item_distribution.id')
                ->where('tbl_item_distribution.distribution_type', 'Branch')
                ->count();
            $head_check = DB::table('tbl_item_distribution')
                ->join('tbl_item_return','tbl_item_return.distribution_id','tbl_item_distribution.id')
                ->where('tbl_item_distribution.distribution_type', 'Head office')
                ->count();
            $project_check = DB::table('tbl_item_distribution')
                ->join('tbl_item_return','tbl_item_return.distribution_id','tbl_item_distribution.id')
                ->where('tbl_item_distribution.distribution_type', 'Project')
                ->count();


            return view('servicing.index', compact('asset_code_list', 'region_list', 'zone_list', 'branch_list', 'item_list', 'project_list', 'distribution_list', 'head_check', 'branch_check', 'project_check', 'notice_list'));
        }

        public function branch_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->join('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                    ->join('tbl_item_return', 'tbl_item_return.distribution_id', '=', 'tbl_item_distribution.id')
                    ->join('tbl_region', 'tbl_item_distribution.region_id', '=', 'tbl_region.id')
                    ->join('tbl_zone', 'tbl_item_distribution.zone_id', '=', 'tbl_zone.id')
                    ->join('tbl_branch', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                    ->where('tbl_item_distribution.distribution_type', 'Branch')
                    ->where('tbl_item_return.return_type','Servicing')
                    ->where('tbl_item_distribution.servicing', '0')
                    ->where('tbl_item_return.distribution_status','0')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item_return.id',
                        'tbl_item.asset_code', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_region.region_name', 'tbl_zone.zone_name', 'tbl_branch.branch_name', 'tbl_item_name.item_name')
                    ->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('servicing/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Add</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function head_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                        ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                        ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                        ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                        ->join('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                        ->join('tbl_item_return', 'tbl_item_return.distribution_id', '=', 'tbl_item_distribution.id')
                        ->where('tbl_item_distribution.distribution_type', 'Head office ')
                        ->where('tbl_item_return.return_type','Servicing')
                        ->where('tbl_item_distribution.servicing', '0')
                        ->where('tbl_item_return.distribution_status','0')
                        ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name','tbl_item_return.id', 'tbl_item.asset_code', 'tbl_item.purchase_date', 'tbl_item.exp_date')
                        ->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . url('servicing/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Add</a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
        }

        public function project_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->join('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                    ->join('tbl_item_return', 'tbl_item_return.distribution_id', '=', 'tbl_item_distribution.id')
                    ->join('tbl_project', 'tbl_item_distribution.project_id', '=', 'tbl_project.id')
                    ->join('tbl_branch', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                    ->where('tbl_item_distribution.distribution_type', 'Project')
                    ->where('tbl_item_return.return_type','Servicing')
                    ->where('tbl_item_distribution.servicing', '0')
                    ->where('tbl_item_return.distribution_status','0')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item_return.id',
                        'tbl_item.asset_code', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_branch.branch_name', 'tbl_project.project_name', 'tbl_item_name.item_name')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('servicing/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Add</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function servicing_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_servicing')
                    ->join('tbl_item', 'tbl_item.id', '=', 'tbl_servicing.item_id')
                    ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_servicing.branch_id')
//                    ->join('tbl_employee', 'tbl_employee.id', '=', 'tbl_servicing.branch_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->select('tbl_servicing.*', 'tbl_item_name.item_name', 'tbl_item.asset_code', 'tbl_item.serial_no', 'tbl_vendor.vendor_name', 'tbl_branch.branch_name')
                    ->orderBy('tbl_servicing.id', 'desc')
                    ->get();
//                dd($data);
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if ($row->return_date == '') {
//                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
//                                    <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
//                                    <a href="' . url('report/item_report', $row->item_id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> History</a>
//                                   <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
//                            return $btn;
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_return" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Service Return</a>
                                    <a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="' . url('report/item_report', $row->item_id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> History</a>
                                   <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }
                        if ($row->return_date != '') {
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="service_edit" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="' . url('report/item_report', $row->item_id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> History</a>
                                    <button type="submit" data-id="' . $row->id . '" id="delete_service" class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
                        }

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function add($id)
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $info = DB::table('tbl_item_return')
                    ->select('*')
                    ->where('id', $id)
                    ->first();
                $distribution_data = DB::table('tbl_item_distribution')
                    ->select('*')
                    ->where('id', $info->distribution_id)
                    ->first();

                $data = DB::table('tbl_item')
                    ->select('*')
                    ->where('id', $distribution_data->item_id)
                    ->first();

                $check_service = DB::table('tbl_servicing')->where('item_id', $data->id)->where('return_date', '=', '')->first();

                $branch_name = DB::table('tbl_branch')
                    ->select('*')
                    ->where('id', $distribution_data->branch_id)
                    ->first();
                $zone_name = DB::table('tbl_zone')
                    ->select('zone_name')
                    ->where('id', $distribution_data->zone_id)
                    ->first();
                $region_name = DB::table('tbl_region')
                    ->select('region_name')
                    ->where('id', $distribution_data->region_id)
                    ->first();

                $emp_info = DB::table('tbl_employee')
                    ->join('tbl_employee_department','tbl_employee_department.id','tbl_employee.department_id')
                    ->select('tbl_employee.employee_id','tbl_employee.employee_name','tbl_employee_department.department_name')
                    ->where('tbl_employee.id', $distribution_data->emp_id)
                    ->first();

                $item_name = DB::table('tbl_item_name')
                    ->join('tbl_item', 'tbl_item.item_name_id', '=', 'tbl_item_name.id')
                    ->select('tbl_item_name.*')
                    ->where('tbl_item.id', $distribution_data->item_id)
                    ->first();
                $brand_name = DB::table('tbl_brand')
                    ->join('tbl_item', 'tbl_item.brand_id', '=', 'tbl_brand.id')
                    ->select('tbl_brand.*')
                    ->where('tbl_item.id', $distribution_data->item_id)
                    ->first();
                $vendor_name = DB::table('tbl_vendor')
                    ->join('tbl_item', 'tbl_item.vendor_id', '=', 'tbl_vendor.id')
                    ->select('tbl_vendor.*')
                    ->where('tbl_item.id', $distribution_data->item_id)
                    ->first();
                return view('servicing.add', compact('data', 'item_name', 'brand_name', 'vendor_name', 'check_service', 'branch_name', 'region_name', 'zone_name', 'distribution_data','id', 'info', 'emp_info', 'notice_list'));
            } else {
                return view('signin');
            }

        }

        public function distribution_history($id)
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $info = DB::table('tbl_item_return')
                    ->select('*')
                    ->where('id', $id)
                    ->first();
                $distribution_data = DB::table('tbl_item_distribution')
                    ->select('*')
                    ->where('id', $info->distribution_id)
                    ->first();

                $data = DB::table('tbl_item')
                    ->select('*')
                    ->where('id', $distribution_data->item_id)
                    ->first();

                $check_service = DB::table('tbl_servicing')->where('item_id', $data->id)->where('return_date', '=', '')->first();

                $branch_name = DB::table('tbl_branch')
                    ->select('*')
                    ->where('id', $distribution_data->branch_id)
                    ->first();
                $zone_name = DB::table('tbl_zone')
                    ->select('zone_name')
                    ->where('id', $distribution_data->zone_id)
                    ->first();
                $region_name = DB::table('tbl_region')
                    ->select('region_name')
                    ->where('id', $distribution_data->region_id)
                    ->first();

                $emp_info = DB::table('tbl_employee')
                    ->join('tbl_employee_department','tbl_employee_department.id','tbl_employee.department_id')
                    ->select('tbl_employee.employee_id','tbl_employee.employee_name','tbl_employee_department.department_name')
                    ->where('tbl_employee.id', $distribution_data->emp_id)
                    ->first();

                $item_name = DB::table('tbl_item_name')
                    ->join('tbl_item', 'tbl_item.item_name_id', '=', 'tbl_item_name.id')
                    ->select('tbl_item_name.*')
                    ->where('tbl_item.id', $distribution_data->item_id)
                    ->first();
                $brand_name = DB::table('tbl_brand')
                    ->join('tbl_item', 'tbl_item.brand_id', '=', 'tbl_brand.id')
                    ->select('tbl_brand.*')
                    ->where('tbl_item.id', $distribution_data->item_id)
                    ->first();
                $vendor_name = DB::table('tbl_vendor')
                    ->join('tbl_item', 'tbl_item.vendor_id', '=', 'tbl_vendor.id')
                    ->select('tbl_vendor.*')
                    ->where('tbl_item.id', $distribution_data->item_id)
                    ->first();
                return view('servicing.distribution_history', compact('data', 'item_name', 'brand_name', 'vendor_name', 'check_service', 'branch_name', 'region_name', 'zone_name', 'distribution_data','id', 'info', 'emp_info', 'notice_list'));
            } else {
                return view('signin');
            }

        }

        public function servicing_store(Request $request)
        {
            if($request->branch_id){
                DB::table('tbl_servicing')->insert([
                    "item_id" => $request->item_id,
                    "distribution_id" => $request->distribution_id,
                    "sending_date" => $request->sending_date,
                    "servicing_vendor_name" => $request->servicing_vendor_name,
                    "details" => $request->details,
                    "branch_id" => $request->branch_id,
                    "servicing_qty" => $request->return_qty,
                    "grn" => '0',
                ]);
                DB::table('tbl_item_distribution')
                    ->where('id', $request->distribution_id)
                    ->update([
                        "servicing" => '1',
                    ]);
            }
            else{
                DB::table('tbl_servicing')->insert([
                    "item_id" => $request->item_id,
                    "distribution_id" => $request->distribution_id,
                    "sending_date" => $request->sending_date,
                    "servicing_vendor_name" => $request->servicing_vendor_name,
                    "details" => $request->details,
                    "servicing_qty" => $request->return_qty,
                ]);
                DB::table('tbl_item_distribution')
                    ->where('id', $request->distribution_id)
                    ->update([
                        "servicing" => '1',
                    ]);

            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item Servicing stroed successfully !!!!!'
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

        public function servicing_delete($id)
        {
            $distribution_id = DB::table('tbl_servicing')->select('distribution_id')->where('id', '=', $id)->first();

            DB::table('tbl_item_distribution')
                ->where('id', $distribution_id->distribution_id)
                ->update([
                    "servicing" => '0',
                    "return_type" => '',
                ]);

            DB::table('tbl_servicing')->where('id', '=', $id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee designation deleted successfully !!!!!!!!!!'
                ]
            );
        }

        public function servicing_return($id)
        {
            $data = DB::table('tbl_servicing')
                ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_servicing.item_id')
                ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->leftJoin('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                ->select('tbl_servicing.*', 'tbl_item.item_name', 'tbl_item.asset_code')
                ->where('tbl_servicing.id', $id)
                ->select('tbl_servicing.*', 'tbl_item_name.item_name', 'tbl_item.asset_code', 'tbl_brand.brand_name', 'tbl_vendor.vendor_name')
                ->first();
            return response()->json($data);
        }

        public function servicing_edit($id)
        {
            $data = DB::table('tbl_servicing')
                ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_servicing.item_id')
                ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->leftJoin('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                ->select('tbl_servicing.*', 'tbl_item_name.item_name', 'tbl_item.asset_code', 'tbl_item.item_desc', 'tbl_brand.brand_name', 'tbl_vendor.vendor_name')
                ->where('tbl_servicing.id', $id)
                ->first();
            return response()->json($data);
        }

        public function servicing_update(Request $request)
        {
            $id = $request->id;
            $validator = Validator::make($request->all(), [
                // "billing_number" => 'required|unique:tbl_servicing,billing_number' . ($id ? ",$id" : ''),
            ]);

            if ($validator->passes()) {
            DB::table('tbl_servicing')
                ->where('id', $id)
                ->update([
                    "sending_date" => $request->sending_date,
                    "servicing_vendor_name" => $request->servicing_vendor_name,
                    "billing_number" => $request->billing_number,
                    "billing_amount" => $request->billing_amount,
                    "details" => $request->details,
                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee designation updated successfully'
                ]
            );
            }
        }

        public function servicing_return_store(Request $request)
        {
            $id = $request->id;
            DB::table('tbl_servicing')
                ->where('id', $id)
                ->update([
                    "return_date" => $request->return_date,
                    "billing_number" => $request->billing_number,
                    "billing_amount" => $request->billing_amount,
                    "warranty" => $request->warranty,
                    "servicing_status" => '1',
                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee designation updated successfully'
                ]
            );
        }

        public function distribution($id)
        {
            $return_qty = DB::table('tbl_item_return')->select('*')->where('id', $id)->first();

            $info = DB::table('tbl_item_distribution')->select('*')->where('id',$return_qty->distribution_id)->first();

            DB::table('tbl_item_distribution')->insert([
                "item_id" => $info->item_id,
                "item_name_id" => $info->item_name_id,
                "brand_id" => $info->brand_id,
                "region_id" => $info->region_id,
                "zone_id" => $info->zone_id,
                "branch_id" => $info->branch_id,
                "emp_id" => $info->emp_id,
                "department_id" => $info->department_id,
                "project_id" => $info->project_id,
                "distribution_date" => $info->distribution_date,
                "item_type" => $info->item_type,
                "distribution_qty" => $return_qty->return_qty,
                "distribution_type" => $info->distribution_type,
            ]);
            DB::table('tbl_item_return')
                ->where('id', $return_qty->id)
                ->update([
                    "distribution_status" => 1,
                ]);

//            $return_qty ='0';
//            DB::table('tbl_item_distribution')
//                ->where('id', $id)
//                ->update([
////                    "servicing" => '0',
////                    "return_qty" => '0',
////                    "return_type" => '',
//                    "diff" => (($info->distribution_qty)-$return_qty),
//                ]);
//            DB::table('tbl_item')
//                ->where('id', $info->item_id)
//                ->update([
//                    "return_type" => '',
////                    "b_qty" => '0',
//                ]);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Employee designation updated successfully'
                ]
            );
        }

    }
