<?php

namespace App\Http\Controllers;

use Activation;
use App\Models\Loginh;
use App\User;
use Illuminate\Http\Request;
use Sentinel;
use View;
use Validator;
use Mail;


class SupportLoginController extends Controller
{
    public function login() {

        if (Sentinel::check()) {
            return redirect('support/dashboard');
        }

        return view('auth.supportlogin');
    }
    public function doLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|max:254',
            'password' => 'required|max:254',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        try {

              $user = User::where('email', $request->email)->first(['id']);
            if ($user) {
                 $act = Activation::where('user_id', $user->id)->first(['completed', 'suspend_by']);
                if ($act) {
                    if ($act->completed == 1 && $act->suspend_by != 1) {
                        return redirect()->back()->with(['error' => "Your account is not activated !"]);
                    } else if ($act->completed == 0) {
                        return redirect()->back()->with(['error' => "Your account is not activated !!!"]);
                    }
                } else {
                    return redirect()->back()->with(['error' => "Incorrect email. Please try again."]);
                }

            } else {
                return redirect()->back()->with(['error' => "Incorrect email. Please try again."]);
            }

            if (Sentinel::authenticate($request->all())) {
                if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '4') {
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

                        return redirect('support/dashboard');
                    }
                } else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '4') {
                    return redirect('support/dashboard');
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
        if (Sentinel::check()) {
            return redirect('support/dashboard');
        }   
        return view('auth.supportregister');
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
                'erc_20_address' => 'required',
                'g-recaptcha-response' => 'required|captcha'
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
          //   check user exit or not
             if ($request->sponser) {
             	$sponser = User::where('referral_code', $request->sponser)->first();
             	if (is_null($sponser)) {
             		return redirect()->back()->with(['error' => "Please enter Valid Sponser Name !", 'validator' => '1']);
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

//            Activation::where('id',$activation->id)->update(['suspend_by'=>0]);

            $role = Sentinel::findRoleById(4); // role 2 for user
            $role->users()->attach($user); // assign role to registered user

            if ($sponser != "" && $request->sponser == $sponser->referral_code) {
                $parent_id = $sponser->id;
                User::where('username', $request->username)->update(array('parent_id' => $parent_id));
            }

            $link = url('') . '/activate/' . $request->email . '/' . $activation->code; // account activation link
            $text = 'Your Account has been created.'; // email subjct
            $this->sendActivationEmail($user, $text, $link); // this is email sent to register user
            return redirect('support/login')->with(['success' => "Thank you. To complete your registration please check your email."]);
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "You are Banned with $delay seconds", 'validator' => '1']);
        } catch (NotActivatedException $e) {
            return redirect()->back()->with(['error' => "You account is not activated!", 'validator' => '1']);
        }
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

}
