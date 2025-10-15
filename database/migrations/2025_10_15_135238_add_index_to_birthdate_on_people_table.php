<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('people', function (Blueprint $table) {
            // birthdate sütununa B-tree index ekle
            $table->index('birthdate');

            // Opsiyonel olarak composite index de ekleyebiliriz
            // $table->index(['birthdate', 'gender']);
        });
    }

    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            // Index'i kaldır
            $table->dropIndex(['birthdate']);
        });
    }
};
