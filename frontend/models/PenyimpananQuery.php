<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Penyimpanan]].
 *
 * @see Penyimpanan
 */
class PenyimpananQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Penyimpanan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Penyimpanan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
