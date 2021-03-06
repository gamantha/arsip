<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Kendaraan;   

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsipkendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Arsip Kendaraans');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-kendaraan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Arsip Kendaraan'), ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a(Yii::t('app', 'Tambah kendaraan'), ['kendaraan/index'], ['class' => 'btn btn-success']) ?>
    </p>





    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
                  'tanggal',


            ['label' => 'nama kendaraan',
            'attribute' => 'kendaraan_id',
               'filter'=>ArrayHelper::map(Kendaraan::find()->asArray()->All(), 'id', 'plat'),
        
                'value' => function($data) {
                    return isset($data->kendaraan->plat) ? $data->kendaraan->plat : '';

                }
            ],
            

            [
                'label' => 'Merk',
                'value' => function($data) {
                    return isset($data->kendaraan->merk) ? $data->kendaraan->merk : '';
                }
            ],
      
            //'kendaraan_id',
            'keterangan:ntext',
            'tempat',
            // 'biaya',
            // 'pic',
            // 'tipe',
            // 'no_surat',
            // 'penyimpanan_id',
            // 'expire_date',
            // 'status',
            // 'created_at',
            // 'modified_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
