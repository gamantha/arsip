<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UploadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uploads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Upload', ['create'], ['class' => 'btn btn-success']) ?>
          <?= Html::a('Upload File (harus include id arsip di url)', ['upload'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'location:ntext',
            'last_update',
            'arsip_id',
            'nama_file',

            [
            'class' => 'yii\grid\ActionColumn',
          //  'contentOptions' => ['style' => 'width:260px;'],
            'header'=>'Action',
            'template' => '{view} {update} {delete} {download}',
            'buttons' => [
                'upload' => function ($url, $model) {

return (Html::a('<span class="fa fa-search"></span>upload', '?r=upload/upload&id='.$model->id));
                },

                'download' => function ($url, $model) {

return (Html::a('<span class="fa fa-search"></span>download', 'uploads/surat/'.$model->nama_file));
                },

            ],
           ],


        ],
    ]); ?>

</div>
