<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Perusahaan;

/* @var $this yii\web\View */
/* @var $model app\models\Nonsurat */

$projects = Perusahaan::find()->One();
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nonsurats', 'url' => ['nonsurat/indexpt3?' . 'NonsuratSearch[no_surat]=' 
                                                                             . '&NonsuratSearch[divisi_id]='
                                                                             . '&NonsuratSearch[tema_id]='
                                                                             . '&NonsuratSearch[penyimpanan_id]='
                                                                             . '&NonsuratSearch[status]='
                                                                             . '&NonsuratSearch[created_at]='
                                                                             . '&NonsuratSearch[modified_at]='
                                                                             . '&id=' . $projects->perusahaan_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nonsurat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'no_surat',
            'tanggal_simpan',
            'perusahaan_id',
            'divisi_id',
            'tema_id',
            'penyimpanan_id',
            'status',
            'created_at',
            'modified_at',
        ],
    ]) ?>

</div>
