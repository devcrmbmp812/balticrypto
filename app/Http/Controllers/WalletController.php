<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\Setting;
use App\User;
use Sentinel;
use App\Classes\Client;


class WalletController extends Controller
{


    public function wdsdeposit()
    {
        $username = Sentinel::getUser()->username;
        $client = new Client();
        $address = $client->getAddress($username);
        $addressList = $client->getAddressList($username);
        $transactionList = $client->getTransactionList($username);
        return view('user.wds.deposit', compact('address', 'addressList', 'transactionList'));


    }

    public function wdswithdrawal()
    {
        $withdraws=Withdraw::where('user_id',Sentinel::getUser()->id)->where('coin','BCT')->orderBy('created_at', 'DESC')->get();
        return view('user.wds.wds_withdraw',compact('withdraws'));
    }
    
    
    public function wds_withdrawal(Request $request)
    {
        $set_data=Setting::where('id',1)->first();
        $usd_rate=$set_data->rate;
        
        
        $final_amount=0;
        $amount=$request->amount_withdraw;
        $final_amount=$amount*$usd_rate;
        
        $user_id=Sentinel::getUser()->id;
        $user_data=User::where('id',$user_id)->first();
        $my_token=$user_data->total_wdc_bal;
        
        if($final_amount > $my_token)
        {
               return redirect()->back()->with('error','You Have No Sufficiant Token');
        }
        else
        {
            $final_total=$my_token-$final_amount;
        
                $uu=User::find($user_id);
                $uu->total_wdc_bal=$final_total;
                $uu->save();
            
          $ww=new Withdraw;
        $ww->user_id=Sentinel::getUser()->id;
        $ww->coin='BCT';
        $ww->address=$request->address_erc;
        $ww->amount=$final_amount;
        $ww->save();
        return redirect()->back()->with('success','Withdraw BCT successfully');   
        }
        
      
    }
    
    


 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user.wallet.wallet');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
