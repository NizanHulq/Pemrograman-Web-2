<?php

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
        Users::create([
            'level' => 'user',
            'name' => 'Rama Kurus',
            'email' => 'ramakurus@gmail.com',
            'password' => bcrypt('ramakurus')
            ]);
    
        Users::create([
            'level' => 'admin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
            ]);
    }
}
