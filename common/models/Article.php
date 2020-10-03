<?php

namespace common\models;

use common\query\ArticleQuery;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property int $id
 * @property string|null $test text article
 * @property string|null $title title article
 * @property string|null $slug slug article
 */
class Article extends ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'title'], 'required'],
            [['text'], 'string'],
            [['image'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'text',
            'title' => 'Title',
            'slug' => 'Slug',
        ];
    }

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'title'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }
}
