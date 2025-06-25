<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_ten', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serverID');
            $table->char('uID', 64);
            $table->integer('roleID');
            $table->integer('giftID');
            $table->dateTime('updatetime');
            $table->integer('state')->default(0);

            $table->index('state', 'state_idx');
            $table->index(['uID', 'giftID', 'state'], 'only_idx');
            $table->index(['uID', 'giftID', 'updatetime', 'state'], 'day_idx');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_ten');
    }
}
