<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;
session_start();

class contactController extends Controller
{
    public function index(){
    	return view('admin.add_contact');
    }

    public function save_contact(Request $request){
    	$this->Validate($request, [
    		'facebook'=>'required',
    		'twiteer'=>'required',
    		'google'=>'required',
    		'instagram'=>'required',
    		'dribble'=>'required',

    	]);	


        $contact=DB::table('tbl_contact')->insert([

            'facebook'=>$request->facebook,
            'twiteer'=>$request->twiteer,
            'google'=>$request->google,
            'instagram'=>$request->instagram,
            'dribble'=>$request->dribble,

        ]);

        if($contact){
            Session::put('message','contact added successfully');
            return redirect('add-contact');
        }

    }

    public function edit_contact(){
        $data=DB::table('tbl_contact')->first();
        return view('admin.all_contact')->with('contact',$data);
      
    }
    public function update_contact(Request $request){
        $update=DB::Table('tbl_contact')->update([
            'facebook'=>$request->facebook,
            'twiteer'=>$request->twiteer,
            'google'=>$request->google,
            'instagram'=>$request->instagram,
            'dribble'=>$request->dribble,

        ]);

        if($update){
            Session::put('message','contact uodated successfully');
            return redirect('edit-contact');
        }
    }





}
