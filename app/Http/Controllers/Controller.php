<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function send_notification_to_user($data = [])
    {
        // dd($data); 
        date_default_timezone_set("asia/karachi");

        $Notification_types = array('web_notification', 'app_notification');
        foreach ($Notification_types as $types) {

            $ch = curl_init();
            $carbon = Carbon::now();
            // echo $data['user_id'] . "\n" .Auth::id() . "    ";
            $data_json = '{"text": "' . $data['message'] . '","user_id": "' . $data['user_id'] . '" ,"url": "' . $data['url'] . '", "date": "' . $carbon->format('d-m-Y h:i A') . '"}';
            // dd($data);

            curl_setopt($ch, CURLOPT_URL, "https://charitywallet-f5352-default-rtdb.firebaseio.com/user_id_" . $data['user_id'] . "/" . $types . "/" . $carbon->format('YmdGis') . ".json");
            // dd($data,$text,$link,$User_id,$notification_id,$lead_type);
            $server_key = 'AIzaSyCblb-iDhG-0Ss-HajlhPkR5U1cjaqtXv4';
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $server_key
            );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            $res = curl_exec($ch);
            $httpCode = curl_getinfo($ch);
            // dd($res);
            curl_close($ch);
        }

        //dd($res);

        return $res;
    }

    public function send_message_to_user($data = [])
    {
        //    dd($data);
        // date_default_timezone_set("asia/karachi");
        $return_array = [];
        $Notification_types = array($data['id'] => Auth::id(), Auth::id() => $data['id']);
        foreach ($Notification_types as $firstkey => $secondKey) {
            $user = User::find($firstkey);
            $user_sec = User::find($secondKey);
            //  dd($user,$user_sec);

            $ch = curl_init();
            $carbon = Carbon::now();
            // echo $data['user_id'] . "\n" .Auth::id() . "    ";
            $data_json = '{"text": "' . $data['message'] . '","user_id":"' . Auth::user()->id . '" ,"link": "' . $data['link'] . '","username": "' . Auth::user()->f_name . ' ' . Auth::user()->l_name . '", "files": "' . $data['files'] . '","file_type":"' . $data['file_type'] . '", "date": "' . $carbon->format('h:i A') . '"}';
            // dd($data);
            array_push($return_array, [$secondKey => $data_json]);
            curl_setopt($ch, CURLOPT_URL, "https://charitywallet-f5352-default-rtdb.firebaseio.com/user_id_" . $secondKey . "/messages/user_id_" . $firstkey . "/" . $carbon->format('YmdGis') . ".json");
            // dd($data,$text,$link,$User_id,$notification_id,$lead_type);
            $server_key = 'AIzaSyCblb-iDhG-0Ss-HajlhPkR5U1cjaqtXv4';
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key=' . $server_key
            );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
            $res = curl_exec($ch);
            $httpCode = curl_getinfo($ch);
            // dd($res);
            curl_close($ch);
        }

        // dd($res);
        $user = User::find($data['id']);
        $this->send_notification_to_user([
            'user_id' => $data['id'],
            'message' => Auth::user()->name . " Send You a message",
            'url' => '/Conversation/' . $user_sec->id . '/' . $user_sec->name
        ]);
        return $res;
    }
}
