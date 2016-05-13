<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Arsip]].
 *
 * @see Arsip
 */
class ArsipQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Arsip[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Arsip|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
