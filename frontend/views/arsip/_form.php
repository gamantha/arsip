<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
use app\models\Divisi;
use app\models\Jabatan;
use app\models\File;
use app\models\Tema;
use app\models\Penyimpanan;
use yii\jui\DatePicker;
use kartik\file\FileInput;
use kartik\time\TimePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Arsip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_surat')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'tanggal_simpan')->textInput() ?>

	<?php
     	DatePicker::widget([
       'model' => $model,
       'attribute' => 'tanggal_simpan',
       'language' => 'en',
       'dateFormat' => 'yyyy-MM-dd',
     ]);

  ?>



    <?php $dataList=ArrayHelper::map(Divisi::find()->asArray()->all(), 'divisi_id', 'nama_divisi');?>
	 <?=$form->field($model, 'divisi_id')->dropDownList($dataList,
         ['prompt'=>'-Pilih Divisi-']) ?>

    <?php $dataList=ArrayHelper::map(Tema::find()->asArray()->all(), 'tema_id', 'tema');?>
	 <?=$form->field($model, 'tema_id')->dropDownList($dataList,
         ['prompt'=>'-Pilih Perihal-']) ?>

   <?php $dataList=ArrayHelper::map(Jabatan::find()->asArray()->all(), 'jabatan_id', 'nama_jabatan');?>
	 <?=$form->field($model, 'jabatan_id')->dropDownList($dataList,
         ['prompt'=>'-Pilih Jabatan-']) ?>

    <?php $dataList=ArrayHelper::map(Penyimpanan::find()->asArray()->all(), 'penyimpanan_id', 'tempat_penyimpanan');?>
	 <?=$form->field($model, 'penyimpanan_id')->dropDownList($dataList,
         ['prompt'=>'-Pilih Penyimpanan-']) ?>

	 <?= $form->field($model, 'jenis')->dropDownList(['masuk' => 'Masuk', 'keluar' => 'Keluar'],['prompt'=>'Pilih Jenis Surat']); ?>

      <?= $form->field($model, 'dikirim_ke')->textInput(['maxlength' => true]) ?>

      	   <?= $form->field($model, 'receipt')->dropDownList([ 'required - received' => 'Required - received', 'required - sent' => 'Required - sent', 'not required' => 'Not required', ], ['prompt' => '']) ?>

    
    <br>
    <br>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
        <?php
        
        if($model->isNewRecord){
            
        } else {
            $request = Yii::$app->request;
            $id = $request->get('id');
            echo Html::a(Yii::t('app', 'Upload File'), ['arsip/upload/', 'id' => $id], ['class' => 'btn btn-success']);
            echo '<br>';
            echo '<br>';
            $filemodels=File::find()->andWhere(['arsip_id' => $model->id])->All();
            foreach ($filemodels as $filemodel) {            
                echo $filemodel->file_location;
                echo '&nbsp';
                echo '&nbsp';
                echo '&nbsp';
                echo Html::a(Yii::t('app', 'Download File'), ['../uploads/surat/'. $filemodel->file_location], ['class' => 'btn btn-success']);
                echo '&nbsp';
                echo '&nbsp';
                echo '&nbsp';
                echo Html::a('Delete', ['file/delete', 'id' => $filemodel->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]);
                echo '<br>';
            }
        }
        ?>
    </div>


    
    <?php ActiveForm::end(); ?>

</div>
