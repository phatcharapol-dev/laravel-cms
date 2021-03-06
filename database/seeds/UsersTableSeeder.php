<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'role_id' => 1,
                'is_active' => 1,
                'photo_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Phatcharapol Tridechee',
                'email' => 'phatcharapol@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => 2,
                'is_active' => 1,
                'photo_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Janifer Lopez',
                'email' => 'janifer@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => 3,
                'is_active' => 1,
                'photo_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
