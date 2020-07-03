<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        factory(User::class, 10)->create();
        /*
        User::create([
            'name' => 'Gustavo Lenine',
            'email' => 'gustavo@lenine.com',
            'password' => bcrypt('123456'),
        ]);
        */
    }
}
