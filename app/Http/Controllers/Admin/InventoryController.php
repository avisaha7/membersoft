<?php

namespace App\Http\Controllers\Admin;

use App\Inventory;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class InventoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $reserves=DB::table('inventories')
                ->join('products','inventories.product_id','products.id')

                ->selectRaw('name, SUM(quantity) as ttlqty')
                ->groupBy('name')
                ->get();
        return view('admin.stock.index', compact('reserves'));
        

//        $reserves = DB::table('inventories')

//                ->selectRaw('product_id, SUM(quantity) as ttlqty')
//                ->groupBy('product_id')
//                ->get();
////        return view('admin.stock.index', compact('reserves'));
//        dd($reserves);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory) {
        //
    }

}
