use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<?php


return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('empresas_conveniadas', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->string('cnpj')->unique();
            $table->date('vig_inicial');
            $table->date('vig_final');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas_conveniadas');
    }
};