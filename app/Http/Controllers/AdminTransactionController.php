<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoinPaymentsAPI;
use App\Models\Setting;
use App\Models\Wallet;
use App\Models\TransferToken;
use App\Models\Withdraw;
use App\Models\Deposit;
use App\Models\Rate;
use App\User;
use Sentinel;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets=Wallet::orderBy('created_at', 'DESC')->get();
        return view('admin.transaction.index',compact('wallets'));
    }


    public function userTransaction(Request $request,$id)
    {
        $wallets = Wallet::with('user')->orderBy('created_at', 'DESC')->where('user_id',$id)->get();
        $withdraws = Withdraw::with('user')->orderBy('created_at', 'DESC')->where('user_id',$id)->get();
        $deposits = Deposit::with('user')->orderBy('created_at', 'DESC')->where('user_id',$id)->get();

        foreach($wallets as $key => $wallet)   {  //Adding type in buy array
            $wallets[$key]['wallet_type'] = 'token_buy';
        }
        foreach($withdraws as $key => $withdraw)   {  //Adding type in buy array
            $withdraws[$key]['wallet_type'] = 'withdraw';
        }
        foreach($deposits as $key => $deposit)   {  //Adding type in buy array
            $deposits[$key]['wallet_type'] = 'deposit';
        }
        $transactions=array_merge(json_decode($wallets),json_decode($withdraws),json_decode($deposits));
        return view('admin.transaction.index',compact('wallets','transactions','deposits'));
    }

    public function buyTokenTransaction(Request $request)
    {

        $wallets = Wallet::with('user')->orderBy('created_at', 'DESC')->get();
        return view('admin.transaction.buytoken',compact('wallets'));

    }


    public function depositTransaction(Request $request)
    {

        $deposit = Deposit::with('user')->orderBy('created_at', 'DESC')->get();
        return view('admin.transaction.deposit',compact('deposit'));

    }

    public function withdrawalTransaction(Request $request)
    {

        $withdraws = Withdraw::with('user')->orderBy('created_at', 'DESC')->get();
        return view('admin.transaction.withdrawal',compact('withdraws'));

    }

    public function transferTokenTransaction(Request $request)
    {

        $transfer = TransferToken::with('user','users')->orderBy('created_at', 'DESC')->get();
        return view('admin.transaction.tokentransfer',compact('transfer'));
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
