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
        Schema::create('detail_penyimpanan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('penyimpanan_id');
            $table->string('nama');
            $table->string('alamat');
            $table->integer('umur');
            $table->string('no_telepon');
            $table->unsignedInteger('posisi_id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->unsignedInteger('detail_quisioner_id');
            $table->integer('jawaban');
            $table->timestamps();
        });

        Schema::table('detail_penyimpanan', function (Blueprint $table) {
            $table->foreign('penyimpanan_id')->references('id')->on('penyimpanan');
            $table->foreign('posisi_id')->references('id')->on('posisi');
            $table->foreign('perusahaan_id')->references('id')->on('perusahaan');
            $table->foreign('detail_quisioner_id')->references('id')->on('detail_quisioner');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_penyimpanan', function (Blueprint $table) {
            $table->dropForeign('detail_penyimpanan_penyimpanan_id_foreign');
            $table->dropForeign('detail_penyimpanan_posisi_id_foreign');
            $table->dropForeign('detail_penyimpanan_perusahaan_id_foreign');
            $table->dropForeign('detail_penyimpanan_detail_quisioner_id_foreign');
        });

        Schema::dropIfExists('detail_penyimpanan');
    }
};