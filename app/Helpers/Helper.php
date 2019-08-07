<?php

namespace App\Helpers;

use App\ActivityLog;

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
}
