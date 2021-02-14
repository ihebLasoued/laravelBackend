<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('quantity')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('produit_id')->unsigned()->index();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')->onDelete('cascade');
            $table->foreign('produit_id')
            ->references('id')
            ->on('produits')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
