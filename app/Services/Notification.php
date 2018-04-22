<?php 
namespace App\Services;
use App\Notifications;
use Auth;
class Notification {


   static function sendNotification($to_user_id,$notification_type,$notification_id){
       $notification = new Notifications;
       $notification->from_user_id = Auth::user()->id;
       $notification->user_id = $to_user_id;
       $notification->time = time();
       $notification->notification_type = $notification_type;
       $notification->notification_id = $notification_id;
       $notification->save();
    }
}