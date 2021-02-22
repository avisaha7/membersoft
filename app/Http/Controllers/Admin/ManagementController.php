<?php

namespace App\Http\Controllers\Admin;

use App\Management;
use App\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
           $managements= Management::all();
           return view('admin.management.index',compact('managements'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $designations= Designation::all();
        return view('admin.management.create',compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
         $management = new Management();
         $management->designation_id = $request->designations ;
         $management->name=$request->name;
         $management->details=$request->details;
         
          if ($request->image):
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('management', $fileName, 'public');
            $management->images = '/storage/' . $filePath;
        else:
            $managemen->images = '';
        endif;
         
         
         
         $management->save();
             Toastr::success('management Successfully Saved :)','Success');

        return redirect()->route('admin.management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function show(Management $management)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $managements = Management::find($id);
     return view('admin.management.edit',compact('managements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Management::find($id)->delete();
        Toastr::success('Management  Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
