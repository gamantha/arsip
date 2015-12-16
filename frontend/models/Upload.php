<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "upload".
 *
 * @property integer $id
 * @property string $location
 * @property string $last_update
 * @property integer $arsip_id
 * @property string $nama_file
 */
class Upload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location'], 'string'],
            [['last_update'], 'safe'],
            [['arsip_id'], 'integer'],
            [['nama_file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location' => 'Location',
            'last_update' => 'Last Update',
            'arsip_id' => 'Arsip ID',
            'nama_file' => 'Nama File',
        ];
    }

    /**
     * @inheritdoc
     * @return UploadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UploadQuery(get_called_class());
    }
}
