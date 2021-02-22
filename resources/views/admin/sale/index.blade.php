
@extends('layouts.backend.app')

@section('title','Sale')
@push('css')
    <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <h2>
                  PRODUCT SALE 
                    </h2>
                    <br>
                    <a href="{{route('admin.sale.create')}}" class="btn btn-primary">ADD NEW SALE</a>
                    <ul class="header-dropdown m-r--5">
                        
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>Number</th>
                                <th>Product Name</th>
                               <th>Customer Name</th>
                               <th>Customer Phone</th>
                                
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                
<!--                                <th>Action</th>-->
                               

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sales as $key=>$sale)
                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $sale->product->name }}</td>
                                    <td>{{ $sale->customer_name }}</td>
                                    <td>{{ $sale->customer_phone }}</td>
                                    <td>{{ $sale->price }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                   
                                    <td>{{ $sale->total}}</td>
                                    <td>{{ $sale->date }}</td>
                                   
                                
                                   
<!--                                    <td class="text-center">
                                        <a href="{{ route('admin.product.edit',$sale->id ) }}" class="btn btn-info waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>

                                        <button class="btn btn-danger waves-effect" type="button" onclick="deleteCategory({{ $sale->id  }})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form id="delete-form-{{ $sale->id }}" action="{{ route('admin.product.destroy',$sale->id ) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>-->

                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>

                                <th>Number</th>
                                <th>Product Name</th>
                               <th>Customer Name</th>
                               <th>Customer Phone</th>
                                
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                
<!--                                <th>Action</th>-->
                              
                            </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script src="{{asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{(asset('assets/backend/js/pages/tables/jquery-datatable.js'))}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteCategory(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })

        }
    </script>
@endpush
