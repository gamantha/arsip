<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DivisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Divisi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="divisi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Divisi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            'divisi_id',
            'nama_divisi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
