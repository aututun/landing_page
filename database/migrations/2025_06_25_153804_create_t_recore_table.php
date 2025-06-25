<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRecoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_recore', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('RoleID')->nullable();
            $table->string('RoleName', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->integer('RecoryType')->nullable();
            $table->dateTime('DateRecore')->nullable();
            $table->integer('ValueRecore')->nullable();
            $table->integer('ZoneID')->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_recore');
    }

}
