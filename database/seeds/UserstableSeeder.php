<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('scsc2019'),
            'email' => 'admin@scscforum.com',
            'points' => '800',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);

        App\User::create([
            'name' => 'admin2',
            'password' => bcrypt('scsc2019'),
            'email' => 'admin2@scscforum.com',
            'points' => '800',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);


    }
}
