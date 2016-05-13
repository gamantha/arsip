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
       [['id', 'no_surat', 'tanggal_simpan', 'perusahaan_id', 'divisi_id', 'tema', 'jabatan_id', 'penyimpanan_id', 'jenis'], 'required'],
       [['id', 'perusahaan_id', 'divisi_id', 'jabatan_id', 'penyimpanan_id'], 'integer'],
       [['tanggal_simpan', 'created_at', 'modified_at'], 'safe'],
       [['jenis'], 'string'],
       [['no_surat', 'tema', 'dikirim_ke'], 'string', 'max' => 255],
       [['penyimpanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Penyimpanan::className(), 'targetAttribute' => ['penyimpanan_id' => 'penyimpanan_id']],
       [['divisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['divisi_id' => 'divisi_id']],
       [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['jabatan_id' => 'jabatan_id']],
       [['perusahaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perusahaan::className(), 'targetAttribute' => ['perusahaan_id' => 'perusahaan_id']],
   ];

   /*
       return [

           [['no_surat', 'tanggal_simpan', 'perusahaan_id', 'divisi_id', 'tema', 'jabatan_id', 'penyimpanan_id', 'jenis'], 'required'],
           [['tanggal_simpan'], 'safe'],
           [['perusahaan_id', 'divisi_id', 'jabatan_id', 'penyimpanan_id'], 'integer'],
           [['no_surat'], 'string', 'max' => 255],
           [['no_surat','tema', 'jenis'], 'string', 'max' => 255]
       ];
       */
   }

 public function getDivisi()
    {
        return $this->hasOne(Divisi::className(), ['divisi_id' => 'divisi_id']);
    }
	public function getPerusahaan()
    {
        return $this->hasOne(Perusahaan::className(), ['perusahaan_id' => 'perusahaan_id']);
    }



	public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['jabatan_id' => 'jabatan_id']);
    }

	public function getPenyimpanan()
    {
        return $this->hasOne(Penyimpanan::className(), ['penyimpanan_id' => 'penyimpanan_id']);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_surat' => 'No Surat',
            'tanggal_simpan' => 'Tanggal',
            'perusahaan_id' => 'Perusahaan',
            'divisi_id' => 'Divisi',
            'tema' => 'Tema',
            'jabatan_id' => 'Jabatan',
            'penyimpanan_id' => 'Penyimpanan',
			'jenis'=>'Jenis',
        ];
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
