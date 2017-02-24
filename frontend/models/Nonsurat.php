<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nonsurat".
 *
 * @property int $id
 * @property string $no_surat
 * @property string $judul
 * @property string $tipe
 * @property string $tanggal_simpan
 * @property int $perusahaan_id
 * @property int $divisi_id
 * @property string $tema
 * @property string $deskripsi
 * @property int $penyimpanan_id
 * @property string $status
 * @property string $expire_date
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Divisi $divisi
 * @property Penyimpanan $penyimpanan
 * @property Perusahaan $perusahaan
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
            [['no_surat', 'tanggal_simpan', 'perusahaan_id', 'divisi_id', 'tema', 'penyimpanan_id', 'status', 'created_at', 'modified_at'], 'required'],
            [['tipe', 'deskripsi', 'status'], 'string'],
            [['tanggal_simpan', 'expire_date', 'created_at', 'modified_at'], 'safe'],
            [['perusahaan_id', 'divisi_id', 'penyimpanan_id'], 'integer'],
            [['no_surat', 'judul', 'tema'], 'string', 'max' => 255],
            [['no_surat'], 'unique'],
            [['divisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['divisi_id' => 'divisi_id']],
            [['penyimpanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Penyimpanan::className(), 'targetAttribute' => ['penyimpanan_id' => 'penyimpanan_id']],
            [['perusahaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perusahaan::className(), 'targetAttribute' => ['perusahaan_id' => 'perusahaan_id']],
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
            'judul' => Yii::t('app', 'Judul'),
            'tipe' => Yii::t('app', 'Tipe'),
            'tanggal_simpan' => Yii::t('app', 'Tanggal Simpan'),
            'perusahaan_id' => Yii::t('app', 'Perusahaan ID'),
            'divisi_id' => Yii::t('app', 'Divisi ID'),
            'tema' => Yii::t('app', 'Tema'),
            'deskripsi' => Yii::t('app', 'Deskripsi'),
            'penyimpanan_id' => Yii::t('app', 'Penyimpanan ID'),
            'status' => Yii::t('app', 'Status'),
            'expire_date' => Yii::t('app', 'Expire Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
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
    public function getPenyimpanan()
    {
        return $this->hasOne(Penyimpanan::className(), ['penyimpanan_id' => 'penyimpanan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerusahaan()
    {
        return $this->hasOne(Perusahaan::className(), ['perusahaan_id' => 'perusahaan_id']);
    }
          public function getJabatan()  
  {  
      return $this->hasOne(Jabatan::className(), ['jabatan_id' => 'jabatan_id']);  
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
