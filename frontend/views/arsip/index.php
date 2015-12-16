<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
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
        <?= Html::a('Simpan Surat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
		
		
            ['class' => 'yii\grid\SerialColumn'],

          
            'no_surat',
           
          
			[
             'attribute' => 'perusahaan_id',
             'label'=>'Nama Perusahaan',
			 'filter'=>array('1'=>'MSU','2'=>'SKR','3'=>'SKI','4'=>'TSL','5'=>'PLATINUM','6'=>'SIG'),
             'value'=>'perusahaan.nama_perusahaan'
           ],
            
			[
              'attribute' => 'divisi_id',
             'label'=>'Nama Divisi',
			  'filter'=>array('1'=>'PROD','2'=>'KU','3'=>'LG','4'=>'MRK','5'=>'PRC','6'=>'UM'),
             'value'=>function($data) {return $data->divisi->nama_divisi;},
           ],
            
			'tema',
			 
			 
            
			  [
             'attribute' => 'jabatan_id',
             'label'=>'Jabatan',
			  'filter'=>array('1'=>'DIR','2'=>'MGR','3'=>'SM'),
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
			  'filter'=>array('Masuk'=>'Masuk','Keluar'=>'Keluar'),
             
           ],
			  

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
