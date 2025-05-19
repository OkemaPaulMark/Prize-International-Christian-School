<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_newsletters_table.php

public function up()
{
    Schema::create('newsletters', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('image'); // store path to image
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletters');
    }
};
