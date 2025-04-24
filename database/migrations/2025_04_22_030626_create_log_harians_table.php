<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogHariansTable extends Migration
{
    public function up()
    {
        Schema::create('log_harians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal');
            $table->text('deskripsi');
            $table->string('file_bukti')->nullable();
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_harians');
    }
}