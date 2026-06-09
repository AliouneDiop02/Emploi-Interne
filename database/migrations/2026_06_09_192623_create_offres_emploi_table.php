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
        Schema::create('offres_emploi', function (Blueprint $table) {
             $table->id();
            $table->string('titre');
            $table->string('entreprise');
            $table->string('ville')->nullable();
            $table->string('type_emploi')->default('Temps plein');
            $table->string('salaire')->nullable();
            $table->text('description')->nullable();
            $table->text('responsabilites')->nullable();
            $table->text('exigences')->nullable();
            $table->boolean('est_active')->default(true);
            $table->date('date_publication')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres_emploi');
    }
};
