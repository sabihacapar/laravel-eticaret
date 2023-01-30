<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->returnUrl = "/products";
    }


    /**
     * Display a listing of the resource.
     *
     
     * @return \Illuminate\Contracts\View\View

     */
    public function index()
    {

        $products = Product::all()->where("is_active",true);
        return view("backend.products.index", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view("backend.products.insert_form",["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $data = $this->prepare($request, $product->getFillable());
        $product->fill($data);

        // $product->password = Hash ::make($product->password);
        $product->save();
        return Redirect::to($this->returnUrl);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return "show =>$product->product_id";
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $categories = Category::all();
        return view("backend.products.update_form", ["product" => $product,"categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     *@param  ProductRequest $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $this->prepare($request, $product->getFillable());
        $product->fill($data);

        $product->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();

        return response()->json(["message" => "Done", "id" => $product->product_id]);
    }

}
