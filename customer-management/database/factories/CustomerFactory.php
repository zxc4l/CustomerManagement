<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail, // Email khách hàng
            'password' => bcrypt('password'), // Mật khẩu mã hóa
            'status' => $this->faker->randomElement(['active', 'inactive', 'banned']), // Trạng thái tài khoản
            'account_type' => $this->faker->randomElement(['basic', 'premium', 'enterprise']), // Loại tài khoản
            'last_login' => $this->faker->dateTimeBetween('-1 year', 'now'), // Thời gian đăng nhập gần nhất
            'created_at' => now(), // Ngày giờ tạo
            'updated_at' => now(), // Ngày giờ cập nhật
        ];
    }
    
}