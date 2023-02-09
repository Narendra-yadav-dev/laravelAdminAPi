<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Category;
use Session;
use Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();
        return view('category/category')->with('data', $data);
    }
    public function addcategory()
    {
        return view('category/addcategory');        
    }
    public function createCategory(request $request)
    {
        try {
            $validator = Validator::make($request->all(), array(
                'name' => 'required|unique:categories',
                )
            );
            if ($validator->fails()) {  
                return Redirect::back()->withErrors($validator);
            } 
            else
            {
                $addcate = Category::create([
                    'name'=> $request['name'],
                    'details' => $request['details']
                ]);              
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }        
        Session::flash('alert_message', 'The Category has been successfully created.');
        return redirect('admin/category');
    }

    public function editcategory($id)
    {
         $data = Category::find($id);
         return view('category/editcategory')->with('category', $data);
    }
    public function updatecategory(request $request, $id)
    {
        $olddata = Category::find($id);
        if($olddata->name != $request->name)
        { 
            $validator = Validator::make($request->all(), array(
                'name' => 'required|unique:categories',
                )
            );
            if ($validator->fails()) {  
                return Redirect::back()->withErrors($validator);
            }
        }
            $data1 = Category::where('id', $id)->update([
                'name'=>$request['name'], 
                'details'=>$request['details'], 
                'status'=>$request['status'], 
            ]);
            Session::flash('alert_message', 'The Category has been successfully updated.');
        return redirect('admin/category');
    }
    public function deleteCategory($id)
    {
        $data1 = Category::where('id', $id)->delete();
        if($data1)
        {
            Session::flash('alert_message', 'The Category has been successfully deleted.');
            return redirect('admin/category');  
        }
    }
}
