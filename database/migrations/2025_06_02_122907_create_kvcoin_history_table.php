<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKvcoinHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KVcoinHistory', function (Blueprint $table) {
            $table->increments('ID'); // Primary key
            $table->unsignedInteger('FromUser'); // User ID gửi KVcoin (0 nếu là hệ thống/auto)
            $table->unsignedInteger('ToUser'); // User ID nhận KVcoin
            $table->bigInteger('KVcoin'); // Số lượng KVcoin giao dịch
            $table->integer('Method')->nullable(); // Phương thức giao dịch (ví dụ: 1-chuyển khoản, 2-nạp thẻ...)
            // Cột Date có thể được thay thế bằng created_at
            $table->timestamps(); // Thêm created_at và updated_at

            // Thêm foreign key (nếu muốn, FromUser có thể là 0 nên cần cân nhắc)
            // $table->foreign('ToUser')->references('ID')->on('LoginTables')->onDelete('cascade');
            // $table->foreign('FromUser')->references('ID')->on('LoginTables')->onDelete('cascade'); // Nếu FromUser luôn là UserID hợp lệ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('KVcoinHistory');
    }
}