@extends('layouts.master')

@section('content')
@if(Session::has('message'))
<div class="alert">
    <p>{{Session::get('message')}}</p>
</div>
@endif


{{$products->links()}}

<table class="table table-striped">
<h1>Ajouter un article</h1>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Categorie</th>
            <th>Prix</th>
            <th>Statut</th>
            <th>Mettre à jour</th>
            <th>Supprimer</th>
            
        </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->category->title?? 'aucun category' }}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->status}}</td>
            <td>
            
            <a href="{{route('product.edit', $product->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            <input class="btn btn-secondary"type="submit" value="update" >
            </button></a>
            </td>
            <td>
            <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input class="btn btn-danger" type="submit" value="delete" >
                
            </form>
            


            </td>
        </tr>
    @empty
        aucun titre ...
    @endforelse
    </tbody>
    
</table>
<p><a href="{{route('product.create')}}"><button type="button" class="btn btn-primary btn-lg">Ajouter un article</button></a></p>
{{$products->links()}}
@endsection 
