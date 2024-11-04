<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Session;

class UserController extends Controller
{
    public function getChangePassword()
    {
    	return view('admin.user.change-password');
    }

    public function postChangePassword(Request $request)
    {
    	if(Auth::user()->update(['password' => bcrypt($request->get('password'))])){
    		return $this->flashAndRedirect('success', 'Password Updated Successfully');
    	}else return $this->flashAndRedirect();
    }

    /**
     * Redirect after password update
     * @param  string $type Event type
     * @param  string $msg  Message to display
     * @return redirection
     */
    private function flashAndRedirect($type='danger', $msg='Something went wrong! Try Again')
    {
        Session::flash('noti', ['type' => $type, 'msg' => $msg]);
        return redirect()->action('Admin\CategoryController@index');
    }
}
