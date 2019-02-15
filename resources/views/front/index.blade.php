@extends('layouts.master')

@section('content')
<div class="container">
<h1>Les articles {{$Definition}}</h1>
{{$products->links()}}

<div class="row">
@forelse($products as $product)
        <div class="col-md-4">
            <!-- pour que les articles soient cliquables-->
          <div class="card mb-4 shadow-sm article-expo">
              <a href="{{url('product', $product->id)}}">
            <img class="bd-placeholder-img card-img-top" src="{{asset('images/'.$product->url_image)}}"/>
            <div class="card-body">
              <p class="card-text">{{$product->title}}<br>
                 Prix : {{$product->price}}</p>
            </div>
          </div>
          </a>
        </div>
    @empty<p>Pas d'article disponible</p>
@endforelse


</div>
{{$products->links()}}
</div>
@endsection 


