<?php

namespace App\Http\Controllers;

use Activation;
use App\Models\Referral;
use App\User;
use Illuminate\Http\Request;
use Mail; 
use Sentinel; 
use Validator;

class RegisterController extends Controller {

	public function referral(Request $request, $ref) {
		$request->session()->put('referral', $ref);
		$request->session()->put('ref', '1');
		return redirect('register');
	}

	public function doRegister(Request $request) {
		$sponser = "";
		$concat = 'B';
		$user_address = $concat . str_random(32);
		$referral_code="R".str_random(32);
		try {
			$validator = Validator::make($request->all(), [
				'username' => 'required|unique:users,username|max:255',
				'first_name' => 'required|max:255',
				'last_name' => 'required|max:255',
				'sponser' => 'nullable|max:255',
				'email' => 'required|email|unique:users|max:254',
				'password_register' => 'required|min:8',
				'confirm_password' => 'required|same:password_register',
				'erc_20_address' => 'required|validation',
			]);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput()->with(['validator' => '1']);
			}

			$is_present_erc20 = User::where('erc_20_address',$request->erc_20_address)->first();
			if($is_present_erc20)
			{
				return redirect()->back()->with(['error' => 'This ERC20 Address is already Present. Please enter unique ERC20 address.']);
			}

			$is_address=$this->isAddress($request->erc_20_address);
			if($is_address==0){
				return redirect()->back()->with(['error' => 'Please Enter Valid ERC20 Address']);
			}
			// check user exit or not
			if ($request->sponser) {
				$sponser = User::where('referral_code', $request->sponser)->first();
				if (is_null($sponser)) {
					//return redirect()->back()->with(['error' => "Please enter Valid Sponser Name !", 'validator' => '1']);
				}

			}

			$profile = 'krypto_coin.png';

			$user = Sentinel::register(array(
				'profile' => $profile,
				'username' => $request->username,
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'email' => $request->email,
				'user_address' => $user_address,
				'password' => $request->password_register,
				'erc_20_address' => $request->erc_20_address,
				'referral_code' => $referral_code,
			));

			$activation = Activation::create($user); // will create activation record of registered user
			$role = Sentinel::findRoleById(2); // role 2 for user
			$role->users()->attach($user); // assign role to registered user

			if ($sponser != "" && $request->sponser == $sponser->referral_code) {
				$parent_id = $sponser->id;
				User::where('username', $request->username)->update(array('parent_id' => $parent_id));
			}

			$link = url('') . '/activate/' . $request->email . '/' . $activation->code; // account activation link
			$text = 'Your Account has been created.'; // email subjct
			$this->sendActivationEmail($user, $text, $link); // this is email sent to register user
			return redirect('login')->with(['success' => "Thank you. To complete your registration please check your email."]);
		} catch (ThrottlingException $e) {
			$delay = $e->getDelay();
			return redirect()->back()->with(['error' => "You are Banned with $delay seconds", 'validator' => '1']);
		} catch (NotActivatedException $e) {
			return redirect()->back()->with(['error' => "You account is not activated!", 'validator' => '1']);
		}
	}

	public function activate($email, $activationCode) {

		$user = User::whereEmail($email)->first();
		if (count($user) > 0) {

			$sentinelUser = Sentinel::findById($user->id);
			if (Activation::complete($sentinelUser, $activationCode)) {
				User::where('id', $user->id)->update(array('status' => 1));
				return redirect('/login')->with(['success' => " Your account is successfully Activated !!!"]);
			} else {
				return redirect('/login')->with(['error' => " This link is expires. please try to login !!!"]);
			}
		}

	}

	private function sendActivationEmail($user, $text, $link) {
		Mail::send('emails.activation', [
			'user' => $user,
			'text' => $text,
			'link' => $link,
		], function ($message) use ($user, $text) {
			$message->to($user->email);
			$message->subject("Hello $user->username, $text");
		});
	}

	public function isAddress($address) {
		if (!preg_match('/^(0x)?[0-9a-f]{40}$/i', $address)) {
			// check if it has the basic requirements of an address
			return 0;
		} elseif (!preg_match('/^(0x)?[0-9a-f]{40}$/', $address) || preg_match('/^(0x)?[0-9a-fA-F]{40}$/', $address)) {
			// If it's all small caps or all all caps, return true
			return 1;
		}
	}

	public function isReferralMatch(Request $request)
	{
		$sponsor = User::where('referral_code', $request->sponsor)->first();
				if (is_null($sponsor)) {
					return 1;
				}
				else{
					return 0;
				}
	}

}
