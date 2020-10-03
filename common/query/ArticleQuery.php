<?php

namespace common\query;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\common\models\Article]].
 *
 * @see \common\models\Article
 */
class ArticleQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\common\models\Article[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\common\models\Article|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
