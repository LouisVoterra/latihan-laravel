<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;





class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $kategori = Category::all();
        

        //method1
        return view('category.index',compact('kategori'));
       
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->name = $request->get('name');
        $data->save();

        return redirect()->route('listkategori.index')->with('success', 'Succesfully added data!');

        
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
    public function edit(Category $listkategori)
    {
        return view('category.edit', compact('listkategori'));
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

    public function showInfo(){

      

       return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-info'>
            Tutorial membuat boostrap stripe ada di https://getbootstrap.com/docs/4.0/content/tables/ .'</div>"
        ), 200);

    }

    public function showHighestFood(){

        $highestFoodCategory = Category::withCount('foods') //ambil class Category, kemudian menggunakan withCount untuk menghitung jumlah food
        ->orderByDesc('foods_count') // urutkan berdasarkan foods_count secara descending
        ->first(); // ambil data pertama yang sudah di urutkan


        return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-danger'>
            The highest amount of food is  <b>'".$highestFoodCategory->name."</b></div>"
        ), 200);


    }

    public function showListFoods()
    {
        $category = Category::find($_POST['idcat']);
        $name = $category->name;
        $data = $category->foods;
        return response()->json(array(
                'status' => 'oke',
                'title' => $name.' Food List',
                'body' => view('category.showListFoods', compact('name', 'data'))->render()
              ), 200);
    }


   

}
