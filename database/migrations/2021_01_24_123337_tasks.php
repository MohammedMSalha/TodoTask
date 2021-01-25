<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author Mohammed M.Salha
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('cat_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('desc');
            $table->text('tags')->nullable();
            $table->date('due_date');
            $table->timestamps();
            $table->foreign('cat_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @author Mohammed M.Salha
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
