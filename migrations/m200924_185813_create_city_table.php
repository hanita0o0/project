<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%province}}`
 */
class m200924_185813_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(),
            'province_id' => $this->integer(11)

        ]);

        // creates index for column `province_id`
        $this->createIndex(
            '{{%idx-city-province_id}}',
            '{{%city}}',
            'province_id'
        );

        // add foreign key for table `{{%province}}`
        $this->addForeignKey(
            '{{%fk-city-province_id}}',
            '{{%city}}',
            'province_id',
            '{{%province}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%province}}`
        $this->dropForeignKey(
            '{{%fk-city-province_id}}',
            '{{%city}}'
        );

        // drops index for column `province_id`
        $this->dropIndex(
            '{{%idx-city-province_id}}',
            '{{%city}}'
        );

        $this->dropTable('{{%city}}');
    }
}
