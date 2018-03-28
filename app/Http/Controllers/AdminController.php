<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Hash;
use App\User;
use App\Models\RoleUser;
use Activation;
use App\Models\Addbalancehistory;
use Excel;
use Mail;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function users(Request $request)
    {
        $lable="users";
         $users=RoleUser::with('user','parent')->where('role_id',2)->orderBy('created_at', 'DESC')->get();
         return view('admin.users.index',compact('users','lable'));
    }
    public function support(Request $request)
    {
        $lable="Support";

        $users=RoleUser::with('user','parent')->where('role_id',4)->orderBy('created_at', 'DESC')->get();
        return view('admin.users.index',compact('users','lable'));
    }

    public function referral()
    {
        $ids=array();
         $id = User::distinct('parent_id')->where('parent_id','<>',0)->select('parent_id')->get();

        foreach ($id as $key)
        {
            $ids[] .= $key->parent_id;
        }

         $parent = User::with('parent')->wherein('id', $ids)->get();
        return view('admin.referral',compact('parent'));
    }
   
}
