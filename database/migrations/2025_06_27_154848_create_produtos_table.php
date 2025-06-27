<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("pessoa", function (Blueprint $table) {
            $table->integerIncrements("cd_pessoa");
            $table->string("nm_pessoa", 100);
            $table->string("nm_email", 120);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("pessoa");
    }
};
