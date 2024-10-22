<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * マイグレーションを実行します。
     *
     * @return void
     */
    public function up() {
        Schema::table('users', function (Blueprint $table) {
            // true/falseの論理を使用する場合、booleanを使用します
            $table->boolean('is_admin')->default(false);
        });
    }

    /**
     * マイグレーションを元に戻します。
     *
     * @return void
     */
    public function down() {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
