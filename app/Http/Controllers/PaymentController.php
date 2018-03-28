<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\CoinPaymentsAPI;
use App\Models\Setting;
use App\Models\Wallet;
use App\Models\Rate;
use App\Models\Deposit;
use App\User;
use Sentinel;

class PaymentController extends Controller
{


    public function depositAddress(Request $request) {


        $amount = $request->amount;
        $type = $request->type;

        if($amount == ""){
            return $data = 0;
        }

        $user_id = Sentinel::getUser()->id;
        $user = User::where('id',$user_id)->first();
        $store = new Deposit;
        $store->user_id = $user_id;
        $store->coin_type  = $type;
        $store->amount1 = $amount;
        $store->save();
        //$depositid = Deposit::where('user_id',$user_id)->first();
        $setting = Setting::first();
        $req = array(
            'amount' => $request->amount,
            'currency1' => 'USD',
            'currency2' => $request->type,
            'buyer_email' => $user->email,
            'buyer_name' => $user->username,
            'item_name' => 'Deposit',
            'item_number' => $store->id,
            'ipn_url' => url('/ipn-handler'),
        );
         $cp_helper = new CoinPaymentsAPI();
        $setup = $cp_helper->Setup($setting->private_key,$setting->public_key);
         $result=  $cp_helper->api_call('create_transaction', $req);
//         print_r($result);
//        die();

        if ($result['error'] == 'ok') {

            $data = $result["result"];

            $data['error'] = "success";

            $store->address = $data['address'];
            $store->amount = $data['amount'];
            $store->txid = $data['txn_id'];
            $store->save();

            $user = User::find($user_id);
            $user->btc_address = $data['address'];
            $user->save();

            return $data;
        }

        return $result['error'];

    }


    //  will update final callback and update referral balace too
    public function IpnHandler(Request $request){
       Storage::disk('local')->put($request->txn_id.'-- '.$request->received_confirms."-".$request->ipn_type.'  - new -.txt', json_encode($request->all()));
        $cps = new CoinPaymentsAPI(); 
        $setting = Setting::first();
        $cps->Setup($setting->private_key,$setting->public_key);
       // $cps->verify_ipn($request);
        //Confirmation received
        if($request->received_confirms) { $confirms=$request->received_confirms;  }
        else if($request->confirms){   $confirms=$request->confirms;  }
        else{ $confirms=0; } 
       //Amount received
        if($request->received_amount) {   $amount=$request->received_amount;       }
        else if($request->amount){  $amount=$request->amount;       }
        else{ $amount=0; }


        if($request->address)
         {
            $addressdata=CoinAddress::where('address',$request->address)->first();
             if(!empty($addressdata))
             {
                 $userdata=User::where('id',$addressdata->user_id)->first();
                 if(empty($deposit) && $userdata)
                 {
                      $deposit=new Deposit;
                      $deposit->user_id=$userdata->id;
                      $deposit->amount = $request->amount;
                      $deposit->txid = $request->txn_id; 
                      $deposit->address = $request->address;
                      $deposit->coin_type = $request->currency;
                      $deposit->confirms =$confirms;
                      $deposit->save(); 
                 }
             }

            if($request->status >= 100){
                if($request->txn_id){
                    $deposit = Deposit::where('txid',$request->txn_id)->first();
                    if($deposit){
                        if($request->status >=100){
                            $userid = $deposit->user_id;
                            // $dp = Deposit::where('user_id',$userid)->update(['status' => 100,'amount'=>$request->received_amount]); // update status to pending for complete
                            $dp = Deposit::find($deposit->id);
                            $dp->status = 100;
                            $dp->amount = $request->received_amount;
                            $dp->confirms = $confirms;
                            $dp->save();
                            
                            $user = User::find($userid);
                            if($dp->coin_type=='BTC'){$user->total_btc_bal = $user->total_btc_bal + $request->received_amount; }
                            if($dp->coin_type=='BCH'){$user->total_bch_bal = $user->total_bch_bal + $request->received_amount; }
                            if($dp->coin_type=='ETH'){$user->total_eth_bal = $user->total_eth_bal + $request->received_amount; }
                            $user->save();
                            $this->sendDepositEmail($user,$dp);
                            die('IPN OK');
                        }
                    }
                }
            }else if($request->status == -1){
                $deposit = Deposit::where('txid',$request->txn_id)->first();
                if($deposit){
                    $userid = $deposit->user_id;
                    $dp = Deposit::where('txid',$request->txn_id)->update(['status' => -1,'confirms' => $confirms ]); // update status to pending for complete
                }
            }
        }
    }


    // call back check
    public function check_status(Request $request)
    {
        
       // Storage::disk('local')->put($request->item_name.'-'.$request->item_number.'.txt', json_encode($request->all()));
        
        $cps = new CoinPaymentsAPI();
        $setting = Setting::first();
        $cps->Setup($setting->private_key,$setting->public_key);
        $cps->verify_ipn($request);
        $txid = array(
            'txid' => $request->txid,
        );
        // See https://www.coinpayments.net/apidoc-create-transaction for all of the available fields
        $result = $cps->get_tx_info($txid);
       
      
        

        if(count($result) > 0){
            $received = $result['result']['received'];
        } else {
            $received=0;
        }

        $status = $result['result']['status_text'];

        if($received > 0)
        {
            if($status == 'Waiting for confirms...')
            {
                $dp = Deposit::where('user_id',Sentinel::check()->id)->where('txid',$request->txid)->first();
                if($dp->status==0){
                    $depositnew = Deposit::where('user_id',Sentinel::check()->id)->where('txid',$request->txid)->update(['status' => 1,'amount'=>$result['result']['amountf']]); // update status to pending for complete
                    // $user = User::find($dp->user_id);
                    // if($dp->coin_type=='BTC')
                    //     $user->total_btc_bal = $user->total_btc_bal + $result['result']['amountf'];
                    // else if($dp->coin_type=='ETH')
                    //     $user->total_eth_bal = $user->total_eth_bal + $result['result']['amountf'];
                    // $user->save();
                }
                if($dp->status==100){
                    $user = User::where('id',$dp->user_id)->first();
                     $user = User::find($dp->user_id);
                     if($dp->coin_type=='BTC')
                         $user->total_btc_bal = $user->total_btc_bal + $result['result']['amountf'];
                     if($dp->coin_type=='BCH')
                         $user->total_btc_bal = $user->total_bch_bal + $result['result']['amountf'];
                     else if($dp->coin_type=='ETH')
                         $user->total_eth_bal = $user->total_eth_bal + $result['result']['amountf'];
                     $user->save();
                }
                return $request->txid;

            }
            else if($status == 'Complete')
            {
                $depositnew = Deposit::where('user_id',Sentinel::check()->id)->where('txid',$request->txid)->update(['admin_status' => 1]); // update status to complete
                return $request->txid;
            } else {
                return 0;
            }

        } else {

            return 0;
        }

    }

    // end call back



// end call back
    private function sendDepositEmail($user,$dp){
        Mail::send('emails.deposit',[
            'user' => $user,
            'dp' => $dp,
        ],function($message) use ($user, $dp) {
            $message->to($user->email);
            $message->subject("Hello $user->username");
        });
    }

}