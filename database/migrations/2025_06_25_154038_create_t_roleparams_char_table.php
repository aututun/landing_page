<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRoleparamsCharTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_roleparams_char', function (Blueprint $table) {
            $table->integer('rid');
            $table->integer('idx');

            for ($i = 0; $i <= 9; $i++) {
                $table->char("v{$i}", 128)->collation('ascii_general_ci')->default('');
            }

            $table->primary(['rid', 'idx']);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_roleparams_char');
    }

}
