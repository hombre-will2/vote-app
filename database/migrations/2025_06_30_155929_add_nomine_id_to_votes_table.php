<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->unsignedBigInteger('nomine_id')->after('categorie');

            $table->foreign('nomine_id')->references('id')->on('nomines')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign(['nomine_id']);
            $table->dropColumn('nomine_id');
        });
    }
};
