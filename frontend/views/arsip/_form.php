<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
use app\models\Divisi;
use app\models\Jabatan;
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
         ['prompt'=>'-Pilih Tema-']) ?>

   <?php $dataList=ArrayHelper::map(Jabatan::find()->asArray()->all(), 'jabatan_id', 'nama_jabatan');?>
	 <?=$form->field($model, 'jabatan_id')->dropDownList($dataList,
         ['prompt'=>'-Pilih Jabatan-']) ?>

    <?php $dataList=ArrayHelper::map(Penyimpanan::find()->asArray()->all(), 'penyimpanan_id', 'tempat_penyimpanan');?>
	 <?=$form->field($model, 'penyimpanan_id')->dropDownList($dataList,
         ['prompt'=>'-Pilih Penyimpanan-']) ?>

	 <?= $form->field($model, 'jenis')->dropDownList(['masuk' => 'Masuk', 'keluar' => 'Keluar'],['prompt'=>'Pilih Jenis Surat']); ?>

      <?= $form->field($model, 'dikirim_ke')->textInput(['maxlength' => true]) ?>

      	   <?= $form->field($model, 'receipt')->dropDownList([ 'required - received' => 'Required - received', 'required - sent' => 'Required - sent', 'not required' => 'Not required', ], ['prompt' => '']) ?>

    <?php
echo '<label class="control-label">Upload Document</label>';
print_r(Url::to(['site/doc']));
echo FileInput::widget([
    'name' => 'attachment_48',
    'pluginOptions' => [
        'uploadUrl' => Url::to(['doc']),
        
        'maxFileCount' => 10
    ]
]); ?>
    <br>
    <br>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    
    <?php ActiveForm::end(); ?>

</div>
