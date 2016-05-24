<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
use app\models\Divisi;
use app\models\Tema;
use app\models\Jabatan;
use app\models\Penyimpanan;


/* @var $this yii\web\View */
/* @var $model app\models\Arsip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_surat')->textInput(['maxlength' => true]) ?>

    
	
	<?php $dataList=ArrayHelper::map(Perusahaan::find()->asArray()->all(), 'perusahaan_id', 'nama_perusahaan');?>
	 <?=$form->field($model, 'perusahaan_id')->dropDownList($dataList, 
         ['prompt'=>'-Pilih Perusahaan-']) ?>
	

   

   <?php $dataList=ArrayHelper::map(Divisi::find()->asArray()->all(), 'divisi_id', 'nama_divisi');?>
	 <?=$form->field($model, 'divisi_id')->dropDownList($dataList, 
         ['prompt'=>'-Pilih Divisi-']) ?>

   
	
	 <?php $dataList=ArrayHelper::map(Jabatan::find()->asArray()->all(), 'jabatan_id', 'nama_jabatan');?>
	 <?=$form->field($model, 'jabatan_id')->dropDownList($dataList, 
         ['prompt'=>'-Pilih Jabatan-']) ?>
	
	<?php $dataList=ArrayHelper::map(Jabatan::find()->asArray()->all(), 'tema_id', 'tema');?>
	 <?=$form->field($model, 'tema_id')->dropDownList($dataList, 
         ['prompt'=>'-Pilih Tema-']) ?>
	
    
	
	 <?php $dataList=ArrayHelper::map(Penyimpanan::find()->asArray()->all(), 'penyimpanan_id', 'tempat_penyimpanan');?>
	 <?=$form->field($model, 'penyimpanan_id')->dropDownList($dataList, 
         ['prompt'=>'-Pilih Penyimpanan-']) ?>
	
		<?= $form->field($model, 'tanggal_simpan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
