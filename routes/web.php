<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('foo', function () { //foo itu URI, jdi bebas aksesnya, berarti klo run di local maka URL nya http://127.0.0.1:8000/foo

//     return 'Hello World';
// });

// Route::get('welcome', function () {
//     return view('welcome');
// });

// Route::view('/welcome', 'welcome');

// Route::view('/welcome', 'coba', ['name' => 'Taylor']);  

// Route::get('/user/{id}', function (string $id) {
//     return 'User '.$id;
// });

// Route::get('/user/{name?}', function (?string $name = 'John') {
//     return $name;
// });

// Route::get('user/{id}/profile', function ($id) {
//     //
// })->name('profile');

// $url = route('profile', ['id' => 1]);

//1




// praktik 1, praktik routing

Route::get('/welcome', function(){
    return "Selamat Datang";
});

Route::get('/before_order', function(){
    return "Pilih DINE IN atau Take Away";
});

Route::get('/menu/{method}', function(string $method){
    if($method == 'dinein'){
        return "Daftar menu dine in";
    }
    else if($method == 'takeaway'){
        return "Daftar menu take away";
    }
});


Route::get('/admin/{choose}', function(string $choose){
    if($choose == "categories"){
        return "Portal Manajemen: Daftar Kategori";
    }
    else if($choose == "order"){
        return "Portal Manajemen: Daftar Order";
    }
    else if($choose == "members"){
        return "Daftar Member";
    }
});




Route::get('greeting', function(){
    return view('coba', ['name' => 'Louis Dewa Voterra']);
});

Route::get('admins/member', function() {
    return view ('datamember');
})->name('listmember');


//praktik 2 --> praktik Bootstrap + Routing

Route::get('/welcome', function(){
    return view("utama");
});

Route::get('/before_order', function(){
    return view("before_order");
});

Route::get('/menu/{method}', function(string $method){
    if($method == "dinein"){
        return view("dinein");
    }
    else if($method == "takeaway"){
        return view("takeaway");
    }
});



Route::resource('listmakanan',FoodController::class);
Route::resource('listkategori',CategoryController::class);

Route::post("category/showInfo",[CategoryController::class,'showInfo'])->name('category.showInfo');
Route::post("category/showHighestFood",[CategoryController::class,'showHighestFood'])->name('category.showHighestFood');


Route::post("/category/showListFoods",
            [CategoryController::class, 'showListFoods'])
        ->name("category.showListFoods");




