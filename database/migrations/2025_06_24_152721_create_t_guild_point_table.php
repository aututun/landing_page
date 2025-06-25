<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGuildPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_guild_point', function (Blueprint $table) {
            $table->integer('RoleID')->primary()->comment('RoleID là khóa chính');
            $table->integer('WeekID')->nullable()->comment('ID của tuần');
            $table->integer('WeekPoint')->nullable()->comment('Điểm cống hiến tuần');
            $table->integer('GuildID')->nullable()->comment('Của bang nào');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_guild_point');
    }

}
