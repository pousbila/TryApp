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
        Schema::table('users', function (Blueprint $table) {

            // Ajout du champ is-verified dans la table users
            $table->integer('is-verified')->default(0);
            // Ajout du champ activation_code dans la table users
            $table->string('activation_code',255)->nullable();
            // Ajout du champ activation_code dans la table users
            $table->string('activation_token',255)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Suppression des colonnes ajoutées dans up() au cas ou je veux revenir en arrière avec roolback
            $table->dropColumn(['is_verified', 'activation_code', 'activation_token']);

        });
    }
};
