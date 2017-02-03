<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('parent_id')->nullable()->default(NULL);
            $table->integer('type');
            $table->string('name', 100);
            $table->integer('sequence')->default('-1');
            $table->enum('enabled', array('Y', 'N'))->default('Y');
            $table->timestamps();
            $table->softDeletes();

            $table->index('type');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
