<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRolegmailRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_rolegmail_record', function (Blueprint $table) {
            $table->integer('roleid');
            $table->integer('gmailid');
            $table->integer('mailid')->default(0);

            $table->primary(['roleid', 'gmailid']);
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_rolegmail_record');
    }
}
