<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTUserActiveInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_user_active_info', function (Blueprint $table) {
            $table->string('Account', 64);
            $table->date('createTime');
            $table->integer('seriesLoginCount')->default(0);
            $table->date('lastSeriesLoginTime');

            $table->primary('Account');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_user_active_info');
    }
}
