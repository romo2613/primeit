<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return $products->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $product = new Product;
        $product->name = $data['name'];
        $product->save();

        $this->savePhoto($data, $product);

        return $product->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();

        $product = Product::findOrFail($id);
        $product->name = $data['name'];

        $this->savePhoto($data, $product);

        $product->save();

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $images = $product->images;


        if(count($images) != 0){
            foreach ($images as $image) {

                $directory = explode('/',$image->url)[0];

                Storage::disk('public')->deleteDirectory($directory);

            }
        }

        $product->images()->detach();

        $product->delete();

        return response()->json(['success' => 'successful removal'], 200);
    }

    private function savePhoto($data, Product $product){

        if(isset($data['images'])){

            $ruta = 'images'.$product->id;

            foreach ($data['images'] as $image) {

                $name = Str::uuid().$image->getClientOriginalName();

                $imageModel = new Image;
                $imageModel->url = Storage::disk('public')->putFileAs($ruta, new File($image), $name);
                $imageModel->save();

                $product->images()->attach($imageModel->id);
            }
        }
    }

}
