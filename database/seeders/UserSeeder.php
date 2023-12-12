<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $users = [
            [
                'role_id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'role_id' => 2,
                'name' => 'Guru BK',
                'email' => 'gurubk@gurubk.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'role_id' => 3,
                'name' => 'Siswa',
                'email' => 'siswa@siswa.com',
                'password' => bcrypt('12345678'),
            ],
        ];
        foreach($users as $key => $value) {
            User::create($value);
        }
        // $user->role_id      = 1;
        //  $user->name         = 'Administrator';
        //  $user->email        = 'admin@admin.com';
        //  $user->password     = Hash::make('12345678');
        //  $user->save();

        // $user->role_id      = 2;
        //  $user->name         = 'Guru BK';
        //  $user->email        = 'gurubk@gurubk.com';
        //  $user->password     = Hash::make('12345678');
        //  $user->save();

        // $user->role_id      = 3;
        //  $user->name         = 'Siswa';
        //  $user->email        = 'siswa@siswa.com';
        //  $user->password     = Hash::make('12345678');
        //  $user->save();
    }
}
