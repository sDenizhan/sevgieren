<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->text('name_surname');
            $table->text('email');
            $table->longText('comment');
            $table->integer('rate')->default(0);
            $table->integer('status')->default(\App\Enums\Status::Passive->value);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('product_comments');
    }
};
