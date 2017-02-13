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
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NonsuratSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nonsurats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nonsurat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Nonsurat', ['create'], ['class' => 'btn btn-success']) ?>
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
			 //'filter'=>array('1'=>'MSU','2'=>'SKR','3'=>'SKI','4'=>'TSL','5'=>'PLATINUM','6'=>'SIG'),
                'filter' => ArrayHelper::map(Perusahaan::find()->asArray()->All(), 'perusahaan_id', 'nama_perusahaan'),
             'value'=>'perusahaan.nama_perusahaan'
           ],

			[
              'attribute' => 'divisi_id',
             'label'=>'Nama Divisi',
			  //'filter'=>array('1'=>'PROD','2'=>'KU','3'=>'LG','4'=>'MRK','5'=>'PRC','6'=>'UM'),
     'filter' => ArrayHelper::map(Divisi::find()->asArray()->All(), 'divisi_id', 'nama_divisi'),
             'value'=>function($data) {return $data->divisi->nama_divisi;},
           ],

			[
              'attribute' => 'tema_id',
             'label'=>'Nama Tema',
			  //'filter'=>array('1'=>'PROD','2'=>'KU','3'=>'LG','4'=>'MRK','5'=>'PRC','6'=>'UM'),
     'filter' => ArrayHelper::map(Tema::find()->asArray()->All(), 'tema_id', 'tema'),
             'value'=>function($data) {return $data->tema->tema;},
           ],



			[
             'attribute' => 'penyimpanan_id',
             'label'=>'Penyimpanan',
     'filter' => ArrayHelper::map(Penyimpanan::find()->asArray()->All(), 'penyimpanan_id', 'nama_penyimpanan'),
             'value'=>function($data) {return $data->penyimpanan->tempat_penyimpanan;},
           ],





			  [
              'attribute' => 'status',
             'label'=>'Status',
			  'filter'=>array('valid'=>'valid','expired'=>'expired'),

           ],
            [
                    'attribute' => 'created_at',
                    'value' => 'created_at',
                    'label' => 'Dibuat pada',
                    'filter' => DateRangePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'created_at',
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'timePicker'=>true,
                        'timePickerIncrement'=>30,
                        'locale'=>[
                            'format'=>'Y-m-d h:i A'
                        ]
                    ]
                ]),
                    'format' => 'html',
                ],


         //   ['class' => 'yii\grid\ActionColumn'],

            [
            'class' => 'yii\grid\ActionColumn',
          //  'contentOptions' => ['style' => 'width:260px;'],
            'header'=>'Action',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'download' => function ($url, $model) {

                 $arsipModel = Upload::find()
                 ->andWhere(['arsip_id'=>$model->id])
                 ->orderBy('last_update DESC')
                 ->One();
                if (isset($arsipModel)) {
return (Html::a('<span class="fa fa-search"></span>download', '?r=upload/downloadsurat&id='.$model->id));
} else {
 '';
}
                },
                'upload' => function ($url, $model) {

return (Html::a('<span class="fa fa-search"></span>upload', '?r=upload/upload&id='.$model->id));
                },


            ],
           ],


        ],
    ]); ?>
</div>
