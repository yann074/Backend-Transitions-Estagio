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
        Schema::create('transitions', function (Blueprint $table) {
            $table->id();
            $table->datetime("date_criated");
            $table->boolean("type");
            $table->decimal("value", 10, 2);
            $table->string("categoria");
            $table->string("descricao");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_movements');
    }
};
