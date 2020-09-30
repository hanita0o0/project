<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%code_phone}}`
 * - `{{%location}}`
 * - `{{%type_service}}`
 * - `{{%user}}`
 */
class m200929_224010_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'code_phone_id' => $this->integer(12),
            'phone' => $this->string(11)->notNull(),
            'location_id' => $this->integer(11),
            'type_service_id' => $this->integer(11),
            'created_by' => $this->integer(11),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);

        // creates index for column `code_phone_id`
        $this->createIndex(
            '{{%idx-service-code_phone_id}}',
            '{{%service}}',
            'code_phone_id'
        );

        // add foreign key for table `{{%code_phone}}`
        $this->addForeignKey(
            '{{%fk-service-code_phone_id}}',
            '{{%service}}',
            'code_phone_id',
            '{{%code_phone}}',
            'id',
            'CASCADE'
        );

        // creates index for column `location_id`
        $this->createIndex(
            '{{%idx-service-location_id}}',
            '{{%service}}',
            'location_id'
        );

        // add foreign key for table `{{%location}}`
        $this->addForeignKey(
            '{{%fk-service-location_id}}',
            '{{%service}}',
            'location_id',
            '{{%location}}',
            'id',
            'CASCADE'
        );

        // creates index for column `type_service_id`
        $this->createIndex(
            '{{%idx-service-type_service_id}}',
            '{{%service}}',
            'type_service_id'
        );

        // add foreign key for table `{{%type_service}}`
        $this->addForeignKey(
            '{{%fk-service-type_service_id}}',
            '{{%service}}',
            'type_service_id',
            '{{%type_service}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-service-created_by}}',
            '{{%service}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-service-created_by}}',
            '{{%service}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%code_phone}}`
        $this->dropForeignKey(
            '{{%fk-service-code_phone_id}}',
            '{{%service}}'
        );

        // drops index for column `code_phone_id`
        $this->dropIndex(
            '{{%idx-service-code_phone_id}}',
            '{{%service}}'
        );

        // drops foreign key for table `{{%location}}`
        $this->dropForeignKey(
            '{{%fk-service-location_id}}',
            '{{%service}}'
        );

        // drops index for column `location_id`
        $this->dropIndex(
            '{{%idx-service-location_id}}',
            '{{%service}}'
        );

        // drops foreign key for table `{{%type_service}}`
        $this->dropForeignKey(
            '{{%fk-service-type_service_id}}',
            '{{%service}}'
        );

        // drops index for column `type_service_id`
        $this->dropIndex(
            '{{%idx-service-type_service_id}}',
            '{{%service}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-service-created_by}}',
            '{{%service}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-service-created_by}}',
            '{{%service}}'
        );

        $this->dropTable('{{%service}}');
    }
}
