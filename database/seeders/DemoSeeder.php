<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if (User::whereEmail('admin@buyacow.net')->count() == 0) {
            $user = new User([
                'name' => 'Admin',
                'email' => 'admin@buyacow.net',
                'password' => Hash::make('admin'),
            ]);

            $user->role = Role::from('admin');
            $user->save();

        }
    }
}
