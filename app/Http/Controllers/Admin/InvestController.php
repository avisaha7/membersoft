<?php

namespace App\Http\Controllers\Admin;

use App\Invest;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class InvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invests=Invest::latest()->get();
        return view('admin.invest.index',compact('invests'));
    }
        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.invest.create');
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
            'sector' => 'required',
            'amount' => 'required'
        ]);
        $invest = new Invest();
        $invest->sector = $request->sector;
        $invest->amount =$request->amount;
        $invest->invest_date =$request->invest_date;
        $invest->save();


        Toastr::success('Successfully invest Save', 'Success');
        return redirect()->route('admin.invest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invest  $invest
     * @return \Illuminate\Http\Response
     */
    public function show(Invest $invest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invest  $invest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $invest = Invest::find($id);
        return view('admin.invest.edit',compact('invest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invest  $invest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invest = Invest::find($id);
        $invest->sector = $request->sector;
        $invest->amount = $request->amount;
        $invest->invest_date = $request->invest_date;
        $invest->save();
        Toastr::success('invest Successfully Updated :','Success');
        return redirect()->route('admin.invest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invest  $invest
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Invest::find($id)->delete();
        Toastr::success('invest Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
