<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTFamilyrequestjoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_familyrequestjoin', function (Blueprint $table) {
            $table->id('ID');
            $table->integer('RoleID')->nullable();
            $table->string('RoleName', 200)->nullable();
            $table->integer('RoleFactionID')->nullable();
            $table->integer('FamilyID')->nullable();
            $table->integer('RoleLevel')->nullable();
            $table->integer('RolePrestige')->nullable();
            $table->dateTime('TimeRequest')->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_familyrequestjoin');
    }
}
