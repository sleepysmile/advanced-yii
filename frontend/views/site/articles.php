<?php

/** @var \yii\data\ActiveDataProvider $dataProvider */

use common\models\Article;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?= Html::a(
    'Create Article',
    ['site/create'],
    ['class' => 'btn btn-success']
) ?>

<?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',

            [
                'class' => ActionColumn::class,
                'template' => '{view}',
                'urlCreator'=> function ($action, Article $model, $key, $index, ActionColumn $actionColumn) {
                    switch ($action) {
                        case 'view':
                            return Url::to(['site/view', 'slug' => $model->slug]);
                    }
                }
            ]
        ],
    ])
?>
