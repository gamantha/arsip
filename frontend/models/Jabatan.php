<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property integer $jabatan_id
 * @property string $nama_jabatan
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_jabatan'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jabatan_id' => 'Jabatan ID',
            'nama_jabatan' => 'Nama Jabatan',
        ];
    }
}
