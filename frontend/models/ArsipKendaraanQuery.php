<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ArsipKendaraan]].
 *
 * @see ArsipKendaraan
 */
class ArsipKendaraanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArsipKendaraan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArsipKendaraan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
