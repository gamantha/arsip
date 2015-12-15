<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "divisi".
 *
 * @property integer $divisi_id
 * @property string $nama_divisi
 */
class Divisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'divisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_divisi'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'divisi_id' => 'Divisi ID',
            'nama_divisi' => 'Nama Divisi',
        ];
    }
}
