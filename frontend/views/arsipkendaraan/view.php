<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipKendaraan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arsip Kendaraans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-kendaraan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tanggal',
            //'kendaraan_id',
            ['label' => 'Nama kendaraan',
            'value' => $model->kendaraan->nama],
            ['label' => 'Merk',
            'value' => $model->kendaraan->merk],
            'keterangan:ntext',
            'tempat',
            ['label' => 'Biaya',
            'value' => 'Rp.' . number_format($model->biaya)
            ],
            'pic',
            'tipe',
            'no_surat',
            //'penyimpanan_id',
            ['label' => 'Penyimpanan',
            'value' => isset($model->penyimpanan->tempat_penyimpanan) ? $model->penyimpanan->tempat_penyimpanan : ''
//'value' => ''
            ],
            'expire_date',
            'status',
            'created_at',
            'modified_at',
        ],
    ]) ?>

</div>
