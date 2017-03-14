<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArsipKendaraan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Arsip Kendaraan',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arsip Kendaraans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="arsip-kendaraan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_updateform', [
        'model' => $model,
    ]) ?>

</div>
