<?php

namespace common\models;

use common\query\CommentsQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%comments}}".
 *
 * @property int $id
 * @property string|null $content text comment
 * @property string|null $username name of user comment
 * @property int|null $created_at created at
 * @property int|null $updated_at updated at
 * @property int|null $created_by created by
 * @property int|null $updated_by updated by
 * @property string|null $owner_entity hash model class + model id
 */
class Comment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['username', 'owner_entity'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'username' => 'Username',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'owner_entity' => 'Owner Entity',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class
            ]
        ];
    }

    /**
     * {@inheritdoc}
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }

    public function setOwnerEntity(string $modelClass, int $id): void
    {
        $hash = self::getHash($modelClass, $id);
        $this->owner_entity = $hash;
    }

    public static function getHash(string $modelClass, int $id): string
    {
        return base64_decode($modelClass . $id);
    }
}
