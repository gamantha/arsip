<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arsip".
 *
 * @property integer $id
 * @property string $no_surat
 * @property string $tanggal_simpan
 * @property integer $perusahaan_id
 * @property integer $divisi_id
 * @property integer $tema_id
 * @property integer $jabatan_id
 * @property integer $penyimpanan_id
 * @property string $jenis
 * @property string $dikirim_ke
 * @property string $created_at
 * @property string $modified_at
 * @property string $receipt
 * @property integer $year
 * @property string $detail
 *
 * @property Penyimpanan $penyimpanan
 * @property Divisi $divisi
 * @property Jabatan $jabatan
 * @property Perusahaan $perusahaan
 * @property Tema $tema
 */
class Arsip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arsip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_surat', 'tanggal_simpan', 'perusahaan_id', 'divisi_id', 'tema_id', 'jabatan_id', 'penyimpanan_id', 'jenis', 'year', 'detail'], 'required'],
            [['tanggal_simpan', 'created_at', 'modified_at'], 'safe'],
            [['perusahaan_id', 'divisi_id', 'tema_id', 'jabatan_id', 'penyimpanan_id', 'year'], 'integer'],
            [['jenis', 'receipt'], 'string'],
            [['no_surat', 'dikirim_ke', 'detail'], 'string', 'max' => 255],
            [['no_surat', 'year'], 'unique', 'targetAttribute' => ['no_surat', 'year'], 'message' => 'The combination of No Surat and Year has already been taken.'],
            [['penyimpanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Penyimpanan::className(), 'targetAttribute' => ['penyimpanan_id' => 'penyimpanan_id']],
            [['divisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['divisi_id' => 'divisi_id']],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['jabatan_id' => 'jabatan_id']],
            [['perusahaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perusahaan::className(), 'targetAttribute' => ['perusahaan_id' => 'perusahaan_id']],
            [['tema_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tema::className(), 'targetAttribute' => ['tema_id' => 'tema_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'no_surat' => Yii::t('app', 'No Surat'),
            'tanggal_simpan' => Yii::t('app', 'Tanggal Simpan'),
            'perusahaan_id' => Yii::t('app', 'Perusahaan ID'),
            'divisi_id' => Yii::t('app', 'Divisi ID'),
            'tema_id' => Yii::t('app', 'Tema ID'),
            'jabatan_id' => Yii::t('app', 'Jabatan ID'),
            'penyimpanan_id' => Yii::t('app', 'Penyimpanan ID'),
            'jenis' => Yii::t('app', 'Jenis'),
            'dikirim_ke' => Yii::t('app', 'Dikirim Ke'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
            'receipt' => Yii::t('app', 'Receipt'),
            'year' => Yii::t('app', 'Year'),
            'detail' => Yii::t('app', 'Detail'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
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
     * @return ArsipQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArsipQuery(get_called_class());
    }
}
