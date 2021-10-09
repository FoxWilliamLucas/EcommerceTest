<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Helpers\{Response};

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        try{
            $products = Product::get();
            $products = ProductResource::collection($products);
            return Response::respondSuccess(Response::SUCCESS, $products);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product(Product $product)
    {
        try{
            $product = new ProductResource($product);
            return Response::respondSuccess(Response::SUCCESS, $product);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cartProducts()
    {
        try{
            $data = request()->all();
            if(!empty($data['products'])){
                $products = Product::whereIn('id', $data['products'])->get();
                $products = ProductResource::collection($products);    
            } else $products = [];
            return Response::respondSuccess(Response::SUCCESS, $products);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }




}
