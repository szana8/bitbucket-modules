<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->string('application_name', 150)->unique();
            $table->string('application_short_name', 50)->unique();
            $table->string('basepath', 50)->unique();
            $table->string('version', 15)->nullable();
            $table->string('author', 50)->nullable();
            $table->string('author_email', 150)->nullable();
            $table->enum('need_authentication', array('Y', 'N'))->default('Y');
            $table->enum('enabled', array('Y', 'N'))->default('Y');
            $table->timestamps();
            $table->softDeletes();

            $table->index('menu_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
