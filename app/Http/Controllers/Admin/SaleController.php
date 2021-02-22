<?php

namespace App\Http\Controllers\Admin;

use App\Sale;
use App\Product;
use App\Account;
use App\Inventory;
use App\Total_pr;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::latest()->get();
        return view('admin.sale.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products= Product::all();
        return view('admin.sale.create',compact('products'));
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
            'product_id' => 'required',
            
        ]);
        $sale = new Sale();
        $sale->product_id = $request->product_id;
        
        $sale->customer_name =$request->customer_name;
        $sale->customer_phone =$request->customer_phone;
        $sale->price =$request->price;
        $sale->quantity =$request->quantity;
        $sale->total =$request->total;
        $sale->date =$request->date;
        $sale->save();
        
        $invoiceid = $sale->id;


        $inventory = new Inventory();
        $inventory->invoice_id = $invoiceid;
        $inventory->product_id = $request->product_id;
        $inventory->type = 'Sale';
        $inventory->price = $request->price;
        $inventory->quantity = '-'.$request->quantity;
        $inventory->total = $request->total;
        $inventory->date = $request->date;
        $inventory->save();
        
        $mainac = new Account();
        $mainac->type = 'MainAC';
        $mainac->amount =$request->total;
        $mainac->save();


        Toastr::success('Successfully sale Save', 'Success');
        return redirect()->route('admin.sale.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
