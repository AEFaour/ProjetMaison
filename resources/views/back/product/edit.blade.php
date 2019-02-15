@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                
                <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}

                    <h1>Modifier un article</h1>
                    <div class="form">

                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" value="{{$product->title}}" class="form-control" id="title"
                                   placeholder="Titre du produit">
                            @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="price">Description :</label>
                            <textarea type="text" name="description"class="form-control" id="exampleFormControlTextarea1" rows="5">{{$product->description}}</textarea>
                            @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                        </div>
                    
                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input type="text" name="price" value="{{$product->price}}" class="form-control" id="price"
                                   placeholder="Titre du produit">
                            @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                        </div>
                        <div class="form-select">
                          <label for="category">Category :</label>
                           <select id="category" name="category_id" value="{{$product->category->id}}" class="form-control">
                             <option value="0" {{ is_null(old('category_id'))? 'selected' : '' }} ></option>
                            @foreach($categories as $id => $title)
                              <option value="{{$id}}">{{$title}}</option>
                             @endforeach
                           </select>
                        </div>
                        <div class="form-select">
                          <label for="size">Taille:</label>
                           <select id="size" class="form-control">
                           <option value="size">   </option>
                           <option value="size"> 46</option>
                           <option value="size"> 48</option>
                           <option value="size"> 50</option>
                           <option value="size"> 52</option>
                          </select>
                         </div>
                         <div class="input-file">
                          <label for="file">Image :</label>
                         <input class="file" type="file" name="picture">
                         @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
                        </div>
                    </div>

            </div><!-- #end col md 6 -->

            <div class="col-md-6">
               
                 <div class="input-radio">
            <h2>Status</h2>
            <input type="radio" @if(old('status')=='published') checked @endif name="status" value="published" checked> Publier<br>
            <input type="radio" @if(old('status')=='draft') checked @endif name="status" value="draft" > Brouillon<br>
            </div>
            <div class="form-select">
                     <label for="code">Code produit:</label>
                        <select id="code" class="form-control">
                          
                          
                          <option value="code">   </option>
                          <option value="code"> Soldes</option>
                          <option value="code"> New</option>
                         </select>
                </div>

                <div class="form-group">
                            <label for="reference">Référence produit :</label>
                            <input type="text" name="reference" value="{{$product->reference}}" class="form-control" id="title"
                                   placeholder="Référence du produit">
                        @if($errors->has('reference')) <span class="error">{{$errors->first('reference')}}</span>@endif
                </div>
            
            </div><!-- #end col md 6 -->
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Modifiez un article</button>
                <div class="input-radio">
            </form>
        </div>
@endsection