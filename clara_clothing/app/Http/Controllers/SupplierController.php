<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addsuppliers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'companyname' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'pcode' => 'required|max:255',
            'regno' => 'required|max:255',
            'des' => 'required|max:255',
        ]);

        $supplier = new Supplier();

        $supplier->fullname = $request->name;
        $supplier->companyname = $request->companyname;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->postalcode = $request->pcode;
        $supplier->regno = $request->regno;
        $supplier->des = $request->des;

        $supplier->save();

        return redirect()->route('suppliers.index')
                        ->with('success','Supplier added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.updatesupp',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupplierRequest  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|max:255',
            'companyname' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'pcode' => 'required|max:255',
            'regno' => 'required|max:255',
            'des' => 'required|max:255',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')
                        ->with('success','Supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
                        ->with('success','Supplire deleted successfully');
    }
}
