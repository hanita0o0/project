<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%type_service}}".
 *
 * @property int $id
 * @property string $name
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property TypeLocation[] $typeLocations
 */
class TypeService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%type_service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name'
        ];
    }

    /**
     * Gets query for [[TypeLocations]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TypeLocationQuery
     */
    public function getTypeLocations()
    {
        return $this->hasMany(TypeLocation::className(), ['type_service_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\TypeServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TypeServiceQuery(get_called_class());
    }
}
