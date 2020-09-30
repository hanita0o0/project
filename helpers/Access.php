<?php
/**
 * Created by PhpStorm.
 * User: shahla
 * Date: 9/29/2020
 * Time: 7:58 PM
 */

namespace app\helpers;


use app\models\Role;
use app\models\UserRole;

class Access
{
    public static function accessAdmin($userId)
    {
        $role = Role::find()->where(['name'=>'administrator'])->one();
        $role_id = $role->id;
        $userRole = UserRole::find()
            ->select(['role_id'])
            ->where(['user_id'=>$userId])
            ->asArray()
            ->all();
        $roles=[];
        foreach ($userRole as $value)
        {
            foreach ($value  as $val){

                array_push($roles,$val);

            }

        }

        if(false !== array_search($role_id,$roles))
        {
            return true;

        }
        else{
            return false;
        }
    }

}