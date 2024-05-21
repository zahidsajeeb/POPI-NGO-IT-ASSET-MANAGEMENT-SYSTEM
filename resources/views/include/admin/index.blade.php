<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome To POPI SOFTWARE (Admin Panel) </h4>
                    </div>
                </div>
            </div>
            <div class="content">
{{--                @if($notice_list)--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="alert alert-info alert-dismissible">--}}
{{--                            <h3><b>Notice:</b></h3>--}}
{{--                            <span class="font-weight-semibold">{{$notice_list->notice}}</span>.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endif--}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-body border-top-primary">
                            <div>
                                <h6 class="m-0 font-weight-semibold">Top 5 Branches Device Servicing Chart</h6>
                                <hr>
                            </div>
                            <canvas id="userChart" class="rounded shadow"></canvas>
{{--                            <canvas id="userChart" class="rounded shadow" width="640" height="480"></canvas>--}}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-body border-top-primary">
                            <div>
                                <h6 class="m-0 font-weight-semibold">Item Lists</h6>
                                <hr>
                            </div>
                            <table class="table table-bordered" id="item" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Total Purchase</th>
                                    <th class="text-center">Total Recycle</th>
                                    <th class="text-center">Active Item</th>
                                    <th class="text-center">Item Type</th>
{{--                                    <th class="text-center">Total Distribution</th>--}}
                                    <th class="text-center">Available For Distribute</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($item_list as $key=>$row)
                                    @php
                                        $total_purchase = DB::table('tbl_item')
                                        ->select('*',DB::raw('sum(qty) as qty'))
                                        ->where('item_name_id',$row->id)
                                        ->first();

										$total_recycle = DB::table('tbl_item')
                                        ->select('*',DB::raw('sum(recycle_qty) as recycle_qty'))
                                        ->where('item_name_id',$row->id)
                                        ->first();

										$total_distribution = DB::table('tbl_item_distribution')
                                        ->select('*',DB::raw('sum(distribution_qty) as distribution_qty'))
                                        ->where('item_name_id',$row->id)
                                        ->first();

                                        $available = DB::table('tbl_item')
                                        ->select('*',DB::raw('sum(availability) as availability'))
                                        ->where('item_name_id',$row->id)
                                        ->first();

										$return = DB::table('tbl_item')
                                        ->select('*',DB::raw('sum(availability) as availability'))
                                        ->where('item_name_id',$row->id)
                                        ->first();

										$b_qty = DB::table('tbl_item')
                                        ->select('*',DB::raw('sum(b_qty) as b_qty'))
                                        ->where('item_name_id',$row->id)
                                        ->first();


                                    @endphp
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->item_name}}</td>
                                        <td>{{$total_purchase->qty}}</td>
                                        <td>{{$total_recycle->recycle_qty}}</td>
                                        <td>{{($total_purchase->qty)-($total_recycle->recycle_qty)}}</td>
                                        <td>
                                            @if($row->fixed_asset==0)
                                                Non Fixed
                                            @else
                                                Fixed
                                            @endif
                                        </td>
{{--                                        <td>{{($total_distribution->distribution_qty)}}</td>--}}
                                        <td>
                                            @if($total_recycle->recycle_qty != 0)
                                                {{($b_qty->b_qty)}}
                                            @else
                                                {{($b_qty->b_qty)-($total_recycle->recycle_qty)}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-body border-top-primary">
                            <div>
                                <h6 class="m-0 font-weight-semibold">Branch Summery</h6>
                                <hr>
                            </div>
                            <table class="table table-bordered" id="branch_summery" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Distribution QTY</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($branch_summery as $key=>$row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->item_name}}</td>
                                    <td>{{$row->distribution_qty}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-body border-top-primary">
                            <div>
                                <h6 class="m-0 font-weight-semibold">Head office Summery</h6>
                                <hr>
                            </div>
                            <table class="table table-bordered" id="head_office_summery" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Distribution QTY</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($head_office_summery as $key=>$row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->item_name}}</td>
                                        <td>{{$row->distribution_qty}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-body border-top-primary">
                            <div>
                                <h6 class="m-0 font-weight-semibold">Project Summery</h6>
                                <hr>
                            </div>
                            <table class="table table-bordered" id="project_summery" style="border:1px solid; text-align:center;">
                                <thead style="background:#194d83;color:white; text-align:center;">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Distribution QTY</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project_summery as $key=>$row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->item_name}}</td>
                                        <td>{{$row->distribution_qty}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $('#branch_summery').DataTable();
  $('#head_office_summery').DataTable();
  $('#project_summery').DataTable();
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
// The data for our dataset
        data: {
            labels:  {!!json_encode($chart->labels)!!} ,
            datasets: [
                {
                    label: 'Count of Service',
                    backgroundColor: {!! json_encode($chart->colours)!!} ,
                    data:  {!! json_encode($chart->dataset)!!} ,
                },
            ]
        },
// Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {if (value % 1 === 0) {return value;}}
                    },
                    scaleLabel: {
                        display: false
                    }
                }]
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
</script>

