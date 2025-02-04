<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('customers', function (Blueprint $table) {
        $table->id(); // Mã khách hàng (primary key, tự tăng)
        $table->string('email')->unique(); // Email khách hàng
        $table->string('password'); // Mật khẩu mã hóa
        $table->enum('status', ['active', 'inactive', 'banned']); // Trạng thái tài khoản
        $table->enum('account_type', ['basic', 'premium', 'enterprise']); // Loại tài khoản
        $table->dateTime('last_login')->nullable(); // Thời gian đăng nhập gần nhất
        $table->timestamps(); // Ngày giờ tạo và cập nhật
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
