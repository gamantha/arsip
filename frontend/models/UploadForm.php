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
    public function uploadImageKendaraan($id)
    {
        if ($this->validate()) {
            
            $filename = $this->docFile->baseName;
         //   $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->docFile->saveAs('uploads/images/kendaraan/' . $id . '_' . $filename . '.' . $this->docFile->extension);
            return true;
        } else {
            return false;
        }
    }
    public function uploadArsipKendaraan($id)
    {
        if ($this->validate()) {
            
            $filename = $this->docFile->baseName;
         //   $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->docFile->saveAs('uploads/kendaraan/' . $id . '_' . $filename . '.' . $this->docFile->extension);
            return true;
        } else {
            return false;
        }
    }
    public function uploadNonsurat($id)
    {
        if ($this->validate()) {
            
            $filename = $this->docFile->baseName;
         //   $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->docFile->saveAs('uploads/nonsurat/' . $id . '_' . $filename . '.' . $this->docFile->extension);
            return true;
        } else {
            return false;
        }
    }
}

?>