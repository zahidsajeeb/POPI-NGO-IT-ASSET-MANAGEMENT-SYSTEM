<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.include.stylesheet')
</head>

<body>

<!-- Main navbar -->
@include('admin.include.navbar')
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
@include('admin.include.sidebar')
<!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Datatables</span>
                            - Basic</h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none">
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-link btn-float text-body"><i
                                    class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                            <a href="#" class="btn btn-link btn-float text-body"><i
                                    class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                            <a href="#" class="btn btn-link btn-float text-body"><i
                                    class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                        </div>
                    </div>
                </div>

                <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="datatable_basic.html" class="breadcrumb-item">Settings</a>
                            <span class="breadcrumb-item active">Logo</span>
                        </div>

                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>

                    <div class="header-elements d-none">
                        <div class="breadcrumb justify-content-center">
                            <a href="#" class="breadcrumb-elements-item">
                                <i class="icon-comment-discussion mr-2"></i>
                                Support
                            </a>

                            <div class="breadcrumb-elements-item dropdown p-0">
                                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-gear mr-2"></i>
                                    Settings
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account
                                        security</a>
                                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                                    <a href="#" class="dropdown-item"><i class="icon-accessibility"></i>
                                        Accessibility</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Basic layout-->
                <div class="card">
{{--                    <div class="card-header">--}}
{{--                        <h5 class="card-title">Logo Upload</h5>--}}
{{--                    </div>--}}
                    <div class="card-body">
                        <form action="#">
                            <fieldset>
                                <legend class="font-weight-semibold">
                                    <i class="icon-file-text2 mr-2"></i>
                                    Logo Upload
                                    <a class="float-right text-body" data-toggle="collapse" data-target="#demo1">
                                        <i class="icon-circle-down2"></i>
                                    </a>
                                </legend>
                                <div class="collapse show" id="demo1">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Image:</label>
                                        <div class="col-lg-8">
                                            <input type="file" class="form-control h-auto">
                                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Upload Current Time/Date:</label>
                                        <div class="col-lg-8">
                                            <input type="file" class="form-control h-auto">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Image Preview:</label>
                                        <div class="col-lg-8">
                                            <div>
                                                <img src="{{asset('upload/logo.jpg')}}" style="height:300px;width:300px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>


                <!-- Basic datatable -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Basic datatable</h5>
                    </div>

                    <div class="card-body">
                        The <code>DataTables</code> is a highly flexible tool, based upon the foundations of progressive
                        enhancement, and will add advanced interaction controls to any HTML table. DataTables has most
                        features enabled by default, so all you need to do to use it with your own tables is to call the
                        construction function. Searching, ordering, paging etc goodness will be immediately added to the
                        table, as shown in this example. <strong>Datatables support all available table
                            styling.</strong>
                    </div>

                    <table class="table datatable-basic">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Job Title</th>
                            <th>DOB</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Marth</td>
                            <td><a href="#">Enright</a></td>
                            <td>Traffic Court Referee</td>
                            <td>22 Jun 1972</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jackelyn</td>
                            <td>Weible</td>
                            <td><a href="#">Airline Transport Pilot</a></td>
                            <td>3 Oct 1981</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Aura</td>
                            <td>Hard</td>
                            <td>Business Services Sales Representative</td>
                            <td>19 Apr 1969</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nathalie</td>
                            <td><a href="#">Pretty</a></td>
                            <td>Drywall Stripper</td>
                            <td>13 Dec 1977</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sharan</td>
                            <td>Leland</td>
                            <td>Aviation Tactical Readiness Officer</td>
                            <td>30 Dec 1991</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxine</td>
                            <td><a href="#">Woldt</a></td>
                            <td><a href="#">Business Services Sales Representative</a></td>
                            <td>17 Oct 1987</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sylvia</td>
                            <td><a href="#">Mcgaughy</a></td>
                            <td>Hemodialysis Technician</td>
                            <td>11 Nov 1983</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Lizzee</td>
                            <td><a href="#">Goodlow</a></td>
                            <td>Technical Services Librarian</td>
                            <td>1 Nov 1961</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kennedy</td>
                            <td>Haley</td>
                            <td>Senior Marketing Designer</td>
                            <td>18 Dec 1960</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Chantal</td>
                            <td><a href="#">Nailor</a></td>
                            <td>Technical Services Librarian</td>
                            <td>10 Jan 1980</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Delma</td>
                            <td>Bonds</td>
                            <td>Lead Brand Manager</td>
                            <td>21 Dec 1968</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Roland</td>
                            <td>Salmos</td>
                            <td><a href="#">Senior Program Developer</a></td>
                            <td>5 Jun 1986</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Coy</td>
                            <td>Wollard</td>
                            <td>Customer Service Operator</td>
                            <td>12 Oct 1982</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxwell</td>
                            <td>Maben</td>
                            <td>Regional Representative</td>
                            <td>25 Feb 1988</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Cicely</td>
                            <td>Sigler</td>
                            <td><a href="#">Senior Research Officer</a></td>
                            <td>15 Mar 1960</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /basic datatable -->


                <!-- Pagination types -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Pagination types</h5>
                    </div>

                    <div class="card-body">
                        The default page control (forward and backward buttons with up to 7 page numbers in-between) is
                        fine for most situations, but in some cases you may wish to customise the options presented to
                        the end user. This is done through DataTables' extensible pagination mechanism, the <code>pagingType</code>
                        option. Supported pagination types are: <code>simple</code>, <code>simple_numbers</code>, <code>full</code>
                        and <code>full_numbers</code>. This example shows <code>simple</code> pagination type.
                    </div>

                    <table class="table datatable-pagination">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Job Title</th>
                            <th>DOB</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Marth</td>
                            <td><a href="#">Enright</a></td>
                            <td>Traffic Court Referee</td>
                            <td>22 Jun 1972</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jackelyn</td>
                            <td>Weible</td>
                            <td><a href="#">Airline Transport Pilot</a></td>
                            <td>3 Oct 1981</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Aura</td>
                            <td>Hard</td>
                            <td>Business Services Sales Representative</td>
                            <td>19 Apr 1969</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nathalie</td>
                            <td><a href="#">Pretty</a></td>
                            <td>Drywall Stripper</td>
                            <td>13 Dec 1977</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sharan</td>
                            <td>Leland</td>
                            <td>Aviation Tactical Readiness Officer</td>
                            <td>30 Dec 1991</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxine</td>
                            <td><a href="#">Woldt</a></td>
                            <td><a href="#">Business Services Sales Representative</a></td>
                            <td>17 Oct 1987</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sylvia</td>
                            <td><a href="#">Mcgaughy</a></td>
                            <td>Hemodialysis Technician</td>
                            <td>11 Nov 1983</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Lizzee</td>
                            <td><a href="#">Goodlow</a></td>
                            <td>Technical Services Librarian</td>
                            <td>1 Nov 1961</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kennedy</td>
                            <td>Haley</td>
                            <td>Senior Marketing Designer</td>
                            <td>18 Dec 1960</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Chantal</td>
                            <td><a href="#">Nailor</a></td>
                            <td>Technical Services Librarian</td>
                            <td>10 Jan 1980</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Delma</td>
                            <td>Bonds</td>
                            <td>Lead Brand Manager</td>
                            <td>21 Dec 1968</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Roland</td>
                            <td>Salmos</td>
                            <td><a href="#">Senior Program Developer</a></td>
                            <td>5 Jun 1986</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Coy</td>
                            <td>Wollard</td>
                            <td>Customer Service Operator</td>
                            <td>12 Oct 1982</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxwell</td>
                            <td>Maben</td>
                            <td>Regional Representative</td>
                            <td>25 Feb 1988</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Cicely</td>
                            <td>Sigler</td>
                            <td><a href="#">Senior Research Officer</a></td>
                            <td>15 Mar 1960</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /pagination types -->


                <!-- State saving -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">State saving</h5>
                    </div>

                    <div class="card-body">
                        DataTables has the option of being able to <code>save the state</code> of a table: its paging
                        position, ordering state etc., so that is can be restored when the user reloads a page, or comes
                        back to the page after visiting a sub-page. This state saving ability is enabled by the <code>stateSave</code>
                        option. The <code>duration</code> for which the saved state is valid can be set using the <code>stateDuration</code>
                        initialisation parameter (2 hours by default).
                    </div>

                    <table class="table datatable-save-state">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Job Title</th>
                            <th>DOB</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Marth</td>
                            <td><a href="#">Enright</a></td>
                            <td>Traffic Court Referee</td>
                            <td>22 Jun 1972</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jackelyn</td>
                            <td>Weible</td>
                            <td><a href="#">Airline Transport Pilot</a></td>
                            <td>3 Oct 1981</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Aura</td>
                            <td>Hard</td>
                            <td>Business Services Sales Representative</td>
                            <td>19 Apr 1969</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nathalie</td>
                            <td><a href="#">Pretty</a></td>
                            <td>Drywall Stripper</td>
                            <td>13 Dec 1977</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sharan</td>
                            <td>Leland</td>
                            <td>Aviation Tactical Readiness Officer</td>
                            <td>30 Dec 1991</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxine</td>
                            <td><a href="#">Woldt</a></td>
                            <td><a href="#">Business Services Sales Representative</a></td>
                            <td>17 Oct 1987</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sylvia</td>
                            <td><a href="#">Mcgaughy</a></td>
                            <td>Hemodialysis Technician</td>
                            <td>11 Nov 1983</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Lizzee</td>
                            <td><a href="#">Goodlow</a></td>
                            <td>Technical Services Librarian</td>
                            <td>1 Nov 1961</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kennedy</td>
                            <td>Haley</td>
                            <td>Senior Marketing Designer</td>
                            <td>18 Dec 1960</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Chantal</td>
                            <td><a href="#">Nailor</a></td>
                            <td>Technical Services Librarian</td>
                            <td>10 Jan 1980</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Delma</td>
                            <td>Bonds</td>
                            <td>Lead Brand Manager</td>
                            <td>21 Dec 1968</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Roland</td>
                            <td>Salmos</td>
                            <td><a href="#">Senior Program Developer</a></td>
                            <td>5 Jun 1986</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Coy</td>
                            <td>Wollard</td>
                            <td>Customer Service Operator</td>
                            <td>12 Oct 1982</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxwell</td>
                            <td>Maben</td>
                            <td>Regional Representative</td>
                            <td>25 Feb 1988</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Cicely</td>
                            <td>Sigler</td>
                            <td><a href="#">Senior Research Officer</a></td>
                            <td>15 Mar 1960</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /state saving -->


                <!-- Scrollable datatable -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Scrollable datatable</h5>
                    </div>

                    <div class="card-body">
                        This example shows the DataTables table body <code>scrolling</code> in the <code>vertical</code>
                        direction. This can generally be seen as an alternative method to pagination for displaying a
                        large table in a fairly small vertical area, and as such pagination has been disabled here. Note
                        that this is not mandatory, it will work just fine with pagination enabled as well!.
                    </div>

                    <table class="table datatable-scroll-y" width="100%">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Job Title</th>
                            <th>DOB</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Marth</td>
                            <td><a href="#">Enright</a></td>
                            <td>Traffic Court Referee</td>
                            <td>22 Jun 1972</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jackelyn</td>
                            <td>Weible</td>
                            <td><a href="#">Airline Transport Pilot</a></td>
                            <td>3 Oct 1981</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Aura</td>
                            <td>Hard</td>
                            <td>Business Services Sales Representative</td>
                            <td>19 Apr 1969</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nathalie</td>
                            <td><a href="#">Pretty</a></td>
                            <td>Drywall Stripper</td>
                            <td>13 Dec 1977</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sharan</td>
                            <td>Leland</td>
                            <td>Aviation Tactical Readiness Officer</td>
                            <td>30 Dec 1991</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxine</td>
                            <td><a href="#">Woldt</a></td>
                            <td><a href="#">Business Services Sales Representative</a></td>
                            <td>17 Oct 1987</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sylvia</td>
                            <td><a href="#">Mcgaughy</a></td>
                            <td>Hemodialysis Technician</td>
                            <td>11 Nov 1983</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Lizzee</td>
                            <td><a href="#">Goodlow</a></td>
                            <td>Technical Services Librarian</td>
                            <td>1 Nov 1961</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kennedy</td>
                            <td>Haley</td>
                            <td>Senior Marketing Designer</td>
                            <td>18 Dec 1960</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Chantal</td>
                            <td><a href="#">Nailor</a></td>
                            <td>Technical Services Librarian</td>
                            <td>10 Jan 1980</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Delma</td>
                            <td>Bonds</td>
                            <td>Lead Brand Manager</td>
                            <td>21 Dec 1968</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Roland</td>
                            <td>Salmos</td>
                            <td><a href="#">Senior Program Developer</a></td>
                            <td>5 Jun 1986</td>
                            <td><span class="badge badge-secondary">Inactive</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Coy</td>
                            <td>Wollard</td>
                            <td>Customer Service Operator</td>
                            <td>12 Oct 1982</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxwell</td>
                            <td>Maben</td>
                            <td>Regional Representative</td>
                            <td>25 Feb 1988</td>
                            <td><span class="badge badge-danger">Suspended</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Cicely</td>
                            <td>Sigler</td>
                            <td><a href="#">Senior Research Officer</a></td>
                            <td>15 Mar 1960</td>
                            <td><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to
                                                .pdf</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to
                                                .csv</a>
                                            <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to
                                                .doc</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /scrollable datatable -->

            </div>
            <!-- /content area -->


            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                            data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
						<span class="navbar-text">
							&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a
                                href="https://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
						</span>

                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link"
                                                target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                        <li class="nav-item"><a href="https://demo.interface.club/limitless/docs/"
                                                class="navbar-nav-link" target="_blank"><i
                                    class="icon-file-text2 mr-2"></i> Docs</a></li>
                        <li class="nav-item"><a
                                href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov"
                                class="navbar-nav-link font-weight-semibold"><span class="text-pink"><i
                                        class="icon-cart2 mr-2"></i> Purchase</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer -->

        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/datatable_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Feb 2022 05:25:45 GMT -->
</html>

