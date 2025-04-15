<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;



class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
        //
        $makanans = Food::all();
        $kategori = Category::with('foods')->get();
        

        //method1
        return view('foods.index',compact('makanans','kategori'));

        

        //method2
        // return view('foods.index',['foods'=> $allfood]);


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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($food)
    {
        //show function berfungsi untuk menampilkan detail object berdasarkan id object, sehingga show automatically required 1 parameter

        $current_food = Food::find($food);
        dd($current_food);
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
