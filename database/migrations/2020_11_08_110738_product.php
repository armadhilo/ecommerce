<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->string('product_name', 50);
            $table->longText('description');
            $table->text('image');
            $table->string('pic', 100)->nullable();
            $table->string('mitra',100)->nullable();
            $table->string('nidn',10)->nullable();
            $table->integer('jml_halaman')->nullable();
            $table->string('penerbit',100)->nullable();
            $table->integer('status')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
