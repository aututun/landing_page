<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GiftCodes', function (Blueprint $table) {
            $table->increments('ID'); // Primary key
            $table->integer('ServerID'); // Có thể là foreign key tới bảng ServerListsIos
            $table->string('Code')->unique(); // Code giftcode thường là duy nhất
            $table->boolean('Status')->default(0); // Trạng thái của giftcode
            $table->text('ItemList'); // Danh sách item, có thể là JSON hoặc chuỗi dài
            $table->dateTime('TimeCreate')->nullable(); // Thời gian tạo giftcode (Nếu đây là cột bạn muốn lưu thời gian tạo ban đầu, hãy giữ nó. Nếu không, hãy loại bỏ nó và chỉ dùng timestamps())
            $table->integer('MaxActive'); // Số lần giftcode có thể được sử dụng
            $table->string('UserName')->nullable(); // Tên người tạo/quản lý giftcode. Nên là UserID
            $table->boolean('Deleted')->default(0); // Dựa vào getListGiftCode() ->where('Deleted', 0)
            $table->timestamps(); // Thêm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GiftCodes');
    }
}