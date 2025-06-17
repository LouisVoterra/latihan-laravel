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

     public function getEditForm(Request $request)
     {
        $id = $request->id;
        $data =  Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('category.getEditForm', compact('data'))->render()),200
        );  
     }

     public function getEditFormB(Request $request)
     {
        $id = $request->id;
        $data =  Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('category.getEditFormB', compact('data'))->render()),200
        );  
     }

    public function saveDataUpdate(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        $data->name = $request->name;
        $data->save();
        return response()->json(array('status' => 'oke', 'msg' => 'type data is up-to-date !'), 200);
    }

    public function deleteData(Request $request){
        $id = $request->id;
        $data = Category::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Data has been deleted!'
        ), 200);
    }


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
    public function update(Request $request, Category $listkategori)
    {
        $listkategori->name = $request->name;
        $listkategori->save();

        return redirect()->route('listkategori.index')->with('success', 'Succesfully updated data!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $listkategori)
    {
       try{
            $listkategori->delete();
            return redirect()->route('listkategori.index')->with('success', 'Succesfully deleted data!');
       }catch(\PDOException $ex){
            $message = "Make sure there is no related data before delete it. Please contact Administrator to know more about it.";
            return redirect()->route('listkategori.index')->with('status', $msg);
       }
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
