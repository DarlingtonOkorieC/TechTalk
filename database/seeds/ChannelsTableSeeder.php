<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'laravel', 'slug' => str_slug('laravel')];
        $channel2 = ['title' => 'vuejs', 'slug' => str_slug('vuejs')];
        $channel3 = ['title' => 'javascript', 'slug' => str_slug('javascript')];
        $channel4 = ['title' => 'actionscript', 'slug' => str_slug('actionscript')];
        $channel5 = ['title' => 'angularjs', 'slug' => str_slug('angular')];
        $channel6 = ['title' => 'typescript', 'slug' => str_slug('typescript')];
        $channel7 = ['title' => 'django', 'slug' => str_slug('django')];
        $channel8 = ['title' => 'php', 'slug' => str_slug('php')];
        $channel9 = ['title' => 'python', 'slug' => str_slug('python')];
        $channel10 = ['title' => 'reactjs', 'slug' => str_slug('reactjs')];
        $channel11 = ['title' => 'css', 'slug' => str_slug('css')];

        App\Channel::create($channel1);
        App\Channel::create($channel2);
        App\Channel::create($channel3);
        App\Channel::create($channel4);
        App\Channel::create($channel5);
        App\Channel::create($channel6);
        App\Channel::create($channel7);
        App\Channel::create($channel8);
        App\Channel::create($channel9);
        App\Channel::create($channel10);
        App\Channel::create($channel11);
    }
}


