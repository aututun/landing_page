<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_pet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->nullable();
            $table->integer('res_id')->nullable();
            $table->string('name', 255)->collation('utf8mb3_general_ci')->nullable();
            $table->integer('level')->nullable();
            $table->integer('exp')->nullable();
            $table->string('skills', 255)->collation('utf8mb3_general_ci')->nullable();
            $table->integer('enlightenment')->nullable();
            $table->string('equips', 255)->collation('utf8mb3_general_ci')->nullable();
            $table->integer('poten_templ_id')->nullable();
            $table->integer('joyful')->nullable();
            $table->tinyInteger('in_mail')->default(0);
            $table->tinyInteger('mt')->default(0);
            $table->tinyInteger('bk')->default(0);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_pet');
    }

}
