<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_demands', function (Blueprint $table) {
            $table->id();
            $table->char('kode_permohonan',13)->uninque();
            $table->string('nama',100);
            $table->char('nik',16);
            $table->string('email',50);
            $table->char('no_hp',12);
            $table->string('alamat',255);
            $table->string('permohonan_informasi');
            $table->string('tujuan');
            $table->string('gambar_ktp')->nullable();
            $table->enum('dapat',['Hardcopy','Softcopy']);
            $table->enum('beri',['Mengambil langsung','Email','Pos','Dikirim']);
            $table->enum('status',['Belum diproses','Diterima','Ditolak'])->default('Belum diproses');
            $table->string('keterangan')->nullable();
            $table->string('tahun',5)->nullable();
            $table->date('tanggal')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_demands');
    }
}
