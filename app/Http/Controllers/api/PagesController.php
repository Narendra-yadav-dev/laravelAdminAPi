<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;

class PagesController extends Controller
{
    public function allpages()
    {
        try
        {
            $page = Pages::get();
            $status = 204;
            $data = null;
            $message = "Data not found";
            if(count($page) > 0)
            {
                
                $data = $page;
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
    public function singlepage($id)
    {
        try
        {
            $page = Pages::find($id);
            $status = 204;
            $data = null;
            $message = "Data not found";
            if($page)
            {
                
                $data = $page;
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
