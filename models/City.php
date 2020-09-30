<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%city}}".
 *
 * @property int $id
 * @property string $name
 * @property int|null $province_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Province $province
 * @property Location[] $locations
 * @property Region[] $regions
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%city}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['province_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['province_id' => 'id']],
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
            'province_id' => 'Province ID'
        ];
    }

    /**
     * Gets query for [[Province]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ProvinceQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['id' => 'province_id']);
    }

    /**
     * Gets query for [[Locations]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\LocationQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['city_id' => 'id']);
    }

    /**
     * Gets query for [[Regions]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\RegionQuery
     */
    public function getRegions()
    {
        return $this->hasMany(Region::className(), ['city_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CityQuery(get_called_class());
    }
}
