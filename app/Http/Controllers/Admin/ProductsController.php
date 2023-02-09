<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class ProductsController extends Controller
{
    public function index()
    {
        $data = DB::table('products')
            ->leftJoin('categories', 'categories.id','=','products.catId' )
            ->select('products.*', 'categories.name as cname')
            ->offset(0)->limit(10)
            ->get();
        return view('products/products', ['data'=> $data]);
    }
    public function addproduct()
    {
        $data = Category::where('status', 1)->orderBy('name')->pluck('name', 'id');
        return view('products/addproduct')->with('data', $data);
    }
    public function createproduct(request $request)
    { 
        try { 
                $validator = Validator::make($request->all(), array(
                    'name' => 'required',
                    'price' => 'required',
                    )
                );
                if ($validator->fails()) {  
                    return Redirect::back()->withErrors($validator);
                }
                $gallaryimages = [];
                if(count($request->gallary) > 0)
                { 
                    for($i = 0; $i < count($request->gallary); $i++)
                    {
                        $imageName = $request->name.'_'.time().'_'.$request->gallary[$i]->getClientOriginalName();
                        $request->gallary[$i]->move(public_path('assets/img/products/gallary/'), $imageName);
                        array_push($gallaryimages, 'assets/img/products/gallary/'.$imageName);
                    }
                    $gallaryimages = json_encode($gallaryimages);
                }
                $image = '';
                if($request->image)
                {
                    $image = $request->name.'_'.time().'_'.$request->image->getClientOriginalName();
                    $request->image->move(public_path('assets/img/products/'), $image);
                }
                $thumbnail = '';
                if($request->thumbnail)
                {
                    $thumbnail = $request->name.'_'.time().'_'.$request->thumbnail->getClientOriginalName();
                    $request->thumbnail->move(public_path('assets/img/products/'), $thumbnail);
                }
                
                $createdData = Products::create([
                    'name' => $request['name'],
                    'catId' => $request['catId'],
                    'title' => $request['title'],
                    'sku' => $request['sku'],
                    'price' => $request['price'],
                    'color' => '',
                    'size' => '',
                    'quantity' => $request['quantity'],
                    'model' => $request['model'],
                    'discount' => $request['discount'],
                    'description' => $request['description'],
                    'image' => 'assets/img/products/'.$image,
                    'thumbnail' => 'assets/img/products/'.$thumbnail,
                    'gallary' => $gallaryimages,
                ]); 
                if(count($request->color) > 0)
                {
                    for($i =0; $i< count($request->color); $i++)
                    {
                        Color::create([
                            'name' => $request->color[$i],
                            'pId' => $createdData->id
                        ]);
                    }
                }
                if(count($request->size) > 0)
                {
                    for($i =0; $i< count($request->size); $i++)
                    {
                        Size::create([
                            'name' => $request->size[$i],
                            'pId' => $createdData->id
                        ]); 
                    }   
                }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }        
        Session::flash('message', 'The Product has been successfully created.');
        return redirect('admin/products');
    }
    public function editproduct($id)
    {
        $cat = Category::where('status', 1)->orderBy('name')->pluck('name', 'id');
        $data = Products::find($id);
        $Cdata = Color::where('pId',$id)->get();
        $Sdata = Size::where('pId', $id)->get();
        return view('products/editproduct', ['data'=> $data, 'cat'=> $cat, 'color'=> $Cdata, 'size'=> $Sdata]);
    }
    public function updateproduct(request $request, $id)
    {
        $olddata = Products::find($id);
        $gallaryimages = $olddata->gallary;
        $image = $olddata->image;
        $thumbnail = $olddata->thumbnail;
        
        if(is_array($request->gallary) && count($request->gallary) > 0)
        {
            $gallaryimages = [];
            for($i = 0; $i < count($request->gallary); $i++)
            {
                $imageName = $request->name.'_'.time().'_'.$request->gallary[$i]->getClientOriginalName();
                $request->gallary[$i]->move(public_path('assets/img/products/gallary/'), $imageName);
                array_push($gallaryimages, 'assets/img/products/gallary/'.$imageName);
            }
            $gallaryimages = json_encode($gallaryimages);
        } 
        if($request->image !='')
        {
            $image = $request->name.'_'.time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('assets/img/products/'), $image);
            $image = 'assets/img/products/'.$image;
        }
        if($request->thumbnail !='')
        {
            $thumbnail = $request->name.'_'.time().'_'.$request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('assets/img/products/'), $thumbnail);
            $thumbnail = 'assets/img/products/'.$thumbnail;
        } 
        Color::where('pId', $id)->delete();
        Size::where('pId', $id)->delete();
        if(count($request->color) > 0)
        {
            for($i =0; $i< count($request->color); $i++)
            {
                Color::create([
                    'name' => $request->color[$i],
                    'pId' => $id
                ]);
            }
        }
        if(count($request->size) > 0)
        {
            for($i =0; $i< count($request->size); $i++)
            {
                Size::create([
                    'name' => $request->size[$i],
                    'pId' => $id
                ]); 
            }   
        }
        $user = Products::where('id', $id)->update([
            'name'=>$request['name'], 
            'status'=>$request['status'], 
            'catId' => $request['catId'],
            'title' => $request['title'],
            'sku' => $request['sku'],
            'price' => $request['price'],
            'color' => $request['color'],
            'size' => $request['size'],
            'quantity' => $request['quantity'],
            'model' => $request['model'],
            'discount' => $request['discount'],
            'description' => $request['description'],
            'image' => $image,
            'thumbnail' => $thumbnail,
            'gallary' => $gallaryimages, 
        ]);
          
        Session::flash('message', 'The Product has been successfully updated.');
        return redirect('admin/products');
    }
    public function deleteproduct(request $request, $id)
    {
        $olddata = Products::find($id);
        if (file_exists($olddata->image)) {
            unlink($olddata->image);
        }
        $data = Products::where('id', $id)->delete();
        if($data)
        { 
            Session::flash('message', 'The Product has been successfully Deleted.');
            return redirect('admin/products');  
        }
    }
}
