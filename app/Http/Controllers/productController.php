<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\child_category;
use Session;
session_start();

class productController extends Controller
{
    public function index(){
        $all_category=child_category::with('childs')->where('parent_id', 0)->get();
    	return view('admin.add_product')->with('all_category',$all_category);
    }

    public function save_product(Request $request){
    	$this->validate($request,[

            'title'=>'required|string|max:30',
    		'cat_id'=>'required|string|max:30',
    		'image'=>'required',
    		'short_description'=>'required|string',
    		'long_description'=>'required|string',
    		'price'=>'required|string|max:10',
    		'size'=>'required|string|max:30',
            'color'=>'required|string|max:50',
    		


    	]);

    	$image=$request->file('image');
    	if($image){
    		$permit=['jpg','png','jpeg'];
    		$image_name=$image->getClientOriginalName();
    		$ext=$image->getClientOriginalExtension();
    		if(in_array($ext,$permit)){
    			$unq=substr(md5(time()), 0,5).$image_name;
    			$path='admin/upload/';
    			$full_path=$path.$unq;
    			$upload=$image->move($path,$unq);
    			if($upload){
    				$product=DB::table('tbl_product')->insert([

                        'title'=>$request->title,
    					'cat_id'=>$request->cat_id,
    					'image'=>$full_path,
    					'short_description'=>$request->short_description,
    					'long_description'=>$request->long_description,
    					'price'=>$request->price,
    					'size'=>$request->size,
                        'color'=>$request->color,
    					'tags'=>$request->tags,
    				]);

    				Session::put('message', 'product Insert successfull');
    				return redirect('all-product');
    			}

    			

    		}
    		else{
    			echo "no";
    		}
    	}
    }

    public function all_product(){
    	$all_product=DB::table('tbl_product')
                    ->join('tbl_category','tbl_product.cat_id', '=', 'tbl_category.id')
                    ->select('tbl_product.*', 'tbl_category.name as category_name')
                    ->get();
    	return view('admin.all_product')->with('all_product_info', $all_product);
    }


    public function active_product($product_id){
        $active_product=DB::table('tbl_product')->where('id', $product_id)->update([

            'status'=>1,

        ]);

        Session::put('message', 'product activated');
        return redirect('all-product');
    }

    public function unactive_product($product_id){
        $active_product=DB::table('tbl_product')->where('id', $product_id)->update([

            'status'=>0,

        ]);

        Session::put('message', 'product  Unactivated');
        return redirect('all-product');
    }


    public function edit_product($product_id){
         $edit_product=DB::table('tbl_product')->where('id', $product_id)->first();
         return view('admin.edit_product')->with('product_info', $edit_product);

    }

    public function update_product(Request $request){

        if(!empty($request->file('image'))){

                $image=$request->file('image');
        if($image){
            $permit=['jpg','png','jpeg'];
            $name=$image->getClientOriginalName();
            $exten=$image->getClientOriginalExtension();
            //$exten_sm=strtolower($exten);
            if(in_array($exten, $permit)==true){
                $unique=substr(md5(time()),0,5).$name;
                $path='admin/upload/';
                $full_path=$path.$unique;
                $upload=$image->move($path, $unique);
                if($upload){

                    $data=DB::table('tbl_product')->where('id',$request->product_id)->update([

                        'title'=>$request->title,
                        'cat_id'=>$request->cat_id,
                        'image'=>$full_path,
                        'short_description'=>$request->short_description,
                        'long_description'=>$request->long_description,
                        'price'=>$request->price,
                        'size'=>$request->size,
                        'color'=>$request->color,
                        'tags'=>$request->tags,
                        

                    ]);
                        if($data){
                            Session::put('message','Product Update succefull');
                            return redirect('all-product');
                        }
                        else{
                            Session::put('message','Product not added!!!!!!');
                            return redirect('all-product');
                        }

                }
            }
            else{
                Session::put('message','You can Only upload jpg,png,jpeg');
                            return redirect('all-product');
            }

        }



        }
        else{

            $data=DB::table('tbl_product')->where('id',$request->product_id)->update([

                        'title'=>$request->title,
                        'cat_id'=>$request->cat_id,
                        'short_description'=>$request->short_description,
                        'long_description'=>$request->long_description,
                        'price'=>$request->price,
                        'size'=>$request->size,
                        'color'=>$request->color,
                        'tags'=>$request->tags,
                        

                    ]);
                        if($data){
                            Session::put('message','Product Update succefull');
                            return redirect('all-product');
                        }
                        else{
                            Session::put('message','Product not added!!!!!!');
                            return redirect('all-product');
                        }

        }
        
        
     }

    public function delete_product($product_id){

        $delete_product=DB::table('tbl_product')->where('id', $product_id)->delete();
        if($delete_product){
            Session::put('message', 'product delete successfull');
            return redirect('all-product');
        }
        else{
            Session::put('message', 'product delete not successfull!!!!');
            return redirect('all-product');
        }



    }














}
