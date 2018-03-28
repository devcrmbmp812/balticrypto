<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;
use App\Models\Setting;
use App\User;
use Sentinel;
use Activation;
use Mail;
use View;
use Reminder;


class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 

        $user= Sentinel::getUser();
        $userdata=User::where('id',$user->id)->where('status',1)->get();
        $i=0;$j=0;
        foreach ($userdata as $key1)
        {
            $arr[$i][$j]=0;
            $arr[$i][$j+1]=$key1->username.'('.$key1->referal_bal.')';
            $arr[$i][$j+2]= -1;
            $arr[$i][$j+3]= 17;
            //$arr[$i][$j+4]= $key1->email;
            $arr[$i][$j+4]= 'black';
        }

        $user_parent=User::where('parent_id',$user->id)->get();
        $i=1;
        foreach ($user_parent as $key2)
        {
            $k=0;
            $arr[$i][$k]=10+$i;
            $arr[$i][$k+1]=$key2->username.'('.$key2->referal_bal.')';
            $arr[$i][$k+2]=0;
            $arr[$i][$k+3]= 17;
            //$arr[$i][$k+4]= $key2->email;
            $arr[$i][$k+4]= 'green';
            $i++;
        }

        $final_array=(json_encode($arr));
        //  print_r($final_array);die;
        $users = User::where('parent_id',Sentinel::check()->id)->get();
        return view('user.referral.index',compact('final_array','users'));
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
     * @param  \App\app\models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function show(Referral $referral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\app\models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function edit(Referral $referral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\app\models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referral $referral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\app\models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referral $referral)
    {
        //
    }
}
