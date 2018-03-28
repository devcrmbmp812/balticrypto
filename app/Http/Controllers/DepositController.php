<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Sentinel;
use App\Models\Setting;
use App\Models\Wallet;
use App\Models\Rate;
use App\Models\Deposit;
use App\Models\CoinAddress;
use Exception;
use App\CoinPaymentsAPI;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($coin)
    {
        try{
            $user_id = Sentinel::getUser()->id;
            $address = Deposit::where('user_id',$user_id)->orderBy('created_at', 'DESC')->get();
            $user_address = User::where('id',$user_id)->orderBy('created_at', 'DESC')->first();
            if($coin == 'BTC'){  $usd_price = Setting::find(1)->btc_price; } // latest Bitcoin rate in USD
            if($coin == 'BCH'){   $usd_price = Setting::find(1)->bch_price;  }   // latest  Bitcoin cash rate in USD
            if($coin == 'ETH'){  $usd_price = Setting::find(1)->eth_price;  } // latest Etherium rate in USD

            if ($coin == 'BTC' || $coin == 'BCH' || $coin == 'ETH') {
                $coinadd=CoinAddress::where('user_id',Sentinel::getUser()->id)->where('coin',$coin)->first();
                if(!$coinadd)
                {
                    $setting = Setting::first();
                    $cp_helper = new CoinPaymentsAPI();
                    $setup = $cp_helper->Setup($setting->private_key,$setting->public_key);
                     $req = array(
                        'currency' => $coin,
                        'ipn_url' => url('/ipn-handler'),
                    );
                    $result= $cp_helper->api_call('get_callback_address', $req);
                    if ($result['error'] == 'ok') {
                       $coin_address= new CoinAddress;
                       $coin_address->user_id = Sentinel::getUser()->id;
                       $coin_address->coin = $coin;
                       $coin_address->address=$result['result']['address'];
                       // if(isset($result['result']['dest_tag']))
                       // {
                       //    $coin_address->destination_tag=$result['result']['dest_tag'];
                       // }
                       $coin_address->save();
                       $coinadd=CoinAddress::where('user_id',Sentinel::getUser()->id)->where('coin',$coin)->first();
                     }
                }
                $coinType = $coin;
               // $usd_price = Setting::find(1)->eth_price; // latest Etherium rate in USD
                 return view('user.wallet.deposit',compact('address','user_address','coinType','usd_price','coinadd'));
             }
            return view('errors.error');
        } catch (Exception $e) {
            return view('errors.error');
        }


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
