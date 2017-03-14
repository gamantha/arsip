<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kendaraan".
 *
 * @property int $id
 * @property string $nama
 * @property string $warna
 * @property string $merk
 * @property string $model
 * @property string $tahun
 * @property string $driver
 * @property string $nama_pemilik
 * @property string $alamat_pemilik
 * @property string $plat
 * @property string $catatan
 * @property string $image
 *
 * @property ArsipKendaraan[] $arsipKendaraans
 */
class Kendaraan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catatan'], 'string'],
            [['nama', 'warna', 'merk', 'model', 'tahun', 'driver', 'nama_pemilik', 'alamat_pemilik', 'plat', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'warna' => Yii::t('app', 'Warna'),
            'merk' => Yii::t('app', 'Merk'),
            'model' => Yii::t('app', 'Model'),
            'tahun' => Yii::t('app', 'Tahun'),
            'driver' => Yii::t('app', 'Driver'),
            'nama_pemilik' => Yii::t('app', 'Nama Pemilik'),
            'alamat_pemilik' => Yii::t('app', 'Alamat Pemilik'),
            'plat' => Yii::t('app', 'Plat'),
            'catatan' => Yii::t('app', 'Catatan'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsipKendaraans()
    {
        return $this->hasMany(ArsipKendaraan::className(), ['kendaraan_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return KendaraanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KendaraanQuery(get_called_class());
    }
}
