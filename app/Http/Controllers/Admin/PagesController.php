<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Pages::get();
        return view('page/pages')->with('pages', $pages);
    }
    public function addpage()
    {
        return view('page/addpage');
    }
    public function createpage(request $request)
    {
        $imageName = '';
        if($request['image'])
        { 
            $data = $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();            
            // Public Folder
            $request->image->move(public_path('assets/img/pages'), $imageName);
         
        }
        $addcate = Pages::create([
            'name'=> $request['name'],
            'title'=> $request['title'],
            'slug'=> $request['slug'],
            'description' => trim($request['description']),
            'image'=>$imageName
        ]);
        return redirect('admin/pages')->with('categories', "message");
         
    }
    public function editpage($id)
    {
        $data = Pages::find($id);
        return view('page/editpage')->with("page", $data);
    }
    public function updatepage(request $request, $id)
    { 
        if($request['image'])
        { 
            $data = $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();
            
            // Public Folder
            $request->image->move(public_path('assets/img/pages'), $imageName);
         
            $user = Pages::where('id', $id)->update([
                'name'=>$request['name'], 
                'title'=>$request['title'], 
                'slug'=>$request['slug'], 
                'description'=>trim($request['description']), 
                'status'=>$request['status'], 
                'image'=>$imageName, 
            ]);
        }
        else
        {
            $user = Pages::where('id', $id)->update([
                'name'=>$request['name'], 
                'title'=>$request['title'], 
                'slug'=>$request['slug'], 
                'description'=>$request['description'],
                'status'=>$request['status'], 
            ]);
        }   
        return redirect('admin/pages')->with('success', 'You have successfully Update the Page.');
    }
    public function delete($id)
    {
        $data1 = Pages::where('id', $id)->delete();
        if($data1)
        {
            return redirect('admin/pages')->with('success', 'You have successfully Deleted Page.');
        }
    }
    public function viewpage($id)
    {
        $data = Pages::find($id);
        return view('page/viewpage')->with("page", $data);
    }
}
