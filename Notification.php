<?php

namespace uzdevid\firebase;

use yii\base\Component;

class Notification extends Component {
    const endpoint = 'https://fcm.googleapis.com/fcm/send';

    public function send($token, $params, $authkey) {
        $body = [
            'to' => $token,
            'notification' => [
                'title' => $params['title'],
                'body' => $params['body'],
                'icon' => $params['icon'],
                'click_action' => $params['onclick']
            ]
        ];

        $headers = [
            'Content-Type: application/json',
            'Authorization: key='.$authkey
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, self::endpoint);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}