<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("users")->insert([
            "username" => "admin",
            "password" => bcrypt("admin"),
            "name" => "Administrator",
            "created_at" => date("Y-m-d H:i:s")
        ]);
    }
}
