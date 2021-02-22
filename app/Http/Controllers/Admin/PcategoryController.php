<?php

namespace App\Http\Controllers\Admin;

use App\Pcategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class PcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcategorys = Pcategory::latest()->get();
        return view('admin.pcategory.index',compact('pcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pcategory.create');
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
            'name' => 'required'
        ]);
        $pcategory = new Pcategory();
        $pcategory->name = $request->name;
       
        $pcategory->save();


        Toastr::success('Successfully Product Category Save', 'Success');
        return redirect()->route('admin.product_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pcategory  $pcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Pcategory $pcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pcategory  $pcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pcategorys = Pcategory::find($id);
        return view('admin.pcategory.edit',compact('pcategorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pcategory  $pcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $pcategory = Pcategory::find($id);
        $pcategory ->name= $request->name;
      
        $pcategory->save();
        Toastr::success('Category Successfully Updated :','Success');
        return redirect()->route('admin.product_category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pcategory  $pcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pcategory $pcategory)
    {
        Product::find($id)->delete();
        Toastr::success('Product Successfully Deleted :)', 'Success');
        return redirect()->back();
    }
}
