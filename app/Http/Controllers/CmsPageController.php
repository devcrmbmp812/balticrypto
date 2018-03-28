<?php
namespace App\Http\Controllers;
use App\Models\CmsPage;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Partner;
use App\Models\Negotiation;
use App\Models\Subscription;
use App\User;
use Illuminate\Http\Request;

use Sentinel;
use Mail;
use View;
use URL;


class CmsPageController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index() {
		return view('admin.pages.index');
	}

	public function home() {

		$count_user = User::count();
		$seting = Setting::first();
		$founders = Team::where('status',0)->where('type',0)->orderby('sorting')->limit(5)->get();
		$team = Team::where('status',0)->wherein('type',[1,2,3,4])->orderby('sorting')->limit(20)->get();
		$partner = Partner::orderby('id')->limit(12)->get();
		$negotiation = Negotiation::orderby('id')->get();

		return view('home.index', compact('seting','founders','team','partner','negotiation','count_user'));
	}

	public function siteLogo(Request $request) {
		$home = CmsPage::where('slug', 'site_logo')->first();
		return view('admin.pages.header.index', compact('home'));
	}
	public function team() {
		$founders = Team::where('type',0)->where('status',0)->orderby('sorting')->get();
		$team  = Team::where('type',1)->where('status',0)->orderby('sorting')->get();
		$support =  Team::where('type',1)->where('status',0)->orderby('sorting')->get();
		$technical  = Team::where('type',2)->where('status',0)->orderby('sorting')->get();
		$creative =  Team::where('type',3)->where('status',0)->orderby('sorting')->get();
		$advisors =  Team::where('type',4)->where('status',0)->orderby('sorting')->get();
		return view('team',compact('founders','team','technical','creative','advisors','support'));
	}



	// public function homeText(Request $request) {
	// 	$home = CmsPage::where('slug', 'home_text')->first();
	// 	return view('admin.pages.home.index', compact('home'));
	// }

	// public function coinIntro(Request $request) {
	// 	$introCoin = CmsPage::where('slug', 'coin_intro')->first();
	// 	return view('admin.pages.introcoin.index', compact('introCoin'));
	// }

	// public function aboutus(Request $request) {
	// 	$value = CmsPage::where('slug', 'about_us')->get();
	// 	return view('admin.pages.aboutus.index', compact('value'));
	// }

	// public function faq(Request $request) {
	// 	$value = CmsPage::where('slug', 'faq')->get();
	// 	return view('admin.pages.faq.index', compact('value'));
	// }

	// public function mobile(Request $request) {
	// 	$value = CmsPage::where('slug', 'mobile_platform')->first();
	// 	return view('admin.pages.mobile.index', compact('value'));
	// }

	// public function card(Request $request) {
	// 	$value = CmsPage::where('slug', 'debit_card')->first();
	// 	return view('admin.pages.mobile.index', compact('value'));
	// }

	// public function whycoin(Request $request) {
	// 	$value = CmsPage::where('slug', 'why_coin')->get();
	// 	return view('admin.pages.whycoin.index', compact('value'));
	// }

	// public function whycoinEdit(Request $request, $id) {
	// 	$value = CmsPage::where('id', $id)->first();
	// 	return view('admin.pages.whycoin.edit', compact('value'));
	// }

	// public function ecosystem(Request $request) {
	// 	$value = CmsPage::where('slug', 'ecosystem')->get();
	// 	return view('admin.pages.ecosystem.index', compact('value'));
	// }
	// public function ecosystemEdit(Request $request, $id) {
	// 	$value = CmsPage::where('id', $id)->first();
	// 	return view('admin.pages.ecosystem.edit', compact('value'));
	// }

	// public function investment(Request $request) {
	// 	$value = CmsPage::where('slug', 'coin_investment')->get();
	// 	return view('admin.pages.investment.index', compact('value'));
	// }

	// public function investmentEdit(Request $request, $id) {
	// 	$value = CmsPage::where('id', $id)->first();
	// 	return view('admin.pages.investment.edit', compact('value'));
	// }

	// public function walletImage(Request $request) {
	// 	$walletImage1 = CmsPage::where('slug', 'wallaet_image1')->first();
	// 	$walletImage2 = CmsPage::where('slug', 'wallaet_image2')->first();
	// 	$walletImage3 = CmsPage::where('slug', 'wallaet_image3')->first();
	// 	return view('admin.pages.Wallet.index', compact('walletImage1', 'walletImage2', 'walletImage3'));
	// }

	// public function exchangePage(Request $request) {
	// 	$logo = CmsPage::where('slug', 'exg_logo')->get();
	// 	return view('admin.pages.exchange.index', compact('logo'));
	// }

	// public function socialLink(Request $request) {
	// 	$link = CmsPage::where('slug', 'sociallink')->get();
	// 	return view('admin.pages.social.index', compact('link'));
	// }

	public function storeLogo(Request $request, $id) {
		$store = CmsPage::find($id);
		if (!is_null($request->images)) {
			$file = $request->file('images');
			$destinationPath = './assets/images/frontend/';
			$filename = $file->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$store->images = $filename;
		}
		$store->save();
		return redirect('admin-sitelogo')->with(['success' => 'Updated successfully']);
	}

	// public function storeLink(Request $request, $id) {
	// 	$store = CmsPage::find($id);
	// 	if ($request->link) {
	// 		$store->link = $request->link;
	// 	}
	// 	$store->save();
	// 	return redirect('admin-socialLink')->with(['success' => 'Updated successfully']);
	// }

	// public function storePages(Request $request, $id) {
	// 	$store = CmsPage::find($id);
	// 	$store->title = $request->title;
	// 	if ($request->subtitle) {
	// 		$store->subtitle = $request->subtitle;
	// 	}
	// 	if ($request->launchdate) {
	// 		$store->ico_launch_date = $request->launchdate;
	// 	}
	// 	$store->content = $request->editor0;
	// 	if ($request->editor1) {
	// 		$store->content = $request->editor1;
	// 	}
	// 	if ($request->link) {
	// 		$store->link = $request->link;
	// 	}
	// 	if (!is_null($request->images)) {
	// 		$file = $request->file('images');
	// 		$destinationPath = './assets/images/frontend/';
	// 		$filename = $file->getClientOriginalName();
	// 		$file->move($destinationPath, $filename);
	// 		$store->images = $filename;
	// 	}
	// 	$store->save();
	// 	return redirect('admin-pages')->with(['success' => 'Updated successfully']);
	// }

	// public function storeRoadmap(Request $request) {
	// 	$store = CmsPage::find(11);
	// 	if (!is_null($request->images)) {
	// 		$file = $request->file('images');
	// 		$destinationPath = './assets/images/frontend/';
	// 		$filename = $file->getClientOriginalName();
	// 		$file->move($destinationPath, $filename);
	// 		$store->images = $filename;
	// 	}
	// 	$store->save();
	// 	return redirect('admin-pages')->with(['success' => 'Updated successfully']);

	// }
	// public function storeFAQimage(Request $request) {
	// 	$store = CmsPage::find(42);
	// 	if (!is_null($request->images)) {
	// 		$file = $request->file('images');
	// 		$destinationPath = './assets/images/frontend/';
	// 		$filename = $file->getClientOriginalName();
	// 		$file->move($destinationPath, $filename);
	// 		$store->images = $filename;
	// 	}
	// 	$store->save();
	// 	return redirect('admin-pages')->with(['success' => 'Updated successfully']);

	// }

	public function settingShow(Request $request) {
		$key = Setting::where('id', '1')->first();
		return view('admin.setting.index', compact('key'));
	}
	public function settingEdit(Request $request, $id) {
		$key = Setting::where('id', $id)->first();
		return view('admin.setting.edit', compact('key'));
	}
	public function storeSetting(Request $request, $id) {
		$value = $request->transfer;
		if (is_null($value)) {

			$value = 0;

		} elseif ($value == 0) {

			$value = 1;

		}
		//return $request->edate;die;
		$store = Setting::find($id);
		$store->ico_start_date = $request->sdate;
		$store->ico_end_date = $request->edate;
		$store->email = $request->email;
		$store->total_coins = $request->tcoin;
		$store->rate = $request->rate;
		$store->ref_percentage = $request->ref_percentage;
		$store->public_key = $request->pbkey;
		$store->private_key = $request->prkey;
		$store->transfer = $value;
		$store->save();
		return redirect('admin-setting')->with(['success' => 'Updated successfully']);
	}
	// public function storeBlog(Request $request) {
	// 	$value = CmsPage::where('slug', 'blog')->get();
	// 	return view('admin.pages.blog.index', compact('value'));
	// }

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
	 * @param  \App\Models\CmsPage  $cmsPage
	 * @return \Illuminate\Http\Response
	 */
	public function show(CmsPage $cmsPage) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\CmsPage  $cmsPage
	 * @return \Illuminate\Http\Response
	 */
	public function edit(CmsPage $cmsPage) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\CmsPage  $cmsPage
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, CmsPage $cmsPage) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\CmsPage  $cmsPage
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(CmsPage $cmsPage) {
		//
	}

	public function subscribe(Request $request)
	{
		$is_present=Subscription::where("email" , $request->email)->first();
		if($is_present)
		{
			return 0;
		}

		$subscribe = new Subscription;
		$subscribe->email = $request->email;
		$subscribe->save();
		$email= $request->email;
		Mail::send('emails.subscription', [
			'user' => $email,
		], function ($message) use($email) {
			$message->to($email);
			$message->subject("BaltiCrypto Subscription");
		});

		return 1;
	}

	public function getSubscriber()
	{
		$subscribers = Subscription::get();
		return view('admin.subscriber',compact('subscribers'));
	}
}
