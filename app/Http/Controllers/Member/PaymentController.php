<?php

namespace App\Http\Controllers\Member;
use App\User;
use App\Payment;
use App\Account;
use App\Paymentrcv;
use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Auth::user()->payments()->latest()->get();
        return view('member.payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('member.payment.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required',
            'categories' => 'required',


        ]);
        $payment = new Payment();
      
        if ($request->image):
            $fileName = $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->move('upload/paymentprove', $fileName);
            $payment->image = $filePath;
        else:
            $payment->image = '';
        endif;
        
//     if ($request->image):
//            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
//            $filePath = $request->file('image')->storeAs('paymentProve', $fileName, 'public');
//            $payment->image = '/storage/' . $filePath;
//        else:
//            $payment->image = '';
//        endif;


        $payment->user_id = Auth::id();
        $payment->title = $request->title;
        $payment->amount = $request->amount;
        $payment->company = $request->company;

//        $payment->image = $imageName;
        $payment->details = $request->details;
        if(isset($request->status))
        {
            $payment->status = true;
        }else {
            $payment->status = false;
        }
        $payment->is_approved = false;
        
        $payment->save();
        $totals= new Paymentrcv();
        $totals->amount=$request->amount;
        $totals->is_approved = false;
        $totals->type='payment';
        
        $totals->save();
        

        $payment->categories()->attach($request->categories);

      
        $mainac = new Account();
        $mainac->type = 'MainAC';
        $mainac->amount =$request->amount;
        $mainac->is_approved = false;
        $mainac->save();


        Toastr::success('Payment Successfully Saved :)','Success');

        return redirect()->route('member.payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        //
    }
}
