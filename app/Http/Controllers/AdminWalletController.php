<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Sentinel;
use App\Models\Withdraw;
use App\User;
use App\Classes\Client;

class AdminWalletController extends Controller
{
  public function index()
  {
    return view('admin.wallet.index');
  }
   public function show_withdraw()
  {
      $withdraw_data=Withdraw::get();
    return view('admin.wallet.withdraw',compact('withdraw_data'));
  }
}
