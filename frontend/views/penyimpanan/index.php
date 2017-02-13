<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenyimpananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penyimpanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyimpanan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penyimpanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'penyimpanan_id',
            'tempat_penyimpanan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
