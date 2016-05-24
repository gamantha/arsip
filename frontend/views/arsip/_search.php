<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_surat') ?>

    <?= $form->field($model, 'tanggal_simpan') ?>

    <?= $form->field($model, 'perusahaan_id') ?>

    <?= $form->field($model, 'divisi_id') ?>
    
    <?= $form->field($model, 'tema_id') ?>

    <?php // echo $form->field($model, 'tema_id') ?>

    <?php // echo $form->field($model, 'jabatan_id') ?>

    <?php // echo $form->field($model, 'penyimpanan_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
