<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Filenonsurat]].
 *
 * @see Filenonsurat
 */
class FilenonsuratQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Filenonsurat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Filenonsurat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
