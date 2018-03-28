<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\Setting;
use App\User;
use Sentinel;
use Mail;
use App\CoinPaymentsAPI;

class WithdrawController extends Controller
{
    public function index($coin)
    {
        if($coin == 'BTC' || $coin == 'BCH' || $coin == 'ETH')
        {
            $withdraws=Withdraw::where('user_id',Sentinel::getUser()->id)->where('coin',$coin)->orderBy('created_at', 'DESC')->get();
            return view('user.wallet.withdrawal',compact('coin','withdraws'));
        }
        else{
            return view('errors.error');
        }
    }

    public function index_wds($coin)
    {
        if($coin=='BCT')
        {
            $withdraws=Withdraw::where('user_id',Sentinel::getUser()->id)->where('coin',$coin)->orderBy('created_at', 'DESC')->get();
            return view('user.wallet.withdrawal_wds',compact('coin','withdraws'));
        }
        else{
            return view('errors.error');
        }
    }

    public function requestWithdraw()
    {
        $withdraws=Withdraw::with('user')->orderBy('created_at', 'DESC')->get();
        return view('admin.withdrawal.index',compact('withdraws'));
    }

    public function confirmStatus(Request $request)
    {
        $wid= $request->wid;
        $withdraw = Withdraw::find($wid);

        $amount_withdraw = $withdraw->amount;
        $coin_name = $withdraw->coin;
        $address_withdraw = $withdraw->address;
        $uid = $withdraw->user_id;

        if($coin_name == 'BCT')
        {
            Withdraw::where('id',$wid)->update(['admin_status'=>$request->status,'status'=>1,'withdraw_id'=>'']);
            $user = User::find($uid);
            $this->sendWithdrawalApprovedEmail($user,$amount_withdraw,$coin_name); //send mail
            return 0;
        }

        $setting = Setting::find(1);
        $cp_helper = new CoinPaymentsAPI();
        $setup = $cp_helper->Setup($setting->private_key,$setting->public_key);
        $result = $cp_helper->CreateWithdrawal($amount_withdraw, $coin_name, $address_withdraw);

        if ($result['error'] == 'ok')
        {
            Withdraw::where('id',$wid)->update(['admin_status'=>$request->status,'status'=>$result['result']['status'],'withdraw_id'=>$result['result']['id']]);
            $user = User::find($uid);
            $this->sendWithdrawalApprovedEmail($user,$amount_withdraw,$coin_name); //send email
            return 0;

        } else {
            return 1;
        }

    }

    public function rejectStatus(Request $request)
    {
        $wid= $request->wid;

        $withdraw = Withdraw::find($wid);
        $amount = $withdraw->amount;
        $uid = $withdraw->user_id;
        $coin = $withdraw->coin;
        $gnt_token=$withdraw->gnt_token;

        if($coin=='BCT')
        {
                $user = User::where('id',$uid)->first();
                $gntbal = $user->total_wdc_bal;
                Withdraw::where('id',$wid)->update(['admin_status'=>$request->status,'status'=>$request->status]);
                    $balance = $gntbal + $gnt_token;
                    User::where('id',$uid)->update(['total_wdc_bal'=>$balance]);
                $user = User::find($uid);
                $this->sendWithdrawalRejectEmail($user,$gnt_token,$balance,$coin); //send email
                return 0;
        }
        else
        {
                $user = User::where('id',$uid)->first();
                $btcbal = $user->total_btc_bal;
                $bchbal = $user->total_bch_bal;
                $ethbal = $user->total_eth_bal;

                Withdraw::where('id',$wid)->update(['admin_status'=>$request->status]);

                if($coin == 'BTC') {
                    $balance = $btcbal + $amount;
                    User::where('id',$uid)->update(['total_btc_bal'=>$balance]);
                }

                if($coin == 'BCH') {
                    $balance = $bchbal + $amount;
                    User::where('id',$uid)->update(['total_bch_bal'=>$balance]);
                }

                else if($coin == 'ETH') {
                    $balance = $ethbal + $amount;
                    User::where('id',$uid)->update(['total_eth_bal'=>$balance]);
                }
                
                $user = User::find($uid);
                $this->sendWithdrawalRejectEmail($user,$amount,$balance,$coin); //send email

                return 0;
         }

    }

