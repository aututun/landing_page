<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTDailytasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_dailytasks', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->integer('huanid')->default(0);
            $table->char('rectime', 32)->collation('utf8mb3_general_ci');
            $table->integer('recnum')->default(0);
            $table->integer('taskClass')->default(0);
            $table->integer('extdayid')->default(0);
            $table->integer('extnum')->default(0);

            $table->unique(['rid', 'taskClass'], 'rid_taskClass');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_dailytasks');
    }

}
