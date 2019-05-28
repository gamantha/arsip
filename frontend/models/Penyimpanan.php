<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penyimpanan".
 *
 * @property int $penyimpanan_id
 * @property string $tempat_penyimpanan
 * @property string $kategori
 *
 * @property Arsip[] $arsips
 * @property Nonsurat[] $nonsurats
 */
class Penyimpanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penyimpanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tempat_penyimpanan', 'kategori'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'penyimpanan_id' => Yii::t('app', 'Penyimpanan ID'),
            'tempat_penyimpanan' => Yii::t('app', 'Tempat Penyimpanan'),
            'kategori' => Yii::t('app', 'Kategori'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsips()
    {
        return $this->hasMany(Arsip::className(), ['penyimpanan_id' => 'penyimpanan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNonsurats()
    {
        return $this->hasMany(Nonsurat::className(), ['penyimpanan_id' => 'penyimpanan_id']);
    }

    /**
     * @inheritdoc
     * @return PenyimpananQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenyimpananQuery(get_called_class());
    }
}
