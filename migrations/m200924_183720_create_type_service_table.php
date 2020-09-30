<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type_service}}`.
 */
class m200924_183720_create_type_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_service}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type_service}}');
    }
}
