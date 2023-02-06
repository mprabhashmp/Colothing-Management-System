<?php

namespace App\Http\Controllers;

use App\Models\catagaory;
use App\Models\Maincatagories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StorecatagaoryRequest;
use App\Http\Requests\UpdatecatagaoryRequest;

class CatagaoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagory = catagaory::all();
        return view('admin.catagory', compact('catagory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincats = Maincatagories::all();
        return view('admin.catagoruadd',compact('maincats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecatagaoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecatagaoryRequest $request)
    {
        $request->validate([
            'catagoryname' => 'required|max:255',
            'main_catagoryname' => 'required|max:255',
        ]);

        $catagory = new catagaory();

        $catagory->catagoryname = $request->catagoryname;
        $catagory->main_catagoryname = $request->main_catagoryname;

        $catagory->save();

        return redirect()->route('catagory.index')
                        ->with('success','Catagory added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catagaory  $catagaory
     * @return \Illuminate\Http\Response
     */
    public function show(catagaory $catagaory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catagaory  $catagaory
     * @return \Illuminate\Http\Response
     */
    public function edit(catagaory $catagaory)
    {
        // return $catagaory;
        // $cat = DB::select('select * from catagaories where id = ?', [$catagaory]);
        $cat = catagaory::all();
        $maincat = Maincatagories::all();
        return view('admin.catagoryedit', compact('cat','maincat'));
        // dd($catagaory);

        // return view('admin.catagoryedit', ['catagaory' => $catagaory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecatagaoryRequest  $request
     * @param  \App\Models\catagaory  $catagaory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecatagaoryRequest $request, catagaory $catagaory)
    {
      
        $request->validate([
            'catagoryname' => 'required|max:255',
            'main_catagoryname' => 'required|max:255',
        ]);


        $catagaory->update($request->all());

        return redirect()->route('catagory.index')
                        ->with('success','Catagory updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catagaory  $catagaory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $catagaory)
    {
        return $catagaory;
    }
}
