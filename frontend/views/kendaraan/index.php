<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Kendaraan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Kendaraans');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kendaraan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Kendaraan'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php


$plat_array = ["ID1"=>"Name1","ID2"=>"Name2"];

?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama_pemilik',
            //'plat',
            ['label' => 'Plat',
            'attribute' => 'plat',
               'filter'=>ArrayHelper::map(Kendaraan::find()->asArray()->All(), 'plat', 'plat'),
        
                'value' => function($data) {return $data->plat;}
            ],
            
            'warna',
            'merk',
            'model',
            // 'tahun',
            // 'driver',
            // 
            // 'alamat_pemilik',
            // 'plat',
            // 'catatan:ntext',
            // 'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
