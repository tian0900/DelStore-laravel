<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PushNotifController extends Controller {
    public function pushNotif(Request $requset) {

        $mData = [
            'title' => $requset->title,
            'body' => $requset->message
        ];

        $fcm[] = "e63en33ISNSy2-ZKoXCvQw:APA91bGUu0YivrUeJ9JKPxm49WMMx8glOhjhSPaLTfFOVZxqRTkgu3iAf24Xxoq59-4R71O9vvMPs7RtY9N_9MkA0xomuDaO75P5VrVG0Y_a154EJ3LXTQuChdUGCFb50j9qjr3XcsyR";

        $payload = [
            'registration_ids' => $fcm,
            'notification' => $mData
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json",
                "Authorization: key=AIzaSyB6ah8cfcWjFojccuWIabJIdG8W8MTnRew"
            ),
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = [
            'success' => 1,
            'message' => "Push notif success",
            'data' => $mData,
            'firebase_response' => json_decode($response)
        ];
        return $data;
    }
}
