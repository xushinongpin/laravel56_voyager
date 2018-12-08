<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     * 索引等到正式对接时再启用
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('truename')->after('name');//用户真是姓名
            $table->string('bankcard')->after('email');//银行卡号
            $table->string('bankname')->after('bankcard');//银行卡名称
            $table->tinyInteger('status')->after('bankname');// 1前台 2后台申请中 3后台停用  4后台
            $table->string('google2fa_secret')->after('status');//谷歌验证 后台必须，并且同时需要绑定邮箱【首次进入要求他绑定，忘记或者遗漏可以邮件找回】
            $table->string('wechatname')->after('google2fa_secret');//微信名称【需要多少个键待定】
            $table->string('openid_wx')->after('wechatname');//微信id
            $table->string('wechatnickname')->after('openid_wx');//微信昵称
            $table->string('qq')->after('wechatnickname');//QQ登陆【需要多少个键待定】
            $table->string('openid_qq')->after('qq');//QQid
            $table->string('phone')->after('openid_qq');//手机号 用于验证与忘记密码谷歌验证等时找回
            $table->integer('pid')->after('phone');//上级id
            $table->text('ppid')->after('pid');//所有上级id
            $table->text('bbid')->after('ppid');//所有下级id
            $table->integer('money')->after('bbid');//账户余额
            $table->integer('integral')->after('money');//积分
            $table->text('recommend')->after('integral');//推荐商品【 存储商品id（多个都好隔开），如果不存在推荐的商品id则根据默认规则推荐 】
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
