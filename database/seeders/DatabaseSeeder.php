<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use File;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(UserTestSeeder::class);
        // \App\Models\User::factory(10)->create();

        $member1 = \App\Models\User::factory()->create([
            'name' => 'Test Member',
            'role' => 'member',
            'email' => 'member@email.com',
        ]);

        $member2 = \App\Models\User::factory()->create([
            'name' => 'Test Member2',
            'role' => 'member',
            'email' => 'member2@email.com',
        ]);

        $admin = \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'role' => 'admin',
            'email' => 'admin@email.com',
        ]);

        $staff = \App\Models\User::factory()->create([
            'name' => 'Test Staff',
            'role' => 'staff',
            'email' => 'staff@email.com',
        ]);

        \App\Models\Membership::create([
            'name' => 'daily',
            'duration_month' => 0,
            'duration_day' => 1,
            'is_active' => true,
        ]);

        \App\Models\Membership::create([
            'name' => 'monthly',
            'duration_month' => 1,
            'duration_day' => 0,
            'is_active' => true,
        ]);

        \App\Models\Membership::create([
            'name' => 'anually',
            'duration_month' => 12,
            'duration_day' => 0,
            'is_active' => true,
        ]);

        if(!File::exists(storage_path('app/public/cars'))){
            File::makeDirectory(storage_path('app/public/cars'));
        }

        $member1->cars()->create([
            'name' => 'ferari',
            'license_number' => 'L 1111 XM',
            'image' => fake()->image(storage_path('app/public/cars'), 400, 300, 'cars', false),
        ]);

        $member2->cars()->create([
            'name' => 'ford',
            'license_number' => 'L 3333 XM',
            'image' => fake()->image(storage_path('app/public/cars'), 400, 300, 'cars', false),
        ]);
    }
}
