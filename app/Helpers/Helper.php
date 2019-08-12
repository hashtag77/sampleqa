<?php

namespace App\Helpers;

use App\ActivityLog;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class Helper
{
  public static function recordActivity($user_id, $username, $type, $description, $url)
  {
    ActivityLog::create([
      'user_id'       => $user_id,
      'username'      => $username,
      'type'          => $type,
      'description'   => $description,
      'url'           => $url
    ]);
  }

  public static function notify($user_id, $username, $type, $description, $url, $xp)
  {
    if(Auth::user()->id != $user_id) {
      Notification::create([
        'user_id'       => $user_id,
        'username'      => $username,
        'type'          => $type,
        'description'   => $description,
        'url'           => $url,
        'xp'            => $xp
      ]);
    }
  }
}
