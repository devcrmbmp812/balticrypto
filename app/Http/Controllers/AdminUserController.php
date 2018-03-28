<?php

namespace App\Http\Controllers;

use App\User;

class AdminUserController extends Controller {

	public function index() {
		$user_data = User::where('id', '<>', 1)->get();
		return view('admin.user.index', compact('user_data'));
	}

	public function user_block($id) {
		User::where('id', $id)->update(array('status' => 0));
		return redirect('admin/users')->with('success', 'User Block Successfully');
	}

	public function user_active($id) {
		User::where('id', $id)->update(array('status' => 1));
		return redirect('admin/users')->with('success', 'User Active Successfully');
	}

}
