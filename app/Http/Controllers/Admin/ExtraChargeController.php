<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use App\Admin\ExtraCharge;

class ExtraChargeController extends Controller
{
    public function getIndex()
    {
        $data['extraCharges'] = ExtraCharge::all();
        

    	return view('admin.extra.edit', $data);
    }

    public function postIndex(Request $request)
    {
        $charges = $request->except('_token');
        foreach ($charges as $slug => $price) ExtraCharge::whereSlug($slug)->update(['price' => $price]);

        return $this->flashAndRedirect('success', 'Charges Updated Successfully');
    }

    /**
     * Redirect to index ater an event
     * @param  string $type Event type
     * @param  string $msg  Message to display
     * @return redirection
     */
    private function flashAndRedirect($type='danger', $msg='Something went wrong! Try Again')
    {
        Session::flash('noti', ['type' => $type, 'msg' => $msg]);
        return redirect()->action('Admin\ExtraChargeController@getIndex');
    }
}
