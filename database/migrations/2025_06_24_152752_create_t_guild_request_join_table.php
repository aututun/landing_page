<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGuildRequestJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_guild_request_join', function (Blueprint $table) {
            $table->increments('ID')->comment('Khóa chính');
            $table->integer('RoleID')->nullable();
            $table->string('RoleName', 255)->nullable();
            $table->integer('RoleFactionID')->nullable()->comment('ID phái của thằng xin vào');
            $table->bigInteger('RoleValue')->nullable()->comment('Tài phú của thằng xin vào');
            $table->dateTime('TimeRequest')->nullable()->comment('Thời gian nó xin vào');
            $table->integer('GuildID')->nullable()->comment('ID bang nos xin và');
            $table->integer('RoleLevel')->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_guild_request_join');
    }

}
