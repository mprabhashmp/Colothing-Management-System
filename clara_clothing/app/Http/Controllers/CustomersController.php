<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\catagaory;
use App\Models\Customers;
use App\Models\Maincatagories;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->filter(request(['cat','psearch','search','sizes','pmin','pmax']))->paginate(6);
        $cat = catagaory::all();
        $sizes = DB::select('select distinct size from products');
        return view('customer.shop', compact('products','cat','sizes'));
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
     * @param  \App\Http\Requests\StoreCustomersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        $sizetag = DB::select('select * from products');
        return view('customer.shop', compact('sizetag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomersRequest  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomersRequest $request, Customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers)
    {
        //
    }

    public function manage()
    {
        return view('customer.cus_dashboard');
    }

    public function contact()
    {
        return view('customer.contactus');
    }

    // public function csize(){
    //     $product = Product::all();
    //     return view('customer.shop', compact('product'));
    // }
}
