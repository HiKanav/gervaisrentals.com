<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getIndex()
    {
    	return view('admin.layout.base');
    }

    public function getName()
    {
    	return view('admin.layout.base');
    }
}
