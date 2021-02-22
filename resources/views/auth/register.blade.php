@extends('layouts.app')
@section('title','register')
@push('css')
    <link href="{{asset('assets/frontend/css/auth/styles.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/auth/responsive.css')}}" rel="stylesheet">
@endpush
@section('content')
    <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center"> <h2 style="color:#07AE60">বাংলাদেশ ইন্টারনেট ব্যবসায়ী সমিতি </h2></div>
        <div class="col-md-8 ">
            <div class="card"  style="background:#C3CFDB;">
                <div class="card-header" style="background:#F37053; color:#fff;"><h3>REGISTRATION FORM</h3></div>

                <div class="card-body pb-5">
                    <br>
                    @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    <form  autocomplete="off" class="m-4" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header" style="background:#07AE60; color:#fff;"><h4>Member Information</h4></div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Company Name') }}</label>
                                <input autocomplete="off" id="company" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" required>

                                @if ($errors->has('company'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Company Address') }}</label>
                                <input autocomplete="off" id="company_address" type="text" class="form-control{{ $errors->has('company_address') ? ' is-invalid' : '' }}" name="company_address" value="{{ old('company_address') }}" required>

                                @if ($errors->has('company_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_address') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>

                        <div class="form-group row">


                            <div class="col-md-6">

                                <label for="email" class="col-form-label text-md-right">{{ __('License Type') }}</label>
                                <select  id="cars" class="form-control{{ $errors->has('license_type') ? ' is-invalid' : '' }}" name="license_type" value="{{ old('license_type') }}">
                                    <option value="national">Select</option>
                                    <option value="national">National</option>
                                    <option value="division">Division</option>
                                    <option value="district">District</option>
                                    <option value="thana">Thana</option>
                                    <option value="UP">UP</option>
                                </select>
                                @if ($errors->has('license_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('license_type') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-6">
                                <label for="name" class=" col-form-label text-md-right">{{ ('Member Name') }}</label>
                                <input autocomplete="off" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">

                        </div>
                        <div class="form-group row">


                            <div class="col-md-6">
                                <label for="email" class=" col-form-label text-md-right">{{ __('Address') }}</label>
                                <input autocomplete="off" id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-6">
                                <label for="email" class=" col-form-label text-md-right">{{ __('Permanent Address') }}</label>
                                <input autocomplete="off" id="address" type="text" class="form-control{{ $errors->has('permanent_address') ? ' is-invalid' : '' }}" name="permanent_address" value="{{ old('permanent_address') }}" required>

                                @if ($errors->has('permanent_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('permanent_address') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>

                        <div class="form-group row">


                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Number Of Share') }}</label>
                                <select  id="cars" class="form-control{{ $errors->has('license_type') ? ' is-invalid' : '' }}" name="share_id" value="{{ old('share_id') }}">
                                    @foreach($sharelist  as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('share_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('share_id') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <input autocomplete="off" id="phone" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                        </div>
                        <div class="form-group row">


                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                <input autocomplete="off" id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Date Of Birth') }}</label>
                                <input autocomplete="off" id="company" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>

                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                        </div>


                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Refer Name') }}</label>

                                <input autocomplete="off" id="refer" type="text" class="form-control{{ $errors->has('refer') ? ' is-invalid' : '' }}" name="refer" value="{{ old('refer') }}" required>

                                @if ($errors->has('refer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('refer') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('NID Number') }}</label>

                                <input autocomplete="off" id="nid" type="text" class="form-control{{ $errors->has('nid') ? ' is-invalid' : '' }}" name="nid" value="{{ old('nid') }}" required>

                                @if ($errors->has('nid'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nid') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                                <input autocomplete="off" id="nid" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required>

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Joining Date') }}</label>
                                <input autocomplete="off" id="company" type="date" class="form-control{{ $errors->has('joining_date') ? ' is-invalid' : '' }}" name="joining_date" value="{{date('Y-m-d')}}" required>

                                @if ($errors->has('joining_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('joining_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">


                            <div class="col-md-6">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                <input autocomplete="off" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-6">
                                <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <input autocomplete="off" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="card-header" style="background:#07AE60; color:#fff;"><h4>Nominee Information</h4></div>
                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Nominee Name') }}</label>

                                <input autocomplete="off" id="refer" type="text" class="form-control{{ $errors->has('nominee_name') ? ' is-invalid' : '' }}" name="nominee_name" value="{{ old('nominee_name') }}" required>

                                @if ($errors->has('nominee_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nominee_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Nominee Address') }}</label>

                                <input autocomplete="off" id="nid" type="text" class="form-control{{ $errors->has('nominee_address') ? ' is-invalid' : '' }}" name="nominee_address" value="{{ old('nominee_address') }}" required>

                                @if ($errors->has('nominee_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nominee_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Nominee Phone') }}</label>

                                <input autocomplete="off" id="refer" type="text" class="form-control{{ $errors->has('nominee_phone') ? ' is-invalid' : '' }}" name="nominee_phone" value="{{ old('nominee_phone') }}" required>

                                @if ($errors->has('nominee_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nominee_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{ __('Nominee NID') }}</label>

                                <input autocomplete="off" id="nid" type="text" class="form-control{{ $errors->has('nominee_nid') ? ' is-invalid' : '' }}" name="nominee_nid" value="{{ old('nominee_nid') }}" required>

                                @if ($errors->has('nominee_nid'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nominee_nid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                <button   type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                                <br>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <br>
@endsection
