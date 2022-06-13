<?php

namespace uzdevid\firebase;

use yii\base\Widget;

class NotificationWidget extends Widget {
    public function run() {
        $this->render('notification');
    }
}