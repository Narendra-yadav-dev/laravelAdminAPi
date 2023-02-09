<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function allcategories()
    {
        try
        {
            $cate = Category::get();
            $status = 204;
            $data = null;
            $message = "Data not found";
            if(count($cate) > 0)
            {
                
                $data = $cate;
                $message = "success";
                $status = 200;
            }
        }
        catch (Exception $e) { 
            $message = $e->getMessage();
        }
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ]); 
    }
    public function singlecategory($id)
    {
        try
        {
            $cate = Category::find($id);
            $status = 204;
            $data = null;
            $message = "Data not found";
            if($cate)
            {
                
                $data = $cate;
                $message = "success";
                $status = 200;
            }
        }
        catch (Exception $e) { 
            $message = $e->getMessage();
        }
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ]);
    }
}
