<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCodeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GiftCodeLogs', function (Blueprint $table) {
            $table->increments('ID'); // Khóa chính cho log
            $table->integer('ServerID'); // Server nào
            $table->string('Code'); // Code giftcode được sử dụng
            $table->unsignedInteger('UserIdGetCode'); // ID của người dùng đã sử dụng
            $table->integer('ActiveRole'); // Role của người dùng khi sử dụng
            // Có thể thêm thêm các cột khác như ItemList (đã nhận được), IP Address... nếu cần lưu trữ chi tiết hơn
            $table->timestamps(); // Thêm created_at và updated_at (thời gian sử dụng)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GiftCodeLogs');
    }
}