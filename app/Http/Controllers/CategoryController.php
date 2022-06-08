<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::with('subCategories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->save();

        if(isset($data['subcategories'])){

            foreach($data['subcategories'] as $subCategory){
                $modelSubCategory = new SubCategory;
                $modelSubCategory->name = $subCategory;
                $modelSubCategory->category_id = $category->id;
                $modelSubCategory->save();
            }


        }
        return $this->show($category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Category::with('subCategories')->findOrFail($id);

        return $categoria->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validated();

        $category = Category::findOrFail($id);
        $category->name = $data['name'];
        $category->save();

        if(isset($data['subcategories'])){

            foreach($data['subcategories'] as $subCategory){


                $modelSubCategory = new SubCategory;
                $modelSubCategory->name = $subCategory;
                $modelSubCategory->category_id = $category->id;
                $modelSubCategory->save();


            }


        }
        return $this->show($category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
