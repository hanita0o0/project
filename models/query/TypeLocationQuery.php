<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\TypeLocation]].
 *
 * @see \app\models\TypeLocation
 */
class TypeLocationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\TypeLocation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\TypeLocation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function id_type_location($name)
    {
        return $this->andWhere(['name'=>$name]);
    }
}
