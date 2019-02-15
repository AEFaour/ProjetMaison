<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ; //Importer l'allias de la class
use App\Category; 



class FrontController extends Controller
{
      
    protected $paginate = 6; //création de la pagination

    public function __construct(){

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }

    public function index() {
        $products=Product::paginate($this->paginate);
        return view('front.index', ['products' => $products, 'Definition' => '']);
    }

    public function show(int $id){

        // vous ne récupérez qu'un seul livre 
        $product = Product::find($id);

        // que vous passez à la vue
        return view('front.show', ['product' => $product]);
    }
    public function woman(){
        // on récupère le modèle category.id 
        $products = Product::where('category_id', "1")->paginate(6);

        return view('front.index', ['products' => $products, 'Definition' => 'pour Femme']);
    }
    public function man(){
        // on récupère le modèle category.id 
        $products = Product::where('category_id', "2")->paginate(6);

        return view('front.index', ['products' => $products, 'Definition' => 'pour Homme']);
    }
    
    public function sale(){
        $products = Product::where('code', 'sale')->paginate(6);//renvoie une collection
       
        return view('front.index', ['products' => $products, 'Definition' =>'en soldes']);
        } 
}
