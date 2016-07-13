<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uploadnonsurat".
 *
 * @property integer $id
 * @property string $location
 * @property string $last_update
 * @property integer $nonsurat_id
 * @property string $nama_file
 */
class Uploadnonsurat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uploadnonsurat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location'], 'string'],
            [['last_update'], 'safe'],
            [['nonsurat_id'], 'integer'],
            [['nama_file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'location' => Yii::t('app', 'Location'),
            'last_update' => Yii::t('app', 'Last Update'),
            'nonsurat_id' => Yii::t('app', 'Nonsurat ID'),
            'nama_file' => Yii::t('app', 'Nama File'),
        ];
    }

    /**
     * @inheritdoc
     * @return UploadnonsuratQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UploadnonsuratQuery(get_called_class());
    }
}
