<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Food::all();

        return view('transaction.index', compact('menu'));  

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $request->validate([
                'food_id' => 'required|exists:foods,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $food = Food::find($request->food_id);
            $price = $food->price;

            // Simpan transaksi
            $transaction = new Transaction();
            $transaction->customer_name = $request->get('customer_name');
            $transaction->total_price = $price * $request->quantity;
            $transaction->transaction_date = now();
            $transaction->save();

            // Simpan ke pivot table
            $transaction->foods()->attach($food->id, [
                'quantity' => $request->quantity,
                'price_at_order' => $price
            ]);

            return redirect()->route('formOrder.index')->with('success', 'Pesanan berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
