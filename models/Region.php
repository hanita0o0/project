<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property int $id
 * @property string $name
 * @property int|null $city_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Location[] $locations
 * @property City $city
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['city_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
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
            'city_id' => 'City ID'
        ];
    }

    /**
     * Gets query for [[Locations]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\LocationQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['region_id' => 'id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CityQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\RegionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\RegionQuery(get_called_class());
    }
}
