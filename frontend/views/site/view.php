<?php

/** @var \common\models\Article $model */

use common\models\Comment;
use common\widgets\content\CommentWidget;
use yii\widgets\DetailView;

?>

<?=

    DetailView::widget([
        'model' => $model
    ])

?>

<?=

    CommentWidget::widget([
        'commentModel' => Comment::class,
        'model' => $model,
        'dataProviderConfig' => [
            'pagination' => [
                'pageSize' => 10
            ]
        ]
    ])

?>


