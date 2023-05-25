<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->char('kode_informasi',6)->unique();
            $table->string('judul')->unique();
            $table->string('slug')->unique();
            $table->date('tanggal');
            $table->text('deskripsi')->nullable();
            $table->string('jenis_informasi',50);
            $table->string('penerbit_informasi',50);
            $table->enum('status',['Draf','Publik']);
            $table->foreignId('division_id')->nullable()->constrained();
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
        Schema::dropIfExists('information');
    }
}
