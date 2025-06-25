<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTConsumelogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_consumelog', function (Blueprint $table) {
            $table->integer('rid');
            $table->integer('amount');
            $table->integer('ctype')->default(1);
            $table->dateTime('cdate');

            $table->index(['rid', 'cdate'], 'rid_cdata');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_consumelog');
    }

}
