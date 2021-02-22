@extends('layouts.backend.app')

@section('title','Add Designation')

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
                            ADD Management Information
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.management.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="name">
                                    <label class="form-label">Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="file" id="title" class="form-control" name="image"">
                                    <label class="form-label">Image</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="details">
                                    <label class="form-label">Details</label>
                                </div>
                            </div>
                        <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('designations') ? 'focused error' : '' }}">
                                    <label for="designations">Designation</label>
                                    <select name="designations" id="category" class="form-control" data-live-search="true">
                                        @foreach($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            



                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.management.index') }}">BACK</a>
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
