<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftcodeUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giftcode_usage', function (Blueprint $table) {
            $table->id();
            $table->string('giftcode'); // Reference to the 'code' column in the 'giftcode' table
            $table->unsignedBigInteger('user_id'); // ID of the user who used the gift code
            $table->foreign('user_id')->references('id')->on('users'); // Foreign key constraint
            $table->string('server_id')->nullable(); // Server ID associated with the usage
            $table->timestamp('used_at'); // Timestamp of when the code was used
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giftcode_usage');
    }
}
