<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%location}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%province}}`
 * - `{{%city}}`
 * - `{{%region}}`
 * - `{{%type_location}}`
 * - `{{%user}}`
 */
class m200928_152547_create_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(),
            'latitude' => $this->double()->notNull(),
            'longitude' => $this->double()->notNull(),
            'province_id' => $this->integer(11),
            'city_id' => $this->integer(11),
            'region_id' => $this->integer(11),
            'address' => $this->string(512)->notNull(),
            'type_location_id' => $this->integer(11),
            'created_by' => $this->integer(11),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);

        // creates index for column `province_id`
        $this->createIndex(
            '{{%idx-location-province_id}}',
            '{{%location}}',
            'province_id'
        );

        // add foreign key for table `{{%province}}`
        $this->addForeignKey(
            '{{%fk-location-province_id}}',
            '{{%location}}',
            'province_id',
            '{{%province}}',
            'id',
            'CASCADE'
        );

        // creates index for column `city_id`
        $this->createIndex(
            '{{%idx-location-city_id}}',
            '{{%location}}',
            'city_id'
        );

        // add foreign key for table `{{%city}}`
        $this->addForeignKey(
            '{{%fk-location-city_id}}',
            '{{%location}}',
            'city_id',
            '{{%city}}',
            'id',
            'CASCADE'
        );

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-location-region_id}}',
            '{{%location}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-location-region_id}}',
            '{{%location}}',
            'region_id',
            '{{%region}}',
            'id',
            'CASCADE'
        );

        // creates index for column `type_location_id`
        $this->createIndex(
            '{{%idx-location-type_location_id}}',
            '{{%location}}',
            'type_location_id'
        );

        // add foreign key for table `{{%type_location}}`
        $this->addForeignKey(
            '{{%fk-location-type_location_id}}',
            '{{%location}}',
            'type_location_id',
            '{{%type_location}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-location-created_by}}',
            '{{%location}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-location-created_by}}',
            '{{%location}}',
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
        // drops foreign key for table `{{%province}}`
        $this->dropForeignKey(
            '{{%fk-location-province_id}}',
            '{{%location}}'
        );

        // drops index for column `province_id`
        $this->dropIndex(
            '{{%idx-location-province_id}}',
            '{{%location}}'
        );

        // drops foreign key for table `{{%city}}`
        $this->dropForeignKey(
            '{{%fk-location-city_id}}',
            '{{%location}}'
        );

        // drops index for column `city_id`
        $this->dropIndex(
            '{{%idx-location-city_id}}',
            '{{%location}}'
        );

        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-location-region_id}}',
            '{{%location}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-location-region_id}}',
            '{{%location}}'
        );

        // drops foreign key for table `{{%type_location}}`
        $this->dropForeignKey(
            '{{%fk-location-type_location_id}}',
            '{{%location}}'
        );

        // drops index for column `type_location_id`
        $this->dropIndex(
            '{{%idx-location-type_location_id}}',
            '{{%location}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-location-created_by}}',
            '{{%location}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-location-created_by}}',
            '{{%location}}'
        );

        $this->dropTable('{{%location}}');
    }
}
