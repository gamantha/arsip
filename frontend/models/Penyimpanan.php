<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penyimpanan".
 *
 * @property integer $penyimpanan_id
 * @property string $tempat_penyimpanan
 */
class Penyimpanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penyimpanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tempat_penyimpanan'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'penyimpanan_id' => 'Penyimpanan ID',
            'tempat_penyimpanan' => 'Tempat Penyimpanan',
        ];
    }
}
