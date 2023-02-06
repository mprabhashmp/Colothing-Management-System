<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Supplier;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockes = Stock::all();
        return view('admin.stock', compact('stockes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supp = Supplier::all();
        return view('admin.stockadd',compact('supp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockRequest $request)
    {
        $request->validate([
            'supid' => 'required|max:255',
            'qun' => 'required|max:255',
            'price' => 'required|max:255',
            'date' => 'required|max:255',
            'des' => 'required|max:5000',
        ]);

        $stock = new Stock();

        $stock->supid = $request->supid;
        $stock->quntity = $request->qun;
        $stock->price = $request->price;
        $stock->date = $request->date;
        $stock->des = $request->des;

        $stock->save();

        return redirect()->route('stocke.index')
                        ->with('success','Stockes Added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        $supp = Supplier::all();
        return view('admin.stockedit',compact('stock','supp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockRequest  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $request->validate([
            'supid' => 'required|max:255',
            'qun' => 'required|max:255',
            'price' => 'required|max:255',
            'date' => 'required|max:255',
            'des' => 'required|max:5000',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocke.index')
                        ->with('success','Stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $deleted = DB::delete('delete from stocks where id = ?',[$id]);

        return redirect()->route('stocke.index')
                        ->with('success','stock deleted successfully');
    }
}
