<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beranda;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
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
        Beranda::factory(15)->create();

        Category::create([
            'name' => 'Sepatu',
            'slug' => 'kategori-Sepatu'
        ]);

        Category::create([
            'name' => 'Tas',
            'slug' => 'kategori-Tas'
        ]);

        Category::create([
            'name' => 'Tenda',
            'slug' => 'kategori-Tenda'
        ]);

        DB::table('role')->insert(
            [
                [
                    'role' => 'admin'
                ],
                [
                    'role' => 'user'
                ]
            ]
        );

        DB::table('users')->insert(
            [
                [
                    'name' => 'Admin',
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('admin123'),
                    'role_id' => 1,
                ],
                [
                    'nama_lengkap' => 'Theo',
                    'username' => 'Theo',
                    'email' => 'theo@gmail.com',
                    'password' => Hash::make('12345678'),
                    'role_id' => 2,
                ],
            ]
        );
        

        
    }
}
