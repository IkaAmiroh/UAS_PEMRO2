<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom role ke tabel users.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // kolom role bertipe string, default 'user'
            $table->string('role')->default('user')->after('password');
        });
    }

    /**
     * Rollback kolom role.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
