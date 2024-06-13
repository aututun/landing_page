<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddColumnDeleteGiftcode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('GiftCodes', function (Blueprint $table) {
            $table->integer('Deleted')->default(0);
            DB::statement("alter table [GiftCodes] alter column [UserName] nvarchar(500) null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('GiftCodes', function (Blueprint $table) {
            $table->dropColumn('Deleted');
        });
    }
}
