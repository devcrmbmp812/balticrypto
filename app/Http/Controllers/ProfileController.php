<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Sentinel;
use Validator;

class ProfileController extends Controller {

	public function index() {
		
		return view('auth.profile');
	}

	public function updateProfile(Request $request, $id) {

		$this->validate($request, [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'erc_20_address'=>'required',
//            'username'  => 'required|unique:users,username,'.Sentinel::getuser()->id.'|max:255',
		]);

		if($request->erc_20_address)
		{

			$is_address=app('App\Http\Controllers\RegisterController')->isAddress($request->erc_20_address);
			if($is_address==0){
				return redirect()->back()->with(['error' => 'Please Enter Valid ERC20 Address']);
			}

			$is_present_erc20 = User::where('erc_20_address',$request->erc_20_address)->where('id' ,'!=',Sentinel::getUser()->id)->count();
			if($is_present_erc20 > 0)
			{
				return redirect()->back()->with(['error' => 'This ERC20 Address is already Present. Please enter unique ERC20 address.']);
			}
		}

		$id = $request->user_id;
		$user = User::find($id);
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->erc_20_address = $request->erc_20_address;
		$user->save();
		return redirect()->back()->with(['success' => 'Your Profile updated successfully']);

	}

	public function updateProfilePicture(Request $request, $id) {

		$this->validate($request, [
			'photo' => 'image|mimes:jpg,png,jpeg|max:2048',
		]);

		$user = User::find($id);
		if (!is_null($request->photo)) {
			$file = $request->file('photo');
			$destinationPath = './assets/images/user/';
			$filename = camel_case(str_random(5) . $file->getClientOriginalName());
			$file->move($destinationPath, $filename);
			$user->profile = $filename;
		}
		$user->save();

		return redirect()->back()->with(['successProfile' => 'Your Profile updated successfully']);

	}

	public function updatePassword(Request $request, $id) {
		if (Sentinel::check()) {
			$id = Sentinel::getUser()->id;

			$validator = Validator::make($request->all(), [
				'old_password' => 'required',
				'new_password' => 'required|string|min:8',
				'confirm_password' => 'required|string|min:8|same:new_password',
			]);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput()->with(['validator' => '1']);
			}

			$old_password = $request->old_password;
			$current_password = Sentinel::getUser()->password;
			if (Hash::check($old_password, $current_password)) {
				$user = User::find($id);
				$user->password = bcrypt($request->new_password);
				$user->save();
				return redirect()->back()->with(['success' => 'Your Password updated successfully']);
			} else {
				return redirect()->back()->with(['error' => 'Invalid  Old password. Please try again', 'validator' => '1']);
			}
		} else {
			return redirect()->back()->with(['error' => 'login to change password ', 'validator' => '1']);
		}
	}

	public function changeUserStatus(Request $request) {
		$user_id = $request->user_id;
		$status = $request->status;
		$user = User::where('id', $user_id)->first();
		User::where('id', $user_id)->update(['status' => $status]);
		Activation::where('user_id', $user_id)->update(['suspend_by' => $status,'completed'=>1]);
		//$this->sendSuspendEmail($user); //send email
		//return redirect()->back()->with(['success' => 'User status updated successfully.']);

		return 0;
	}

	public function deleteUser(Request $request) {
		$user_id = $request->user_id;
		$deleteStatus = $request->deleteStatus;
		$user = User::where('id', $user_id)->first();
		User::where('id', $user_id)->update(['is_delete' => $deleteStatus]);
		Activation::where('user_id', $user_id)->update(['completed' => $deleteStatus]);

		return 0;
	}

	public function disable2fa(Request $request) {
		$user_id = $request->user_id;
		$status = $request->Status;
		$user = User::where('id', $user_id)->first();
		User::where('id', $user_id)->update(['google2fa_enable' => $status, 'google2fa_secret' => NULL]);

		return 0;
	}

	private function sendSuspendEmail($user) {
		Mail::send('emails.suspend', [
			'user' => $user,
		], function ($message) use ($user) {
			$message->to($user->email);
			$message->subject("Hello $user->username, Account Suspend");
		});
	}
}
