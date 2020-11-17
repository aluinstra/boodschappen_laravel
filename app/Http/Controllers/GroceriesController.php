<?php

namespace App\Http\Controllers;

// if controller not in same namespace use below
// use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Grocerie;


class GroceriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "Index page";

        $tableHeads = array("id", "Product", "Pricing", "Quantity", "Subtotal", "Update", "Delete");


        $groceries = Grocerie::get();
        // dd($groceries);

        $total = 0;

        foreach ($groceries as $key => $grocerie) {
            $total += $grocerie->subtotal_price;
        }
        // dd($total);

        // $subTotalPrice = $groceries->first()->subtotal_price;
        // dd($subTotalPrice)
        // return view('groceries.index', compact("groceries"));
        // return view('groceries.index', $groceries[0]->id);
        return view('groceries.index', ["groceries" => $groceries, "tableHeads" => $tableHeads, "totalPrice" => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groceries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump(request()->all());
        Grocerie::create(request()->validate([
            'grocerie' => ['required', 'min:2'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'numeric', 'min:1']
        ]));

        return redirect()->route('groceries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('hello');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grocerie $grocerie)
    {
        // $grocerie = Grocerie::find($id);


        return view('groceries.edit', compact('grocerie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grocerie $grocerie)
    {

        $grocerie->update(request()->validate([
            'grocerie' => ['required', 'min:2'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'numeric', 'min:1']
        ]));


        // dd($grocerie);

        return redirect()->route('groceries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Grocerie::destroy($id);

        return redirect('/');
    }
}
