<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
	return view('welcome');
});
 
//Google 2fa authentication
Route::get('/2fa/enable', 'Google2FAController@enableTwoFactor');
Route::post('/2fa/save', 'Google2FAController@saveSecretKey');
Route::get('/2fa/disable', 'Google2FAController@disableTwoFactor');
Route::get('/2fa/validate', 'Auth\AuthController@getValidateToken');
Route::post('/2fa/validate', ['uses' => 'Auth\AuthController@postValidateToken']);
Route::post('/2fa/validate-disabletime', ['uses' => 'Auth\AuthController@postValidateTokenDesable']);
Route::post('2fa/validate-enabletime', ['uses' => 'Auth\AuthController@postValidateTokenenable']);

Route::get('/redirect/{service}', 'SocialAuthController@redirect');
Route::get('/callback/{service}', 'SocialAuthController@callback');
Route::get('/go_to/{service}', 'SocialAuthController@goto_ser');

Route::post('add-contact', 'LoginController@add_contact');
Route::post('front-nl', 'LoginController@front_nl');
Route::post('subscribe', 'CmsPageController@subscribe');

Route::get('about', function () {
	return view('about');
});
Route::get('ico', function () {
	return view('ico');
});
Route::get('smartreward', function () {
	return view('smartreward');
});
Route::get('smart-token', function () {
	return view('smart_token');
});

Route::get('terms-and-conditions', function () {
	return view('termsandconditions');
});
Route::get('privacy-policy', function () {
	return view('privacypolicy');
});



Route::get('team', 'CmsPageController@team');

Route::get('academy', function () {
	return view('academy');
});
Route::get('crypto-university', function () {
	return view('crypto_university');
});
Route::get('debit-ico-ideas', function () {
	return view('debit_ico_ideas');
});
Route::get('exchange', function () {
	return view('exchange');
});
Route::get('faq', function () {
	return view('faq');
});Route::get('media-property-empowerment', function () {
	return view('media_property');
});
Route::get('mining', function () {
	return view('mining');
});
Route::get('newindustry-investorinstruments-research', function () {
	return view('newindustry_research');
});
Route::get('renewable-energy', function () {
	return view('renewable_energy');
});
Route::get('smart-impact', function () {
	return view('smart_impact');
});
/**

/**
Guest
 **/
Route::group(['middleware' => 'guest'], function () {

	/* Login & register */
	// Route::get('/', function () { return view('home.index'); });
	Route::get('/', 'CmsPageController@home');
	Route::get('/login', 'LoginController@login');
	Route::get('/register', 'LoginController@show_register');
	Route::post('doLogin', 'LoginController@doLogin');

	Route::get('/support', function () {
		return redirect()->to('/support/login');
	});

	Route::get('/support/login', 'SupportLoginController@login');//support login
	Route::get('/support/register', 'SupportLoginController@show_register');//support login register
	Route::post('/support/doLogin', 'SupportLoginController@doLogin');//support login post
	Route::post('/support/doRegister', 'SupportLoginController@doRegister');



	/* Register */
	Route::get('/check-address/{address}', 'RegisterController@isAddress');//validate ERC20 address
	Route::post('/check-referral', 'RegisterController@isReferralMatch');//validate ERC20 address
	Route::post('doRegister', 'RegisterController@doRegister');
	/* Account Activation */
	Route::get("activate/{email}/{activationCode}", 'RegisterController@activate');
	/* Forgot Password */
	Route::resource('forgotPassword', 'ForgotPasswordController');
	/* Reset Password */
	Route::get('reset/{email}/{code}', 'ForgotPasswordController@show');
	/* Referral set refer member */
	Route::get('ref/{refid}', 'RegisterController@referral');
});

	Route::get('admin/dashboard', 'DashboardController@dashboard');
