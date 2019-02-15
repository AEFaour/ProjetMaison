@extends('layouts.master')

@section('content')

<div class="container">
<ol class="breadcrumb">
        <li><a href="{{url('/')}}">Notre Maison ></a></li>
</ol>
<div>
<div class="row"> 

    <div class="col-sm-2">
        <a href ="#"  >
            <img  src="{{asset('images/'.$product->url_image)}}"  class="rounded"></a>
            <img  src="{{asset('images/'.$product->url_image)}}"  class="rounded"></a>
            <img  src="{{asset('images/'.$product->url_image)}}"  class="rounded"></a>
    </div>


    <div class="col-lg-6">
            <a href="#" class="thumbnail">
            <img src="{{asset('images/'.$product->url_image)}}" class="rounded">
            </a>
    </div>


<div class="col-lg-2">
    <h3>{{$product->title}}</h3>
    <p>reference : {{$product->reference}}</p>
    <p>{{$product->price}} euros<p>

    <select id="size">
        
        <option value="size">Taille 46</option>
        <option value="size">Taille 48</option>
        <option value="size">Taille 50</option>
        <option value="size">Taille 52</option>
    </select>
</div> 

</div>

<div class="description">
Description : {{$product->description}}
</div>
</div>


@endsection 
