<?php

namespace App\Http\Controllers\Member;
use App\Notice;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     public function index(){
         $notices =  Notice::all();
         $notice_count =  Notice::all()->count();
         $payment_policy = Category::all()->count();
         $payments = Auth::user()->payments()->latest()->get();
         
        
         
    	return view('member.dashboard',compact('notices','payments','notice_count','payment_policy'));
    }
}
