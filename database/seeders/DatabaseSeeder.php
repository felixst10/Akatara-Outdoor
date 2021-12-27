<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beranda;
use App\Models\Category;

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
    }
}
