<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\catagaory;
use App\Models\Maincatagories;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

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
        return view('admin.product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagory = catagaory::all();
        $maincats = Maincatagories::all();
        return view('admin.productadd', compact('catagory','maincats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8000',
            'name' => 'required|max:255',
            'catagory' => 'required|max:255',
            'main_catagory' => 'required|max:255',
            'price' => 'required|max:255',
            'size' => 'required|max:255',
            'code' => 'required|max:255',
            'des' => 'required|max:5000',
            'status' => 'required|max:255',
        ]);

        $images = [];
        if ($request->images){
            foreach($request->images as $key => $image)
            {
                $imageName = time().rand(1,99).'.'.$image->extension();
                $image->move(public_path('uploads'), $imageName);

                $images[]['name'] = $imageName;
            }
        }


        $count = 0;
        foreach ($images as $img) {
            if ($count == 0) {
                $image1 = $img['name'];
            }elseif ($count == 1) {
                $image2 = $img['name'];
            }elseif ($count == 2) {
                $image3 = $img['name'];
            }
            $count = $count + 1;
        }



        $product = new Product();

        $product->name = $request->name;
        $product->catagory = $request->catagory;
        $product->main_catagory = $request->main_catagory;
        $product->image1 = $image1;
        $product->image2 = $image2;
        $product->image3 = $image3;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->code = $request->code;
        $product->des = $request->des;
        $product->status = $request->status;

        $product->save();

        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $catagory = catagaory::all();
        $maincat = Maincatagories::all();
        return view('admin.productedit', compact('product','catagory','maincat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'catagory' => 'required|max:255',
            'main_catagory' => 'required|max:255',
            'image1' => 'required|max:255',
            'image2' => 'required|max:255',
            'image3' => 'required|max:255',
            'price' => 'required|max:255',
            'size' => 'required|max:255',
            'code' => 'required|max:255',
            'des' => 'required|max:5000',
            'status' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->fileup.'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);

        }

        $product->update($request->all());

        return redirect()->route('product.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}
