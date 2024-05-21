<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Chart;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        error_reporting(0);
        if (Auth::check()) {
            $student_id = Auth::user()->user_name;
            $item_list = DB::table('tbl_item_name')->select('*')->get();
            $notice_list = DB::table('tbl_notice')->select('*')->limit(1)->orderBy('id','desc')->first();
            $branch_summery = DB::table('tbl_item_distribution')
                ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->join('tbl_region', 'tbl_region.id', '=', 'tbl_item_distribution.region_id')
                ->join('tbl_zone', 'tbl_zone.id', '=', 'tbl_item_distribution.zone_id')
                ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                ->where('tbl_item_distribution.distribution_type','=', 'Branch')
                ->where('tbl_item.recycle', '=', 0)
                ->where('tbl_item_distribution.diff', '!=', '0')
                ->groupBy('tbl_item_distribution.item_name_id')
                ->select('tbl_item.*', 'tbl_item_distribution.*','tbl_item_name.item_name','tbl_branch.branch_name', 'tbl_branch.phone', 'tbl_zone.zone_name', 'tbl_brand.brand_name', 'tbl_region.region_name', DB::raw('sum(distribution_qty) as distribution_qty'))
                ->get();
            $head_office_summery = DB::table('tbl_item_distribution')
                ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->join('tbl_employee', 'tbl_employee.id', '=', 'tbl_item_distribution.emp_id')
                ->join('tbl_employee_department', 'tbl_employee_department.id', '=', 'tbl_employee.department_id')
                ->where('tbl_item_distribution.distribution_type','Head office')
                ->where('tbl_item_distribution.diff', '!=', '0')
                ->where('tbl_item.recycle', '=', 0)
                ->whereColumn('tbl_item_distribution.distribution_qty', '!=', 'tbl_item_distribution.distribution_recycle_qty')
                ->groupBy('tbl_item_distribution.item_name_id')
                ->select('tbl_item.*', 'tbl_brand.brand_name', 'tbl_item_distribution.*',
                    'tbl_employee.employee_name','tbl_employee.employee_id','tbl_item_name.item_name','tbl_employee_department.department_name', DB::raw('sum(distribution_qty) as distribution_qty'))
                ->get();

            $project_summery = DB::table('tbl_item_distribution')
                ->join('tbl_item', 'tbl_item.id', '=', 'tbl_item_distribution.item_id')
                ->join('tbl_item_name', 'tbl_item_name.id', '=', 'tbl_item_distribution.item_name_id')
                ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_item.brand_id')
                ->join('tbl_project', 'tbl_project.id', '=', 'tbl_item_distribution.project_id')
                ->join('tbl_branch', 'tbl_branch.id', '=', 'tbl_item_distribution.branch_id')
                ->where('tbl_item_distribution.distribution_type','Project')
                ->where('tbl_item.recycle', '=', 0)
                ->where('tbl_item_distribution.diff', '!=', '0')
                ->groupBy('tbl_item_distribution.item_name_id')
                ->select('tbl_item.*', 'tbl_item_distribution.*','tbl_item_name.item_name','tbl_branch.branch_name', 'tbl_project.project_name', 'tbl_brand.brand_name', DB::raw('sum(distribution_qty) as distribution_qty'))
                ->get();



            $chart_data = DB::table('tbl_servicing')
                ->join('tbl_branch','tbl_branch.id','=','tbl_servicing.branch_id')
                ->select('tbl_servicing.branch_id', DB::raw('COUNT(tbl_servicing.id) as errors'), 'tbl_branch.branch_name')
                ->groupBy('tbl_servicing.branch_id')
                ->orderBy(DB::raw('COUNT(tbl_servicing.id)'), 'DESC')
                ->take(5)
                ->get();


            $groups = DB::table('tbl_servicing')
                ->join('tbl_branch','tbl_branch.id','=','tbl_servicing.branch_id')
                ->select('tbl_servicing.branch_id', DB::raw('count(tbl_servicing.id) as total'), 'tbl_branch.branch_name')
                ->groupBy('tbl_servicing.branch_id')
                ->orderBy(DB::raw('COUNT(tbl_servicing.id)'), 'DESC')
                ->limit(5)
                ->pluck('total', 'tbl_branch.branch_name')
                ->all();

            $groups1 = DB::table('tbl_servicing')
                ->select('branch_id', DB::raw('count(id) as total'))
                ->groupBy('branch_id')
                ->orderBy(DB::raw('COUNT(id)'), 'DESC')
                ->limit(5)
                ->pluck('total', 'branch_id')->all();

//            dd($groups);
//
            for ($i=0; $i<=count($groups); $i++) {
                $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
            }
            $chart = new Chart;
            $chart->labels = (array_keys($groups));
            $chart->dataset = (array_values($groups));
            $chart->colours = $colours;

//            dd($chart_data);

            $highest_one = DB::table('tbl_servicing')
                ->join('tbl_branch','tbl_branch.id','=','tbl_servicing.branch_id')
                ->select('tbl_servicing.branch_id', DB::raw('COUNT(tbl_servicing.id) as errors'), 'tbl_branch.branch_name')
                ->groupBy('tbl_servicing.branch_id')
                ->orderBy(DB::raw('COUNT(tbl_servicing.id)'), 'DESC')
                ->take(1)
                ->first();

            $highest_two = DB::table('tbl_servicing')
                ->join('tbl_branch','tbl_branch.id','=','tbl_servicing.branch_id')
                ->select('tbl_servicing.branch_id', DB::raw('COUNT(tbl_servicing.id) as errors'), 'tbl_branch.branch_name')
                ->where('tbl_servicing.branch_id','!=',$highest_one->branch_id)
                ->groupBy('tbl_servicing.branch_id')
                ->orderBy(DB::raw('COUNT(tbl_servicing.id)'), 'DESC')
                ->take(1)
                ->first();
            $highest_three = DB::table('tbl_servicing')
                ->join('tbl_branch','tbl_branch.id','=','tbl_servicing.branch_id')
                ->select('tbl_servicing.branch_id', DB::raw('COUNT(tbl_servicing.id) as errors'), 'tbl_branch.branch_name')
                ->where('tbl_servicing.branch_id','!=',$highest_one->branch_id)
                ->where('tbl_servicing.branch_id','!=',$highest_two->branch_id)
                ->groupBy('tbl_servicing.branch_id')
                ->orderBy(DB::raw('COUNT(tbl_servicing.id)'), 'DESC')
                ->take(1)
                ->first();

//            return view('admin/dashboard', compact('item_list','notice_list', 'branch_summery', 'head_office_summery', 'project_summery','highest_one','highest_two','highest_three'));
            return view('admin/dashboard', compact('item_list','notice_list', 'branch_summery', 'head_office_summery', 'project_summery','chart'));
        }
        else {
            return view('signin');
        }
    }

}
