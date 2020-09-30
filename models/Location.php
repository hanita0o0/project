<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%location}}".
 *
 * @property int $id
 * @property string $name
 * @property float $latitude
 * @property float $longitude
 * @property int|null $province_id
 * @property int|null $city_id
 * @property int|null $region_id
 * @property string $address
 * @property int|null $type_location_id
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property City $city
 * @property User $createdBy
 * @property Province $province
 * @property Region $region
 * @property TypeLocation $typeLocation
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const TYPE_POPSITE = "پاپ سایت";
    const TYPE_POINT = "نقطه";
    const POPSITE="popsite";
    const POINT="point";

    public static function tableName()
    {
        return '{{%location}}';
    }
    public function behaviors()
    {
        return[
            TimestampBehavior::class,
            [
                'class'=>BlameableBehavior::class,
                'updatedByAttribute'=>false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'latitude', 'longitude', 'address'], 'required','message' => 'لطفا فیلد را پر نمایید.'],
            ['name','unique', 'message' => 'نام در حال حاضر وجود دارد.'],
            [['province_id', 'city_id', 'region_id', 'type_location_id'],'required'],
            [['latitude', 'longitude'], 'double'],
            [['province_id', 'city_id', 'region_id', 'type_location_id', 'created_by', 'created_at', 'updated_at'], 'integer','message' => 'لطفا {attribute} معتبر راانتخاب نمایید.'],
            [['name', 'address'], 'string', 'max' => 512],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['province_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['type_location_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeLocation::className(), 'targetAttribute' => ['type_location_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'نام',
            'latitude' => 'عرض جغرافیایی',
            'longitude' => 'طول جغرافیایی',
            'province_id' => 'استان',
            'city_id' => 'شهر',
            'region_id' => 'منطقه',
            'address' => 'ادامه آدرس',
            'type_location_id' => 'نوع',
            'created_at' => 'تاریخ ثبت',
            'updated_at' => 'آخرین بروزرسانی',
            'created_by' => 'Created By',

        ];
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
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
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
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\RegionQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * Gets query for [[TypeLocation]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TypeLocationQuery
     */
    public function getTypeLocation()
    {
        return $this->hasOne(TypeLocation::className(), ['id' => 'type_location_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\LocationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\LocationQuery(get_called_class());
    }
}
