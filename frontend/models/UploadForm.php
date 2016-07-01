<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $docFile;

    public function rules()
    {
        return [
            [['docFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, docx, xlsx, doc, xls, jpg, png'],
            
            
        ];
    }
    
    
    public function upload($id)
    {
        if ($this->validate()) {
            
            $filename = $this->docFile->baseName;
         //   $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->docFile->saveAs('uploads/surat/' . $id . '_' . $filename . '.' . $this->docFile->extension);
            return true;
        } else {
            return false;
        }
    }
}

?>