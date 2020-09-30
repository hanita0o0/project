<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%province}}".
 *
 * @property int $id
 * @property string $name
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property City[] $cities
 * @property Location[] $locations
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%province}}';
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
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CityQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['province_id' => 'id']);
    }

    /**
     * Gets query for [[Locations]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\LocationQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['province_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\ProvinceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ProvinceQuery(get_called_class());
    }
}
