<?php

/** @var Comment $commentModel */

use common\models\Comment;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<?php
$form = ActiveForm::begin([
    'options' => [
        'style' => 'margin-bottom: 20px',
        'data' => [
            'pjax' => true
        ]
    ],
    'action' => [Yii::$app->controller->id . '/comment-create'],
    'method' => 'post'
]) ?>

<?= $form->field($commentModel, 'username')->textInput([
    'placeholder' => 'Enter your name'
]) ?>

<?= $form->field($commentModel, 'owner_entity')->hiddenInput([
    'placeholder' => 'Enter your name'
])->label(false) ?>

<?= $form->field($commentModel, 'content')->textInput([
    'placeholder' => 'Enter content'
]) ?>

<?= Html::submitButton('Submit', [
    'class' => 'btn btn-primary',
]) ?>

<?php ActiveForm::end() ?>
