<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tema]].
 *
 * @see Tema
 */
class TemaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Tema[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tema|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
