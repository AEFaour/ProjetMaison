<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'category_id'
    ];

    // ici le setter va récupérer la valeur à insérer en base de données
    // nous pourrons alors vérifier sa valeur avant que le modèle n'insère la donnée en base de données
    public function setCategoryIdAttribute($value){
       
        if($value == 0){
            $this->attributes['category_id'] = null;
        }else{

            $this->attributes['category_id'] = $value;
        }

    }
    public function category(){
        return $this->belongsTo(Category::class);
   }
}
