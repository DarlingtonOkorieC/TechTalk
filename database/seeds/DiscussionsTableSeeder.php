<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing OAUTH2 with Laravel Passport';
        $t2 = 'working with VueJs to build beautiful responses';
        $t3 = 'creating data responses with javascript';
        $t4 = 'cleaning up with views with reactjs';
        $t5 = 'Sweet layouts with vuejs';

        $d1 = [
            'title' => $t1,
            'content' => 'Lorem ipsum dolor',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1)
        ];

        $d2 = [
            'title' => $t2,
            'content' => 'Lorem ipsum dolor',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t2)
        ];

        $d3 = [
            'title' => $t3,
            'content' => 'Lorem ipsum dolor',
            'channel_id' => 3,
            'user_id' => 1,
            'slug' => str_slug($t3)
        ];

        $d4 = [
            'title' => $t4,
            'content' => 'Lorem ipsum dolor',
            'channel_id' => 4,
            'user_id' => 2,
            'slug' => str_slug($t4)
        ];

        $d5 = [
            'title' => $t5,
            'content' => 'Lorem ipsum dolor',
            'channel_id' => 5,
            'user_id' => 1,
            'slug' => str_slug($t5)
        ];

        App\Discussion::create($d1);
        App\Discussion::create($d2);
        App\Discussion::create($d3);
        App\Discussion::create($d4);
        App\Discussion::create($d5);
    }
}