    public function postWithdrawwds(Request $request)
    {
          $this->validate($request, [
            'amount_withdraw'      => 'required',
            'address_withdraw'   => 'required',
        ]);

          $set_data=Setting::where('id',1)->first();
          $gnt_rate=$set_data->rate;

       
        $myGNT = Sentinel::check()->total_wdc_bal;
        $withdrawalamount =  $request->amount_withdraw;
         $type = $request->coin_name;

        if($request->coin_name=='BCT') 
        {
            $gnt = $request->amount_withdraw;
            $gnt_withdraw=$gnt_rate * $gnt;

            if($myGNT>=$gnt_withdraw ){

                $withdraw = new Withdraw;
                $withdraw->user_id = Sentinel::getUser()->id;
                $withdraw->coin = $request->coin_name;
                $withdraw->amount = $gnt_withdraw;
                 $withdraw->gnt_token = $gnt;
                $withdraw->address = $request->address_withdraw;
                $withdraw->save();

                $left_balance = $myGNT - $gnt;
                $bal_coin_name='total_wdc_bal';
                User::where('id',Sentinel::getUser()->id)->update([$bal_coin_name=>$left_balance]);
                $user = User::find(Sentinel::getUser()->id);
                $this->sendWithdrawalReqEmail($user,$gnt,$type,$left_balance); //send email
                $this->sendWithdrawalReqAdminEmail($user,$gnt,$type); //send email to admin

                return redirect()->back()->with('success','Your withdrawal Request for '.$gnt_withdraw." ".$request->coin_name.' has been submitted​ successfully. After Admin Confirmation requested Amount will credited to your address');


            } else
            {
                return redirect()->back()->with('error','Sorry , insufficient funds !!');
            }

        }
    }

