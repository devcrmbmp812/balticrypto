<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RatesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$rate = Rate::get();
		return view('admin.rates.index', compact('rate'));
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
		$this->validate($request, [
			'sold' => 'numeric|required',
			'usd_price' => 'numeric|required',
			'bonus' => 'numeric|required',
			'days' => 'numeric|required',
			'date' => 'numeric|required',
			
		]);

		$rates = Rate::orderBy('id', 'desc')->first();

		// if($rates->sold <= $request->sold) {
		$rate = new Rate;
		$rate->sold = $request->sold;
		$rate->usd_price = $request->usd_price;
		$rate->bonus = $request->bonus;
		$rate->days = $request->days;
		$rate->start_date = $request->date;
		

		$rate->save();
		return redirect()->back()->with(['success' => 'Rate Added successfully']);
		// } else {
		//     return redirect()->back()->with(['error' => "Insert Rate must be greater than last rate"]);
		// }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'sold' => 'numeric|required',
			'usd_price' => 'numeric|required',
		]);

		$rate = Rate::find($id);
		$rate->sold = $request->sold;
		$rate->usd_price = $request->usd_price;
		$rate->bonus = $request->bonus;
		$rate->days = $request->days;
		$rate->start_date = $request->date;
		

		$rate->save();
		return redirect()->back()->with(['success' => 'Rate updated successfully']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
