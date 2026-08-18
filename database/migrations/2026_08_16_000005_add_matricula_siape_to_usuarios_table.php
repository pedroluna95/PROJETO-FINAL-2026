<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (! Schema::hasColumn('usuarios', 'matricula')) {
                $table->string('matricula')->nullable()->after('atribuicao');
            }
            if (! Schema::hasColumn('usuarios', 'siape')) {
                $table->string('siape', 20)->nullable()->after('matricula');
            }
        });
    }

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
