<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('website')->nullable();
            $table->timestamps();
        });

        // Adicionando a Foreign Key na tabela domains
        Schema::table('domains', function (Blueprint $table) {
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });

        Schema::dropIfExists('companies');
    }
}
