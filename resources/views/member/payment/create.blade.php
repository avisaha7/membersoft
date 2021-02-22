@extends('layouts.backend.app')

@section('title','Payment')

@push('css')
<style>
    .bs-caret {
    display: none;
    
}
.filter-option.pull-left {
    display: none;
}
button.btn.dropdown-toggle.btn-default {
    display: none;
}
</style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ADD NEW Payment
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('member.payment.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <label class="form-label">Payment Way Example: Bkash,Nagad,Rocket,Bank Payment</label>
                                <div class="">
                                     
                                    <select style="width:200px;height:40px;"  name="title">
                                        
                                        <option value="Bank Payment">Bank Payment</option>
                                        <option value="Cash Payment">Cash Payment</option>
                                        <option value="Bkash">Bkash Payment</option>
                                        <option value="Nagad">Nagad Payment</option>
                                        <option value="Rocket">Rocket Payment</option>
                                        <option value="Others">Others</option>
                                    </select>
<!--                                    <input type="text" id="title" class="form-control" name="title">
                                    <label class="form-label">Payment Way Example: Bkash,Nagad,Rocket,Bank Payment</label>-->
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    
                                    <label class="form-label">Amount</label>
                                    <input type="text" id="amount" class="form-control" name="amount" value>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                     <label class="form-label">Company Name:</label>
                                    <input type="text" id="company" class="form-control" name="company" value="{{ Auth:: user()->company }}">
                                   
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="phone" class="form-control" name="phone">
                                    <label class="form-label">Contact Number</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea type="textarea" id="deatils" class="form-control" name="details">
                                    </textarea>
                                    <label class="form-label">Details</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Payment Prove</label>
                                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="">
                                <label for="category">Share  Category</label>
                                <div class="{{ $errors->has('categories') ? 'focused error' : '' }}">
                                    
                                    <select style="width:200px;height:40px;" name="categories[]" id="category" class="" data-live-search="true">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('member.payment.index') }}">BACK</a>
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
