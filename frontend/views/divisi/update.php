<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Divisi */

$this->title = 'Update Divisi: ' . ' ' . $model->divisi_id;
$this->params['breadcrumbs'][] = ['label' => 'Divisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->divisi_id, 'url' => ['view', 'id' => $model->divisi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="divisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
