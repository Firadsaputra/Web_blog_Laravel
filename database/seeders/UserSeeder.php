<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Firad Saputra',
            'username' => 'firad',
            'email' => 'firadsaputra258@gmail.com',
            'image' => 'https://firebasestorage.googleapis.com/v0/b/shopeeafiliate-bb328.appspot.com/o/konten%20tiktok%2FFirad%20Saputra-removebg-preview.jpg?alt=media&token=0696f8d9-ec3e-4053-9b3c-85c36c84b8a0'
        ]);

        User::factory()->create([
            'name' => 'Agata',
            'username' => 'agata',
            'email' => 'Agata258@gmail.com',
            'image' => 'https://firebasestorage.googleapis.com/v0/b/shopeeafiliate-bb328.appspot.com/o/konten%20tiktok%2FFirad%20Saputra-removebg-preview.jpg?alt=media&token=0696f8d9-ec3e-4053-9b3c-85c36c84b8a0'
        ]);
    }
}
