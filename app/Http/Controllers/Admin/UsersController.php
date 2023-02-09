<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use Session;
use Redirect;

class UsersController extends Controller
{
    public function index()
    {   
        $users = User::get();
        return view('user/users')->with('users', $users);
    }
    public function edituser($id = null)
    {
        $user = User::find($id); 
        return view('user/edituser', ['users' => $user]);
    }
    public function updateuser(request $request, $id)
    { 
        $olddata = User::find($id);
        if($olddata->email != $request->email)
        { 
            $validator = Validator::make($request->all(), array(
                'email' => 'required|unique:users',
                )
            );
            if ($validator->fails()) {  
                return Redirect::back()->withErrors($validator);
            }
        }
        if($request['image'])
        { 
            $data = $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();
            
            // Public Folder
            $request->image->move(public_path('assets/img/users'), $imageName);
         
            $user = User::where('id', $id)->update([
                'name'=>$request['name'], 
                'status'=>$request['status'], 
                'email' => $request['email'],
                'phone' => $request['phone'],
                'street_address' => $request['street_address'],
                'country' => $request['country'],
                'state' => $request['state'],
                'city' => $request['city'],
                'pincode' => $request['pincode'],
                'description' => $request['description'],
                'shipping_name' => $request['shipping_name'],
                'shipping_email' => $request['shipping_email'],
                'shipping_phone' => $request['shipping_phone'],
                'shipping_street_address' => $request['shipping_street_address'],
                'shipping_country' => $request['shipping_country'],
                'shipping_state' => $request['shipping_state'],
                'shipping_city' => $request['shipping_city'],
                'shipping_pincode' => $request['shipping_pincode'],
                'billing_name' => $request['billing_name'],
                'billing_email' => $request['billing_email'],
                'billing_phone' => $request['billing_phone'],
                'billing_street_address' => $request['billing_street_address'],
                'billing_country' => $request['billing_country'],
                'billing_state' => $request['billing_state'],
                'billing_city' => $request['billing_city'],
                'billing_pincode' => $request['billing_pincode'],
                'image' => $imageName,
            ]);
        }
        else
        {
            $user = User::where('id', $id)->update([
                'name'=>$request['name'], 
                'email' => $request['email'],
                'phone' => $request['phone'],
                'street_address' => $request['street_address'],
                'country' => $request['country'],
                'state' => $request['state'],
                'city' => $request['city'],
                'pincode' => $request['pincode'],
                'description' => $request['description'],
                'shipping_name' => $request['shipping_name'],
                'shipping_email' => $request['shipping_email'],
                'shipping_phone' => $request['shipping_phone'],
                'shipping_street_address' => $request['shipping_street_address'],
                'shipping_country' => $request['shipping_country'],
                'shipping_state' => $request['shipping_state'],
                'shipping_city' => $request['shipping_city'],
                'shipping_pincode' => $request['shipping_pincode'],
                'billing_name' => $request['billing_name'],
                'billing_email' => $request['billing_email'],
                'billing_phone' => $request['billing_phone'],
                'billing_street_address' => $request['billing_street_address'],
                'billing_country' => $request['billing_country'],
                'billing_state' => $request['billing_state'],
                'billing_city' => $request['billing_city'],
                'billing_pincode' => $request['billing_pincode'],
                'status'=>$request['status'], 
            ]);
        }   
        Session::flash('message', 'The User has been successfully updated.');
        return redirect('admin/users');
    }
    public function adduser(request $request)
    { 
        return view('user/adduser');
    }
    protected function createuser(request $request)
    { 

        try {
            $validator = Validator::make($request->all(), array(
                'email' => 'required|unique:users',
                )
            );
            if ($validator->fails()) {  
                return Redirect::back()->withErrors($validator);
            } 
            else
            {
                $request->validate([
                    'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
                ]);
        
                $imageName = time().'.'.$request->image->extension();
                
                // Public Folder
                $request->image->move(public_path('assets/img/users'), $imageName);
                
                $createdData = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'street_address' => $request['street_address'],
                    'country' => $request['country'],
                    'state' => $request['state'],
                    'city' => $request['city'],
                    'pincode' => $request['pincode'],
                    'description' => $request['description'],
                    'shipping_name' => $request['shipping_name'],
                    'shipping_email' => $request['shipping_email'],
                    'shipping_phone' => $request['shipping_phone'],
                    'shipping_street_address' => $request['shipping_street_address'],
                    'shipping_country' => $request['shipping_country'],
                    'shipping_state' => $request['shipping_state'],
                    'shipping_city' => $request['shipping_city'],
                    'shipping_pincode' => $request['shipping_pincode'],
                    'billing_name' => $request['billing_name'],
                    'billing_email' => $request['billing_email'],
                    'billing_phone' => $request['billing_phone'],
                    'billing_street_address' => $request['billing_street_address'],
                    'billing_country' => $request['billing_country'],
                    'billing_state' => $request['billing_state'],
                    'billing_city' => $request['billing_city'],
                    'billing_pincode' => $request['billing_pincode'],
                    'image' => $imageName,
                    'password' => Hash::make($request['password']),
                ]);            
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }        
        Session::flash('message', 'The User has been successfully created.');
        return redirect('admin/users');
    }
    public function delete(request $request, $id)
    {
        $data = User::where('id', $id)->delete();
        if($data)
        { 
            Session::flash('message', 'The User has been successfully Deleted.');
            return redirect('admin/users');  
        }
    }
    public function userProfile()
    {
        $user = User::get();
        return view('user/userProfile')->with('users',$user); 
    }
    public function updateprofile(request $request)
    {
        $oldData = auth()->guard('admin')->user();
        $id = $oldData['id'];
        $admin = Admin::find($id);

        $image = $admin->image; 
        if($request['image'])
        {  
            $data = $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);
            $imageName = time().'.'.$request->image->extension();
             
            // Public Folder
            $request->image->move(public_path('assets/img/users'), $imageName);
            $image = $imageName; 
        } 
        $admin->update(['name' => $request['name']]); 
        $admin->update(['company' => $request['company']]); 
        $admin->update(['job' => $request['job']]); 
        $admin->update(['address' => $request['address']]); 
        $admin->update(['phone' => $request['phone']]);          
        $admin->name = $request['name'];
        $admin->company = $request['company'];
        $admin->job = $request['job'];
        $admin->address = $request['address'];
        $admin->phone = $request['phone'];
        $admin->image = $image;
        $admin->save();
        Session::flash('message', 'The User Profile has been successfully Updated.');
        return redirect('admin/userprofile'); 
    }
    public function updatepassword(request $request)
    {         
        $oldData = auth()->guard('admin')->user();
        $id = $oldData['id'];
        $admin = Admin::find($id);
        if(Hash::check($request->password, $admin->password))
        {
            if($request->renewpassword == $request->newpassword)
            {
                $admin->password = Hash::make($request['newpassword']);
                $admin->save();
                Session::flash('message', 'The Password has been successfully Updated.');
                return redirect('admin/userprofile'); 
            }
            else
            {
                Session::flash('error_message', 'The password and Confirm password not match.');
                return redirect('admin/userprofile');
            }
        }
        else
        {
            Session::flash('error_message', 'Old passowrd not Matching.');
            return redirect('admin/userprofile');
        }
    }
}
