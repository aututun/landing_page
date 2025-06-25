<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_skills', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('rid')->default(0);
            $table->unsignedInteger('skillid')->default(0);
            $table->unsignedInteger('skilllevel')->default(0);
            $table->bigInteger('lastusedtick')->default(0);
            $table->integer('exp');
            $table->integer('cooldowntick');
            $table->unique(['rid', 'skillid'], 'rid_skillid');
            $table->index('rid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_skills');
    }
}
