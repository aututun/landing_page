<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTWanmotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_wanmota', function (Blueprint $table) {
            $table->unsignedInteger('roleID')->default(0)->primary();
            $table->char('roleName', 32)->nullable();
            $table->bigInteger('flushTime')->default(0);
            $table->integer('passLayerCount')->default(0);
            $table->integer('sweepLayer')->nullable();
            $table->text('sweepReward')->nullable();
            $table->bigInteger('sweepBeginTime')->nullable()->default(0);
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_wanmota');
    }

}
