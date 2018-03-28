<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Sentinel;
use Activation;
use Reminder;
use Mail;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.forgotPassword');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if(count($user)>0){
            $sentinelUser = Sentinel::findById($user->id);
            if(count($user)==0)
                return redirect()->back()->with(['success'=>'Reset Code already sended to your email.']);
            $reminder = Reminder::exists($sentinelUser) ? : Reminder::create($sentinelUser);
            $this->sendEmail($user,$reminder->code);
            return redirect()->back()->with(['success'=>'Reset Code is send to your email.']);
        }
        else{
            return redirect()->back()->with(['error'=>'This email is not found please enter registered email.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email,$code)
    {
        $user = User::where('email',$email)->first();
        if($user) {
            return view('auth.resetPassword',compact('user','code'));
        } else {
            return view('auth.login')->with(['error'=>'Link is expired.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'password'   => 'required|min:8|max:32',
            'confirm_password'  => 'required|same:password',
            'code'  => 'required',
        ]);
        $user = User::where('email',$request->email)->first();
        $sentinelUser = Sentinel::findById($user->id);

        if ($reminder = Reminder::complete($sentinelUser, $request->code, $request->password))
        {
            return redirect('/login')->with(['success'=>" Your Password Reset successfully !!!"]);
        }
        else
        {
            return redirect('/login')->with(['error'=>" Something went wrong. Please try again."]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Forgot mail send
    private function sendEmail($user, $code){
        Mail::send('emails.forgot-password',[
            'user' => $user,
            'code' => $code
        ],function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->first_name, Password reset request recieved ");
        });
    }
}
