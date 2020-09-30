<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property UserRole[] $userRoles
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const ADMIN ='administrator';
    const USER = 'user';
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
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
        ];
    }

    /**
     * Gets query for [[UserRoles]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\UserRoleQuery
     */
    public function getUserRoles()
    {
        return $this->hasMany(UserRole::className(), ['role_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\RoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\RoleQuery(get_called_class());
    }
}
