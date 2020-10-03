<?php


namespace console\controllers;

use common\models\User;
use yii\console\Controller;

class InitController extends Controller
{
    public function actionUsers()
    {
        $user = new User();

    }
}