@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-6">
            

         <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         
         <h1>Ajouter un article</h1>     
                    <div class="form">
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" value="" class="form-control" id="title"
                                   placeholder="Titre du produit">
                            @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="price">Description :</label>
                            <textarea type="text" name="description"class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input type="text" name="price" value="" class="form-control" id="price"
                                   placeholder="Prix du produit">
                            @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                        </div>
                        <div class="form-select">
                          <label for="category">Category :</label>
                           <select id="category" name="category_id" class="form-control">
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
                 <h2>Statut</h2>
                 <input type="radio" name="status" value="published" checked> Publié<br>
                 <input type="radio" name="status" value="draft" checked> Brouillon<br>
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
                            <input type="text" name="reference" value="" class="form-control" id="title"
                                   placeholder="Référence du produit">
                        @if($errors->has('reference')) <span class="error">{{$errors->first('reference')}}</span>@endif
                </div>
           
            </div><!-- #end col md 6 -->
                <div>
                     <button type="submit" class="btn btn-primary">Ajouter un Article</button>
                </div>
         </form>
        </div>
    
@endsection
