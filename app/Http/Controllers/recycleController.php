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

    class recycleController extends Controller
    {
        public function index()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $asset_code_list = DB::table('tbl_item')->select('*')->get();
                $region_list = DB::table('tbl_region')->select('*')->get();
                $zone_list = DB::table('tbl_zone')->select('*')->get();
                $branch_list = DB::table('tbl_branch')->select('*')->get();
                $item_list = DB::table('tbl_item_name')->select('*')->get();
                $project_list = DB::table('tbl_project')->select('*')->get();
                return view('recycle.index', compact('asset_code_list', 'region_list', 'zone_list', 'branch_list', 'item_list', 'project_list', 'notice_list'));
            } else {
                return view('signin');
            }
        }

        public function branch_item_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->join('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->join('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                    ->join('tbl_region', 'tbl_item_distribution.region_id', '=', 'tbl_region.id')
                    ->join('tbl_zone', 'tbl_item_distribution.zone_id', '=', 'tbl_zone.id')
                    ->join('tbl_branch', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                    ->where('tbl_item_distribution.distribution_type', 'Branch')
                    ->where('tbl_item_distribution.recycle_status', '0')
                    ->where('tbl_item.recycle', '=', '0')
                    ->where('tbl_item_distribution.diff', '!=', '0')
                    ->where('tbl_item_distribution.return_type', '=', null)
                    ->where('tbl_item.qty', '>=', 'tbl_item.recycle_qty')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item_distribution.id',
                        'tbl_item.asset_code', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_region.region_name', 'tbl_zone.zone_name', 'tbl_branch.branch_name', 'tbl_item_name.item_name')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('recycle/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Recycle Add</a>';
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
                    ->where('tbl_item_distribution.distribution_type', 'Head office ')
                    ->where('tbl_item_distribution.recycle_status', '0')
                    ->where('tbl_item.recycle', '=', '0')
                    ->where('tbl_item_distribution.diff', '!=', '0')
                    ->where('tbl_item_distribution.return_type', '=', null)
                    ->where('tbl_item.qty', '>=', 'tbl_item.recycle_qty')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item.id', 'tbl_item.asset_code', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_item_distribution.id')
                    ->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('recycle/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Recycle Add</a>';
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
                    ->join('tbl_project', 'tbl_item_distribution.project_id', '=', 'tbl_project.id')
                    ->join('tbl_branch', 'tbl_item_distribution.branch_id', '=', 'tbl_branch.id')
                    ->where('tbl_item_distribution.distribution_type', 'Project')
                    ->where('tbl_item_distribution.recycle_status', '0')
                    ->where('tbl_item.recycle', '=', '0')
                    ->where('tbl_item_distribution.diff', '!=', '0')
                    ->where('tbl_item_distribution.return_type', '=', null)
                    ->where('tbl_item.qty', '>=', 'tbl_item.recycle_qty')
                    ->select('tbl_brand.brand_name', 'tbl_vendor.vendor_name', 'tbl_item_name.item_name', 'tbl_item.id',
                        'tbl_item.asset_code', 'tbl_item.purchase_date', 'tbl_item.exp_date', 'tbl_branch.branch_name', 'tbl_project.project_name', 'tbl_item_name.item_name', 'tbl_item_distribution.id')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('recycle/add', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-plus"></i> Recycle Add</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function recycle_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    // ->leftJoin('tbl_item_distribution', 'tbl_item_distribution.item_id', '=', 'tbl_item.id')
                    // ->leftJoin('tbl_recycle', 'tbl_recycle.distribution_id', '=', 'tbl_item_distribution.id')
                    ->leftJoin('tbl_recycle', 'tbl_recycle.item_id', '=', 'tbl_item.id')
                    ->where('tbl_item.recycle_qty', '!=', 0)
                    ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_brand.brand_name', 'tbl_recycle.*')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        if($row->sell == null){
                            $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" id="sell" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-cart-plus"></i> Sell</a>';
                            return $btn;
                        }
                        if($row->sell == 1){
                            $btn = '<a href="javascript:void(0)"  class="btn btn-sm btn-danger" style="border-radius:0px;text-align:center;"><i class="fa fa-check"></i> Sell Done</a>
                                    <a href="javascript:void(0)" data-id="' . $row->id . '" id="sell_details" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-gear"></i> Sell Details</a>';
                            return $btn;
                        }

                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function add($id)
        {
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $info = DB::table('tbl_item_distribution')->where('id', '=', $id)->first();

            $data = DB::table('tbl_item')
                ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->leftJoin('tbl_vendor', 'tbl_vendor.id', '=', 'tbl_item.vendor_id')
                ->where('tbl_item.id', $info->item_id)
                ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_item.asset_code', 'tbl_brand.brand_name', 'tbl_vendor.vendor_name')
                ->first();

            $recycle = DB::table('tbl_recycle')
                ->select('*', DB::raw('sum(recycle_qty) as recycle_qty'))
                ->groupBy('item_id')
                ->first();

            $total_distribution = DB::table('tbl_item_distribution')
                ->select('distribution_qty')
                ->where('id', $id)
                ->first();

//            $total_recycle = DB::table('tbl_item')
//                ->select('*', DB::raw('sum(recycle_qty) as recycle_qty'))
//                ->where('id', $info->item_id)
//                ->first();

            $total_recycle = DB::table('tbl_recycle')
                ->select('recycle_qty', DB::raw('sum(recycle_qty) as recycle_qty'))
                ->where('distribution_id', $info->id)
//                ->groupBy('distribution_id')
                ->first();
//            dd($total_recycle);

            $total_store = DB::table('tbl_item')
                ->select('qty')
                ->where('id', $info->item_id)
                ->first();

            $total_return = DB::table('tbl_item_return')
                ->select('return_qty', DB::raw('sum(return_qty) as return_qty'))
                ->where('distribution_id', $id)
                ->groupBy('distribution_id')
                ->first();
            return view('recycle.add', compact('data', 'total_distribution', 'total_store', 'total_recycle', 'info', 'total_return', 'notice_list'));
        }

        public function store(Request $request)
        {
            if (($request->total_recycle_qty) > ($request->recycle_qty)) {
                $total_distribution = DB::table('tbl_item_distribution')
                    ->select('distribution_qty','return_qty')
                    ->where('id', $request->distribution_id)
                    ->first();

                $total_recycle = DB::table('tbl_recycle')
                    ->select('recycle_qty', DB::raw('sum(recycle_qty) as recycle_qty'))
                    ->where('distribution_id', $request->distribution_id)
                    ->first();

                DB::table('tbl_item')
                    ->where('id', $request->id)
                    ->update([
//                        "recycle_qty" => (($request->previous_recycle_qty) + ($request->recycle_qty) + ($request->item_recycle_qty)),
                        "recycle_qty" => (($request->recycle_qty) + ($request->item_recycle_qty)),
                    ]);
                DB::table('tbl_item_distribution')
                    ->where('id', $request->distribution_id)
                    ->update([
                        "distribution_recycle_qty" => (($request->previous_recycle_qty) + ($request->recycle_qty)),
                    ]);
                DB::table('tbl_recycle')->insert([
                    "distribution_id" => $request->distribution_id,
                    "item_id" => $request->item_id,
                    "recycle_qty" => $request->recycle_qty,
                    "recycle_date" => $request->recycle_date,
                    "recycle_location" => $request->recycle_location,
                    "recycle_remarks" => $request->recycle_remarks,
                ]);

                $total_purchase = DB::table('tbl_item')
                    ->select('qty')
                    ->where('id', $request->id)
                    ->first();

                $recycle = DB::table('tbl_recycle')
                    ->select('recycle_qty', DB::raw('sum(recycle_qty) as recycle_qty'))
                    ->groupBy('item_id')
                    ->first();

                if(($total_distribution->distribution_qty) == ($total_recycle->recycle_qty)){
                    DB::table('tbl_item_distribution')
                        ->where('id',  $request->distribution_id)
                        ->update([
                            "recycle_status" => "1",
                        ]);
                }

                if(($total_purchase->qty) == ($recycle->recycle_qty)){
                    DB::table('tbl_item')
                        ->where('id',  $request->id)
                        ->update([
                            "recycle" => "1",
                        ]);
                }
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Item Stored Successfully'
                    ]
                );
                return response()->json(['error' => $validator->errors()->all()]);

            }
            if (($request->total_recycle_qty) >= ($request->recycle_qty)) {
                $total_distribution = DB::table('tbl_item_distribution')
                    ->select('distribution_qty','return_qty')
                    ->where('id', $request->distribution_id)
                    ->first();

                $total_recycle = DB::table('tbl_recycle')
                    ->select('recycle_qty', DB::raw('sum(recycle_qty) as recycle_qty'))
                    ->where('distribution_id', $request->distribution_id)
                    ->first();

                DB::table('tbl_item')
                    ->where('id', $request->id)
                    ->update([
//                        "recycle_qty" => (($request->previous_recycle_qty) + ($request->recycle_qty) + ($request->item_recycle_qty)),
                        "recycle_qty" => (($request->recycle_qty) + ($request->item_recycle_qty)),
                    ]);
                DB::table('tbl_item_distribution')
                    ->where('id', $request->distribution_id)
                    ->update([
                        "distribution_recycle_qty" => (($request->previous_recycle_qty) + ($request->recycle_qty)),
                        "diff" => (($total_distribution->distribution_qty)-(($total_distribution->return_qty)+($request->previous_recycle_qty) + ($request->recycle_qty))),
                    ]);
                DB::table('tbl_recycle')->insert([
                    "distribution_id" => $request->distribution_id,
                    "item_id" => $request->item_id,
                    "recycle_qty" => $request->recycle_qty,
                    "recycle_date" => $request->recycle_date,
                    "recycle_location" => $request->recycle_location,
                    "recycle_remarks" => $request->recycle_remarks,
                ]);

                if(($total_distribution->distribution_qty) == ($total_recycle->recycle_qty)){
                    DB::table('tbl_item_distribution')
                        ->where('id',  $request->distribution_id)
                        ->update([
                            "recycle_status" => "1",
                        ]);
                }
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Item Stored Successfully'
                    ]
                );
                return response()->json(['error' => $validator->errors()->all()]);
            }
            if (($request->total_recycle_qty) < ($request->recycle_qty)) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
                return response()->json(['error' => $validator->errors()->all()]);
            }


        }

        public function delete(Request $request)
        {
            DB::table('tbl_item')
                ->where('id', $request->id)
                ->update([
                    "recycle" => 0,
                    "recycle_date" => '',
                    "recycle_qty" => 0,
                    "recycle_location" => '',
                    "recycle_remarks" => '',
                ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item Stored Successfully'
                ]
            );
            return response()->json(['error' => $validator->errors()->all()]);
        }

        public function sell_info($id)
        {
            $data = DB::table('tbl_recycle')
                ->join('tbl_item','tbl_item.id', '=', 'tbl_recycle.item_id')
                ->select('tbl_recycle.*', 'tbl_item.asset_code' )
                ->where('tbl_recycle.id', '=', $id)
                ->first();
//            dd($data);
            return response()->json($data);
        }

        public function sell_store(Request $request)
        {
            $user_id = Auth::user()->user_name;
            $id = $request->id;
            DB::table('tbl_recycle')
                ->where('id', $id)
                ->update([
                    "sell" => '1',
                ]);
            DB::table('tbl_recycle_item_sell')->insert([
                    "recycle_id" => $request->id,
                    "company_name" => $request->company_name,
                    "amount" => $request->amount,
                    "created_by" => $user_id
            ]);
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Item Updated Successfully'
                ]
            );
        }

        public function sell_details($id)
        {
            $data = DB::table('tbl_recycle_item_sell')
                ->join('tbl_recycle','tbl_recycle.id', '=', 'tbl_recycle_item_sell.recycle_id')
                ->join('tbl_item','tbl_item.id', '=', 'tbl_recycle.item_id')
                ->select('tbl_recycle_item_sell.*', 'tbl_item.asset_code' )
                ->where('tbl_recycle_item_sell.recycle_id', '=', $id)
                ->first();
//            dd($data);
            return response()->json($data);
        }


    }
