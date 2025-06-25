<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMarryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_marry', function (Blueprint $table) {
            $table->integer('roleid')->default(0);
            $table->integer('spouseid')->default(-1)->nullable();
            $table->integer('marrytype')->nullable();
            $table->integer('ringid')->nullable();
            $table->integer('goodwillexp')->nullable();
            $table->integer('goodwillstar')->nullable();
            $table->integer('goodwilllevel')->nullable();
            $table->integer('givenrose')->nullable();
            $table->string('lovemessage', 128)->collation('utf8mb3_general_ci')->nullable();
            $table->integer('autoreject')->nullable();
            $table->dateTime('changtime');

            $table->primary('roleid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_marry');
    }

}
