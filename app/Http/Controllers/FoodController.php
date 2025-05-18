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
       
        

        //method1
        return view('foods.index',compact('makanans'));
        

        

        //method2
        // return view('foods.index',['foods'=> $allfood]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

        $kategori = Category::all();

        return view('foods.menu',compact('kategori'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Food();
        $data->name = $request->get('name');
        $data->description = $request->get('description');
        $data->price = $request->get('price');
        $data->category_id = $request->get('category_id');
        $data->nutrition_fact = $request->get('nutrition_fact');
        $data->save();
        return redirect()->route('listmakanan.index')->with('success', 'Succesfully added data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($food)
    {
        //show function berfungsi untuk menampilkan detail object berdasarkan id object, sehingga show automatically required 1 parameter

        $current_food = Food::find($food);
        return view('foods.show',compact('current_food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $listmakanan)
    {
       $kategori = Category::all();
       return view('foods.edit', compact('listmakanan','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $listmakanan)
    {
        $listmakanan->name = $request->name;
        $listmakanan->description = $request->description;
        $listmakanan->nutrition_fact = $request->nutrition_fact;
        $listmakanan->price = $request->price;
        $listmakanan->category_id = $request->category_id;
        $listmakanan->save();

        return redirect()->route('listmakanan.index')->with('success', 'Succesfully updated data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $listmakanan)
    {
        try{
            $listmakanan->delete();
            return redirect()->route('listmakanan.index')->with('success', 'Succesfully deleted data!');
       }catch(\PDOException $ex){
            $message = "Make sure there is no related data before delete it. Please contact Administrator to know more about it.";
            return redirect()->route('listmakanan.index')->with('status', $msg);
       }
    }
}
