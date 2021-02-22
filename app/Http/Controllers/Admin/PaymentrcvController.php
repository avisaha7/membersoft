<?php

namespace App\Http\Controllers\Admin;

use App\Paymentrcv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PaymentrcvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_rcv=DB::table('paymentrcvs')
                

                ->selectRaw('type, SUM(amount) as totalam')
                ->groupBy('type')
                ->get();
//        dd($total_rcv);
        return view('admin.paymentrcv.index', compact('total_rcv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paymentrcv  $paymentrcv
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentrcv $paymentrcv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paymentrcv  $paymentrcv
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymentrcv $paymentrcv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paymentrcv  $paymentrcv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paymentrcv $paymentrcv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paymentrcv  $paymentrcv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymentrcv $paymentrcv)
    {
        //
    }
}
