<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\{
    Album,
    Group,
    Role,
    Style,
    Track,
    User,
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        {
            Role::factory()->create([
                "discription" => "Main_Admin",
            ]);
            Role::factory()->create([
                "discription" => "Groups_Admin",
            ]);
            Role::factory()->create([
                "discription" => "Albums_Admin",
            ]);
            Role::factory()->create([
                "discription" => "Tracks_Admin",
            ]);
            User::factory()->create([
                "login" => "mainAdmin",
                "password" => Hash::make("admin"),
                "role_id" => 1,
            ]);
            User::factory()->create([
                "login" => "groupsAdmin",
                "password" => Hash::make("admin"),
                "role_id" => 2,
            ]);
            User::factory()->create([
                "login" => "albumsAdmin",
                "password" => Hash::make("admin"),
                "role_id" => 3,
            ]);
            User::factory()->create([
                "login" => "tracksAdmin",
                "password" => Hash::make("admin"),
                "role_id" => 4,
            ]);
        }

        Style::factory(5)->create();
        Group::factory(10)->create();
        Album::factory(20)->create();
        Track::factory(40)->create();
    }
}
