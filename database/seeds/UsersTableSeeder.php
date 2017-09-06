<?php

use Illuminate\Database\Seeder;
use Bloguatf\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = 'Jorge Peralta';
        $user->email = 'jorge@uatf.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
