<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tema */

$this->title = 'Update Tema: ' . ' ' . $model->tema_id;
$this->params['breadcrumbs'][] = ['label' => 'Temas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tema_id, 'url' => ['view', 'id' => $model->tema_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tema-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
