<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBulletinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_bulletin', function (Blueprint $table) {
            $table->id(); // AUTO_INCREMENT PRIMARY KEY
            $table->char('msgid', 32)->collation('utf8mb3_general_ci');
            $table->unsignedInteger('toplaynum')->default(0);
            $table->string('bulletintext', 255)->collation('utf8mb3_general_ci');
            $table->dateTime('bulletintime')->default('1900-01-01 12:00:00');

            $table->unique('msgid', 'msgid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_bulletin');
    }

}
