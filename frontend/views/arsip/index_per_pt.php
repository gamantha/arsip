<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
use app\models\Divisi;
use app\models\Tema;
use app\models\Jabatan;
use app\models\Upload;
use app\models\Penyimpanan;
use kartik\mpdf\Pdf;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    
    <p>
        <?= Html::a('Simpan Surat', ['arsip/create/' . $_GET['id']], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export to PDF', ['arsip/indexpt2?' . 'ArsipSearch[no_surat]=' . $_GET['ArsipSearch']['no_surat'] .                                                                           '&ArsipSearch[divisi_id]=' . $_GET['ArsipSearch']['divisi_id'] .                                                                         '&ArsipSearch[tema]=' . $_GET['ArsipSearch']['tema'] .
                                                          '&ArsipSearch[jabatan_id]=' . $_GET['ArsipSearch']['jabatan_id'] .                                                                       '&ArsipSearch[penyimpanan_id]=' . $_GET['ArsipSearch']['penyimpanan_id'] .                                                               '&ArsipSearch[jenis]=' . $_GET['ArsipSearch']['jenis'] .
                                                          '&ArsipSearch[created_at]=' . $_GET['ArsipSearch']['created_at'] .                                                                       '&ArsipSearch[modified_at]=' . $_GET['ArsipSearch']['modified_at'] .                                                                     '&ArsipSearch[receipt]=' . $_GET['ArsipSearch']['receipt'] .
                                                          '&id=' . $_GET['id']], ['class' => 'btn btn-danger']) ?>
    </p>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            ['class' => 'yii\grid\SerialColumn'],


            'no_surat',
            'detail',

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
             'attribute' => 'jabatan_id',
             'label'=>'Jabatan',
			  //'filter'=>array('1'=>'DIR','2'=>'MGR','3'=>'SM'),
     'filter' => ArrayHelper::map(Jabatan::find()->asArray()->All(), 'jabatan_id', 'nama_jabatan'),
             'value'=>function($data) {return $data->jabatan->nama_jabatan;},
           ],


			[
             'attribute' => 'penyimpanan_id',
             'label'=>'Penyimpanan',
     'filter' => ArrayHelper::map(Penyimpanan::find()->asArray()->All(), 'penyimpanan_id', 'tempat_penyimpanan'),
             'value'=>function($data) {return $data->penyimpanan->tempat_penyimpanan;},
           ],





			  [
              'attribute' => 'jenis',
             'label'=>'Tipe Surat',
			  'filter'=>array('Masuk'=>'Masuk','Keluar'=>'Keluar'),

           ],
            
            'dikirim_ke',

                 [
                    'attribute' => 'created_at',
                    'value' => 'created_at',
                    'label' => 'Dibuat pada',
                    'filter' => DateRangePicker::widget([
                        'model'=>$searchModel,
                        'attribute'=>'created_at',
                        'convertFormat'=>true,           
                        'pluginOptions'=>[
                           //'timePicker'=>true,
                           //'timePickerIncrement'=>30,
                           'locale'=>[
                               'format'=>'Y-m-d'
                           ]
                       ]
                    ]),
                    'format' => 'html',
                ],
                [
                'attribute' => 'modified_at',
                'value' => 'modified_at',
                'label' => 'Diubah pada',
                ],
            [
                    'attribute' => 'tanggal_simpan',
                    'value' => 'tanggal_simpan',
                    'label' => 'Dibuat pada',
                    'filter' => DateRangePicker::widget([
                        'model'=>$searchModel,
                        'attribute'=>'tanggal_simpan',
                        'convertFormat'=>true,           
                        'pluginOptions'=>[
                           //'timePicker'=>true,
                           //'timePickerIncrement'=>30,
                           'locale'=>[
                               'format'=>'Y-m-d'
                           ]
                       ]
                    ]),
                    'format' => 'html',
                ],
                 //'receipt',

                 [
                         'attribute' => 'receipt',
                         'label'=>'Tanda terima',
                         'format'=>'raw',

                        'filter'=>array('not required'=>'not required','required - sent'=>'required - sent','required - received'=>'required - received'),
                     //'options' => [ 'style' => 'background-color:red' ],
                         'value'=>function($data) {
                             /* $values=[
                                 'not required'=>'#ff0000',
                                 'required - sent'=>'#ff0000',
                                 'required - received'=>'#ff0000',
                             ];*/
                             if ($data->receipt == 'required - sent') {
                              $color = 'red';
                             } else if ($data->receipt == 'required - received') {
                              $color = 'green';
                             }
                             else if ($data->receipt == 'not required') {
                              $color = 'yellow';
                             }
                           return '<span style="background-color:'.$color.';"> '.$data->receipt.'</span>';
                           //   return Html::tag('span', $data->receipt, ['style'=>'background-color:' . (isset($values[$data->receipt]) ? $values[$data->receipt] : 'red')]);
//return Html::tag('span', $data->receipt,['style' => 'color:red;']);

                         },
                       ],


         //   ['class' => 'yii\grid\ActionColumn'],

            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Action',
            'template' => '{view} {update}',
           ],


        ],
    ]); ?>
    <p>
    </p>

</div>
