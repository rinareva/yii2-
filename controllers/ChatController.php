<?php

namespace app\controllers;

use Yii;

class ChatController extends SiteController
{
    public function actionSendChat() {
        if (!empty($_POST)) {
            echo \sintret\chat\ChatRoom::sendChat($_POST);
        }
    }
}