<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTResourcegetinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_resourcegetinfo', function (Blueprint $table) {
            $table->integer('roleid')->default(0);
            $table->integer('type')->default(0);
            $table->integer('leftcount')->default(0);
            $table->integer('exp')->default(0);
            $table->integer('bandmoney')->default(0);
            $table->integer('mojing')->default(0);
            $table->integer('chengjiu')->default(0);
            $table->integer('shengwang')->default(0);
            $table->integer('zhangong')->default(0);
            $table->integer('bangzuan');
            $table->integer('xinghun');
            $table->integer('hasget')->default(0);
            $table->integer('yuansufenmo')->default(0);

            $table->primary(['roleid', 'type']);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_resourcegetinfo');
    }

}
