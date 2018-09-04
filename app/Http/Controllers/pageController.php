<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\child_category;
use DB;
use Session;
session_start();

class pageController extends Controller
{
   	public function index(){
   		
   		return view('/pages.home2');
   	} 

   

    public function vegetables($category_name,$cat_id){
           
           $str=str_replace(' ', '_', $category_name);
          return view('pages/'.$str)->with('cat_id', $cat_id);        

    }

    public function customer_logout(){
       $destroy=Session::flush();
       
         return redirect('/');
       

      

    }


}
