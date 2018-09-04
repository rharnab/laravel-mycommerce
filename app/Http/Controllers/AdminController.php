<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function profile(){
    	 $admin=DB::table('users')->first();
    	
    	  $admin_all_info=view('admin.adminProfile')->with('admin_info', $admin);
    	 return view('deshboard_layouts')->with('adminProfile',$admin_all_info);
    	//return view('admin.adminProfile');
    	
    }
}
