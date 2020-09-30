<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%city}}`
 */
class m200924_185935_create_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%region}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(),
            'city_id' => $this->integer(11)
        ]);

        // creates index for column `city_id`
        $this->createIndex(
            '{{%idx-region-city_id}}',
            '{{%region}}',
            'city_id'
        );

        // add foreign key for table `{{%city}}`
        $this->addForeignKey(
            '{{%fk-region-city_id}}',
            '{{%region}}',
            'city_id',
            '{{%city}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%city}}`
        $this->dropForeignKey(
            '{{%fk-region-city_id}}',
            '{{%region}}'
        );

        // drops index for column `city_id`
        $this->dropIndex(
            '{{%idx-region-city_id}}',
            '{{%region}}'
        );

        $this->dropTable('{{%region}}');
    }
}
