<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 30);
            $table->string('description', 45);
            $table->string('color', 45);
            $table->string('size', 15);
            $table->string('sku', 8)->nullable();
            $table->string('upc', 12)->nullable();
            
            $table->integer('assor_quant');
            $table->integer('sold_quant');
            $table->integer('total_quant');
            $table->decimal('price', 10, 3);
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id'); 

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
            
        $table->foreign('type_id') 
            ->references('id')
            ->on('types')
            ->onDelete('cascade');
    
           
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('products');
    }
};
