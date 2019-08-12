<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function getNotification($id)
    {
        $notification = Notification::find($id);
        if($notification->view_status == 0) {
            $notification->view_status = 1;
            $notification->save();
        }

        return redirect($notification->url);
    }

    public function getAllNotifications()
    {
        $notifications = Notification::select('notifications.*', 'users.avatar')
                                    ->where('user_id', Auth::user()->id)
                                    ->join('users', 'users.username', 'notifications.username')
                                    ->orderBy('id', 'desc')
                                    ->get();
        
        foreach ($notifications as $notification) {
            if($notification->view_status == 0) {
                $notification->view_status = 1;
                $notification->save();
            }
        }
        
        return view('notifications.view')->with([
            'notifications' => $notifications,
            'pageTitle'     => 'All Notifications'
        ]);
    }
}
