<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = Team::orderby('id','desc')->get();
        return view('admin.team.index', compact('user_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create' );
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
            'name' =>'required|max:255',
            'designation' =>'required|max:255',
            'email' =>'required',
            'fblink' =>'required',
            'telegram' =>'required',
            'sorting' =>'required',
            'type' =>'required',
            'status' =>'required|max:1',
            'editor' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!is_null($request->image)) {
            $file = $request->file('image');
            $destinationPath = public_path('assets/images/user/team_member');
            $filename = camel_case(str_random(5) . $file->getClientOriginalName());
            $file->move($destinationPath, $filename);
        }

        $team= new Team();
        $team->name=$request->name;
        $team->designation=$request->designation;
        $team->email=$request->email;
        $team->fblink=$request->fblink;
        $team->telegram=$request->telegram;
        $team->sorting=$request->sorting;
        $team->status=$request->status;
        $team->type=$request->type;
        $team->description=$request->editor;
        $team->image = $filename;
        $team->save();
        return redirect()->to('admin/team-member')->with('success','Team Member added successfully.');
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
         $user_data = Team::orderby('id','desc')->find($id);
        return view('admin.team.edit', compact('user_data'));
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
            'name' =>'required|max:255',
            'designation' =>'required|max:255',
            'email' =>'required',
            'fblink' =>'required',
            'telegram' =>'required',
            'sorting' =>'required',
            'type' =>'required',
            'status' =>'required|max:1',
            'editor' =>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!is_null($request->image)) {
            $file = $request->file('image');
            $destinationPath = public_path('assets/images/user/team_member');
            $filename = camel_case(str_random(5) . $file->getClientOriginalName());
            $file->move($destinationPath, $filename);
        }

        $team=  Team::find($id);
        $team->name=$request->name;
        $team->designation=$request->designation;
        $team->email=$request->email;
        $team->fblink=$request->fblink;
        $team->telegram=$request->telegram;
        $team->sorting=$request->sorting;
        $team->type=$request->type;
        $team->description=$request->editor;
        $team->status=$request->status;
        if (!is_null($request->image))
            $team->image = $filename;

        $team->update();
        return redirect()->to('admin/team-member')->with('success','Team Member edit successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Team::find($id)->delete();
        return 0;
    }
}
