<?php

use yii\helpers\Html;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Arsip */

$this->title = 'Simpan Surat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
