<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_game')->create('t_roles', function (Blueprint $table) {
            $table->increments('rid')->comment('Id của nhân vât');
            $table->char('userid', 64)->comment('Id Tài khoản');
            $table->string('rname', 191)->nullable();
            $table->unsignedTinyInteger('sex')->default(0)->comment('Giới tính');
            $table->unsignedTinyInteger('occupation')->default(0)->comment('Phái nào');
            $table->tinyInteger('sub_id')->comment('Nhánh của phái');
            $table->unsignedSmallInteger('level')->default(1)->comment('Cấp độ');
            $table->unsignedInteger('pic')->default(0)->comment('hình đại diện');
            $table->integer('money1')->default(0)->comment('Bạc');
            $table->integer('money2')->default(0)->comment('Bạc khóa');
            $table->unsignedBigInteger('experience')->default(0)->comment('kinh nghiệm');
            $table->unsignedTinyInteger('pkmode')->default(0)->comment('Chế độ pk hiện tại');
            $table->integer('pkvalue')->default(0)->comment('giá trị pk hiện tại');
            $table->char('position', 32)->default('-1:0:-1:-1')->comment('vị trí nhân vật');
            $table->dateTime('regtime')->default('1900-01-01 12:00:00')->comment('Thời gian đăng ký');
            $table->dateTime('lasttime')->default('1900-01-01 12:00:00')->comment('Thời gian đăng nhập gần đây');
            $table->unsignedTinyInteger('isdel')->default(0)->comment('Đã bị xóa chưa');
            $table->dateTime('deltime')->default('1900-01-01 12:00:00')->comment('Thời gian bắt đầu xóa');
            $table->dateTime('predeltime')->nullable()->comment('Thười gian sẽ xóa');
            $table->unsignedInteger('bagnum')->default(0)->comment('Số ô trong túi đồ');
            $table->char('main_quick_keys', 255)->default('')->comment('Hotkey tay trái');
            $table->char('other_quick_keys', 255)->default('')->comment('hotkey tay phải');
            $table->unsignedInteger('loginnum')->default(0)->comment('Số lần đăng nhập');
            $table->unsignedInteger('leftfightsecs')->default(0)->comment('Số giây thách đầu con lại');
            $table->integer('totalonlinesecs')->default(0)->comment('tổng thời gian online');
            $table->integer('antiaddictionsecs')->default(0)->comment('Thời gian có hại đăng nhập');
            $table->dateTime('logofftime')->default('1900-01-01 12:00:00')->comment('Thời gian đăng xuất');
            $table->unsignedInteger('yinliang')->default(0)->comment('ĐỒng khóa');
            $table->integer('maintaskid')->default(0)->comment('Nhiệm vụ chính tuyến ID');
            $table->integer('pkpoint')->default(0)->comment('Điểm PK');
            $table->integer('killboss')->default(0)->comment('Số lần giết boss');
            $table->integer('cztaskid')->default(0)->comment('giữ liệu nạp thẻ');
            $table->integer('logindayid')->default(0)->comment('đăng nhập ngày bao nhiêu');
            $table->integer('logindaynum')->default(0)->comment('Đăng nhập ngày nàop');
            $table->integer('zoneid')->default(0);
            $table->char('username', 64);
            $table->unsignedInteger('lastmailid')->default(0);
            $table->unsignedBigInteger('onceawardflag')->default(0)->comment('Đánh dấu sự kiện nhận thưởng');
            $table->unsignedInteger('banchat')->default(0)->comment('Band chát');
            $table->unsignedInteger('banlogin')->default(0)->comment('Badn login');
            $table->integer('isflashplayer')->default(0)->comment('Có phải người chơi mới');
            $table->integer('admiredcount')->default(0)->comment('thời gian bảo vệ');
            $table->unsignedBigInteger('store_yinliang')->default(0)->comment('Kho chứa đồng');
            $table->unsignedBigInteger('store_money')->default(0)->comment('Kho chứa bạc');
            $table->bigInteger('ban_trade_to_ticks')->default(0);
            $table->integer('familyid')->default(0);
            $table->string('familyname', 100)->nullable();
            $table->tinyInteger('familyrank')->default(0);
            $table->string('guildname', 100)->nullable();
            $table->unsignedInteger('guildid')->default(0);
            $table->integer('guildrank')->default(0);
            $table->integer('roleprestige')->default(0);
            $table->integer('guildmoney')->default(0);
            $table->unsignedTinyInteger('occupation2')->default(0);
            $table->tinyInteger('sub_id2')->default(0);

            $table->unique('rid');
            $table->unique(['rname', 'zoneid']);
            $table->index('userid');
            $table->index('guildid', 'idx_faction');
        });
    }

    public function down(): void
    {
        Schema::connection('mysql_game')->dropIfExists('t_roles');
    }

}
