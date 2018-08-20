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

$this->title = 'Cetak Surat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    
    <?= Html::a('<i class="fa glyphicon glyphicon-print"></i> Laporan', ['/arsip/mpdf1?' . 'ArsipSearch[no_surat]=' . $_GET['ArsipSearch']['no_surat'] .                                                                           '&ArsipSearch[divisi_id]=' . $_GET['ArsipSearch']['divisi_id'] .                                                                         '&ArsipSearch[tema]=' . $_GET['ArsipSearch']['tema'] .
                                                          '&ArsipSearch[jabatan_id]=' . $_GET['ArsipSearch']['jabatan_id'] .                                                                       '&ArsipSearch[penyimpanan_id]=' . $_GET['ArsipSearch']['penyimpanan_id'] .                                                               '&ArsipSearch[jenis]=' . $_GET['ArsipSearch']['jenis'] .
                                                          '&ArsipSearch[created_at]=' . $_GET['ArsipSearch']['created_at'] .                                                                       '&ArsipSearch[modified_at]=' . $_GET['ArsipSearch']['modified_at'] .                                                                     '&ArsipSearch[receipt]=' . $_GET['ArsipSearch']['receipt'] .
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


            'no_surat',

			[
             'attribute' => 'divisi_id',
             'label'=>'Nama Divisi',
			 'value'=>function($data) {return $data->divisi->nama_divisi;},
           ],
            
            'tema',



			  [
             'attribute' => 'jabatan_id',
             'label'=>'Jabatan',
			 'value'=>function($data) {return $data->jabatan->nama_jabatan;},
           ],


			[
             'attribute' => 'penyimpanan_id',
             'label'=>'Penyimpanan',
             'value'=>function($data) {return $data->penyimpanan->tempat_penyimpanan;},
           ],





			  [
              'attribute' => 'jenis',
             'label'=>'Tipe Surat',

           ],
           [
                    'attribute' => 'dikirim_ke',
                   'label'=>'Dikirim ke',
      			  
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
                 [
                         'attribute' => 'receipt',
                         'label'=>'Tanda terima',
                         'format'=>'raw',

                       
                         'value'=>function($data) {
                             if ($data->receipt == 'required - sent') {
                              $color = 'red';
                             } else if ($data->receipt == 'required - received') {
                              $color = 'green';
                             }
                           return '<span style="background-color:'.$color.';"> '.$data->receipt.'</span>';
                         },
                       ],




        ],
    ]); ?>
    <p>
    </p>

</div>
