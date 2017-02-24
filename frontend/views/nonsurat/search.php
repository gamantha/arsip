<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
use app\models\Divisi;
use app\models\File;
use app\models\Jabatan;
use app\models\Filenonsurat;
use app\models\Tema;
use app\models\Penyimpanan;
use yii\grid\GridView;

use kartik\mpdf\Pdf;
use kartik\daterange\DateRangePicker;
//use kartik\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Nonsurat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nonsurat-form">

    <?php $form = ActiveForm::begin(); 

  //  $form->field($model, 'tema')->textInput(['maxlength' => true]);
    echo 'Tema<br/>';
    echo Html::input('text', 'tags', $searchtags);

?>



    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        
    </div>
    <?php ActiveForm::end(); ?>


<?php

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],


            'no_surat',

/*
            [
             'attribute' => 'perusahaan_id',
             'label'=>'Nama Perusahaan',
             //'filter'=>array('1'=>'MSU','2'=>'SKR','3'=>'SKI','4'=>'TSL','5'=>'PLATINUM','6'=>'SIG'),
'filter' => ArrayHelper::map(Perusahaan::find()->asArray()->All(), 'perusahaan_id', 'nama_perusahaan'),
             'value'=>'perusahaan.nama_perusahaan'
           ],
*/
            [
              'attribute' => 'divisi_id',
             'label'=>'Nama Divisi',
              //'filter'=>array('1'=>'PROD','2'=>'KU','3'=>'LG','4'=>'MRK','5'=>'PRC','6'=>'UM'),
     'filter' => ArrayHelper::map(Divisi::find()->asArray()->All(), 'divisi_id', 'nama_divisi'),
             'value'=>function($data) {return $data->divisi->nama_divisi;},
           ],

            'tema',


            [
             'attribute' => 'penyimpanan_id',
             'label'=>'Penyimpanan',
     'filter' => ArrayHelper::map(Penyimpanan::find()->asArray()->All(), 'penyimpanan_id', 'tempat_penyimpanan'),
             'value'=>function($data) {return $data->penyimpanan->tempat_penyimpanan;},
           ],



      [
             'attribute' => 'tipe',
             'label'=>'Tipe',
     'filter' => ['buku' => 'Buku', 'dokumen' => 'Dokumen', 'uu' => 'UU', 'peraturan' => 'Peraturan', 'lain-lain' => 'Lain-lain'],
             'value'=>function($data) {return $data->id;},
           ],


              [
              'attribute' => 'status',
             'label'=>'Status',
              'filter'=>array('valid'=>'valid','expired'=>'expired'),

           ],
           

                [
                'attribute' => 'modified_at',
                'value' => 'modified_at',
                'label' => 'Diubah pada',
                ],
                 //'receipt',

                 

         //   ['class' => 'yii\grid\ActionColumn'],

            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Action',
            'template' => '{view} {update}',
           ],



]
]);

?>

</div>
