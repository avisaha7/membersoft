<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\User;
use App\Category;
use App\Share_setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $members = User::where('role_id', 2)->get();


        return view('admin.member.index', compact('members'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $member) {

        $categorys = Category::all();
        return view('admin.member.show', compact('member', 'categorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    public function shareshow($id) {
        
    }

    public function approval($id) {
        $member = User::find($id);

        if ($member->status == false) {
            $member->status = true;
            $ApStatus = $member->save();
            if ($ApStatus):
                $share_setting = new Share_setting;
                $share_setting['category_id'] = $member->share_id;
                $share_setting['user_id'] = $id;
                $share_setting['date'] = $member->joining_date;

                $share_setting->save();



            endif;


            Toastr::success('Member Successfully Approved :)', 'Success');
        } else {
            Toastr::info('This Member is already approved', 'Info');
        }

        return redirect()->back();
    }

    public function share_up($id) {
        $member = User::find($id);
        return view('admin.member.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
