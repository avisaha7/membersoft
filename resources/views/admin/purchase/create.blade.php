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
button.btn.dropdown-toggle.btn-default {
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
                            ADD NEW PURCHASE
                        </h2>
                    </div>
                    <div class="body">
                        <form autocomplete="off" action="{{ route('admin.purchase.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                               <div class="form-group">
                                    <label class="form-label">Product:</label>
                                <div class="col-lg-12">
                                 
                                    <select style="width:200px;height:40px;" name="product_id" id="" class="">
                                         <option value="0">--  select product--</option>
                                          @foreach($products as $product)
                                           <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                       

                                      
                                    </select>
                                </div>
                            </div>
                            <label class="form-label"> Date </label>
                            <div class="form-group form-float">
                                <div class="form-line col-lg-12">
                                    <input type="date" id="" class="form-control" name="date" >
                                    
                                </div>
                            </div>
                            <label class="form-label"> purchase Price </label>
                            <div class="form-group form-float">
                                <div class="form-line col-lg-12">
                                    <input type="text" id="price" class="form-control" name="purchase_price">
                                    
                                </div>
                            </div>
                            <label class="form-label"> qantity</label>
                             <div class="form-group form-float">
                                <div class="form-line col-lg-12">
                                    <input type="text" id="qty" class="form-control" name="quantity">
                                    
                                </div>
                            </div>
                           <label class="form-label"> Total Price </label>
                           
                            <div class="form-group form-float">
                                <div class="form-line col-lg-12">
                                    <input type="text" id="total" class="form-control" name="total_price" readonly>
                                    
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
