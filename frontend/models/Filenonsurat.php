<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filenonsurat".
 *
 * @property int $id
 * @property int $nonsurat_id
 * @property string $file_location
 * @property string $created_at
 * @property string $modified_at
 */
class Filenonsurat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filenonsurat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['nonsurat_id', 'file_location', 'created_at', 'modified_at'], 'required'],
            [['nonsurat_id'], 'integer'],
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
            'nonsurat_id' => Yii::t('app', 'Nonsurat ID'),
            'file_location' => Yii::t('app', 'File Location'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }

    /**
     * @inheritdoc
     * @return FilenonsuratQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilenonsuratQuery(get_called_class());
    }
}
