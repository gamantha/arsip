<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Penyimpanan */

$this->title = 'Create Penyimpanan';
$this->params['breadcrumbs'][] = ['label' => 'Penyimpanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyimpanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
