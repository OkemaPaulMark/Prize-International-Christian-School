<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('board_members', function (Blueprint $table) {
            $table->text('bio')->nullable();
        });
    }

    public function down()
    {
        Schema::table('board_members', function (Blueprint $table) {
            $table->dropColumn('bio');
        });
    }

};
