<?php

namespace App\Http\Controllers\Admin;

use App\Purchase;
use App\Product;
use App\Account;
use App\Inventory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $purchases = Purchase::latest()->get();
        return view('admin.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $products = Product::all();
        return view('admin.purchase.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $purchase = new Purchase();
        $purchase->product_id = $request->product_id;
       // $purchase->type = $request->type;
        $purchase->purchase_price = $request->purchase_price;
        $purchase->quantity = $request->quantity;
        $purchase->total_price = $request->total_price;
        $purchase->date = $request->date;
        $purchase->save();


        $invoiceid = $purchase->id;


        $inventory = new Inventory();
        $inventory->invoice_id = $invoiceid;
        $inventory->product_id = $request->product_id;
        $inventory->type = 'Purchase';
        $inventory->price = $request->purchase_price;
        $inventory->quantity = $request->quantity;
        $inventory->total = $request->total_price;
        $inventory->date = $request->date;
        $inventory->save();
        
        $mainac = new Account();
        $mainac->type = 'MainAC';
        $mainac->amount ='-'.$request->total_price;
        $mainac->save();

        Toastr::success('Purchase Save', 'Success');
        return redirect()->route('admin.purchase.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase) {
        //
    }

}
