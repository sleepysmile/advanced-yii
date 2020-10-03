<?php

namespace common\query;

use common\models\Comment;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Comments]].
 *
 * @see Comments
 */
class CommentsQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Comment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Comment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
