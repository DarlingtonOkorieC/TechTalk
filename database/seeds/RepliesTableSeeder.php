<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'user_id' => 1,
            'discussion_id' => 1,
            'content' => 'Lorem ipsum dolor'
        ];
        $r2 = [
            'user_id' => 2,
            'discussion_id' => 2,
            'content' => 'Lorem ipsum dolor'
        ];
        $r3 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'content' => 'Lorem ipsum dolor'
        ];
        $r4 = [
            'user_id' => 1,
            'discussion_id' => 4,
            'content' => 'Lorem ipsum dolor'
        ];

        App\Reply::create($r1);
        App\Reply::create($r2);
        App\Reply::create($r3);
        App\Reply::create($r4);
    }
}
