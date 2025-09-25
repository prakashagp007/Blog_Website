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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

        $table->string('blog_title');
        $table->string('blog_cat');
        $table->text('blog_description');
        $table->string('blog_location');
        $table->string('blog_thumbnail')->nullable();
        $table->string('blog_favimg')->nullable();
        $table->string('blog_favimg1')->nullable();
        $table->string('blog_favimg2')->nullable();
        $table->string('blog_favimg3')->nullable();
        $table->longText('blog_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
