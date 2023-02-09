<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function allproducts(Request $request)
    {
        $Pages = $request->input('page', 1);
        $catId = $request->input('catId');
        $perPage = $request->input('limit', 10);
        $offset = 0;
        if (!is_numeric($perPage)) {
            $perPage = 10;
        } 
        if($Pages > 1){
            $offset = ($Pages * $perPage) - $perPage;
        }
        $where = [];
        if($catId)
        {
            $where = [
                ['catId', '=', $catId] 
            ];
        }
        try
        {
            $results = DB::table('products')
                ->leftJoin('categories', 'categories.id','=','products.catId' )
                ->select('products.*', 'categories.name as category_name')
                ->where($where)
                ->offset($offset)->limit($perPage)
                ->get();
            $status = 204;
            $data = null;
            $message = "Data not found";
            if(count($results) > 0)
            {
                $dataAll = [];
                foreach($results as $result)
                {
                    $color = Color::where('pId', $result->id)->get();
                    $size = Size::where('pId', $result->id)->get();
                    $result->color = $color;
                    $result->size = $size;
                    array_push($dataAll, $result);
                }
                
                $data = $dataAll;
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
    public function singleproduct($id)
    {
        $cate = Category::find($id);
        $results = DB::table('products')
            ->leftJoin('categories', 'categories.id','=','products.catId' )
            ->select('products.*', 'categories.name as cname')
            ->where('products.id', $id)
            ->get();
        $status = 204;
        $data = null;
        $message = "Data not found";
        if($results)
        {
            try
            {
                $color = Color::where('pId', $id)->get();
                $size = Size::where('pId', $id)->get();
                $results[0]->color = $color;
                $results[0]->size = $size;
                $message = "success";
            }
            catch (Exception $e) { 
                $message = $e->getMessage();
            }
            $data = $results; 
            $status = 200;
        }
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ]);
    }
}
