<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


        if(Auth::check() && Auth::user()->role->id == 1){
            $this->redirectTo = route('admin.dashboard');
        }
        else{
            $this->redirectTo = route('member.dashboard');
        }
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'string|max:255',
            'dob' => 'string|max:255',
            'company' => 'string|max:255',
            'refer' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user= User::create([
            'name' => $data['name'],
            'share_id' => $data['share_id'],
            'phone'=> $data['phone'],
            'company_address'=> $data['company_address'],
            'license_type'=> $data['license_type'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'joining_date' => $data['joining_date'],
            'company'=>$data['company'],
            'refer'=>$data['refer'],
            'address'=> $data['address'],
            'nid'=> $data['nid'],
            'permanent_address'=> $data['permanent_address'],
            'nominee_name'=> $data['nominee_name'],
            'nominee_nid'=> $data['nominee_nid'],
            'nominee_phone'=> $data['nominee_phone'],
            'password' => Hash::make($data['password']),



        ]);
      if(request()->hasFile('image')){
          $image=request()->file('image')->getClientOriginalName();
//          request()->file('image')->storeAs('profile', $image, 'public');
          request()->file('image')->move('upload/profile',$image);
          $user->update(['image' => $image]);
      }
       return $user;
//        $administrators = User::whereHas('roles', function($q) {
//            $q->where('name', 'Admin');
//        })->get();
//
//        foreach ($administrators as $administrator) {
//            $administrator->notify(new AdminNewUserNotification($user));
//        }
//
//        return $user;

    }
}
