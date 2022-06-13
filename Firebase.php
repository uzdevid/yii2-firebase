<?php

namespace uzdevid\firebase;

use yii\base\Component;

class Firebase extends Component {
    public $notification;

    public function getNotification() {
        return new Notification($this->notification);
    }
}
