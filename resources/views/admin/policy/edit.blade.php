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
                            Edit Privacy 
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.policy.update',$policy->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-float">
                                <div class="form-line">
                                     <textarea name="details" style="width: 400px; height: 300px;" value="{{ $policy->details  }}">

                                    </textarea>
                                   
                                   
                                </div>
                            </div>
                           
                            

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.policy.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
