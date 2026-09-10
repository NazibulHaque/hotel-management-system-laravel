<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@casaulika.example'],
            ['name' => 'Casa Ulika Admin', 'password' => Hash::make('password')]
        );

        $this->call([
            RoomSeeder::class,
            GalleryImageSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
