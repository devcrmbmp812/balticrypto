<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negotiation;


class NegotiationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $negotiation = Negotiation::orderby('id','desc')->get();
        return view('admin.negotiation.index', compact('negotiation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.negotiation.create' );
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
            'link' =>'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!is_null($request->image)) {
            $file = $request->file('image');
            $destinationPath = public_path('assets/images/user/negotiation');
            $filename = camel_case(str_random(5) . $file->getClientOriginalName());
            $file->move($destinationPath, $filename);
        }

        $negotiation= new Negotiation();
        $negotiation->link=$request->link;
        $negotiation->image = $filename;
        $negotiation->save();
        return redirect()->to('admin/negotiation')->with('success','Negotiation added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $negotiation=  Negotiation::find($id);
        return view('admin.negotiation.edit' ,compact('negotiation'));
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
            $destinationPath = public_path('assets/images/user/negotiation');
            $filename = camel_case(str_random(5) . $file->getClientOriginalName());
            $file->move($destinationPath, $filename);
        }

        $negotiation=  Negotiation::find($id);
        $negotiation->link=$request->link;
        if(!is_null($request->image)) {$negotiation->image = $filename;}
        $negotiation->save();
        return redirect()->to('admin/negotiation')->with('success','Negotiation Edit successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Negotiation::find($id)->delete();
        return 0;
    }
}
