<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'id' => 1,
        ], [
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->call(ItemTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductCategoryTableSeeder::class);
    }
}
