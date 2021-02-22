<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Pcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $pcategorys = Pcategory::all();
        return view('admin.product.create', compact('pcategorys'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->sell_price = $request->sell_price;
        $product->buy_price = $request->buy_price;
        $product->category_id = $request->pcategory_id;

        $product->save();


        Toastr::success('Successfully Product Save', 'Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pcategorys = Pcategory::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'pcategorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->category_id = $request->pcategory_id;
        $product->save();
        Toastr::success('Product Updated :', 'Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Product::find($id)->delete();
        Toastr::success('Product Successfully Deleted :)', 'Success');
        return redirect()->back();
    }

}
