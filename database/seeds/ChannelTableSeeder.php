<?php

use App\Channel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel = new Channel();
        $channel->channel       = "Laravel";
        $channel->creator       = 1;
        $channel->created_at    = Carbon::now();
        $channel->updated_at    = Carbon::now();
        $channel->save();

        $channel = new Channel();
        $channel->channel       = "Angular";
        $channel->creator       = 1;
        $channel->created_at    = Carbon::now();
        $channel->updated_at    = Carbon::now();
        $channel->save();
    }
}
