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
        Schema::create('sauces', function (Blueprint $table) {
            //Attributs
            $table->string('id')->primary();
            $table->string('userId')->references('id')->on('utilisateurs');
            $table->string('name');
            $table->string('manufacturer');
            $table->string('description');
            $table->string('mainPepper');
            $table->string('imageUrl');
            $table->integer('heat');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->json('usersLiked')->nullable(); //Table d'utilisateurs
            $table->json('usersDisliked')->nullable(); //Table d'utilisateurs

            $table->timestamps();
        });

        //Ajout d'une contrainte pour heat
        DB::statement('ALTER TABLE sauces ADD CONSTRAINT check_heat CHECK (heat >= 1 AND heat <= 10)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauces');
    }
};
