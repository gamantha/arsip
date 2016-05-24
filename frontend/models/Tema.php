<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tema".
 *
 * @property integer $tema_id
 * @property string $tema
 */
class Tema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tema'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tema_id' => 'Tema ID',
            'tema' => 'Tema',
        ];
    }
}
