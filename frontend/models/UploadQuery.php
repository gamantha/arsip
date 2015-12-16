<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Upload]].
 *
 * @see Upload
 */
class UploadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Upload[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Upload|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
