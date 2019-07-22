<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
use app\models\Kendaraan;
use app\models\Divisi;
use app\models\File;
use app\models\Jabatan;
use app\models\Filenonsurat;
use app\models\Tema;
use app\models\Penyimpanan;



/* @var $this yii\web\View */
/* @var $model app\models\ArsipKendaraan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-kendaraan-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php
    echo 'Tanggal<br/>';
        echo DatePicker::widget([
       'model' => $model,
       'attribute' => 'tanggal',
       'language' => 'en',
       'dateFormat' => 'yyyy-MM-dd',
       'options' => ['class' => 'form-control']
     ]);
    ?>


    <?php $carList=ArrayHelper::map(Kendaraan::find()->all(), 'id', 'nama');?>
     <?=$form->field($model, 'kendaraan_id')->dropDownList($carList,
         ['prompt'=>'-Pilih Kendaraan-']) ?>
    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biaya')->textInput()->label('Biaya(Rp)') ?>
     <?php 
     //$form->field($model, 'biaya', ['inputOptions' => ['value' => Yii::$app->formatter->asDecimal($model->attr)]])->textInput()->label('Biaya(Rp)')

     ?>

   <?= $form->field($model, 'tipe')->dropDownList(['stnk'=>'stnk', 'bpkb'=>'bpkb', 'bon servis'=>'bon servis'],['prompt'=>'Pilih Jenis Surat']); ?>

    <?= $form->field($model, 'no_surat')->textInput(['maxlength' => true]) ?>

    <?php $dataList=ArrayHelper::map(Penyimpanan::find()->andWhere(['kategori' => 'nonsurat'])->asArray()->all(), 'penyimpanan_id', 'tempat_penyimpanan');?>
     <?=$form->field($model, 'penyimpanan_id')->dropDownList($dataList,
         ['prompt'=>'-Pilih Penyimpanan-']) ?>

    <?php
    echo 'Expire date<br/>';
        echo DatePicker::widget([
       'model' => $model,
       'attribute' => 'expire_date',
       'language' => 'en',
       'dateFormat' => 'yyyy-MM-dd',
       'options' => ['class' => 'form-control']
     ]);
    ?>

    <?= $form->field($model, 'status')->dropDownList([ 'valid' => 'Valid', 'expired' => 'Expired', ], ['prompt' => '']) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
