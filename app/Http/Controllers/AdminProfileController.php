<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Hash;
use App\User;
use App\Models\RoleUser;
use App\Models\Activation;
use Validator;
use Mail;

class AdminProfileController extends Controller
{

    public function index() {
       
        return view('auth.profile');
    }

    public function updateProfile(Request $request,$id) {

        $this->validate($request, [
            'first_name'  => 'required|max:255',
            'last_name'  => 'required|max:255',
//            'username'  => 'required|unique:users,username,'.Sentinel::getuser()->id.'|max:255',
        ]);

        $id = $request->user_id;
        $user = User::find($id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->save();
        return redirect()->back()->with(['success' => 'Your Profile updated successfully']);

    }

    public function updateProfilePicture(Request $request,$id) {


        $this->validate($request, [
            'photo'  => 'image|mimes:jpg,png,jpeg',
        ]);

        $user = User::find($id);
        if (!is_null($request->photo)) {
            $file = $request->file('photo');
            $destinationPath = './assets/images/user/';
            $filename =camel_case(str_random(5).$file->getClientOriginalName());
            $file->move($destinationPath, $filename);
            $user->profile = $filename;
        }
         $user->save();


        return redirect()->back()->with(['successProfile' => 'Your Profile updated successfully']);

    }

    public function updatePassword(Request $request ,$id) {
        if (Sentinel::check()) {
            $id = Sentinel::getUser()->id;

            $validator = Validator::make($request->all(), [
                'old_password'      => 'required|string|min:6',
                'new_password'      => 'required|string|min:6',
                'confirm_password'  => 'required|string|min:6|same:new_password',
            ]);

            if ($validator->fails())
                return redirect()->back()->withErrors($validator)->withInput()->with(['validator' => '1']);


            $old_password=$request->old_password;
            $current_password = Sentinel::getUser()->password;
            if(Hash::check($old_password, $current_password))
            {
                $user=User::find($id);
                $user->password=bcrypt($request->new_password);
                $user->save();
                return redirect()->back()->with(['success' => 'Your Password updated successfully']);
            }
            else {
                return redirect()->back()->with(['error' => 'Invalid  Old password. Please try again','validator' => '1']);
            }
        }
        else {
            return redirect()->back()->with(['error' => 'login to change password ','validator' => '1']);
        }
    }

    public function changeUserStatus(Request $request)
    {
        $user_id = $request->user_id;
        $status = $request->status;
        $user = User::where('id',$user_id)->first();
        User::where('id',$user_id)->update(['status'=>$status]);
        Activation::where('user_id',$user_id)->update(['suspend_by'=>$status]);
        $this->sendSuspendEmail($user); //send email
        //return redirect()->back()->with(['success' => 'User status updated successfully.']);

        return 0;
    }

    public function deleteUser(Request $request)
    {
        $user_id = $request->user_id;
        $deleteStatus = $request->deleteStatus;
        $user = User::where('id',$user_id)->first();
        User::where('id',$user_id)->update(['is_delete'=>$deleteStatus]);
        Activation::where('user_id',$user_id)->update(['completed'=>$deleteStatus]);

        return 0;
    }

    public function disable2fa(Request $request)
    {
        $user_id = $request->user_id;
        $status = $request->Status;
        $user = User::where('id',$user_id)->first();
        User::where('id',$user_id)->update(['google2fa_enable'=>$status,'google2fa_secret'=> NULL]);

        return 0;
    }

    private function sendSuspendEmail($user){
        Mail::send('emails.suspend',[
            'user' => $user,
        ],function($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->username, Account Suspend");
        });
    }
}
