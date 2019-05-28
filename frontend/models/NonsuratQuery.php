<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Nonsurat]].
 *
 * @see Nonsurat
 */
class NonsuratQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Nonsurat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Nonsurat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
