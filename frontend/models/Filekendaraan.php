<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filekendaraan".
 *
 * @property int $id
 * @property int $arsip_kendaraan_id
 * @property string $file_location
 * @property string $created_at
 * @property string $modified_at
 */
class Filekendaraan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filekendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arsip_kendaraan_id'], 'integer'],
            [['file_location'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'arsip_kendaraan_id' => Yii::t('app', 'Arsip Kendaraan ID'),
            'file_location' => Yii::t('app', 'File Location'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }

    /**
     * @inheritdoc
     * @return FilekendaraanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilekendaraanQuery(get_called_class());
    }
}
