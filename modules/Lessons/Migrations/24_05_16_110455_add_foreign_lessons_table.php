<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->integer('video_id')->unsigned()->change();
            $table->foreign('video_id')->references('id')->on('videos')
                ->nullOnDelete();
            $table->integer('document_id')->unsigned()->change();
            $table->foreign('document_id')->references('id')->on('documents')
                ->nullOnDelete();
            $table->integer('parent_id')->unsigned()->change();
            $table->foreign('parent_id')->references('id')->on('lessons')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {

            $table->dropForeign('lessons_video_id_foreign');
            $table->dropForeign('lessons_document_id_foreign');
            $table->dropForeign('lessons_parent_id_foreign');

        });
    }
};
