<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerusahaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perusahaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perusahaan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Perusahaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           

            'perusahaan_id',
            'nama_perusahaan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
