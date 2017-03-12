<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLovValuesTable
 */
class CreateLovValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_of_values_lookups', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('list_of_values_id')->unsigned();
            $table->foreign('list_of_values_id')->references('id')->on('list_of_values')->onDelete('cascade');
            $table->string('value', 45)->index();
            $table->timestamps();
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
        Schema::table('list_of_values_lookups', function($table) {
            $table->dropForeign('list_of_values_lookups_list_of_values_id_foreign');
        });

        Schema::dropIfExists('list_of_values_lookups');
    }
}
