@extends('layouts.backend.app')

@section('title','Category')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADD Privacy Policy
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.policy.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div >
                                    <textarea name="details" style="width: 400px; height: 300px;">

                                    </textarea>
                                    <br>
                                     <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.policy.index') }}">BACK</a>
                                     <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
<!--                                    <input type="text" id="name" class="form-control" name="name">-->
                                   
                                </div>
                            </div>
                      
                            
            </div>
        </div>
    </div>
@endsection

@push('script')


@endpush
