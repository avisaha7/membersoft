@extends('layouts.backend.app')

@section('title','Product')

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
                            ADD NEW PRODUCT
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                               <div class="form-group">
                                   <label for="category">Category</label>
                                <div class="">
                                 
                                    <select style="width:200px;height:40px;" name="pcategory_id" id="" class=" show-tick">
                                         <option value="">--  select category --</option>
                                        @foreach($pcategorys as $pcategory)
                                            <option value="{{ $pcategory->id }}">{{ $pcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="name">
                                    <label class="form-label"> Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="code">
                                    <label class="form-label"> Product Code </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="buy_price">
                                    <label class="form-label"> Buy Price</label>
                                </div>
                            </div>
                          <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="sell_price">
                                    <label class="form-label"> Sell Price</label>
                                </div>
                            </div>
                           
                            



                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.desig.index') }}">BACK</a>
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