Route::group(['middleware' => 'admin'], function () {
	Route::get('admin/profile', 'AdminProfileController@index');

	//Admin Bounty
	Route::get('admin-bounty', 'AdminBountyController@index');
	Route::get('bounty_show/{id}', 'AdminBountyController@bounty_show');
	Route::post('ref-data', 'AdminBountyController@ref_data');
	Route::post('give_to_user', 'AdminBountyController@give_to_user');
	Route::get('bounty_reject/{id}', 'AdminBountyController@bounty_reject');

	Route::get('admin-bounty', 'AdminBountyController@index');
	Route::get('bounty_show/{id}', 'AdminBountyController@bounty_show');
	Route::post('ref-data', 'AdminBountyController@ref_data');

	Route::get('bounty_accept/{id}', 'AdminBountyController@bounty_accept');
	Route::get('bounty_reject/{id}', 'AdminBountyController@bounty_reject');

	//add user

	Route::get('list_user', 'AddUserController@listAll');
	Route::get('add_user', 'AddUserController@addUser');
	Route::post('doRegisterAdmin', 'AddUserController@doRegister');
	Route::get('add-token/{uID}', 'AddUserController@buyBCT');
	Route::post('add-token', 'AddUserController@storeBCT');

	//admin profile
	Route::get('admin/profile', 'ProfileController@index');
	Route::post('admin/profile/{id}', 'ProfileController@updateProfile');
	Route::post('admin/profilePicture/{id}', 'ProfileController@updateProfilePicture');
	Route::post('admin/changePassword/{id}', 'ProfileController@updatePassword');

	/* Admin Manage User */
	Route::get('admin/users', 'AdminController@users');
	Route::get('admin/support', 'AdminController@support');
	Route::post('changeUserStatus', 'ProfileController@changeUserStatus');
	Route::post('deleteUser', 'ProfileController@deleteUser');

	/* Admin Manage User 2fa*/
	Route::post('disable2fa', 'ProfileController@disable2fa');
	/* Admin Manage User Transaction */
	// Route::resource('admin-transaction','AdminTransactionController');
	Route::get('admin-transaction/{id}', 'AdminTransactionController@userTransaction');
	Route::get('admin-transaction/{id}', 'AdminTransactionController@userTransaction');
	Route::get('admin-buytokentransaction', 'AdminTransactionController@buyTokenTransaction');
	Route::get('admin-deposittransaction', 'AdminTransactionController@depositTransaction');
	Route::get('admin-withdrawaltransaction', 'AdminTransactionController@withdrawalTransaction');
	Route::get('admin-tokentransaction', 'AdminTransactionController@transferTokenTransaction');
	/* Admin Manage User Withdrawal */
	Route::get('admin-withdrawal', 'WithdrawController@requestWithdraw');
	Route::post('confirmStatus', 'WithdrawController@confirmStatus');
	Route::post('rejectStatus', 'WithdrawController@rejectStatus');

	/* Kyc approve for admin */
	Route::get('admin-kycstatusupdate', 'KycupdateController@index');

	Route::get('admin-kycUpdate/{id}/{status}', 'KycupdateController@statusUpdate');
	/* Admin Manage Setting */
	Route::get('admin-setting', 'CmsPageController@settingShow');
	Route::get('admin-settingEdit/{id}', 'CmsPageController@settingEdit');
	Route::post('admin-storeSetting/{id}', 'CmsPageController@storeSetting');
	/* Admin Manage rate */
	Route::resource('admin-rates', 'RatesController');
	Route::PATCH('admin-rates/{id}', 'RatesController@update');
	/* Admin Manage CMS Pages */
	//Route::resource('admin-pages', 'CmsPageController');
	Route::get('admin-sitelogo', 'CmsPageController@siteLogo');
	Route::post('admin-storeLogo/{id}', 'CmsPageController@storeLogo');
	//Route::get('admin-home', 'CmsPageController@homeText');
	//Route::get('admin-coinIntro', 'CmsPageController@coinIntro');
	//Route::get('admin-about', 'CmsPageController@aboutus');
	//Route::get('admin-whycoin', 'CmsPageController@whycoin');
	//Route::get('admin-whycoinEdit/{id}', 'CmsPageController@whycoinEdit');
	//Route::get('admin-faq', 'CmsPageController@faq');
	//Route::get('admin-mobile', 'CmsPageController@mobile');
	//Route::get('admin-card', 'CmsPageController@card');
	// Route::get('admin-ecosystem', 'CmsPageController@ecosystem');
	// Route::get('admin-ecosystemEdit/{id}', 'CmsPageController@ecosystemEdit');
	// Route::get('admin-investment', 'CmsPageController@investment');
	// Route::get('admin-investmentEdit/{id}', 'CmsPageController@investmentEdit');
	//Route::get('admin-walletPage', 'CmsPageController@walletImage');
	//Route::get('admin-exchangePage', 'CmsPageController@exchangePage');
	//Route::get('admin-socialLink', 'CmsPageController@socialLink');
	//Route::post('admin-storeLink/{id}', 'CmsPageController@storeLink');
	//Route::post('admin-storePages/{id}', 'CmsPageController@storePages');
	//Route::post('admin-storeRoadmap', 'CmsPageController@storeRoadmap');
	//Route::post('admin-storeFAQimage', 'CmsPageController@storeFAQimage');
	//Route::get('admin-Blog', 'CmsPageController@storeBlog');

	Route::resource('admin/team-member', 'TeamMemberController');
	Route::resource('admin/negotiation', 'NegotiationController');
	Route::resource('admin/partner', 'PartnerController');

	/* web wallet */
//	Route::get('get-address', 'webwallet\WebWalletController@dashboard');
	Route::resource('admin/polls', 'PollsController');
	Route::get('admin/subscriber','CmsPageController@getSubscriber');
	Route::get('admin/user-referral','AdminController@referral');

});

