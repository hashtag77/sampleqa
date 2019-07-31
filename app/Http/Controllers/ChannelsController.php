<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelsController extends Controller
{
    public function createChannel()
    {
        return view('channels.createChannel');
    }

    public function storeChannel(Request $request)
    {
        $channelName = Str::title($request->input('channel'));

        $existingChannel = Channel::where('channel', $channelName)->get();

        if(count($existingChannel)) {
            return redirect('/channels/create')->with('error','Channel Already Exists!');
        } else {
            $channel = new Channel();
            $channel->channel = $channelName;
            $channel->creator = Auth::user()->id;
            $channel->save();

            return redirect('/channels/create')->with('success',''.$channelName.' Channel Added!');
        }
    }
}
