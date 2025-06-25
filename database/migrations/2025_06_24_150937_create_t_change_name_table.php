<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTChangeNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_change_name', function (Blueprint $table) {
            $table->id(); // unsigned AUTO_INCREMENT PRIMARY KEY
            $table->integer('roleid');
            $table->string('oldname', 64)->default('')->collation('utf8mb3_general_ci');
            $table->string('newname', 64)->default('')->collation('utf8mb3_general_ci');
            $table->tinyInteger('type')->default(0);
            $table->integer('cost_diamond')->default(0);
            $table->dateTime('time')->nullable();

            $table->index('roleid', 'key_roleid');
            $table->index('oldname', 'key_oldname');
            $table->index('newname', 'key_newname');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_change_name');
    }
}
