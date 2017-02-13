<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property string $file_location
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Data[] $datas
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_location'], 'string'],
            [['created_at', 'modified_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'file_location' => Yii::t('app', 'File Location'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatas()
    {
        return $this->hasMany(Data::className(), ['file_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return FileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileQuery(get_called_class());
    }
}
