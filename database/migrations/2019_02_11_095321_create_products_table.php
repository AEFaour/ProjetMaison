<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); //clé primaire 
            $table->string('title', 120); // Varchar 120 
            $table->text('description')->nullable(); //Text Null
            $table->decimal('price',6,2); // Decimal equivalent column with a precison (total digits) and scale (decimal digits)
            $table->enum('size',array('46', '48', '50', '52')); //Enum équivalent column size
            $table->string('url_image', 200)->nullable(); // Varchar 200 pour url images
            $table->enum('status', array('published', 'draft'))->default('draft');//Enum équivalent column status : publié ou brouillon
            $table->enum('code', array('sale', 'new')); //Enum équivalent column status : solde ou new
            $table->string('reference', 100); // Varchar 100
            $table->timestamps(); // timestamps
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
