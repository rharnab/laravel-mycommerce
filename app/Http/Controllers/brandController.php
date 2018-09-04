<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();

class brandController extends Controller
{
     public function index(){
    	return view('admin.add_brands');
    }

    public function save_brands(Request $request){
    	$this->validate($request,[

    		'brand_name'=>'required|string|max:50',
    	]);

    	$category=DB::table('tbl_brands')->insert([

    					'brand_name'=>$request->brand_name,
    					
    	]);
    	if($category){
    		Session::put('message', 'Brand  Insert successfull');
			return redirect('all-brands');
    	}
    	else
    	{
    		Session::put('message', 'Opps someting is an Error');
			return redirect('all-brands');
    	}

		
    }

     public function all_brands(){
    	$all_brands=DB::table('tbl_brands')->get();
    	return view('admin.all_brands')->with('all_brands', $all_brands);
    }

    public function active_brand($brand_id){
    	$active_brand=DB::table('tbl_brands')->where('id', $brand_id)->update([

    		'status'=>1,

    	]);

    	Session::put('message', 'brand activated');
		return redirect('all-brands');
    }

    public function unactive_brand($brand_id){
    	$unactive_brand=DB::table('tbl_brands')->where('id', $brand_id)->update([

    		'status'=>0,

    	]);

    	Session::put('message', 'brand  Unactivated');
		return redirect('all-brands');
    }

    public function edit_brand($brand_id){
    	$edit_brand=DB::table('tbl_brands')->where('id', $brand_id)->first();
    	return view('admin.edit_brand')->with('edit_brand', $edit_brand);

    }

    public function update_brand(Request $request){
    	$update=DB::table('tbl_brands')
    			->where('id', $request->brand_id)
    			->update([

    			'brand_name'=>$request->brand_name,

    			]);

    	if($update){
		Session::put('message', 'Brande Updated successfull');
		return redirect('all-brands');
		}
		else{
			Session::put('message', 'Brande not Updated successfull');
		return redirect('all-brands');
		}

    }


    public function delete_brand($brand_id){

    	$delete_brand=DB::table('tbl_brands')->where('id', $brand_id)->delete();
    	if($delete_brand){
    		Session::put('message', 'brand delete successfull');
		return redirect('all-brands');
    	}
    	
    	
    }

}
