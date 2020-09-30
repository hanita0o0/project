<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property int $id
 * @property int|null $code_phone_id
 * @property int $phone
 * @property int|null $location_id
 * @property int|null $type_service_id
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property CodePhone $codePhone
 * @property User $createdBy
 * @property Location $location
 * @property TypeService $typeService
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%service}}';
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
            [['code_phone_id', 'location_id', 'type_service_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            ['phone', 'string','length'=>8],
            [['phone'],'required'],
            [['phone'],'unique','message'=>'این سرویس قبلا ثبت شده است.'],
            [['code_phone_id'], 'exist', 'skipOnError' => true, 'targetClass' => CodePhone::className(), 'targetAttribute' => ['code_phone_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
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
            'code_phone_id' => 'پیش شماره',
            'phone' => 'تلفن',
            'location_id' => 'نقطه/پاپ سایت',
            'type_service_id' => 'نوع سرویس',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CodePhone]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CodePhoneQuery
     */
    public function getCodePhone()
    {
        return $this->hasOne(CodePhone::className(), ['id' => 'code_phone_id']);
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
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\LocationQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
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
     * @return \app\models\query\ServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ServiceQuery(get_called_class());
    }
}
