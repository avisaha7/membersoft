@extends('layouts.backend.app')

@section('title','Purchase')

@push('css')
<style>
    .bs-caret {
        display: none;

    }
    .filter-option.pull-left {
        display: none;
    }
</style>

@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD NEW SALE
                    </h2>
                </div>
                <div class="body">
                    <form autocomplete="off" action="{{ route('admin.sale.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                     <label class="form-label"> Date </label>
                        <div class="form-group form-float">
                            <div class="form-line col-lg-12">
                                <input type="date"  class="form-control" name="date" >

                            </div>
                        </div>
          
                        
                        <div class="form-group">
                            <div class="col-lg-12">

                                <select name="product_id" id="" onchange="getProductValue(this.value)" class="productname col-lg-12 show-tick">
                                    <option value="0">--  select product--</option>
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach



                                </select>

                            </div>
                        </div>
                        <label class="form-label">Customer Name </label>
                        <div class="form-group form-float">
                            <div class="form-line col-lg-12">
                                <input type="text" id="price" class="form-control" name="customer_name">

                            </div>
                        </div>
                        <label class="form-label">Customer Phone </label>
                        <div class="form-group form-float">
                            <div class="form-line col-lg-12">
                                <input type="text" id="price" class="form-control" name="customer_phone">

                            </div>
                        </div>
                        <label class="form-label">  Price </label>
                        <div class="form-group form-float">
                            <div class="form-line col-lg-12">
                                <input type="text" id="price2" class="form-control prod_price" name="price">

                            </div>
                        </div>
                        <label class="form-label"> quantity</label>
                        <div class="form-group form-float">
                            <div class="form-line col-lg-12">
                                <input type="text" id="qty2" class="form-control" name="quantity">

                            </div>
                        </div>
                        <label class="form-label"> Total Price </label>

                        <div class="form-group form-float">
                            <div class="form-line col-lg-12">
                                <input type="text" id="total" class="form-control" name="total" readonly>

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
