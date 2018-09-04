<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;
session_start();
use App\child_category;
class categoryController extends Controller
{
    public function index(){
    	return view('admin.add_category');
    }

    public function save_category(Request $request){
    	$this->validate($request,[

    		'name'=>'required|string|max:50',
    	]);

    	$category=DB::table('tbl_category')->insert([

                        'name'=>$request->name,
    				     'parent_id'=>$request->parent_id,
    					
    	]);

		Session::put('message', 'category Insert successfull');
		return redirect('all-category');
    }


    public function all_category(){
    	
        $all_category=child_category::with('childs')->where('parent_id', 0)->get();
    	return view('admin.all_category')->with('all_category_info', $all_category);
    }

    public function active_category($cat_id){
    	$active_category=DB::table('tbl_category')->where('id', $cat_id)->update([

    		'status'=>1,

    	]);

    	Session::put('message', 'category activated');
		return redirect('all-category');
    }

    public function unactive_category($cat_id){
    	$active_category=DB::table('tbl_category')->where('id', $cat_id)->update([

    		'status'=>0,

    	]);

    	Session::put('message', 'category  Unactivated');
		return redirect('all-category');
    }

    public function edit_category($cat_id){
    	$edit_category=DB::table('tbl_category')->where('id', $cat_id)->first();
    	return view('admin.edit_category')->with('category_info', $edit_category);

    }

    public function update_category(Request $request){
    	$update=DB::table('tbl_category')
    			->where('id', $request->edit_cat)
    			->update([

    			'name'=>$request->name,

    			]);

    	if($update){
		Session::put('message', 'category Updated successfull');
		return redirect('add-category');
		}
		else{
			echo "error";
		}

    }

    public function delete_category($cat_id){

    	$delete_category=DB::table('tbl_category')->where('id', $cat_id)->delete();
        //$delete_category=child_category::with('childs')->where('id', $cat_id)->where('parent_id', $cat_id)->delete();


    	if($delete_category){
     		Session::put('message', 'Category delete successfull');
	        return redirect('all-category');
           
    	}
        else{
           Session::put('message', 'Category  not delete successfull');
            return redirect('all-category');
        }
    	
    }

    //child category function here----------------------------------


    public function child_category(){
       return view('admin.add_child_category');
    }

    public function add_child(Request $request){
        $this->validate($request,[

            'name'=>'required|string|max:50',
        ]);

        $child_category=DB::table('child_category')->insert([

                        'name'=>$request->name,
                        'parent_id'=>$request->parent_id,
                        
        ]);

        Session::put('message', 'child category Insert successfull');
        return redirect('all-child-category');
    }


    public function all_child_category(){
    

        $all_child_category=DB::table('tbl_category')->where('parent_id', '>', '0')->get();
        
        return view('admin.all_child_category')->with('all_child_category', $all_child_category);
                
    }


     public function active_child_category($child_id){
        $active_category=DB::table('tbl_category')->where('id', $child_id)->update([

            'status'=>1,

        ]);

        Session::put('message', 'child category activated');
        return redirect('all-child-category');
    }

    public function unactive_child_category($child_id){
        $active_category=DB::table('tbl_category')->where('id', $child_id)->update([

            'status'=>0,

        ]);

        Session::put('message', 'child category  Unactivated');
        return redirect('all-child-category');
    }


    public function edit_child_category($child_id){
        $edit_child_category=DB::table('tbl_category')->where('id', $child_id)->first();
        return view('admin.edit_child_category')->with('edit_child_category', $edit_child_category);

    }

    public function update_child(Request $request){

        $update=DB::table('tbl_category')
                ->where('id', $request->child_id)
                ->update([

                'name'=>$request->name,
                'parent_id'=>$request->parent_id,

                ]);

        if($update){
        Session::put('message', 'child category Updated successfull');
        return redirect('all-child-category');
        }
        else{
            echo "error";
        }
    }

    public function delete_child_category($child_id){

        $delete_child_category=DB::table('tbl_category')->where('id', $child_id)->delete();
        if($delete_child_category){
            Session::put('message', 'child Category delete successfull');
        return redirect('all-child-category');
        }
        else{
            echo "fail";
        }
        
    }





}
