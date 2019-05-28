<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arsip_kendaraan".
 *
 * @property int $id
 * @property string $tanggal
 * @property int $kendaraan_id
 * @property string $keterangan
 * @property string $tempat
 * @property int $biaya
 * @property string $tipe
 * @property string $no_surat
 * @property int $penyimpanan_id
 * @property string $pic
 * @property string $expire_date
 * @property string $status
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Kendaraan $kendaraan
 * @property Penyimpanan $penyimpanan
 */
class ArsipKendaraan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arsip_kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal', 'created_at', 'modified_at'], 'safe'],
            [['kendaraan_id', 'biaya', 'penyimpanan_id'], 'integer'],
            [['keterangan'], 'string'],
            [['tempat', 'tipe', 'no_surat', 'pic', 'expire_date', 'status'], 'string', 'max' => 255],
            [['kendaraan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kendaraan::className(), 'targetAttribute' => ['kendaraan_id' => 'id']],
            [['penyimpanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Penyimpanan::className(), 'targetAttribute' => ['penyimpanan_id' => 'penyimpanan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tanggal' => Yii::t('app', 'Tanggal'),
            'kendaraan_id' => Yii::t('app', 'Kendaraan ID'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'tempat' => Yii::t('app', 'Tempat'),
            'biaya' => Yii::t('app', 'Biaya'),
            'tipe' => Yii::t('app', 'Tipe'),
            'no_surat' => Yii::t('app', 'No Surat'),
            'penyimpanan_id' => Yii::t('app', 'Penyimpanan ID'),
            'pic' => Yii::t('app', 'Pic'),
            'expire_date' => Yii::t('app', 'Expire Date'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKendaraan()
    {
        return $this->hasOne(Kendaraan::className(), ['id' => 'kendaraan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyimpanan()
    {
        return $this->hasOne(Penyimpanan::className(), ['penyimpanan_id' => 'penyimpanan_id']);
    }

    /**
     * @inheritdoc
     * @return ArsipKendaraanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArsipKendaraanQuery(get_called_class());
    }
}
