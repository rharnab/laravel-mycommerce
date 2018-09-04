<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Cart;
Use DB;
use Session;
session_start();
class checkoutController extends Controller
{
    public function checkout(){
    	return view('pages.checkout');
    	
    }

    public function shipping_address(){
        if(Session::get('customer_id')){  
             return view('pages.shipping');
        }
        else{
            return redirect('customer-login')->send();
        }
    	
    }
    public function customer_loging(){
        if(Session::get('customer_id')){
            return redirect('shipping-address'); 
        }

        else{
            return view('pages.customer_login');
        }
    	

    }
    public function registe_customer(Request $request){
    	$this->validate($request,[
    		'username'=>'required|string|max:20',
    		'password'=>'required|string|max:40',
    		'email'=>'required|string|max:100',
    		'phone'=>'required|string|max:20',
    	]);

    	$customer_id=DB::table('tbl_customer')->insertGetId([

    		'user_name'=>$request->username,
    		'password'=>Hash::make($request->password),
    		'email'=>$request->email,
    		'phone'=>$request->phone,


    	]);
    	
    	 Session::put('customer_id', $customer_id);
    	 

    	 Session::put('user_name', $request->username);
    	 return redirect('shipping-address');
    }

    public function check_customer(Request $request){
    		$email=$request->email;
    		$password=$request->password;
    		$customer_info=DB::table('tbl_customer')->where('email',$email)->first();
    		if(Hash::check($password, $customer_info->password )){

    			Session::put('customer_id', $customer_info->id);
    			return redirect('shipping-address');
    		}
    		else{
    			return back()->withInput();
    		}
    }

    public function save_shipping(Request $request){
    	$this->validate($request,[
    		'name'=>'required|string|max:20',
    		'phone'=>'required|string|max:40',
    		'address'=>'required|string|max:100',
    		'type'=>'required|string|max:20',
    	]);

    	$shipping_id=DB::table('tbl_shipping')->insertGetId([

    		'name'=>$request->name,
    		'phone'=>$request->phone,
    		'address'=>$request->address,
    		'type'=>$request->type,

    	]);

    	if($shipping_id){
    		
    		Session::put('shipping_id', $shipping_id);
    		// echo (Session::get('shipping_id'));
    		return redirect('payment');
    	}
    	else{
    		echo "fail";
    	}
    }

    public function payment(){
        if(Session::get('customer_id')){
    	return view('pages.payment');
        }
        else{
            return redirect('customer-login')->send();
        }
    }


    public function porduct_order(Request $request){
    	$this->validate($request,[
    		'payment_getway'=>'required',
    		
    	]);
    	$payment_getway=$request->payment_getway;
    	$payment_id=DB::table('tbl_payment')->insertGetId([
    		'payment_getway'=>$payment_getway,
    		'payment_status'=>'pending',

    	]);

    	
    	$order_id=DB::table('tbl_order')->insertGetId([

    			'payment_id'=>$payment_id,
    			'customer_id'=>Session::get('customer_id'),
    			'shipping_id'=>Session::get('shipping_id'),
    			'order_count'=>Cart::count(),
    			'order_total'=>Cart::total(),
    			'order_status'=>'pending',


    		]);
    	
    	$content=Cart::content();
    	$data=array();

    	foreach($content as $v_content){
    		$data['order_id']=$order_id;
    		$data['product_id']=$v_content->id;
    		$data['product_name']=$v_content->name;
    		$data['product_price']=$v_content->price;
    		$data['product_quantity']=$v_content->qty;

    		DB::table('tbl_order_details')->insert($data);
    	}

    	if($payment_getway){
    		return view('pages.thanks');
    	}
    	else{
    		echo "something error";
    	}


    }
    

}
