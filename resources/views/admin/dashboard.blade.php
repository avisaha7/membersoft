@extends('layouts.backend.app')
@section('title','Home')
@push('css')


@endpush
@section('content')
    <div class="container-fluid">
           <div class="col-lg-12 bg-blue-grey col-md-3 col-sm-6 col-xs-12">
                <div class="">
                   
                    <div>
                       
                        <marquee><h2> @foreach($notices as $key=>$notice){{$notice->discription}}{{'--'}}@endforeach</h2></marquee>
                         
                    </div>
                </div>
            </div>
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
          
            
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Payments</div>
                        <div class="number count-to" data-from="0" data-to="{{ $payments->count() }}" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">Pending Payments</div>
                        <div class="number count-to" data-from="0" data-to="{{ $total_pending_payments }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">Approve Payment</div>
                        <div class="number count-to" data-from="0" data-to="{{ $total_approve_payments }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-blue hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text"> Payment Policy</div>
                        <div class="number count-to" data-from="0" data-to="{{ $payment_policy }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-gray hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">money</i>
                    </div>
                    <div class="content">
                        <div class="text"> Total Sales</div>
                        <div class="number count-to" data-from="0" data-to="{{ $total_sale }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">money</i>
                    </div>
                    <div class="content">
                        <div class="text"> Total Products</div>
                        <div class="number count-to" data-from="0" data-to="{{ $total_product }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            
       
        </div>
        <!-- #END# Widgets -->


        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="header">
                        <h2>Last Payment</h2>
                      
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Way</th>
                                <th>Amount</th>
                                
                                <th>Status</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $key=>$payment)
                                <tr>
                                    
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $payment-> user->name }}</td>
                                    <td><span class="label bg-green">{{ $payment-> title }}</span></td>
                                    <td>{{ $payment-> amount }}</td>
                                    <td>
                                        @if($payment->is_approved == true)
                                            <span class="badge bg-blue">Approved</span>
                                        @else
                                            <span class="badge bg-pink">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                               @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>All Share</h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                <th>SL</th>
                                <th>Share</th>
                               
                                
                              
                                
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($payment_categories as $key=>$payment)
                                <tr>
                                    
                                    <td>{{ $key + 1 }}</td>
                                  
                                    <td><span class="label bg-green">{{ $payment->name }}</span></td>
                                   
                                </tr>
                               @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Browser Usage -->
        </div>
    </div>
@endsection

@push('js')
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('assets/backend/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('assets/backend/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('assets/backend/plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('assets/backend/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <script src="{{asset('assets/backend/js/pages/index.js')}}"></script>
@endpush
