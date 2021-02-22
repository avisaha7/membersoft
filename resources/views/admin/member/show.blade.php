@extends('layouts.backend.app')

@section('title','Post')

@push('css')
<style>
    .btn.dropdown-toggle.btn-default {
    display: none;
    border: white;
}
</style>
@endpush

@section('content')
<div class="container-fluid">

    <!-- Vertical Layout | With Floating Label -->
    <a href="{{ route('admin.member.index') }}" class="btn btn-danger waves-effect">BACK</a>
    @if($member->status == false)
    <button type="button" class="btn btn-success waves-effect pull-right" onclick="approvePost({{ $member->id }})">
        <i class="material-icons">done</i>
        <span>Approve it</span>
    </button>
    <form method="post" action="{{ route('admin.member.approve',$member->id) }}" id="approval-form" style="display: none">
        @csrf
        @method('PUT')
    </form>
    @else
    <button type="button" class="btn btn-danger pull-right" disabled>
        <i class="material-icons">close</i>
        <span>Approved</span>
    </button>
    @endif
    <br>
    <br>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>

                        Member Information
                    </h2>
                </div>
                <div class="body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%"> Member Name</th>
                            <th width="5%">:</th>
                            <td> {!! $member->name !!}</td>
                        </tr>
                         <tr>
                            <th width="30%"> Company Name</th>
                            <th width="5%">:</th>
                            <td> {!! $member->company !!}</td>
                        </tr>
                         <tr>
                            <th width="30%"> Company Address</th>
                            <th width="5%">:</th>
                            <td> {!! $member->company_address !!}</td>
                        </tr>
                          <tr>
                            <th width="30%"> License Type</th>
                            <th width="5%">:</th>
                            <td> {!! $member->license_type !!}</td>
                        </tr>
                          <tr>
                            <th width="30%"> Present Address</th>
                            <th width="5%">:</th>
                            <td> {!! $member->address !!}</td>
                        </tr>
                          <tr>
                            <th width="30%"> Permanent Address</th>
                            <th width="5%">:</th>
                            <td> {!! $member->permanent_address!!}</td>
                        </tr>
                         <tr>
                            <th width="30%"> National ID Number</th>
                            <th width="5%">:</th>
                            <td> {!! $member->nid !!}</td>
                        </tr>
                         <tr>
                            <th width="30%"> Phone</th>
                            <th width="5%">:</th>
                            <td> {!! $member->phone !!}</td>
                        </tr>
                         <tr>
                            <th width="30%">Date Of Birth</th>
                            <th width="5%">:</th>
                            <td> {!! $member->dob !!}</td>
                        </tr>
                       
                         <tr>
                            <th width="30%">Refer By</th>
                            <th width="5%">:</th>
                            <td> {!! $member->refer !!}</td>
                        </tr>
                       
                         <tr>
                            <th width="30%">Joining Date</th>
                            <th width="5%">:</th>
                            <td> {!! $member->joining_date  !!}</td>
                        </tr>
                       
                    </table>
                   
                    

                  
                   
                    
                   
                </div>
                <div class="header bg-green">
                    <h2>

                        Nominee Information
                    </h2>
                </div>
                <div class="body">
                   <table class="table table-bordered">
                     <tr>
                            <th width="30%">Nominee Name</th>
                            <th width="5%">:</th>
                            <td> {!! $member->nominee_name !!}</td>
                        </tr>
                     <tr>
                            <th width="30%">Nominee Address</th>
                            <th width="5%">:</th>
                            <td>{!! $member->nominee_address !!}</td>
                        </tr>
                  
                            <th width="30%">Nominee NID</th>
                            <th width="5%">:</th>
                            <td>{!! $member->nominee_nid !!}</td>
                        </tr>
                        
                        <tr>
                            <th width="30%">Nominee Phone</th>
                            <th width="5%">:</th>
                            <td>{!! $member->nominee_phone !!}</td>
                        </tr>
</table>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                <div class="header bg-amber">
                    <h2>
                        Profile Picture
                    </h2>
                </div>
         
                <div class="body">
                   <img class="img-responsive thumbnail" src="/upload/profile/{{ $member->image }}">
                    
                </div>
            </div>

        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

<!--            <div class="card">
                <div class="header bg-red " style="padding-bottom:  39px;">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                        <h2>
                            Current Share Policy
                        </h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                            Add 
                        </button>
                    </div>


                </div>
                <div class="body">

                    <table class="table table-bordered">
                        <tr>
                            <th width="5%">Sl1</th>
                            <th width="50%"> Share Name</th>
                            <th width="20%">Amount</th>
                            <th width="25%"> Date</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1 share 5000 tk</td>
                            <td>Amount</td>
                            <td>Date</td>

                        </tr>
                    </table>
                </div>

            </div>-->

        </div>
    </div>
</div>



@endsection
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Payment Policy</h4>
            </div>
            <div class="modal-body">

   <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                <form class="m-4" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf
                                    <select class="form-control show-tick pb-20">
                                        <option value="">-- Please select --</option>
                                        @foreach($categorys  as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                        <br>
                          <button style="margin-top:40px;"  type="submit" class="btn btn-primary btn-block p-20">
                                    {{ __('ADD') }}
                                </button>
                                 </form>
                                </div>
                            
                            </div>
                        </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@push('js')
<!-- Select Plugin Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<!-- TinyMCE -->
<script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script>
    $(function () {
        //TinyMCE
        tinymce.init({
            selector: "textarea#tinymce",
            theme: "modern",
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true
        });
        tinymce.suffix = ".min";
        tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
    });
    function approvePost(id) {
        swal({
            title: 'Are you sure?',
            text: "You went to approve this post ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('approval-form').submit();
            } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
                swal(
                'Cancelled',
                'The post remain pending :)',
                'info'
            )
            }
        })
    }
</script>

@endpush
