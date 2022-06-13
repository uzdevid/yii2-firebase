<?php

use yii\web\AssetBundle;

class NotificationAssets extends AssetBundle {
    public $sourcePath = '@vendor/uzdevid/yii2-firebase/src';
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/firebase/9.8.3/firebase-app.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/firebase/9.8.3/firebase-messaging.min.js',
        'js/notification.js'
    ];
}