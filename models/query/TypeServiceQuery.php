<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\TypeService]].
 *
 * @see \app\models\TypeService
 */
class TypeServiceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\TypeService[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\TypeService|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function id_type_service($name)
    {
        return $this->andWhere(['name'=>$name]);
    }
}
