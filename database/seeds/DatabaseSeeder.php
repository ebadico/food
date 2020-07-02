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
        // $this->call(UserSeeder::class);
        $u=new App\User();
        $u->name = "admin";
        $u->email = "admin@admin.com";
        $u->password = Hash::make('admin');
        $u->save();
    }
}
