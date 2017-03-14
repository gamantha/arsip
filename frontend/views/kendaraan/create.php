<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kendaraan */

$this->title = Yii::t('app', 'Create Kendaraan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kendaraans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kendaraan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadmodel' => $uploadmodel
    ]) ?>

</div>
