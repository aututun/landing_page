<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSpecialActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_special_activity', function (Blueprint $table) {
            $table->integer('rid')->default(0);
            $table->integer('groupid')->default(0);
            $table->integer('actid')->default(0);
            $table->integer('purchaseNum')->default(0);
            $table->integer('countNum')->default(0);
            $table->smallInteger('active')->default(0);
            $table->unique(['rid', 'groupid', 'actid'], 'rid_groupid_actid');
            $table->index('rid');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_special_activity');
    }
}
