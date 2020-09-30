<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%code_phone}}".
 *
 * @property int $id
 * @property int $code
 * @property int|null $province_id
 *
 * @property Province $province
 * @property Service[] $services
 */
class CodePhone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%code_phone}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required','string'],
            [[ 'province_id'], 'integer'],
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
            'code' => 'Code',
            'province_id' => 'Province ID',
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
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\ServiceQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['code_phone_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CodePhoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CodePhoneQuery(get_called_class());
    }
}
