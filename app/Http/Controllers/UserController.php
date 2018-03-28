<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\TransferToken;
use App\Models\Wallet;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Sentinel;

class UserController extends Controller {
	public function index() {
		return view('dashboard.index');
	}

	public function buyTokenTransaction(Request $request) {

		$wallets = Wallet::with('user')->orderBy('created_at', 'DESC')->where('user_id', Sentinel::getUser()->id)->get();
		return view('user.transaction.buytoken', compact('wallets'));

	}

	public function depositTransaction(Request $request) {

		$deposit = Deposit::with('user')->orderBy('created_at', 'DESC')->where('user_id', Sentinel::getUser()->id)->get();
		return view('user.transaction.deposit', compact('deposit'));

	}

	public function withdrawalTransaction(Request $request) {

		$withdraws = Withdraw::with('user')->orderBy('created_at', 'DESC')->where('user_id', Sentinel::getUser()->id)->get();
		return view('user.transaction.withdrawal', compact('withdraws'));

	}

	public function transferTokenTransaction(Request $request) {

		$transfer = TransferToken::with('user')->orderBy('created_at', 'DESC')->where('user_id', Sentinel::getUser()->id)->orWhere('username', Sentinel::getUser()->id)->get();
		return view('user.transaction.tokentransfer', compact('transfer'));

	}

}
