<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\catagaory;
use App\Models\Navbaritems;
use Illuminate\Http\Request;
use App\Models\Maincatagories;
use Illuminate\Support\Facades\DB;

class NavbaritemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Product::all();
        // $maincats = Maincatagories::all();
        // $cat = catagaory::all();
        // $maincatss = DB::select("select distinct main_catagoryname from catagaories");
        // return view('partials.navbar',compact('product','maincats','cat','maincatss'));

        $product = DB::select('select * from products limit 8');
        // $product = Product::paginate(8)->filter(request(['cat','psearch','search','sizes','pmin','pmax']));
        $maincats = Maincatagories::all();
        $maincatsss = DB::select('SELECT * FROM maincatagories WHERE catagory_img IS NOT NULL');
        $products = Product::latest()->filter(request(['cat','psearch','search','sizes','pmin','pmax']))->paginate(6);
        $cat = catagaory::all();
        $sizes = DB::select('select distinct size from products');
        $maincatss = DB::select("select distinct main_catagoryname from catagaories");
        return view('customer.index', compact('product','maincats','products','cat','sizes','maincatss','maincatsss'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Navbaritems  $navbaritems
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $catagoryname, Navbaritems  $navbaritems)
    {
        $products = Product::latest()->filter(request(['cat','psearch','search','sizes','pmin','pmax']))->paginate(6);
        $cat = catagaory::all();
        $sizes = DB::select('select distinct size from products');
        $subcatagory = DB::select("select * from products where catagory = '$catagoryname'");
        return view('customer.subcategoryshop', [
            'navbaritems' => $navbaritems,
        ], compact('products','cat','sizes','subcatagory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Navbaritems  $navbaritems
     * @return \Illuminate\Http\Response
     */
    public function edit(Navbaritems $navbaritems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Navbaritems  $navbaritems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navbaritems $navbaritems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Navbaritems  $navbaritems
     * @return \Illuminate\Http\Response
     */
    public function destroy(Navbaritems $navbaritems)
    {
        //
    }
}
