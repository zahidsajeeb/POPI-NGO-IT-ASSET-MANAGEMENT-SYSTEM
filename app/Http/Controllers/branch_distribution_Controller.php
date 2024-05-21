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

    class branch_distribution_Controller extends Controller
    {
        public function index()
        {
            if (Auth::check()) {
                $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
                $available_items = DB::table('tbl_item')
                    ->join('tbl_brand', 'tbl_item.brand_id', '=', 'tbl_brand.id')
                    ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item.item_name_id')
                    ->select('tbl_item.*', 'tbl_brand.brand_name', 'tbl_item_name.item_name')
                    ->where('tbl_item.availability', '=','1')
                    ->where('tbl_item.distribution', '=','0')
                    ->where('tbl_item.recycle','=','0')
                    ->orderBy('tbl_item.id','desc')
                    ->get();
                return view('distribution.branch.index', compact('available_items', 'notice_list'));
            } else {
                return view('signin');
            }
        }
        public function branch_distribution_list(Request $request)
        {
            if ($request->ajax()) {
                $data = DB::table('tbl_item_distribution')
                    ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->leftJoin('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                    ->leftJoin('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                    ->leftJoin('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                    ->orderBy('tbl_item.id','desc')
                    ->where('tbl_item_distribution.distribution_type','=','Branch')
                    ->whereColumn('tbl_item_distribution.distribution_qty', '!=', 'tbl_item_distribution.distribution_recycle_qty')
                    ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_branch.branch_name', 'tbl_zone.zone_name', 'tbl_brand.brand_name', 'tbl_region.region_name', 'tbl_item_distribution.distribution_date','tbl_item_distribution.distribution_qty','tbl_item_distribution.item_type', 'tbl_item_distribution.id','tbl_item.distribution','tbl_item_distribution.distribution_type')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
//                        if($row->distribution==0){
                            $btn = '<a href="' . url('branch_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                            return $btn;
//                        }
//                        if($row->distribution==1){
//                            $btn = '<a href="' . url('branch_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>';
//                            return $btn;
//                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function user_branch_distribution_list(Request $request)
        {
            if ($request->ajax()) {
                $user_region = Auth::user()->region_id;
                $user_name = Auth::user()->name;
                $data = DB::table('tbl_item_distribution')
                    ->leftJoin('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                    ->leftJoin('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                    ->leftJoin('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                    ->leftJoin('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                    ->leftJoin('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                    ->leftJoin('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                    ->join('user_region', 'user_region.region_id', '=', 'tbl_item_distribution.region_id')
                    ->orderBy('tbl_item.id','desc')
                    ->where('tbl_item_distribution.distribution_type','=','Branch')
                    ->where('user_region.user_name','=',$user_name)
//                    ->where('tbl_item_distribution.region_id','=',$user_region)
                    ->whereColumn('tbl_item_distribution.distribution_qty', '!=', 'tbl_item_distribution.distribution_recycle_qty')
                    ->select('tbl_item.*', 'tbl_item_name.item_name', 'tbl_branch.branch_name', 'tbl_zone.zone_name', 'tbl_brand.brand_name', 'tbl_region.region_name', 'tbl_item_distribution.distribution_date','tbl_item_distribution.distribution_qty','tbl_item_distribution.item_type', 'tbl_item_distribution.id','tbl_item.distribution','tbl_item_distribution.distribution_type')
                    ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="' . url('branch_distribution/edit', $row->id) . '" class="btn btn-sm btn-teal" style="border-radius:0px;text-align:center;"><i class="fa fa-edit"></i> Edit</a>
                            <a href="#" id="delete" class="btn btn-sm btn-danger" data-id="' . $row->id . '" style="border-radius:0px;text-align:center;"><i class="icon-trash"></i> Delete</button>';
                        return $btn;

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
                $region_name = DB::table('tbl_region')->select('*')->get();
                $item_check = DB::table('tbl_item_distribution')->where('item_id', '=', $data->id)->count();

                return view('distribution.branch.distribution', compact('data', 'item_name', 'brand_name', 'region_name', 'item_check', 'notice_list'));
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
                ->select('*', DB::raw('sum(distribution_qty) as distribution_qty'))
                ->where('item_id', '=', $request->item_id)
                ->groupBy('item_id')
                ->first();

//            dd($distribution);
//            $update_b_qty =($item_purchase->qty)-(($request->distribution_qty) + ($distribution->distribution_qty));

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
                        "region_id" => $request->region_id,
                        "zone_id" => $request->zone_id,
                        "branch_id" => $request->branch_id,
                        "distribution_date" => $request->distribution_date,
                        "item_type" => $request->item_type,
                        "distribution_qty" => $request->distribution_qty,
                        "distribution_type" => "Branch",
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
                $edit_item_name = DB::table('tbl_item_name')->select('item_name')->where('id', $data->item_name_id)->first();
                $edit_brand_name = DB::table('tbl_brand')->select('brand_name')->where('id', $data->brand_id)->first();
                $edit_zone_name = DB::table('tbl_zone')->select('zone_name', 'id')->where('id', $data->zone_id)->first();
                $edit_region_name = DB::table('tbl_region')->select('region_name', 'id')->where('id', $data->region_id)->first();
                $edit_branch_name = DB::table('tbl_branch')->select('branch_name', 'id')->where('id', $data->branch_id)->first();
                $item_check = DB::table('tbl_item_distribution')->where('item_id', '=', $data->id)->count();
                $region_name = DB::table('tbl_region')->select('*')->get();
                return view('distribution.branch.edit',
                    compact('edit_item_name', 'edit_branch_name', 'edit_brand_name', 'edit_zone_name', 'edit_region_name', 'region_name', 'data','total_purchase','total_distribution','notice_list'));
            } else {
                return view('signin');
            }

        }

        public function update(Request $request)
        {
            error_reporting(0);
            $id = $request->id;
            $total_store = DB::table('tbl_item')
                ->select('qty')
                ->where('id', '=', $request->item_id)
                ->first();

            if (($request->distribution_qty) > $total_store->qty) {
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Data deleted successfully'
                    ]
                );
            }
            if (($request->distribution_qty) <= $total_store->qty) {
                if ($request->edit_region_id != null) {
                    DB::table('tbl_item_distribution')
                        ->where('id', $id)
                        ->update([
                            "region_id" => $request->edit_region_id,
                            "zone_id" => $request->edit_zone_id,
                            "branch_id" => $request->edit_branch_id,
                            "distribution_date" => $request->distribution_date,
                            "distribution_qty" => $request->distribution_qty,
                        ]);
                }
                if ($request->edit_region_id == null) {
                    DB::table('tbl_item_distribution')
                        ->where('id', $id)
                        ->update([
                            "region_id" => $request->region_id,
                            "zone_id" => $request->zone_id,
                            "branch_id" => $request->branch_id,
                            "distribution_date" => $request->distribution_date,
                            "distribution_qty" => $request->distribution_qty,
                        ]);
                }
                return response()->json(
                    [
                        'status' => 'success',
                        'message' => 'Item Stored Successfully'
                    ]
                );
            }

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

    }
