<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
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
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'level' => 'admin'
            ],
            [
                'username' => 'employee',
                'password' => bcrypt('employee'),
                'level' => 'employee'
            ]
            ];
        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}