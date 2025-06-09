<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKtCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KTCoins', function (Blueprint $table) {
            $table->increments('ID'); // Primary key
            $table->unsignedInteger('UserID')->unique(); // ID người dùng, là khóa ngoại
            $table->string('UserName')->nullable(); // Tên người dùng, có thể là copy từ LoginTables.LoginName
            $table->bigInteger('KCoin')->default(0); // Số lượng KTcoin, có thể là số lớn
            // Cột UpdateTime có thể được thay thế bằng updated_at
            $table->timestamps(); // Thêm created_at và updated_at

            // Thêm foreign key constraint
            $table->foreign('UserID')->references('ID')->on('LoginTables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('KTCoins');
    }
}