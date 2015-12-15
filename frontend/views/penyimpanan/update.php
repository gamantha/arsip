<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penyimpanan */

$this->title = 'Update Penyimpanan: ' . ' ' . $model->penyimpanan_id;
$this->params['breadcrumbs'][] = ['label' => 'Penyimpanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->penyimpanan_id, 'url' => ['view', 'id' => $model->penyimpanan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penyimpanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
