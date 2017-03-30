<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
use app\models\Kendaraan;
use app\models\Divisi;
use app\models\Filekendaraan;
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

   <?= $form->field($model, 'tipe')->dropDownList(['buku' => 'Buku', 'dokumen' => 'Dokumen', 'uu' => 'UU', 'peraturan' => 'Peraturan', 'lain-lain' => 'Lain-lain'],['prompt'=>'Pilih Jenis Surat']); ?>

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
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
        <?php
        
        if($model->isNewRecord){
            
        } else {
            $request = Yii::$app->request;
            $id = $request->get('id');
            echo Html::a(Yii::t('app', 'Upload File'), ['arsipkendaraan/upload/', 'id' => $id], ['class' => 'btn btn-success']);
            echo '<br>';
            echo '<br>';
            $filemodels=FileKendaraan::find()->andWhere(['arsip_kendaraan_id' => $model->id])->All();
            foreach ($filemodels as $filemodel) {            
                echo $filemodel->file_location;
                echo '&nbsp';
                echo '&nbsp';
                echo '&nbsp';
                echo Html::a(Yii::t('app', 'Download File'), ['../uploads/kendaraan/'. $filemodel->file_location], ['class' => 'btn btn-success']);
                echo '&nbsp';
                echo '&nbsp';
                echo '&nbsp';
                echo Html::a('Delete', ['filekendaraan/delete', 'id' => $filemodel->id], [
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