    public function postWithdraw(Request $request)
    {
       $this->validate($request, [
            'amount_withdraw'      => 'required',
            'address_withdraw'   => 'required',
        ]);

        $myBTC = Sentinel::check()->total_btc_bal;
        $myBCH = Sentinel::check()->total_bch_bal;
        $myETH = Sentinel::check()->total_eth_bal;
        $withdrawalamount =  $request->amount_withdraw;
        $type = $request->coin_name;

        if($request->coin_name=='BTC') 
        {
            $btc_withdraw = $request->amount_withdraw;
            if($myBTC>=$btc_withdraw ){

                $withdraw = new Withdraw;
                $withdraw->user_id = Sentinel::getUser()->id;
                $withdraw->coin = $request->coin_name;
                $withdraw->amount = $request->amount_withdraw;
                $withdraw->address = $request->address_withdraw;
                $withdraw->save();

                $left_balance = $myBTC - $btc_withdraw;
                $bal_coin_name='total_btc_bal';
                User::where('id',Sentinel::getUser()->id)->update([$bal_coin_name=>$left_balance]);
                $user = User::find(Sentinel::getUser()->id);
                $this->sendWithdrawalReqEmail($user,$withdrawalamount,$type,$left_balance); //send email
                $this->sendWithdrawalReqAdminEmail($user,$withdrawalamount,$type); //send email to admin

                return redirect()->back()->with('success','Your withdraw Request for '.$request->amount_withdraw." ".$request->coin_name.' successfully. After Admin Confirm Request Amount will credited your address');

            } else
            {
                return redirect()->back()->with('error','Sorry , insufficient funds !!');
            }

        }

    if($request->coin_name=='BCH') 
        {
            $bch_withdraw = $request->amount_withdraw;
            if($myBCH>=$bch_withdraw ){

                $withdraw = new Withdraw;
                $withdraw->user_id = Sentinel::getUser()->id;
                $withdraw->coin = $request->coin_name;
                $withdraw->amount = $request->amount_withdraw;
                $withdraw->address = $request->address_withdraw;
                $withdraw->save();

                $left_balance = $myBCH - $bch_withdraw;
                $bal_coin_name='total_bch_bal';
                User::where('id',Sentinel::getUser()->id)->update([$bal_coin_name=>$left_balance]);
                $user = User::find(Sentinel::getUser()->id);
                $this->sendWithdrawalReqEmail($user,$withdrawalamount,$type,$left_balance); //send email
                $this->sendWithdrawalReqAdminEmail($user,$withdrawalamount,$type); //send email to admin

                return redirect()->back()->with('success','Your withdraw Request for '.$request->amount_withdraw." ".$request->coin_name.' successfully. After Admin Confirm Request Amount will credited your address');

            } else
            {
                return redirect()->back()->with('error','Sorry , insufficient funds !!');
            }

        }



        if($request->coin_name=='ETH') {


            $eth_withdraw = $request->amount_withdraw;

            if($myETH>=$eth_withdraw ){

                $withdraw = new Withdraw;
                $withdraw->user_id = Sentinel::getUser()->id;
                $withdraw->coin = $request->coin_name;
                $withdraw->amount = $request->amount_withdraw;
                $withdraw->address = $request->address_withdraw;
                $withdraw->save();

                 $left_balance = $myETH - $eth_withdraw;

                $bal_coin_name='total_eth_bal';

                User::where('id',Sentinel::getUser()->id)->update([$bal_coin_name=>$left_balance]);
                $user = User::find(Sentinel::getUser()->id);

                $this->sendWithdrawalReqEmail($user,$withdrawalamount,$type,$left_balance); //send email

                 $this->sendWithdrawalReqAdminEmail($user,$withdrawalamount,$type); //send email to admin

                //  return redirect()->back()->with('success','Your withdraw of'.$request->amount_withdraw." ".$request->coin_name.'done successfully.');

                return redirect()->back()->with('success','Your withdraw Request for '.$request->amount_withdraw." ".$request->coin_name.' successfully. After Admin Approved Amount credited your address');

            } else {

                return redirect()->back()->with('error','Sorry , insufficient funds !!');

            }

        }

    }


    private function sendWithdrawalReqAdminEmail($user,$withdrawalamount,$type){
        Mail::send('emails.withdrawrequestadmin',[
            'user' => $user,
            'withdrawalamount' => $withdrawalamount,
            'type' => $type,
        ],function($message) use ($user, $withdrawalamount,$type) {
            $message->to(Setting::find(1)->email);
            $message->subject("Hello admin, Withdraw Request");
        });
    }


    private function sendWithdrawalReqEmail($user,$withdrawalamount,$type,$left_balance){
        Mail::send('emails.withdrawrequest',[
            'user' => $user,
            'withdrawalamount' => $withdrawalamount,
            'type' => $type,
            'left_balance' => $left_balance,
        ],function($message) use ($user, $withdrawalamount,$type,$left_balance) {
            $message->to($user->email);
            $message->subject("Hello $user->username, Withdraw Request");
        });
    }

    private function sendWithdrawalApprovedEmail($user,$amount_withdraw,$coin_name){
        Mail::send('emails.withdrawrequestapproved',[
            'user' => $user,
            'amount_withdraw' => $amount_withdraw,
            'coin_name' => $coin_name,
        ],function($message) use ($user, $amount_withdraw,$coin_name) {
            $message->to($user->email);
            $message->subject("Hello $user->username, Withdraw Approved");
        });
    }

    private function sendWithdrawalRejectEmail($user,$amount,$balance,$coin){
        Mail::send('emails.rejectwithdrawrequest',[
            'user' => $user,
            'amount' => $amount,
            'balance' => $balance,
            'coin' => $coin,
        ],function($message) use ($user, $amount,$balance,$coin) {
            $message->to($user->email);
            $message->subject("Hello $user->username, Reject Withdraw Request");
        });
    }
}
