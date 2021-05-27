<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'email' => 'admin@chat.pl',
            'name' => 'admin',
            'password' => Hash::make('admin.123'),
        ]);

        $user = User::factory()->create([
            'email' => 'user@chat.pl',
            'name' => 'user',
            'password' => Hash::make('user.123'),
        ]);
    }
}
