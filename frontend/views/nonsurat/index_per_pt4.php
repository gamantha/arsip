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
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cetak Non Surat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    
    <?= Html::a('<i class="fa glyphicon glyphicon-print"></i> Laporan', ['/nonsurat/mpdf1?' . 'NonsuratSearch[no_surat]=' . $_GET['NonsuratSearch']['no_surat'] .                                                                           '&NonsuratSearch[divisi_id]=' . $_GET['NonsuratSearch']['divisi_id'] .                                                                         '&NonsuratSearch[tema]=' . $_GET['NonsuratSearch']['tema'] .
                                                          '&NonsuratSearch[penyimpanan_id]=' . $_GET['NonsuratSearch']['penyimpanan_id'] .                                                               '&NonsuratSearch[status]=' . $_GET['NonsuratSearch']['status'] .
                                                          '&NonsuratSearch[created_at]=' . $_GET['NonsuratSearch']['created_at'] .                                                                       '&NonsuratSearch[modified_at]=' . $_GET['NonsuratSearch']['modified_at'] .
                                                          '&id=' . $_GET['id']], [
        'class'=>'btn btn-success', 
        'target'=>'_blank', 
        'data-toggle'=>'tooltip', 
        'title'=>'Will open the generated PDF file in a new window'
    ]); ?>
    
    <br>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [


            ['class' => 'yii\grid\SerialColumn'],


                          [
              'attribute' => 'no_surat',
             'label'=>'No Arsip',

           ],

			[
             'attribute' => 'divisi_id',
             'label'=>'Nama Divisi',
			 'value'=>function($data) {return $data->divisi->nama_divisi;},
           ],
           'year',
           'tema',
			'judul',
                 [
                         'attribute' => 'deskripsi',
             'label'=>'Tentang',
           ],

			[
             'attribute' => 'penyimpanan_id',
             'label'=>'Penyimpanan',
             'value'=>function($data) {return $data->penyimpanan->tempat_penyimpanan;},
           ],





			  [
              'attribute' => 'status',
             'label'=>'Status',

           ],

                 [
    'attribute' => 'created_at',
    'value' => 'created_at',
    'label' => 'Dibuat pada',

    'format' => 'html',
],
                [
                'attribute' => 'modified_at',
                'value' => 'modified_at',
                'label' => 'Diubah pada',
                ],

        ],
    ]); ?>
    <p>
    </p>

</div>
