<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%type_location}}".
 *
 * @property int $id
 * @property string $name
 * @property int|null $type_service_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Location[] $locations
 * @property TypeService $typeService
 */
class TypeLocation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%type_location}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['type_service_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['type_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeService::className(), 'targetAttribute' => ['type_service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type_service_id' => 'Type Service ID'
        ];
    }

    /**
     * Gets query for [[Locations]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\LocationQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['type_location_id' => 'id']);
    }

    /**
     * Gets query for [[TypeService]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TypeServiceQuery
     */
    public function getTypeService()
    {
        return $this->hasOne(TypeService::className(), ['id' => 'type_service_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\TypeLocationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TypeLocationQuery(get_called_class());
    }

}
