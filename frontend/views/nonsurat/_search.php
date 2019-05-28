<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NonsuratSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nonsurat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_surat') ?>

    <?= $form->field($model, 'tanggal_simpan') ?>

    <?= $form->field($model, 'perusahaan_id') ?>

    <?= $form->field($model, 'divisi_id') ?>

    <?php // echo $form->field($model, 'tema_id') ?>

    <?php // echo $form->field($model, 'penyimpanan_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
