<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Filekendaraan]].
 *
 * @see Filekendaraan
 */
class FilekendaraanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Filekendaraan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Filekendaraan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
