<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use App\Models\Ico;
use App\Models\Rate;
use App\Models\Setting;
use App\Models\Wallet;
use App\Models\Referral;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Mail;
use Sentinel;
use Session;

class IcoController extends Controller {
	/**
	 * Display a listing of the resource. 
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		try {
			$btc = Setting::find(1)->btc_price;
			$bch = Setting::find(1)->bch_price;
			$eth = Setting::find(1)->eth_price;
			$usdofbtc = $btc; // latest Bitcoin rate in USD
			$usdofbch = $bch; // latest Bitcoin cash rate in USD
			$usdofeth = $eth; // latest Etherium rate in USD
			$wallets = Wallet::with('user')->orderBy('created_at', 'DESC')->where('user_id', Sentinel::check()->id)->get();
			$setting = Setting::find(1);
			$sold = $setting->sold_coins;
			$sold = ceil($sold / 1000000); // to get row from rates table
			if ($sold > 8) {
				$sold = 8;
			}

			$rate = Rate::find($sold);
			$usd_rate = $setting->rate;
			$rates = Rate::all();
			$counterico = CmsPage::where('slug', 'home_text')->first();
			return view('user.ico.index', compact('btc', 'bch', 'eth', 'wallets', 'usdofbtc', 'usdofbch', 'usdofeth', 'rate', 'usd_rate', 'setting', 'rates', 'counterico'));

		} catch (Exception $e) {

			return view('errors.error');

		}

	}

	public function icoInformation() {
		try {
			$usdofbtc = Setting::find(1)->btc_price; // latest Bitcoin rate in USD
			$usdofbch = Setting::find(1)->bch_price; // latest Bitcoin rate in USD
			$usdofeth = Setting::find(1)->eth_price; // latest Etherium rate in USD
			$wallets = Wallet::with('user')->orderBy('created_at', 'DESC')->where('user_id', Sentinel::check()->id)->get();
			$setting = Setting::find(1);
			$sold = $setting->sold_coins;
			$sold = ceil($sold / 1000000); // to get row from rates table
			if ($sold > 8) {
				$sold = 8;
			}

			$rate = Rate::find($sold);
			$usd_rate = $setting->rate;
			$rates = Rate::all();
			return view('user.ico.information', compact('wallets', 'usdofbtc','usdofbch', 'usdofeth', 'rate', 'usd_rate', 'setting', 'rates'));

		} catch (Exception $e) {

			return view('errors.error');

		}

	}

	public function converUsd(Request $request) {
		try {

			$alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; // genrate txid
			$reset_string = substr(str_shuffle(str_repeat($alpha_numeric, 25)), 0, 25); // genrate txid
			$amount = $request->amount;
			$myUSD = Sentinel::check()->total_usd_bal;

			$setting = Setting::find(1);
			$rate = $setting->rate; // 0.6 rate

			if ($myUSD >= $amount && $amount > $rate) {

				$n = $amount / $setting->rate; // ex 61(usd)/ 0.6 = 101.6667
				$tokens = floor($n); // 101
				$fraction = $n - $tokens; // 101.6667 - 101 = 0.6667

				$fraction = $fraction * $rate; // 0.4 USD

				$wallet = new Wallet;
				$wallet->user_id = Sentinel::check()->id;
				$wallet->tokens = $tokens;
				$wallet->type = 3; // Usd
				$wallet->amount1 = $amount;
				$wallet->txid = $reset_string;
				$wallet->save();

				$user = User::find(Sentinel::check()->id);
				$user->total_usd_bal = ($user->total_usd_bal - $amount) + $fraction;
				$user->total_wdc_bal = $user->total_wdc_bal + $tokens;
				$user->save();

				$this->sendConverusdEmail($user, $tokens, $myUSD); //send email

				$sold = $setting->sold_coins; // old sold tokens
				$rates = Rate::where('sold', '>', $sold)->first();
				$setting->sold_coins = $setting->sold_coins + $tokens; // update sold coins in setting table
				$setting->save();
				$soldNew = $setting->sold_coins; // new sold tokens
				if ($rates) {
					if ($sold <= $rates->sold && $soldNew >= $rates->sold) {
						$ratesNew = Rate::where('sold', '>', $soldNew)->first(); // get new rate
						if ($ratesNew) {
							$setting->rate = $ratesNew->usd_rate;
							$setting->save();
						}
					}
				}

				return $data = 1;

			} else {

				return $data = 0;

			}

		} catch (Exception $e) {

			return view('errors.error');

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
	public function storeIco(Request $request) {
	    $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; // genrate txid
		$reset_string = substr(str_shuffle(str_repeat($alpha_numeric, 25)), 0, 25); // genrate txid


        // //RATE Setting  IN Setting TABEL 
        $rates = Rate::orderby('id')->get();
        $j=0;

        foreach($rates as $rate)
        {    $j+=$rate->sold;
                 if($j >= Setting::find(1)->sold_coins)
                 {	$rate_set = $rate->usd_price;
                 	$bonus_set = $rate->bonus;
                     Setting::where('id',1)->update(['rate'=>$rate_set, 'bonus' => $bonus_set]);
                     break ;
                 }
        }
        // //RATE Setting  IN Setting TABELE 
//	******************************if token buy with BTC coin**********************************************************
		if ($request->tokenbtc) {

			$tokens = $request->tokenbtc; // token requested
			$rate = Setting::find(1)->rate;

			$tokenbtc = $tokens * $rate;
			$btcPrice = Setting::find(1)->btc_price;

			$totalPrice = $tokenbtc / $btcPrice;

			if ($totalPrice >= 5) {
				//check kyc status
				$kycStatus = Sentinel::getUser()->kyc_status;
                
                $user = user::find(Sentinel::check()->id);
                
				if ($kycStatus == 0 || $kycStatus == 2) {
				    if($user->kyc_image_one && $user->kyc_image_two)
				    {
				        return view('user.ico.kycList', compact('user'));
				    }
				    else
				    {
				        return view('user.ico.kyc', compact('tokens', 'totalPrice'));    
				    }
					
				}
			}

			// $now = Carbon::now();
			// $before = $now->subHours(4);
			// $old_check = Wallet::where('user_id', Sentinel::check()->id)->where("created_at", '>', $before)->sum("tokens");

			// if ($old_check >= 200) {

			// 	Session::flash('errorCoin', "You can buy max 200 tokens for every 4 hours !!!");
			// 	return redirect()->back();
			// }

			// $tokens = $request->tokenbtc; // token requested
			// if ($old_check + $tokens > 200) {
			// 	Session::flash("errorCoin", "You can buy max 200 tokens for every 4 hours !!!");
			// 	return redirect()->back();
			// }

			$btc = Setting::find(1)->btc_price; // 10000
			$total_btc = number_format($tokenbtc / $btc, 8); // total btc of token buy
			$myBTC = Sentinel::check()->total_btc_bal; // 0.50

			if ($myBTC >= $total_btc || $request->buyall == "1") {
				if ($request->buyall == "1") {
					$rate = Setting::find(1)->rate;
					$total_usd = $btc * $myBTC;
					$tokens = $total_usd / $rate;
					$total_btc = $myBTC;
				}

				$wallet = new Wallet;
				$wallet->user_id = Sentinel::check()->id;
				$wallet->tokens = $request->BCTtoken;
				$wallet->type = 1; // BTC
				$wallet->amount = $total_btc;
				$wallet->txid = $reset_string;
				$wallet->save();
				$user = user::find(Sentinel::check()->id);
				$user->total_btc_bal = $user->total_btc_bal - $total_btc;
				$user->total_wdc_bal = $user->total_wdc_bal + $request->BCTtoken;
				
				

				$user->save();
				$setting = Setting::find(1);

				$sold = $setting->sold_coins; // old sold tokens
				$rates = Rate::where('sold', '>', $sold)->first();
				$setting->sold_coins = $setting->sold_coins + $request->BCTtoken; // update sold coins in setting table
				$setting->save();
				$soldNew = $setting->sold_coins; // new sold tokens
				if ($rates) {
					if ($sold <= $rates->sold && $soldNew >= $rates->sold) {
						$ratesNew = Rate::where('sold', '>', $soldNew)->first(); // get new rate
						if ($ratesNew) {
							$setting->rate = $ratesNew->usd_rate;
							$setting->save();
						}
					}
				}

				if (Sentinel::check()->parent_id) {
					$parent = User::where('id',$user->parent_id)->first();

                    // send token to referal 
					$rbal = intval($tokens * $setting->ref_percentage / 100);
					//$usdbal = $rbal * $setting->rate;
					//$parent->total_usd_bal = $parent->total_usd_bal + $usdbal;$user->referal_bal = $user->referal_bal + $request->BCTtoken;
					$parent->total_wdc_bal = $parent->total_wdc_bal + $rbal;
					$parent->save();
					$parent_referral= Sentinel::check()->referal_bal + $rbal ;
					$parent_total_ref= $parent->total_ref_bal + $rbal; 
					User::where('id',Sentinel::check()->id)->update(['referal_bal'=>$parent_referral]);
					User::where('id',Sentinel::check()->parent_id)->update(['total_ref_bal'=>$parent_total_ref]);

					$referral= new Referral;
					$referral->user_id = Sentinel::check()->id;
					$referral->ref_user_id = Sentinel::check()->parent_id;
					$referral->level = 1;
					$referral->amount = $tokens;
					$referral->earn_amt = $rbal;
					$referral->wallet_id = $wallet->id;
					$referral->save();
				}
				$get_total=Wallet::where('user_id', Sentinel::check()->id)->sum('tokens');
				if($get_total>=1000 && Sentinel::getUser()->show_referral==0)
				{
					User::where('user_id', Sentinel::check()->id)->update(['show_referral'=>1]);
				}
				$type = Wallet::where('user_id', Sentinel::check()->id)->first();
				$this->sendBuyTokenEmail($user, $tokens, $type); //send email

				Session::flash('successCoin', "$tokens Token Bought Successfully.");



				return redirect()->back();
			} else {
				Session::flash('errorCoin', "Please try again.");
				return redirect()->back();
			}
		}

//	******************************if token buy with BCH coin**********************************************************
		if ($request->tokenbch) {

			$tokens = $request->tokenbch; // token requested
			$rate = Setting::find(1)->rate;

			$tokenbch = $tokens * $rate;
			$bchPrice = Setting::find(1)->bch_price;

			$totalPrice = $tokenbch / $bchPrice;

			if ($totalPrice >= 5) {
				//check kyc status
				$kycStatus = Sentinel::getUser()->kyc_status;
                
                $user = user::find(Sentinel::check()->id);
                
				if ($kycStatus == 0 || $kycStatus == 2) {
				    if($user->kyc_image_one && $user->kyc_image_two)
				    {
				        return view('user.ico.kycList', compact('user'));
				    }
				    else
				    {
				        return view('user.ico.kyc', compact('tokens', 'totalPrice'));    
				    }
					
				}
			}


			$bch = Setting::find(1)->bch_price; // 10000
			$total_bch = number_format($tokenbch / $bch, 8); // total btc of token buy
			$myBCH = Sentinel::check()->total_bch_bal; // 0.50

			if ($myBCH >= $total_bch || $request->buyall == "1") {
				if ($request->buyall == "1") {
					$rate = Setting::find(1)->rate;
					$total_usd = $bch * $myBCH;
					$tokens = $total_usd / $rate;
					$total_bch = $myBCH;
				}

				$wallet = new Wallet;
				$wallet->user_id = Sentinel::check()->id;
				$wallet->tokens = $request->BCTtokenbch;
				$wallet->type = 4; // BTC
				$wallet->amount = $total_bch;
				$wallet->txid = $reset_string;
				$wallet->save();
				$user = user::find(Sentinel::check()->id);
				$user->total_bch_bal = $user->total_bch_bal - $total_bch;
				$user->total_wdc_bal = $user->total_wdc_bal + $request->BCTtokenbch;
				$user->save();
				$setting = Setting::find(1);

				$sold = $setting->sold_coins; // old sold tokens
				$rates = Rate::where('sold', '>', $sold)->first();
				$setting->sold_coins = $setting->sold_coins + $request->BCTtokenbch; // update sold coins in setting table
				$setting->save();
				$soldNew = $setting->sold_coins; // new sold tokens
				if ($rates) {
					if ($sold <= $rates->sold && $soldNew >= $rates->sold) {
						$ratesNew = Rate::where('sold', '>', $soldNew)->first(); // get new rate
						if ($ratesNew) {
							$setting->rate = $ratesNew->usd_rate;
							$setting->save();
						}
					}
				}
				if ($user->parent_id) {
					$parent = User::find($user->parent_id);

                    // send token to referal 
					$rbal = $tokens * $setting->ref_percentage / 100;
					//$usdbal = $rbal * $setting->rate;
					//$parent->total_usd_bal = $parent->total_usd_bal + $usdbal;
					$parent->total_wdc_bal = $parent->total_wdc_bal + $rbal;
					$parent->save();


					$parent_referral= Sentinel::check()->referal_bal + $rbal ;
					$parent_total_ref= $parent->total_ref_bal + $rbal; 
					User::where('id',Sentinel::check()->id)->update(['referal_bal'=>$parent_referral]);
					User::where('id',Sentinel::check()->parent_id)->update(['total_ref_bal'=>$parent_total_ref]);

					$referral= new Referral;
					$referral->user_id = Sentinel::check()->id;
					$referral->ref_user_id = Sentinel::check()->parent_id;
					$referral->level = 1;
					$referral->amount = $tokens;
					$referral->earn_amt = $rbal;
					$referral->wallet_id = $wallet->id;
					$referral->save();
				}
				$get_total=Wallet::where('user_id', Sentinel::check()->id)->sum('tokens');
				if($get_total>=1000 && Sentinel::getUser()->show_referral==0)
				{
					User::where('user_id', Sentinel::check()->id)->update(['show_referral'=>1]);
				}
				$type = Wallet::where('user_id', Sentinel::check()->id)->first();
				$this->sendBuyTokenEmail($user, $tokens, $type); //send email

				Session::flash('successCoin', "$tokens Token Bought Successfully.");



				return redirect()->back();
			} else {
				Session::flash('errorCoin', "Please try again.");
				return redirect()->back();
			}
		}
//	******************************if token buy with ETH coin**********************************************************
		if ($request->tokeneth) {

			$tokens = $request->tokeneth; // token requested

			$rate = Setting::find(1)->rate;

			$tokeneth = $tokens * $rate;
			$ethPrice = Setting::find(1)->eth_price;

			$totalPrice = $tokeneth / $ethPrice;

			if ($totalPrice >= 10) {
				//check kyc status
				$kycStatus = Sentinel::getUser()->kyc_status;

				if ($kycStatus == 0 || $kycStatus == 2) {
					return view('user.ico.kyc', compact('tokens', 'totalPrice'));
				}
			}

			// $now = Carbon::now();
			// $before = $now->subHours(4);
			// $old_check = Wallet::where('user_id', Sentinel::check()->id)->where("created_at", '>', $before)->sum("tokens");

			// if ($old_check >= 200) {

			// 	Session::flash('errorCoin', "You can buy max 200 tokens for every 4 hours !!!");
			// 	return redirect()->back();
			// }

			// if ($old_check + $tokens > 200) {
			// 	Session::flash("errorCoin", "You can buy max 200 tokens for every 4 hours !!!");
			// 	return redirect()->back();
			// }

			$eth = Setting::find(1)->eth_price; // 1000
			$total_eth = number_format($tokeneth / $eth, 8);
			$myETH = Sentinel::check()->total_eth_bal; // 0.5
			if ($myETH >= $total_eth || $request->buyall == 1) {
				if ($request->buyall == 1) {
					$rate = Setting::find(1)->rate;
					$total_usd = $eth * $myETH; //
					$tokens = $total_usd / $rate;
					$total_eth = $myETH;
				}
				$wallet = new Wallet;
				$wallet->user_id = Sentinel::check()->id;
				$wallet->tokens = $request->BCTtokeneth;
				$wallet->type = 2; // ETH
				$wallet->amount = $total_eth;
				$wallet->txid = $reset_string;
				$wallet->save();
				$user = user::find(Sentinel::check()->id);
				$user->total_eth_bal = $user->total_eth_bal - $total_eth;
				$user->total_wdc_bal = $user->total_wdc_bal + $request->BCTtokeneth;
				$user->save();
				$setting = Setting::find(1);
				$sold = $setting->sold_coins; // old sold tokens
				$rates = Rate::where('sold', '>', $sold)->first();
				$setting->sold_coins = $setting->sold_coins + $request->BCTtokeneth;
				$setting->save();
				$soldNew = $setting->sold_coins; // new sold tokens
				if ($rates) {
					if ($sold <= $rates->sold && $soldNew >= $rates->sold) {
						$ratesNew = Rate::where('sold', '>', $soldNew)->first(); // get new rate
						if ($ratesNew) {
							$setting->rate = $ratesNew->usd_rate;
							$setting->save();
						}
					}
				}
				if ($user->parent_id) {
					$parent = User::find($user->parent_id);
					$rbal = $tokens * $setting->ref_percentage / 100;
				//	$usdbal = $rbal * $setting->rate;
				//	$parent->total_wdc_bal = $parent->total_usd_bal + $usdbal;
				    $parent->total_wdc_bal = $parent->total_wdc_bal + $rbal;
					$parent->save();

					$parent_referral= Sentinel::check()->referal_bal + $rbal ;
					$parent_total_ref= $parent->total_ref_bal + $rbal; 
					User::where('id',Sentinel::check()->id)->update(['referal_bal'=>$parent_referral]);
					User::where('id',Sentinel::check()->parent_id)->update(['total_ref_bal'=>$parent_total_ref]);

					$referral= new Referral;
					$referral->user_id = Sentinel::check()->id;
					$referral->ref_user_id = Sentinel::check()->parent_id;
					$referral->level = 1;
					$referral->amount = $tokens;
					$referral->earn_amt = $rbal;
					$referral->wallet_id = $wallet->id;
					$referral->save();
				}
				
				$get_total=Wallet::where('user_id', Sentinel::check()->id)->sum('tokens');
				if($get_total>=1000 && Sentinel::getUser()->show_referral==0)
				{
					User::where('id', Sentinel::check()->id)->update(['show_referral'=>1]);
				}
				$type = Wallet::where('user_id', Sentinel::check()->id)->first();
				$this->sendBuyTokenEmail($user, $tokens, $type); //send email
				Session::flash('successCoin', "$tokens Token Bought Successfully.");
				return redirect()->back();
			} else {
				Session::flash('errorCoin', "Please try again.");
				return redirect()->back();
			}
		}
		Session::flash('error', "Something went wrong !!!");
		return redirect()->back();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Ico  $ico
	 * @return \Illuminate\Http\Response
	 */
	public function show(Ico $ico) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Ico  $ico
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Ico $ico) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Ico  $ico
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Ico $ico) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Ico  $ico
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Ico $ico) {
		//
	}

	private function sendBuyTokenEmail($user, $tokens, $type) {
		Mail::send('emails.buytoken', [
			'user' => $user,
			'tokens' => $tokens,
			'type' => $type,
		], function ($message) use ($user, $tokens, $type) {
			$message->to($user->email);
			$message->subject("Hello $user->username, Buy Token");
		});
	}

	private function sendConverusdEmail($user, $tokens, $myUSD) {
		Mail::send('emails.convertusdtowds', [
			'user' => $user,
			'tokens' => $tokens,
			'myUSD' => $myUSD,
		], function ($message) use ($user, $tokens, $type) {
			$message->to($user->email);
			$message->subject("Hello $user->username, Convert USD to BCT");
		});
	}

	/**
	 * Show the Kyc Form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function kyc(Request $request) {

		$this->validate($request, [

			'imgInp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'imgInps' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

		]);

		$user = User::find($request->user_id);
		if (!is_null($request->imgInp)) {
			$file = $request->file('imgInp');
			$destinationPath = './assets/images/user/kyc';
			$filename = camel_case(str_random(5) . $file->getClientOriginalName());
			$file->move($destinationPath, $filename);
			$user->kyc_image_one = $filename;

		}

		if (!is_null($request->imgInps)) {

			$file_second = $request->file('imgInps');
			$destinationPath_second = './assets/images/user/kyc';
			$filename_second = camel_case(str_random(5) . $file_second->getClientOriginalName());
			$file_second->move($destinationPath_second, $filename_second);
			$user->kyc_image_two = $filename_second;

		}
		$user->save();
		return redirect('user-ico')->with(['success' => 'Your Kyc uploaded successfully']);
	}

	public function kycnewForm() {
		$kycStatus = Sentinel::getUser()->kyc_status;

		$user = user::find(Sentinel::check()->id);
		if ($kycStatus == 0 || $kycStatus == 2 || $kycStatus == 1) {
			if ($user->kyc_image_one && $user->kyc_image_two) {
				return view('user.ico.kycList', compact('user'));
			} else {
				return view('user.ico.kyc', compact('tokens', 'totalPrice'));
			}
		}
		
	}
}
