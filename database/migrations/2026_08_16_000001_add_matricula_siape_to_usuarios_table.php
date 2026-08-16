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
        Schema::table('usuarios', function (Blueprint $table) {
            if (!Schema::hasColumn('usuarios', 'matricula')) {
                $table->string('matricula')->nullable()->after('cpf');
            }

            if (!Schema::hasColumn('usuarios', 'siape')) {
                $table->string('siape')->nullable()->after('matricula');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (Schema::hasColumn('usuarios', 'siape')) {
                $table->dropColumn('siape');
            }

            if (Schema::hasColumn('usuarios', 'matricula')) {
                $table->dropColumn('matricula');
            }
        });
    }
};
