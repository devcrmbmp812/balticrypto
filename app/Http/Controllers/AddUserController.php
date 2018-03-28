<?php

namespace App\Http\Controllers;
use Activation;
use App\Models\RoleUser;
use App\Models\Sendtoken;
use App\Models\Setting;
use App\User;
use Illuminate\Http\Request;
use Sentinel;
use Validator;
use Mail;

class AddUserController extends Controller {

	public function listAll() {

		$users = RoleUser::with('user', 'parent')->where('role_id', 3)->orderBy('created_at', 'DESC')->get();
		return view('admin.addUser.list', compact('users'));
	}

	public function addUser() {
		return view('admin.addUser.index');
	}

	public function doRegister(Request $request) {

		$sponser = "";
		$concat = 'B';
		$user_address = $concat . str_random(32);

		try {
			$validator = Validator::make($request->all(), [
				'username' => 'required|unique:users,username|max:255',
				'first_name' => 'required|max:255',
				'last_name' => 'required|max:255',
				'sponser' => 'nullable|max:255',
				'email' => 'required|email|unique:users|max:254',
				'password_register' => 'required|min:8',
				'confirm_password' => 'required|same:password_register',
			]);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput()->with(['validator' => '1']);
			}

			// check user exit or not
			// if ($request->sponser) {
			// 	$sponser = User::where('username', $request->sponser)->first();
			// 	if (is_null($sponser)) {
			// 		return redirect()->back()->with(['error' => "Please enter Valid Spenser Name !", 'validator' => '1']);
			// 	}

			// }

			$profile = 'krypto_coin.png';

			$user = Sentinel::register(array(
				'profile' => $profile,
				'username' => $request->username,
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'email' => $request->email,
				'user_address' => $user_address,
				'password' => $request->password_register,
			));

			$activation = Activation::create($user); // will create activation record of registered user
			$role = Sentinel::findRoleById(3); // role 2 for user
			$role->users()->attach($user); // assign role to registered user

			// if ($sponser != "" && $request->sponser == $sponser->username) {
			// 	$parent_id = $sponser->id;
			// 	User::where('username', $request->username)->update(array('parent_id' => $parent_id));
			// }

			Activation::where('user_id', $user->id)->update(['completed' => true]);

			// send mail when add board member added.
			$Board_member_data = User::where('id', $user->id)->first();
			$password_board_member = $request->password_register;
			//return view('emails.add_board_member', compact('Board_member_data', 'password_board_member'));
			$this->sendBoardMemberEmail($Board_member_data, $password_board_member);

			return redirect('list_user')->with(['success' => "Board member added Successfully !"]);

		} catch (ThrottlingException $e) {
			$delay = $e->getDelay();
			return redirect()->back()->with(['error' => "You are Banned with $delay seconds", 'validator' => '1']);
		} catch (NotActivatedException $e) {
			return redirect()->back()->with(['error' => "You account is not activated!", 'validator' => '1']);
		}
	}

	public function buyBCT($uID) {

		$current_user_id = $uID;
		$setting = Setting::first();
		$Sendtoken = Sendtoken::with('user')->where('user_id', $uID)->orderBy('created_at', 'DESC')->get();
		//return $Sendtoken;
		return view('admin.addUser.buy-BCT', compact('setting', 'current_user_id', 'Sendtoken'));
	}

	public function storeBCT(Request $request) {
		//return $request->all();

		$setting = Setting::first();
		$this->validate($request, [
			'user_token' => 'required|numeric',
		]);

		$board_people_coins = $setting->board_people_coins;
		$board_sold_coins = $setting->board_sold_coins;
		$available_token = $board_people_coins - $board_sold_coins;

		if ($request->user_token < $available_token) {

			$user = User::where('id', $request->current_user_id)->first();
			//return $user->total_wdc_bal;
			$user->total_wdc_bal = $user->total_wdc_bal + $request->user_token;
			$user->save();

			$setting->board_sold_coins = $setting->board_sold_coins + $request->user_token;
			$setting->save();

			$sendtokens = new Sendtoken;
			$sendtokens->user_id = $request->current_user_id;
			$sendtokens->rate = $setting->rate;
			$sendtokens->token = $request->user_token;
			$sendtokens->save();

			return redirect()->back()->with('success', 'Send BCT Successfully !');
			//return redirect('list_user')->with(['success' => "Send BCT Successfully !"]);
		} else {
			return redirect()->back()->with('error', 'Minimum Token Limit Reached !');
		}

	}

	private function sendBoardMemberEmail($Board_member_data, $password_board_member) {
		Mail::send('emails.add_board_member', [
			'Board_member_data' => $Board_member_data,
			'password_board_member' => $password_board_member,
		], function ($message) use ($Board_member_data, $password_board_member) {
			$message->to($Board_member_data->email);
			$message->subject("Hello $Board_member_data->username, Account activation Successfully !");
		});
	}
}
