<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%code_phone}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%city}}`
 */
class m200928_060034_create_code_phone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%code_phone}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(12)->notNull(),
            'province_id' => $this->integer(11),
        ]);

        // creates index for column `province_id`
        $this->createIndex(
            '{{%idx-code_phone-province_id}}',
            '{{%code_phone}}',
            'province_id'
        );

        // add foreign key for table `{{%province}}`
        $this->addForeignKey(
            '{{%fk-code_phone-province_id}}',
            '{{%code_phone}}',
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
            '{{%fk-code_phone-province_id}}',
            '{{%code_phone}}'
        );

        // drops index for column `province_id`
        $this->dropIndex(
            '{{%idx-code_phone-province_id}}',
            '{{%code_phone}}'
        );

        $this->dropTable('{{%code_phone}}');
    }
}
