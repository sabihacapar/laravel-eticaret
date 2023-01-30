<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/categories";
    }


    /**
     * Display a listing of the resource.
     *
     
     * @return \Illuminate\Contracts\View\View

     */
    public function index()
    {

        $categories = Category::all();
        return view("backend.categories.index", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.categories.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $data = $this->prepare($request, $category->getFillable());
        $category->fill($data);

        // $category->password = Hash ::make($category->password);
        $category->save();
        return Redirect::to($this->returnUrl);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return "show =>$category->category_id";
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view("backend.categories.update_form", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     *@param  CategoryRequest $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $this->prepare($request, $category->getFillable());
        $category->fill($data);

        $category->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $category->delete();

        return response()->json(["message" => "Done", "id" => $category->category_id]);
    }

}
