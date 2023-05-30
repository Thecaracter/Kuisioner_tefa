<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_quisioner', function (Blueprint $table) {
            $table->increments('id');
            $table->text('pertanyaan');
            $table->timestamps();
        });

        Schema::table('detail_quisioner', function (Blueprint $table) {
            $table->unsignedInteger('quisioner_id');
            $table->foreign('quisioner_id')->references('id')->on('quisioner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_quisioner', function (Blueprint $table) {
            $table->dropForeign('detail_quisioner_quisioner_id_foreign');
            $table->dropColumn('quisioner_id');
        });

        Schema::dropIfExists('detail_quisioner');
    }
};