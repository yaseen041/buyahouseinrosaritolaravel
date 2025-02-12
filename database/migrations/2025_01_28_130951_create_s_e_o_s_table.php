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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->string('fb_image');
            $table->string('fb_title');
            $table->text('fb_description');
            $table->string('twitter_title');
            $table->text('twitter_description');
            $table->string('twitter_image');
            $table->text('json_ld_code');
            $table->integer('author_id');
            $table->tinyInteger('status')->default(1)->comment('1=Published, 0=Draft');
            $table->date('publish_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
