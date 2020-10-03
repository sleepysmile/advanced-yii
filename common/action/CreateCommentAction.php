<?php

namespace common\action;

use yii\base\Action;
use yii\db\ActiveRecord;

class CreateCommentAction extends Action
{
    public $commentModel;

    public $viewPathComment = '';

    public function run()
    {
        $viewPath = \Yii::getAlias($this->viewPathComment);
        $post = \Yii::$app->request->post();
        /** @var ActiveRecord $commentModel */
        $commentModel = new $this->commentModel;

        var_dump($post);die;
        if ($commentModel->load($post) && $commentModel->save()) {
            return $this->controller->renderPartial($viewPath, );
        }

        return false;
    }
}