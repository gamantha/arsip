<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kendaraan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kendaraan-form">



    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>






    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemilik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pemilik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plat')->textInput(['maxlength' => true]) ?>

    <?php

    /* echo $form->field($model, 'catatan')->textarea(['rows' => 6]);
    echo Html::img('@web/uploads/images/kendaraan/' . $model->image); 
    echo $form->field($uploadmodel, 'docFile')->fileInput();
*/?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
