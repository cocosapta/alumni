<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama' => 'Administrator',
                'username' => 'Admin',
                'password' => bcrypt('admin'),
                'level' => 1,
                'email' => 'admin@iro.com'
            ],
            
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
