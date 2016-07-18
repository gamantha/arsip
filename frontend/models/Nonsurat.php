<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nonsurat".
 *
 * @property integer $id
 * @property string $no_surat
 * @property string $tanggal_simpan
 * @property integer $perusahaan_id
 * @property integer $divisi_id
 * @property integer $tema_id
 * @property integer $penyimpanan_id
 * @property string $status
 * @property string $created_at
 * @property string $modified_at
 */
class Nonsurat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nonsurat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_surat', 'tanggal_simpan', 'perusahaan_id', 'divisi_id', 'tema_id', 'penyimpanan_id', 'status', 'created_at', 'modified_at'], 'required'],
            [['tanggal_simpan', 'created_at', 'modified_at'], 'safe'],
            [['perusahaan_id', 'divisi_id', 'tema_id', 'penyimpanan_id'], 'integer'],
            [['status'], 'string'],
            [['no_surat'], 'string', 'max' => 255],
            [['no_surat'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'no_surat' => Yii::t('app', 'No Arsip'),
            'tanggal_simpan' => Yii::t('app', 'Tanggal Simpan'),
            'perusahaan_id' => Yii::t('app', 'Perusahaan ID'),
            'divisi_id' => Yii::t('app', 'Divisi ID'),
            'tema_id' => Yii::t('app', 'Tema ID'),
            'penyimpanan_id' => Yii::t('app', 'Penyimpanan ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }
    
    public function getPenyimpanan()
    {
        return $this->hasOne(Penyimpanan::className(), ['penyimpanan_id' => 'penyimpanan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisi()
    {
        return $this->hasOne(Divisi::className(), ['divisi_id' => 'divisi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['jabatan_id' => 'jabatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerusahaan()
    {
        return $this->hasOne(Perusahaan::className(), ['perusahaan_id' => 'perusahaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTema()
    {
        return $this->hasOne(Tema::className(), ['tema_id' => 'tema_id']);
    }

    /**
     * @inheritdoc
     * @return NonsuratQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NonsuratQuery(get_called_class());
    }
}
