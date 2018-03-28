<?php

namespace App\Http\Controllers;

use Activation;
use App\Models\Loginh;
use App\User;
use Illuminate\Http\Request;
use Sentinel;
use View;
use Validator;

//use Socialite;

class LoginController extends Controller {
	public function login() {
		if(Sentinel::check()){
			if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1')
				return redirect('admin/dashboard');
			else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2' || Sentinel::getUser()->roles()->first()->slug == '3')
				return redirect('user/dashboard');
			else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '4')
				return redirect('support/dashboard');
			else
				return view('auth.login');
				}
		else
		return view('auth.login');
	}

	public function doLogin(Request $request) {


		$this->validate($request, [
			'email' => 'required|max:254',
			'password' => 'required|max:254',
		]);
		try {

			$user = User::where('email', $request->email)->first(['id']);
			if ($user) {
				$act = Activation::where('user_id', $user->id)->first(['completed', 'suspend_by']);
				if ($act) {
					if ($act->completed == 1 && $act->suspend_by != 1) {
						return redirect()->back()->with(['error' => "You account is Suspended !"]);
					} else if ($act->completed == 0) {
						return redirect()->back()->with(['error' => "Your account is not activated !!!"]);
					}
				} else {
					return redirect()->back()->with(['error' => "Incorrect email. Please try again."]);
				}

			} else {
				return redirect()->back()->with(['error' => "Incorrect email. Please try again."]);
			}

			if (Sentinel::authenticate($request->all())) 
				{
				if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2') 
					{
					if (Sentinel::getUser()->google2fa_enable == 1) {
						$request->session()->put('2fa:user:id', Sentinel::getUser()->id);
						$this->logout();
						return redirect('2fa/validate');
					} elseif (Sentinel::getUser()->status == 2) {
						$this->logout();
						return redirect('login')->with('error', "Your Account is pending for admin Approval");
					} else {
						$userId = Sentinel::getUser()->id;

						$loginHistory = new Loginh;
						$loginHistory->user_id = $userId;
						$loginHistory->ip_address = $_SERVER['REMOTE_ADDR'];
						$loginHistory->save();

						return redirect('user/dashboard');
					}
				} else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1') {
					return redirect('admin/dashboard');
				} else {
					return redirect()->back()->with(['error' => "Incorrect username or password. Please try again."]);
				}
			} else {
				return redirect()->back()->with(['error' => "Incorrect username or password. Please try again."]);

			}
		} catch (ThrottlingException $e) {
			$delay = $e->getDelay();
			return redirect()->back()->with(['error' => "You are Banned with $delay seconds"]);
		} catch (NotActivatedException $e) {
			return redirect()->back()->with(['error' => "You account is not activated!"]);
		} catch (\Exception $e) {
			return redirect()->back()->with(['error' => "Incorrect username or password. Please try again."]);
		}
	}

	public function logout() {
		if (Sentinel::check()) {
			if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1') {
				Sentinel::logout();
				return redirect('/login');
			} else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2') {
				Sentinel::logout();
				return redirect('/login');
			} else {
				Sentinel::logout();
				return redirect('/login');
			}
		} else {
			return redirect('/login');
		}

	}

	public function show_register() {
		if(Sentinel::check()){
			if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1')
				return redirect('admin/dashboard');
			else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2' || Sentinel::getUser()->roles()->first()->slug == '3')
				return redirect('user/dashboard');
			else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '4')
				return redirect('support/dashboard');
			else
				return view('auth.register');
		}
		else
		return view('auth.register');
	}
}
