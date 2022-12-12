@extends('layouts.app')
@section('content')
@include('layouts.sidebar')
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-lg-flex flex-nowrap align-items-center">
                    <div class="page-title mr-4 pr-4 border-right ">
                        <h1>Dashboard</h1>
                    </div>

                </div>

            </div>
        </div>
        {{-- @if(Auth::user()->role=='admin') --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-statistics">
                    <div class="row no-gutters">
                        <div class="col-xxl-3 col-lg-6">
                            <div class="p-20 border-lg-right border-bottom border-xxl-bottom-0">
                                <div class="d-flex m-b-10">
                                    <p class="mb-0 font-regular text-muted font-weight-bold">Total
                                        Posts</p>
                                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i>
                                    </a>
                                </div>
                                <div class="d-block d-sm-flex h-100 align-items-center">
                                    <div class="">
                                        <div id="analytics7"></div>
                                    </div>
                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">

                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> {{$data}}
                                        </h3>
                                        <p>Products posted</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0">
                                <div class="d-flex m-b-10">
                                    <p class="mb-0 font-regular text-muted font-weight-bold">Total buyers
                                    </p>
                                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i></a>
                                </div>
                                <div class="d-block d-sm-flex h-100 align-items-center">
                                    <div class="apexchart-wrapper">
                                        <div id="analytics8"></div>
                                    </div>
                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{$person}}
                                        </h3>
                                        <p>This month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <div class="p-20 border-lg-right border-bottom border-lg-bottom-0">
                                <div class="d-flex m-b-10">
                                    <p class="mb-0 font-regular text-muted font-weight-bold">No of Sales
                                    </p>
                                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i>
                                    </a>
                                </div>
                                <div class="d-block d-sm-flex h-100 align-items-center">
                                    <div class="apexchart-wrapper">
                                        <div id="analytics9"></div>
                                    </div>
                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{$sales}}</h3>
                                        <p>Sales</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <div class="p-20">
                                <div class="d-flex m-b-10">
                                    <p class="mb-0 font-regular text-muted font-weight-bold">Orders
                                    </p>
                                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i>
                                    </a>
                                </div>
                                <div class="d-block d-sm-flex h-100 align-items-center">
                                    <div class="apexchart-wrapper">

                                        <div class="statistics ml-sm-auto mt-4 mt-sm-0 pr-sm-5">
                                            <ul class="list-style-none p-0">
                                                <li class="d-flex py-1">
                                                    <span><i class="fa fa-circle text-warning pr-2 "></i>
                                                        pending</span> <span class="pl-2 font-weight-bold">{{ $pend
                                                        }}</span>
                                                </li>
                                                <li class="d-flex py-1"><span><i
                                                            class="fa fa-circle text-success pr-2 "></i>
                                                        completed</span> <span class="pl-2 font-weight-bold">{{ $comp
                                                        }}</span></li>
                                                <li class="d-flex py-1"><span><i
                                                            class="fa fa-circle text-primary pr-2 "></i> All
                                                        orders</span> <span class="pl-2 font-weight-bold">{{ $all
                                                        }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-lg-flex flex-nowrap align-items-center">
                        <div class="page-title mr-4 pr-4 border-right ">
                            <h1>Market statics</h1>
                        </div>

                    </div>

                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col-xxl-8 m-b-30">
                    <div class="card card-statistics h-100 mb-0">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-heading">
                                <h4 class="card-title">Top selling products</h4>
                            </div>
                            <div class="dropdown">
                                <a class="btn btn-xs" href="#!">Export <i class="zmdi zmdi-download pl-1"></i> </a>
                            </div>
                        </div>
                        <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
                            <div class="datatable-wrapper table-responsive">
                                <table id="datatable" class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>In stock</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($completed->count() > 0)
                                        @foreach ($completed->orderitems as $item)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->price }}</td>

                                            <td>
                                                <div class="progress my-3" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width:{{ $item->products->quantity }}%;"
                                                        aria-valuenow="{{ $item->products->quantity }}"
                                                        aria-valuemin="0" aria-valuemax="100"></div>

                                                </div>
                                            </td>
                                            <td><span class="badge badge-success-inverse">Active</span></td>
                                            <td> <a class="mr-3" href="javascript:void(0);"><i
                                                        class="fe fe-edit"></i></a><a href="javascript:void(0);"><i
                                                        class="fe fe-trash-2"></i></a></td>
                                        </tr>
                                        @endforeach

                                        @endif


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>In stock</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 m-b-30">
                    <div class="card card-statistics h-100 mb-0">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-heading">
                                <h4 class="card-title">Lifetime sales</h4>
                            </div>
                            <div class="dropdown">
                                <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fe fe-circle"></i>
                                </a>
                                <div class="dropdown-menu custom-dropdown dropdown-menu-right p-4">
                                    <h6 class="mb-1">Action</h6>
                                    <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-o pr-2"></i>View
                                        reports</a>
                                    <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-edit pr-2"></i>Edit
                                        reports</a>
                                    <a class="dropdown-item" href="#!"><i
                                            class="fa-fw fa fa-bar-chart-o pr-2"></i>Statistics</a>
                                    <h6 class="mb-1 mt-3">Export</h6>
                                    <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-pdf-o pr-2"></i>Export
                                        to PDF</a>
                                    <a class="dropdown-item" href="#!"><i
                                            class="fa-fw fa fa-file-excel-o pr-2"></i>Export to CSV</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>We only started collecting data from February 2019 </h5>
                            <p>Questions about the Net Earnings number? <a
                                    class="btn btn-square btn-inverse-success btn-xs ml-1" href="#">Click
                                    here</a> </p>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="morris-wrapper">
                                        <div id="morrisecommerce1" style="height: 260px;"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-4">
                                    <div class="mb-3">
                                        <h3 class="mb-0">680</h3>
                                        <p class="mb-0 text-info">Total sales</p>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="mb-0">800</h3>
                                        <p class="mb-0 text-primary">Open campaign</p>
                                    </div>
                                    <div class="mb-3">
                                        <h3 class="mb-0">500</h3>
                                        <p class="mb-0">Daily sales</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            
            <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="verticalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verticalCenterTitle">Add New Event</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="modelemail">Event Name</label>
                                    <input type="email" class="form-control" id="modelemail">
                                </div>
                                <div class="form-group">
                                    <label>Choose Event Color</label>
                                    <select class="form-control">
                                        <option>Primary</option>
                                        <option>Warning</option>
                                        <option>Success</option>
                                        <option>Danger</option>
                                    </select>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col-xxl-8 m-b-30">
                    <div class="card card-statistics h-100 mb-0">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-heading">
                                <h4 class="card-title">Top selling products</h4>
                            </div>
                        </div>
                        <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
                            <div class="datatable-wrapper table-responsive">
                                <table id="datatable" class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Payment Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product as $item)

                                        <tr>

                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                {{$item->payment_status}}

                                            </td>

                                            <td>
                                                {{$item->payment_method}}
                                            </td>

                                        </tr>
                                        @endforeach



                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}
        </div>


        <!-- end row -->
    </div>
    @endsection
    @section('contents')

    <form action="/search" class="navbar-form ">
        <input type="text" name="query" placeholder="Search item" style="width: 300px;">
        <button type="submit" class="btn btn-primary ">Search</button>
    </form>
    </li>

    @endsection