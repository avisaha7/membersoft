<?php

namespace App\Http\Controllers\Admin;
use App\Payment;
use App\Category;
use App\Sale;
use App\Notice;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $notices =  Notice::all();
        $payments = Payment::all();
        $payment_categories = Category::all();
        $total_pending_payments = Payment::where('is_approved',false)->count();
        $total_approve_payments = Payment::where('is_approved',true)->count();
        $payment_policy = Category::all()->count();
        $total_sale=Sale::all()->count();
        $total_product=Product::all()->count();
        
    	return view('admin.dashboard',compact('payments','total_pending_payments','total_approve_payments','payment_policy','notices','total_sale','total_product',
                'payment_categories'));
       
    }
}
