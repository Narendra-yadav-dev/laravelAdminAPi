<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Models\Learn;
use Session;
use Redirect;

class LearnController extends Controller
{
    public function index()
    {   
        $data = Learn::get();
        return view('learn/learns')->with('learns', $data);
    }
    public function editlearn($id = null)
    {
        $data = Learn::find($id); 
        return view('learn/editlearn', ['learns' => $data]);
    }
    public function updatelearn(request $request, $id)
    { 
        $olddata = Learn::find($id);
         
        if($request['image'])
        { 
            $data = $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();
            
            // Public Folder
            $request->image->move(public_path('assets/img/learn'), $imageName);
         
            $user = Learn::where('id', $id)->update([
                'name' => $request['name'],
                'title' => $request['title'],
                'step_start' => $request['step_start'],
                'step_end' => $request['step_end'],
                'status'=>$request['status'], 
                'image' => $imageName,
            ]);
        }
        else
        {
            $user = Learn::where('id', $id)->update([
                'name' => $request['name'],
                'title' => $request['title'],
                'step_start' => $request['step_start'],
                'step_end' => $request['step_end'],
                'status'=>$request['status'], 
            ]);
        }   
        Session::flash('message', 'The Learn has been successfully updated.');
        return redirect('admin/learn');
    }
    public function addlearn(request $request)
    { 
        return view('learn/addlearn');
    }
    protected function createlearn(request $request)
    { 
        try {
            $request->validate([
                    'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
                ]);
        
                $imageName = time().'.'.$request->image->extension();
                
                // Public Folder
                $request->image->move(public_path('assets/img/learn'), $imageName);
                
                $createdData = Learn::create([
                    'name' => $request['name'],
                    'title' => $request['title'],
                    'step_start' => $request['step_start'],
                    'step_end' => $request['step_end'],
                    'weeks' => 'test',
                    'image' => $imageName,
                ]);   
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }        
        Session::flash('message', 'The Learn has been successfully created.');
        return redirect('admin/learn');
    }
    public function deletelearn(request $request, $id)
    {
        $data = Learn::where('id', $id)->delete();
        if($data)
        { 
            Session::flash('message', 'The Learn has been successfully Deleted.');
            return redirect('admin/learn');  
        }
    }
    public function viewlearn($id)
    {
        $data = Learn::find($id);
        return view('/learn/viewlearn')->with("learn", $data);
    }
    
}
