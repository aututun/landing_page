<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTHuodongawardrolehistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_huodongawardrolehist', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->unsignedInteger('zoneid')->default(1);
            $table->unsignedInteger('activitytype')->default(0);
            $table->char('keystr', 128)->default('');
            $table->unsignedInteger('hasgettimes')->default(0);
            $table->dateTime('lastgettime')->default('1900-01-01 12:00:00');
            $table->index(['rid', 'activitytype', 'keystr'], 'idx_rid_activitytype_keystr');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_huodongawardrolehist');
    }
}
