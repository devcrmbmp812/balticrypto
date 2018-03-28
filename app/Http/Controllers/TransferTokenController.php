<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\TransferToken;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Sentinel;

class TransferTokenController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$setting = Setting::find(1);
		if ($setting->transfer == 1 ) {

			$value = TransferToken::with('user')->orderBy('created_at', 'DESC')->where('user_id', Sentinel::getUser()->id)->orWhere('username', Sentinel::getUser()->id)->get();
			return view('user.ico.transfer', compact('value'));

		} else {

			return view('errors.404');
		}
	}

	public function transferTokens(Request $request) {
		$setting = Setting::find(1);

		$alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; // genrate txid
		$reset_string = substr(str_shuffle(str_repeat($alpha_numeric, 25)), 0, 25); // genrate txid

		if ($setting->transfer == 1 ) {

			$this->validate($request, [
				'token_address' => 'required',
				'tokens' => 'required',
			]);

			$tokens = $request->tokens;

			$username = User::where('user_address', $request->token_address)->first();
			if (is_null($username)) {return redirect()->back()->with(['error' => "Please enter Valid Token Address!"]);}

			$user = User::find(Sentinel::check()->id);
			$user->total_wdc_bal = $user->total_wdc_bal - $tokens;
			$user->save();

			$username = User::find($username->id);
			$username->total_wdc_bal = $username->total_wdc_bal + $tokens;
			$username->save();

			$store = new TransferToken;
			$store->user_id = Sentinel::check()->id;
			$store->username = $username->id;
			$store->tokens = $tokens;
			$store->txid = $reset_string;
			$store->save();

			$this->sendTransferTokenEmail($user, $username, $tokens); // this is email sent from user
			$this->sendTransferTokentouserEmail($user, $username, $tokens); // this is email sent to user

			return redirect()->back()->with(['success' => "$tokens Tokens Transfer Successfully"]);

		} else {

			return view('errors.404');
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\TransferToken  $transferToken
	 * @return \Illuminate\Http\Response
	 */
	public function show(TransferToken $transferToken) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\TransferToken  $transferToken
	 * @return \Illuminate\Http\Response
	 */
	public function edit(TransferToken $transferToken) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\TransferToken  $transferToken
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, TransferToken $transferToken) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\TransferToken  $transferToken
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(TransferToken $transferToken) {
		//
	}

	private function sendTransferTokentouserEmail($user, $username, $tokens) {
		Mail::send('emails.transfertokentouser', [
			'user' => $user,
			'username' => $username,
			'tokens' => $tokens,
		], function ($message) use ($user, $username, $tokens) {
			$message->to($username->email);
			$message->subject("Hello $username->username, Token Received");
		});
	}

	private function sendTransferTokenEmail($user, $username, $tokens) {
		Mail::send('emails.transfertoken', [
			'user' => $user,
			'username' => $username,
			'tokens' => $tokens,
		], function ($message) use ($user, $username, $tokens) {
			$message->to($user->email);
			$message->subject("Hello $user->username, Token Transfer");
		});
	}
}
