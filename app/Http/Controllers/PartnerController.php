<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = Partner::orderby('id','desc')->get();
        return view('admin.partner.index', compact('partner'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner=  Partner::find($id);
        return view('admin.partner.edit' ,compact('partner'));
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

        $this->validate($request,[
            'link' =>'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!is_null($request->image)) {
            $file = $request->file('image');
            $destinationPath = public_path('assets/images/user/partner');
            $filename = camel_case(str_random(5) . $file->getClientOriginalName());
            $file->move($destinationPath, $filename);
        }

        $partner=  Partner::find($id);
        $partner->link=$request->link;
        if(!is_null($request->image)) {$partner->image = $filename;}
        $partner->update();


        return redirect()->to('admin/partner')->with('success','Partner Edit successfully.');
    }


}
