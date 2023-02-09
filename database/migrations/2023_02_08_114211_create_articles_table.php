<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'articles',
            function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->enum('published_as', ['draft', 'scheduling', 'published'])->default('scheduling');
                $table->integer('author_id');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
