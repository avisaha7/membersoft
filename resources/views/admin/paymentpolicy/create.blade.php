@extends('layouts.backend.app')
@section('title','payment-policy')
@push('css')

@endpush
@section('content')
    <div class="container-fluid">


        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADD NEW PAYMENT POLICY
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route('admin.payment-policy.store')}}" method="POST">
                            @csrf
                            <label for="email_address">Policy Name:</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" placeholder="Enter Policy Name" name="name">
                                </div>
                            </div>
                            <label for="password">Amount:</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="amount" class="form-control" placeholder="Enter amount" name="amount">
                                </div>
                            </div>
                            <label for="password">Details:</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="details" class="form-control" placeholder="Enter Details" name="details">
                                </div>
                            </div>


                            <br>
{{--                            <a href="#" type="submit" class="btn btn-primary m-t-15 waves-effect">BACK</a>--}}
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

@push('js')
@endpush
