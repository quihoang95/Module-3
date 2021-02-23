<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(CategorySeeder::class);
    }
}
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['title'=> Str::random(10),
            'description'=>Str::random(10)],
            ['title'=> Str::random(10),
                'description'=>Str::random(10)],
            ['title'=> Str::random(10),
                'description'=>Str::random(10)]
        ]);
    }
}


