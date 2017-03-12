<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateIssueTable
 */
class CreateIssueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('issue_number')->index();
            $table->integer('assignee_id')->nullable()->default(null)->unsigned();
            $table->foreign('assignee_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('reporter_id')->unsigned();
            $table->foreign('reporter_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('issue_type', 45)->index();
            $table->string('summary', 255)->index();
            $table->longText('description')->nullable();
            $table->text('enviroment')->nullable()->default(null);
            $table->string('priority', 255)->nullable()->default(null);
            $table->string('score', 45)->nullable()->default(null);
            $table->string('resolution', 255)->nullable()->default(null);
            $table->string('issue_status', 255);
            $table->dateTime('resolution_date')->nullable()->default(null);
            $table->integer('time_original_estimate')->nullable()->default(0);
            $table->integer('time_estimate')->nullable()->default(0);
            $table->integer('time_spent')->nullable()->default(0);
            $table->integer('workflow_id')->nullable()->default(null)->index();
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
        Schema::table('issues', function($table) {
            $table->dropForeign('issues_assignee_id_foreign');
            $table->dropForeign('issues_project_id_foreign');
            $table->dropForeign('issues_reporter_id_foreign');
        });

        Schema::dropIfExists('issues');
    }
}
