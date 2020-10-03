<?php

/** @var \common\models\Article $model  */

use dosamigos\fileupload\FileUpload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<?php $form = ActiveForm::begin([
'action' => ['site/create'],
'method' => 'POST'
]) ?>

<?= $form->errorSummary($model) ?>

<?= $form->field($model, 'image')->widget(
    FileUpload::class,
    [
        'url' => ['site/store'],
        'options' => [
            'accept' => 'image/*'
        ],
        'clientOptions' => [
            'maxFileSize' => 2000000
        ],
    ]
) ?>

<?= $form->field($model, 'title')->textInput() ?>

<?= $form->field($model, 'text')->textarea() ?>

<?= Html::submitButton('Create', [
    'class' => 'btn btn-success'
]) ?>

<?php ActiveForm::end() ?>
