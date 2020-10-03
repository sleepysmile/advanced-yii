<?php

/** @var ActiveDataProvider $dataProvider */
/** @var Comment $commentModel */
/** @var View $this */

use common\models\Comment;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;

?>

<?php Pjax::begin() ?>

<?= $this->render('form', [
    'commentModel' => $commentModel
]) ?>

<?=

    GridView::widget([
        'dataProvider' => $dataProvider
    ])

?>

<?php Pjax::end() ?>
