<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'PHP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slug' => 'php'
            ],
            [
                'name' => 'JavaScript',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slug' => 'javascript'
            ],
            [
                'name' => 'Angular',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slug' => 'angular'
            ],
            [
                'name' => 'Vue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slug' => 'vue'
            ],
            [
                'name' => 'Nodejs',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slug' => 'nodejs'
            ]
        ]);
    }
}
