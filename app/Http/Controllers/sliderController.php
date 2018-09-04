<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;
session_start();

class sliderController extends Controller
{
    public function add_slider(){
    	return view('admin.add_slider');
    }

    public function save_slider(Request $request){
    	$this->validate($request,[

            'slider_name'=>'required|string|max:30',
    		'slider_image'=>'required',

    	]);

    	$image=$request->file('slider_image');
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
    				$product=DB::table('tbl_slider')->insert([

                        'slider_name'=>$request->slider_name,
    					
    					'slider_image'=>$full_path,
    					
    				]);

    				Session::put('message', 'slider Insert successfull');
    				return redirect('add-slider');
    			}

    			

    		}
    		else{
    			echo "no";
    		}
    	}
    }


    public function all_slider(){
        $all_slider=DB::table('tbl_slider')->get();
        return view('admin.all_slider')->with('all_slider_info', $all_slider);
    }


    public function active_slider($slider_id){
        $active_category=DB::table('tbl_slider')->where('id', $slider_id)->update([

            'status'=>1,

        ]);

        Session::put('message', 'slider activated');
        return redirect('all-slider');
    }

    public function unactive_slider($slider_id){
        $active_category=DB::table('tbl_slider')->where('id', $slider_id)->update([

            'status'=>0,

        ]);

        Session::put('message', 'slider  Unactivated');
        return redirect('all-slider');
    }

    public function edit_slider($slider_id){

        $edit_slider=DB::table('tbl_slider')->where('id', $slider_id)->first();
        return view('admin.edit_slider')->with('slider_info', $edit_slider);
    }



    public function update_slider(Request $request){

        if(!empty($request->file('slider_image'))){

                $image=$request->file('slider_image');
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

                    $data=DB::table('tbl_slider')->where('id',$request->slider_id)->update([

                        'slider_name'=>$request->slider_name,
                        
                        'slider_image'=>$full_path,
                        
                        

                    ]);
                        if($data){
                            Session::put('message','slider Update succefull');
                            return redirect('all-slider');
                        }
                        else{
                            Session::put('message','Slider not added!!!!!!');
                            return redirect('all-slider');
                        }

                }
            }
            else{
                Session::put('message','You can Only upload jpg,png,jpeg');
                            return redirect('all-slider');
            }

        }



        }
        else{

            $data=DB::table('tbl_slider')->where('id',$request->slider_id)->update([

                        'slider_name'=>$request->slider_name,
                        
                        
                        

                    ]);
                        if($data){
                            Session::put('message','slier Update succefull');
                            return redirect('all-slider');
                        }
                        else{
                            Session::put('message','slider not added!!!!!!');
                            return redirect('all-slider');
                        }

        }
    }


    public function delete_slider($slider_id){

        $delete_slider=DB::table('tbl_slider')->where('id', $slider_id)->delete();
            if($delete_slider){
                 Session::put('message','slider delete succefull');
                return redirect('all-slider');
            }
            else{
            Session::put('message','slider not deleted!!!!!!');
            return redirect('all-slider');
             }
        
    }






}
