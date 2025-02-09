<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
          ->hasTodos(50)
          ->create(
            [
                'name'=>'Joe',
                'email'=>'joe@gmail.com',
                'password'=>Hash::make("12345")
            ]
        );

        User::factory()
          ->hasTodos(40)
          ->create(
            [
                'name'=>'Dio',
                'email'=>'dio@gmail.com',
                'password'=>Hash::make("12345")
            ]
        );

        User::factory()
          ->hasTodos(30)
          ->create(
            [
                'name'=>'Pucchi',
                'email'=>'pucchi@gmail.com',
                'password'=>Hash::make("12345")
            ]
        );

        User::factory()
          ->hasTodos(20)
          ->create(
            [
                'name'=>'Jolin',
                'email'=>'Jolin@gmail.com',
                'password'=>Hash::make("12345")
            ]
        );

        User::factory()
          ->hasTodos(10)
          ->create(
            [
                'name'=>'Weather',
                'email'=>'weather@gmail.com',
                'password'=>Hash::make("12345")
            ]
        );
    }
}
