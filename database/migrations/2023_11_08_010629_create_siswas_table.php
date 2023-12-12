<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('nis');
            $table->string('nama', 45);
            $table->text('alamat');
            $table->foreignId('kelas_id')->constrained('kelas');
            // $table->string('kelas', 45);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 45);
            $table->char('no_telp_ortu', 15);
            $table->string('agama', 45);
            $table->integer('tahun_angkatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
