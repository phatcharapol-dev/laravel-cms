<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'author',
                'crated_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'member',
                'crated_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
