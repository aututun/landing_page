<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MoneyLog', function (Blueprint $table) {
            $table->increments('id'); // Primary key
            $table->unsignedInteger('UserID'); // User ID
            $table->unsignedInteger('ServerId'); // Server ID
            $table->bigInteger('KTCoin'); // Số lượng KTCoin giao dịch
            $table->bigInteger('KTCoinBefore')->nullable(); // Số KTCoin trước giao dịch
            $table->bigInteger('KTCoinAfter')->nullable(); // Số KTCoin sau giao dịch
            $table->unsignedInteger('AddBy')->nullable(); // User ID người thực hiện thêm
            $table->boolean('IsDone')->default(0); // Trạng thái hoàn thành
            // Cột AddedDate có thể được thay thế bằng created_at
            $table->timestamps(); // Thêm created_at và updated_at

            // Thêm foreign key constraints
            $table->foreign('UserID')->references('ID')->on('LoginTables')->onDelete('cascade');
            $table->foreign('AddBy')->references('ID')->on('LoginTables')->onDelete('set null'); // Nếu AddBy có thể bị xóa
            // $table->foreign('ServerId')->references('nServerID')->on('ServerListsIos')->onDelete('cascade'); // Cần kiểm tra model Server
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MoneyLog');
    }
}