<?php
use App\Channel;

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Announcement', 'slug' => str_slug('Announcement') ];
        $channel2 = ['title' => 'Workshop', 'slug' => str_slug('Workshop') ];
        $channel3 = ['title' => 'COS10003 Computer and Logic Essentials', 'slug' => str_slug('Computer and Logic Essentials')];
        $channel4 = ['title' => 'COS10004 Computer Systems', 'slug' => str_slug('Computer Systems')];
        $channel5 = ['title' => 'COS10009 Introduction to Programming', 'slug' => str_slug('Introduction to Programming')];
        $channel6 = ['title' => 'COS10011 Creating Web Applications', 'slug' => str_slug('Creating Web Applications')];
        $channel7 = ['title' => 'COS10081 Introduction to Data Science', 'slug' => str_slug('Introduction to Data Science')];
        $channel8 = ['title' => 'COS20001 User Centered Design', 'slug' => str_slug('User Centered Design')];
        $channel9 = ['title' => 'COS20007 Object Oriented Programming', 'slug' => str_slug('Object Oriented Programming')];
        $channel10 = ['title' => 'COS20085 Big Data Architecture and Application', 'slug' => str_slug('Big Data Architecture and Application')];
        $channel11 = ['title' => 'COS30015 IT Security', 'slug' => str_slug('IT Security')];
        $channel12 = ['title' => 'COS30017 Software Development for Mobile Devices', 'slug' => str_slug('Software Development for Mobile Devices')];
        $channel13 = ['title' => 'COS30019 Introduction to Artificial Intelligence', 'slug' => str_slug('Introduction to Artificial Intelligence')];
        $channel14 = ['title' => 'COS30020 Web Application Development', 'slug' => str_slug('Web Application Development')];
        $channel15 = ['title' => 'COS30041 Creating Secure and Scalable Software', 'slug' => str_slug('Creating Secure and Scalable Software')];


        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
        Channel::create($channel9);
        Channel::create($channel10);
        Channel::create($channel11);
        Channel::create($channel12);
        Channel::create($channel13);
        Channel::create($channel14);
        Channel::create($channel15);


    }
}
