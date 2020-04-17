<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('photos')->insert([
            [
                'file' => 'user_avatar_men.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'file' => 'user_avatar_women.jpg',
                'crated_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'file' => 'placeholder.jpg',
                'crated_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
