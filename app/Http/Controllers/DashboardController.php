<?php

namespace App\Http\Controllers;

use App\CoinPaymentsAPI;
use App\Models\Loginh;
use App\Models\Rate;
use App\Models\Setting;
use Exception;
use Sentinel;

class DashboardController extends Controller {

	public function getPrice() {
		try {
			$data['BTC'] = Setting::find(1)->btc_price;
			$data['ETH'] = Setting::find(1)->eth_price;
			$data['rate'] = Setting::find(1)->rate;
			$data['sold'] = Setting::find(1)->sold;
			return $data;
		} catch (Exception $e) {
			return view('errors.error');
		}

	}

	public function loginhistory() {
		$id = Sentinel::getUser()->id;
		$data = Loginh::where('user_id', $id)->orderBy('id', 'desc')->get();
		// return $data;

		return view('loginhistory', compact('data'));
	}

	public function dashboard() {


// 		try {

			// Get coinpayment Wallet Balace for all coin for admin

			$setting = Setting::first();
			$cp_helper = new CoinPaymentsAPI();
			$setup = $cp_helper->Setup($setting->private_key, $setting->public_key);
			$all = 1;
		    $data = $cp_helper->api_call('balances', array('all' => $all));
		    if($data){
    			$btcwal = $data['result']['BTC']['balancef'];
    			$ethwal = $data['result']['ETH']['balancef'];
    			$bchwal = $data['result']['BCH']['balancef'];
		    }
		    else{
        		$btcwal = Sentinel::getUser()->total_btc;
        		$ethwal = Sentinel::getUser()->total_eth;
        		$bchwal = Sentinel::getUser()->total_bch;
		    }
			$usdofbtc = Setting::find(1)->btc_price; // latest Bitcoin rate in USD
			$usdofeth = Setting::find(1)->eth_price; // latest Etherium rate in USD
			$usdofbch = Setting::find(1)->bch_price; // latest Bitcoin cash rate in USD
			$setting = Setting::find(1);
			$sold = $setting->sold_coins;
			$sold = ceil($sold / 1000000); // to get row from rates table
			if ($sold > 8) {
				$sold = 8;
			}

			$rate = Rate::find($sold);
			$usd_rate = $setting->rate;
			$rates = Rate::all();

			$setting_data = Setting::find(1)->rate; // latest Bitcoin rate in USD

			return view('dashboard.index', compact('usdofbtc', 'usdofeth','usdofbch', 'rate', 'usd_rate', 'setting', 'rates', 'btcwal', 'bchwal', 'ethwal', 'setting_data', 'ico_end_date'));

// 		} catch (Exception $e) {

// 			return view('errors.error');

// 		}

	}

}
