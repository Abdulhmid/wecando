<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupTableSeeder::class);
        $this->call(UserTableSeeder::class);
        \DB::table('state')->delete();
        \DB::table('city')->delete();
    }
}
