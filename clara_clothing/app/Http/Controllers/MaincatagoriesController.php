<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\catagaory;
use Illuminate\Http\Request;
use App\Models\Maincatagories;
use Illuminate\Support\Facades\DB;

class MaincatagoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maincatagory = Maincatagories::all();
        // dd($maincatagory);
    
        return view('admin.maincatagoy',compact('maincatagory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maincatagoryadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       

        $formFields = $request->validate([
            'name' => 'required',
            'catagory_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8000',
        ]);

        
        if($request->hasFile('catagory_img')){
            $formFields['catagory_img'] = $request->file('catagory_img')->store('catagory_images' ,'public');
        }
        
    
        Maincatagories::create($formFields);
     
        return redirect()->route('maincatagories.index')
                        ->with('success','Main Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maincatagories  $maincatagories
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $name, Maincatagories  $maincatagories)
    {
        $products = Product::latest()->filter(request(['cat','psearch','search','sizes','pmin','pmax']))->paginate(6);
        $cat = catagaory::all();
        $sizes = DB::select('select distinct size from products');
        $maincatagory = DB::select("select * from products where main_catagory = '$name'");

        return view('customer.catagoryshop', [
            'maincatagories' => $maincatagories,
        ], compact('products','cat','sizes','maincatagory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maincatagories  $maincatagories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maincatagories = Maincatagories::find($id);
        return view('admin.maincategoryedit',compact('maincatagories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maincatagories  $maincatagories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $maincatagories = Maincatagories::find($id);
        $formFields = $request->validate([
            'name' => 'required',
        ]);

        
        if($request->hasFile('catagory_img')){
            $formFields['catagory_img'] = $request->file('catagory_img')->store('catagory_images' ,'public');
        }
    
        $maincatagories->update($formFields);
    
     
        return redirect()->route('maincatagories.index')
                        ->with('success','Main Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maincatagories  $maincatagories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maincatagories = Maincatagories::find($id);
        $maincatagories->delete();
    
        return redirect()->route('maincatagories.index')
                        ->with('success','Category deleted Successfully');
    }




}
