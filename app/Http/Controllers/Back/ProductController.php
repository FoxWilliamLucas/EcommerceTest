<?php

namespace App\Http\Controllers\Back;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseStatus;
use App\ValidationRules\ProductRules;
use App\Http\Resources\ProductResource;
use App\Helpers\{Response, ValidatorHelper};
use App\Http\Controllers\Controller;



class ProductController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Product::class, 'product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $products = Product::where('store_id', auth()->user()->store->id)->get();
            $products = ProductResource::collection($products);
            return Response::respondSuccess(Response::SUCCESS, $products);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->all();
            $validator = Validator($data , ProductRules::rules(), ValidatorHelper::messages());
            if ($validator->passes()){
                $data['store_id'] = auth()->user()->store->id;
                $product = Product::create($data);
                $product = new ProductResource($product);
                return Response::respondSuccess(Response::ADDED_SUCCESSFULLY, $product);
            }
            return Response::respondError($validator->errors()->all(),ResponseStatus::VALIDATION_ERROR);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        try{
            $product = new ProductResource($product);
            return Response::respondSuccess(Response::SUCCESS, $product);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        try{
            $data = request()->except('store_id');
            $validator = Validator($data , ProductRules::rules(), ValidatorHelper::messages());
            if ($validator->passes()){
                $products = $product->update($data);
                return Response::respondSuccess(Response::UPDATED_SUCCESSFULLY, $products);
            }
            return Response::respondError($validator->errors()->all(),ResponseStatus::VALIDATION_ERROR);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try{
            $product->delete();
            return Response::respondSuccess(Response::DELETED_SUCCESSFULLY);
        } catch (\Exception $e) {
            return Response::respondError($e->getMessage());
        }
    }
}
