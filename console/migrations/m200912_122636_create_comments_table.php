<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m200912_122636_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->comment('text comment'),
            'username' => $this->string(225)->comment('name of user comment'),
            'created_at' => $this->integer(11)->comment('created at'),
            'updated_at' => $this->integer(11)->comment('updated at'),
            'created_by' => $this->integer(11)->comment('created by'),
            'updated_by' => $this->integer(11)->comment('updated by'),
            'owner_entity' => $this->string(225)->comment('hash model class + model id')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comments}}');
    }
}
