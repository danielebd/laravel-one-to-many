<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creazione della FK all'interno della tabella projects
        Schema::table('projects', function (Blueprint $table) {

            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            $table->foreign('type_id')->references('id')->on('types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            //eliminazione relazione
            $table->dropForeign(['type_id']);

            //eliminazione colonna
            $table->dropColumn('type_id');

        });
    }
};
