<?php

namespace common\action\file;

use dosamigos\flysystem\LocalFsComponent;
use ozerich\filestorage\FileStorage;
use Yii;
use yii\base\Action;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\web\UploadedFile;
use yii2tech\filestorage\local\Storage;

class UploadAction extends Action
{
    /** @var ActiveRecord */
    public $modelClass;

    /** @var string  */
    public $attribute = 'image';

    /** @var array  */
    public $version = [];

    /** @var string  */
    public $path = 'article/';

    public function run()
    {
        $model = new $this->modelClass;
        $file = UploadedFile::getInstance($model, $this->attribute);
        /** @var LocalFsComponent $fileSystem */
        $fileSystem = \Yii::$app->fs;
        /** @var FileStorage $fileStorage */
        $fileStorage = \Yii::$app->fileStorage;

        if ($file) {
            $fileName = Yii::$app->security->generateRandomString(16) .
                '.' .
                $file->getExtension();
            $path = $fileSystem->path .
                '/' .
                $this->path;

            if (!$fileSystem->has($this->path)) {
                $fileSystem->createDir($this->path);
            }

            $model = $fileStorage->createFileFromUploadedFile($file, 'images');

            return Yii::$app->controller->asJson($model->toJSON());

            $fileSystem->put($path . $fileName, $file);

            if ($file->saveAs($path . $fileName)) {
                return Yii::$app->controller->asJson([
                    'files' => [
                        [
                            'name' => $fileName,
                            'size' => $file->size,
                            'url' => $path,
                            'thumbnailUrl' => $path,
                            'deleteUrl' => 'image-delete?name=' . $fileName,
                            'deleteType' => 'POST',
                        ],
                    ],
                ]);
            }

        }

    }
}