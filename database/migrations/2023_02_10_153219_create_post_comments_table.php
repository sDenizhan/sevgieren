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
        Schema::create('post_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->text('name_surname');
            $table->text('email');
            $table->longText('message');
            $table->tinyInteger('is_new')->default(0); //0 Yeni 1 Eski
            $table->tinyInteger('status')->default(0); // 0 Pasif 1 Aktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('post_comments');
    }
};
