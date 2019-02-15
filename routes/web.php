<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');  
});
//écrire une route d'essai
Route::get('/', function () {
    return "Projet Maison";  
});

Route::get('/', 'FrontController@index');

Route ::get('product/{id}', function($id){
    return  App\Product::find($id);  
});

Route::get('search/{product1}/{product2}', function(string $product1, string $product2){
    $search = $product1 . " ". $product2;
    $result = App\Book::where('title', 'like', "$search%")->get();

    if(count($result) == 0){
        return "sorry not found";
    }
});   

Route::get('user/{title}/{id}', function (string $title, int $id) {
    
})->where(['id' => '[0-9]+', 'title' => '[a-z]+' ]);;
// retourne tous les produits

Route::get('products', function () {
    //$params = $slug; // déclarer indéfinie variable
    return App\Product::find($id);  
});*/


Route::get('/', 'FrontController@index')->name('home');

# Retourne de l'ensemble des livres de notre application "book"
// Route::get('products', function() {
    // return App\Product::all();
// });

//retourne une source en fonction de son id
//Route::get('product/{id}', function($id){
   // return App\Product::find($id);
//});

Route::get('category/1', 'FrontController@woman')->where(['id' => '[0-9]+']);
Route::get('category/2', 'FrontController@man')->where(['id' => '[0-9]+']);
// Pour afficher tous les produits d'un categorie
Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);
//Route::get('product/{category_id}', 'FrontController@showProductByCategory')->where(['category_id' => '[0-9]+']);
Route::get('product/{code}', 'FrontController@category')->where(['code' => '[0-9]+']);
Route::get('sale', 'FrontController@sale');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/product', 'ProductController')->middleware('auth'); //sécuriser les routes du contrôleur de ressources
