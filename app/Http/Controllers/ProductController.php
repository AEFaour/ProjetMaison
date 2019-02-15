<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ; //Importer l'allias de la class
use App\Category; 

class ProductController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $paginate = 10; //création de la pagination
    public function __construct(){

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }
    public function index()
    {
        $products = Product::paginate($this->paginate);
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //créer des données categories
        $categories = Category::pluck('title', 'id')->all();

        return view('back.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pour utiliser l'objet validate
        $this->validate($request, [
        'title'=>'required',
        'description'=>'required',
        'price'=>'required|numeric',
        'category_id'=>'integer',
        'size'=>'integer',
        'code'=>'required',
        'reference'=>'required',
        'status'=>'in:published,draft',
        ]);
        $product = Product::create($request->all());

        return redirect()->route('product.index')->with('message', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //éditer de resources 
        $product = Product::find($id);
        $categories = Category::pluck('title', 'id')->all();
         return view('back.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mettre à jour des données
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'category_id'=>'integer',
            'size'=>'integer',
            'code'=>'required',
            'reference'=>'required',
            'status'=>'in:published,draft',
            ]);

        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('product.index')->with('message','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //supprimer des données 
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'success delete');
    }
}
