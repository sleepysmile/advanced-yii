<?php


namespace common\widgets\content;

use common\models\Comment;
use common\query\CommentsQuery;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

/**
 * Class CommentWidget
 * @package common\widgets\content
 */
class CommentWidget extends Widget
{
    public $model;

    /** @var Comment */
    public $commentModel;

    /** @var array  */
    public $dataProviderConfig = [];

    /** @var string  */
    public $viewPathList = '';

    /** @var string  */
    public $actionCreate = 'comment-create';

    /** @var string  */
    public $actionDelete = 'comment-delete';

    /** @var string  */
    public $actionReply = 'comment-reply';

    /**
     * @return string
     */
    public function run()
    {
        $config = array_merge([
            'query' => $this->getCommentsQuery(),
        ], $this->dataProviderConfig);
        $dataProvider = new ActiveDataProvider($config);

        return $this->render('comment/list', [
            'dataProvider' => $dataProvider,
            'commentModel' => new $this->commentModel([
                'owner_entity' => $this->getModelHash()
            ])
        ]);
    }

    /**
     * @return \common\query\CommentsQuery
     */
    protected function getCommentsQuery(): ActiveQuery
    {
        return $this->commentModel::find()
            ->andWhere(['owner_entity' => $this->getModelHash()]);
    }

    /**
     * @return string
     */
    protected function getModelHash(): string
    {
        $className = get_class($this->model);
        return $this->commentModel::getHash($className, $this->model->id);
    }

}