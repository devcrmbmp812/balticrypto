<?php

namespace App\HTTP\ViewComposers;

use App\Models\Setting;
use App\Models\Withdraw;
use Illuminate\View\View;

class Header {
	public function compose(View $view) {

		// $btc = json_decode(file_get_contents('https://www.bitstamp.net/api/v2/ticker/btcusd'));
		// $eth = json_decode(file_get_contents('https://www.bitstamp.net/api/v2/ticker/ethusd'));
		//$data = array('BTC' => $btc->last, 'ETH' => $eth->last);
		$data['BTC'] = Setting::find(1)->btc_price;
		$data['ETH'] = Setting::find(1)->eth_price;
		$data['BCH'] = Setting::find(1)->bch_price;
		$data['rate'] = Setting::find(1)->rate;
		$data['sold'] = Setting::find(1)->sold;
		$data['transfer'] = Setting::find(1)->transfer;

		$withdraw = Withdraw::where('admin_status', 0)->count();

		$data['count'] = $withdraw;

		// $btc = json_decode(file_get_contents('https://www.bitstamp.net/api/v2/ticker/btcusd'));
		// $eth = json_decode(file_get_contents('https://www.bitstamp.net/api/v2/ticker/ethusd'));
		// $setting = ['btc_volume' => $btc->volume, 'eth_volume' => $eth->volume];
		$setting="";
		$data['setting'] = $setting;

		$view->with('header_data', $data);

	}

}
