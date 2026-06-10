<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // no arquivo gerado em database/migrations/
public function up()
{
    Schema::table('aluno', function (Blueprint $table) {
        $table->string('telefone', 100)->nullable()->after('endereco');
    });
}

public function down()
{
    Schema::table('aluno', function (Blueprint $table) {
        $table->dropColumn('telfone');
    });
}
};
