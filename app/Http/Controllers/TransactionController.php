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
                'customer_name' => 'required|string|max:255',
                'food_id' => 'required|array',
                'food_id.*' => 'exists:foods,id',
                'quantity' => 'required|array',
                'quantity.*' => 'integer|min:1',
            ]);

            $transaction = new Transaction();
            $transaction->customer_name = $request->customer_name;
            $transaction->transaction_date = now();
            $transaction->total_price = 0; // akan diupdate setelah looping
            $transaction->save();

            $totalPrice = 0;

            foreach ($request->food_id as $index => $foodId) {
                $food = Food::find($foodId);
                $qty = $request->quantity[$index];
                $subtotal = $food->price * $qty;

                $transaction->foods()->attach($foodId, [
                    'quantity' => $qty,
                    'price_at_order' => $food->price
                ]);

                $totalPrice += $subtotal;
            }

            $transaction->total_price = $totalPrice;
            $transaction->save();

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