/** User **/
Route::group(['middleware' => 'user'], function () {

	Route::get('kyc-newForm', 'IcoController@kycnewForm');
	Route::get('bounty-dash', 'BountyController@index');
	Route::get('screen-upload/{serv}', 'BountyController@screen_upload');
	Route::post('screen_upload', 'BountyController@upload_screen1');
	Route::get('del_bounty', 'BountyController@del_bounty');

	/* User Manage profile */
	Route::get('user/login-history', 'DashboardController@loginhistory');
	Route::get('user/dashboard', 'DashboardController@dashboard');
	Route::get('user/profile', 'ProfileController@index');
	Route::post('user/profile/{id}', 'ProfileController@updateProfile');
	Route::post('user/profilePicture/{id}', 'ProfileController@updateProfilePicture');
	Route::post('user/changePassword/{id}', 'ProfileController@updatePassword');
	/* Refferal System */
	Route::get('user-referral', 'ReferralController@index');
	/* ICO */
	Route::resource('user-ico', 'IcoController');
	//Route::post('storeIco', 'IcoController@storeIco');
	Route::get('storeIco', 'IcoController@storeIco');
	Route::get('user-icoInformation', 'IcoController@icoInformation'); 
	/* Transfer Token */
	Route::resource('user-transferToken', 'TransferTokenController');
	Route::post('transferTokens', 'TransferTokenController@transferTokens');
	/* User Transaction */
	Route::get('buytokentransaction', 'UserController@buyTokenTransaction');
	Route::get('deposittransaction', 'UserController@depositTransaction');
	Route::get('withdrawaltransaction', 'UserController@withdrawalTransaction');
	Route::get('tokentransaction', 'UserController@transferTokenTransaction');
	/* User Wallet */
	Route::get('user-wallet', 'WalletController@index');

	/* User Wallet deposite */ 
	Route::get('user-deposit/{coin}', 'DepositController@index');
	Route::get('user-withdraw/{coin}', 'WithdrawController@index');
	Route::post('user-withdraw', 'WithdrawController@postWithdraw');
	/* User convert usd to wds */
	Route::post('convertUsd', 'IcoController@converUsd');

	Route::get('user-wdsdeposit', 'WalletController@wdsdeposit');
	Route::get('user-wdswithdrawal', 'WalletController@wdswithdrawal');
	Route::get('user-withdraw-wds/{coin}', 'WithdrawController@index_wds');
	Route::post('user-withdraw-wds', 'WithdrawController@postWithdrawwds');

	Route::post('kyc-form', 'IcoController@kyc');
	Route::get('quick-polls','PollsController@showPolls');
	Route::post('quick-polls/step1','PollsController@pollStep1');
	Route::get('quick-poll/get-second-poll','PollsController@showSecondPolls');
	Route::post('quick-polls/step2','PollsController@pollStep2');

});


/** support-team  **/
Route::group(['middleware' => 'support'], function () {
	
	Route::get('support/dashboard', 'DashboardController@dashboard');
	Route::get('support/profile', 'AdminProfileController@index');

	Route::post('support/profile/{id}', 'ProfileController@updateProfile');
	Route::post('support/profilePicture/{id}', 'ProfileController@updateProfilePicture');
	Route::post('support/changePassword/{id}', 'ProfileController@updatePassword');

	Route::post('support/changePassword/{id}', 'ProfileController@updatePassword');
	Route::get('support/bounty', 'AdminBountyController@index');
	Route::get('support/bounty_show/{id}', 'AdminBountyController@bounty_show');
	Route::post('support/give_to_user', 'AdminBountyController@give_to_user');
	Route::get('support/bounty_reject/{id}', 'AdminBountyController@bounty_reject');
	/* Kyc approve for admin */
	Route::get('support/kycstatusupdate', 'KycupdateController@index');

	Route::get('support/kycUpdate/{id}/{status}', 'KycupdateController@statusUpdate');


});


/* BTC Market Api */
Route::get('getPrice', 'DashboardController@getPrice');

/* Payment Coinpayment Api */
Route::get('payment', 'paymentController@index');
Route::post('checkstatus', 'PaymentController@check_status');
Route::post('ipn-handler', 'PaymentController@IpnHandler');
Route::post('getDepositAddress', 'PaymentController@depositAddress');



/* Logout session */
Route::get('logout', 'LoginController@logout');

//});
