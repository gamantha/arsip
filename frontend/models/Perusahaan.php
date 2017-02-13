<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perusahaan".
 *
 * @property integer $perusahaan_id
 * @property string $nama_perusahaan
 */
class Perusahaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perusahaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_perusahaan'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'perusahaan_id' => 'No',
            'nama_perusahaan' => 'Nama Perusahaan',
        ];
    }
}
