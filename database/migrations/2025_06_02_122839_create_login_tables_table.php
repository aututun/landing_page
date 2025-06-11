<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoginTables', function (Blueprint $table) {
            $table->increments('ID'); // Primary key, tương ứng với protected $primaryKey = 'ID';
            $table->string('LoginName')->unique(); // Tên đăng nhập, thường là duy nhất
            $table->string('Password'); // Mật khẩu, dùng md5 nên độ dài cố định hoặc varchar(255)
            $table->string('Phone')->nullable(); // Có thể nullable
            $table->tinyInteger('Status')->default(0); // Mặc định là 0
            $table->dateTime('Date')->nullable(); // Thời gian tạo tài khoản (Nếu đây là cột bạn muốn lưu thời gian tạo ban đầu, hãy giữ nó. Nếu không, hãy loại bỏ nó và chỉ dùng timestamps())
            $table->integer('ActiveRoleID')->default(0); // Mặc định là 0
            $table->string('ActiveRoleName')->nullable();
            $table->string('FullName')->nullable();
            $table->string('Email')->nullable()->unique(); // Email thường là duy nhất và có thể null
            $table->dateTime('TokenTimeExp')->nullable(); // Thời gian hết hạn của token
            $table->string('AccessToken', 64)->nullable(); // Access Token, thường là chuỗi dài hơn
            $table->integer('LastServerLogin')->default(0); // Mặc định là 0
            $table->dateTime('LastLoginTime')->nullable();
            $table->string('LastIPLogin', 45)->nullable(); // Địa chỉ IP, IPv6 có thể dài đến 45 ký tự
            $table->tinyInteger('RoleCms')->nullable(); // Role trong CMS
            $table->timestamps(); // Thêm created_at và updated_at
        });

        DB::table('LoginTables')->insert([
            'LoginName' => 'admin',
            'Password' => md5('AUTUTUN2'),
            'Status' => 1,
            'FullName' => 'Administrator',
            'Email' => 'noisyboyy98@gmail.com',
            'RoleCms' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LoginTables');
    }
}
