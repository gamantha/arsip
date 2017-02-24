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
use yii\db\Expression;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Non Surat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nonsurat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    
    <p>
                    <?= Html::a('Search by tags / tema', ['nonsurat/search/' . $_GET['id']], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Simpan Non Surat', ['nonsurat/create/' . $_GET['id']], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export to PDF', ['nonsurat/indexpt4?' . 'NonsuratSearch[no_surat]=' . $_GET['NonsuratSearch']['no_surat'] .                                                                           '&NonsuratSearch[divisi_id]=' . $_GET['NonsuratSearch']['divisi_id'] .                                                                         

          //'&NonsuratSearch[tema]=' . $_GET['NonsuratSearch']['tema'] .
                                                              '&NonsuratSearch[penyimpanan_id]=' . $_GET['NonsuratSearch']['penyimpanan_id'] .                                                               '&NonsuratSearch[status]=' . $_GET['NonsuratSearch']['status'] .
                                                          '&NonsuratSearch[created_at]=' . $_GET['NonsuratSearch']['created_at'] .                                                                       '&NonsuratSearch[modified_at]=' . $_GET['NonsuratSearch']['modified_at'] .                                                                     '&id=' . $_GET['id']], ['class' => 'btn btn-danger']) ?>
    </p>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
   'rowOptions' => function ($model, $index, $widget, $grid){


    //$onemonth = new Expression('DATE_ADD(NOW(), INTERVAL 1 MONTH)');
//date('Y-m-d', strtotime($effectiveDate . "+3 months") );

//echo $model->expire_date;
$onemonth = date("Y-m-d", strtotime(date("Y-m-d") . "+1 months"));
//echo '<br/>';
    if ($model->status == 'expired')
     {   $color = 'red';
      $fontcolor = 'white';
    }
      else {
          if(isset($model->expire_date) && !empty($model->expire_date)) {
              if ($model->expire_date <= $onemonth) {
              $color = 'yellow';
              $fontcolor = 'black';
              } else {
              $color = 'none';
              $fontcolor = 'black';
            }
          } else {
                          $color = 'none';
              $fontcolor = 'black';
          }
      }
      return ['style'=>'color:'.$fontcolor.'; background-color:'.$color.';'];
    },

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
           'judul',
			//'tema',


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
            'value' => function($data) {return $data->status;}
           ],
           'expire_date',
           
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
                 //'receipt',

                 

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
