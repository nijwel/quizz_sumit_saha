<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('is_admin',0)->get();
        return view('admin.user.index',compact('data'));
    }

    /**
     * Display a listing of the resource with filter.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFilter(Request $request)
    {
        $status   = $request->status;


        $data  = '';
        $query = DB::table('users');
        if ($status) {
            $query->where('status',$status);
        }
        $data = $query->where('is_admin', 0)->get();
        return view('admin.user.ajax.filter_data',compact('data'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('admin.user.ajax.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.ajax.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
                'name'  => 'required',
                'phone' => 'required',
                'email' => 'required|unique:users,email,'.$id,
            ]);
        $data = User::find($id);
        $data->name  = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return redirect()->back()->with('success','Successfully Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id)->delete();
        return redirect()->back()->with('success','Successfully Deleted !');
    }


    /**
     * Approved the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved($id)
    {
        $data = User::find($id);
        $data->status = 2;
        $data->save();
        return redirect()->back()->with('success','Successfully Approved !');
    }

    /**
     * Rejected the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejected($id)
    {
        $data = User::find($id);
        $data->status = 3;
        $data->save();
        return redirect()->back()->with('success','Successfully Rejected !');
    }
}
