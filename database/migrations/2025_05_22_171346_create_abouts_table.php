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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('desig')->nullable();
            $table->integer('phn_number')->nullable();
            $table->text('short_text')->nullable();
            $table->text('image')->nullable();
            $table->string('gmail')->nullable();
            $table->string('address')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twiter_link')->nullable();
            $table->string('linkdin_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('abouts');
    }
};
