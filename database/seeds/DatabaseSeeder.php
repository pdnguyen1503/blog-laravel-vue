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
        // $this->call(UsersTableSeeder::class);
        $users = factory(App\User::class, 10)->create();
        $users = factory(App\Post::class, 10)->create();
        $users = factory(App\Category::class, 10)->create();

    }
}
