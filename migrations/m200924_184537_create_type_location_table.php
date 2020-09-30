<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type_location}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%type_service}}`
 */
class m200924_184537_create_type_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_location}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(),
            'type_service_id' => $this->integer(11)
        ]);

        // creates index for column `type_service_id`
        $this->createIndex(
            '{{%idx-type_location-type_service_id}}',
            '{{%type_location}}',
            'type_service_id'
        );

        // add foreign key for table `{{%type_service}}`
        $this->addForeignKey(
            '{{%fk-type_location-type_service_id}}',
            '{{%type_location}}',
            'type_service_id',
            '{{%type_service}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%type_service}}`
        $this->dropForeignKey(
            '{{%fk-type_location-type_service_id}}',
            '{{%type_location}}'
        );

        // drops index for column `type_service_id`
        $this->dropIndex(
            '{{%idx-type_location-type_service_id}}',
            '{{%type_location}}'
        );

        $this->dropTable('{{%type_location}}');
    }
}
