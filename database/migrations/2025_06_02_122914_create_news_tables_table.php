<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NewsTables', function (Blueprint $table) {
            $table->increments('ID'); // Primary key
            $table->unsignedInteger('Catagory'); // ID danh mục, là khóa ngoại
            $table->string('Title');
            $table->longText('Context'); // Nội dung bài viết thường rất dài
            // Cột DateTime có thể được thay thế bằng created_at
            $table->string('LinkPicture')->nullable(); // Link hình ảnh
            $table->boolean('Deleted')->default(0); // Đánh dấu xóa mềm
            $table->boolean('PublicNews')->default(1); // Trạng thái public/private
            $table->timestamps(); // Thêm created_at và updated_at

            // Thêm foreign key constraint
            $table->foreign('Catagory')->references('ID')->on('Category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NewsTables');
    }
}