<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Welcome to SCSC Forum + Please read the rules before posting';
        $t2 = 'How to post using Markdown + Guidelines';
        $t3 = 'Becoming a moderator';


        $d1 = [
            'title' => $t1,
            'content' => '',
            'channel_id' => 1,
            'user_id' => 1,
            'slug' => str_slug($t1)
        ];

        $d2 = [
            'title' => $t2,
            'content' => '',
            'channel_id' => 1,
            'user_id' => 1,
            'slug' => str_slug($t2)
        ];

        $d3 = [
            'title' => $t3,
            'content' => '',
            'channel_id' => 1,
            'user_id' => 1,
            'slug' => str_slug($t3)
        ];
   
        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);

    }
}
