<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class cartController extends Controller
{
     public function single($product_id){

        $product=DB::table('tbl_product')->where('id',$product_id)->first();
        return view('pages.single')->with('product',$product);
        
    }

    public function quentity(Request $request){
    	 $product_id=$request->product_id;
    	 $qty=$request->qty;
    	$product_details=DB::table('tbl_product')->where('id',$product_id)->first();
    	$product_name=$product_details->title;
    	$price=$product_details->price;
    	$image=$product_details->image;

    	$cart=Cart::add([
    		'id' => $product_id, 
    		'name' => $product_name,
    		'qty' => $qty, 
    		'price' => $price, 
    		'options' =>['image' => $image],
    	]);
    	// $data['id']=$product_id;
    	// $data['name']=$product_details->title;
    	// $data['qty']=$qty;
    	// $data['price']=$product_details->price;
    	// $data['options']['image']=$product_details->image;

    	// Cart::add($data);

    	//return view('pages.checkout');

    	return redirect('show-cart');

    	// echo "<pre>";
    	// print_r($cart);
    	// echo "</pre>";

    }

    public function show_cart(){
 
    	return view('pages.checkout');
    }

    public function update_quentity(Request $request){
    	 $row_id=$request->row_id;
    	 $qty=$request->qty;
    	 Cart::update($row_id, $qty);
    	 return redirect('show-cart');
    }

    public function remove_product($rowId){

    	Cart::remove($rowId);
    	return redirect('show-cart');
    }



}
