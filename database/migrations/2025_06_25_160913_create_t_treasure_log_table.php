<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTreasureLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_treasure_log', function (Blueprint $table) {
            $table->dateTime('time');
            $table->integer('role')->default(0);
            $table->integer('dice')->default(0);
            $table->integer('superdice')->default(0);
            $table->integer('movenum')->default(0);

            $table->primary('time');
        });
    }

    public function down(): void {
        Schema::connection('mysql_game')->dropIfExists('t_treasure_log');
    }
}
