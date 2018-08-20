<?php

use yii\helpers\Html;
use app\models\Perusahaan;

/* @var $this yii\web\View */
/* @var $model app\models\Nonsurat */

$projects = Perusahaan::find()->One();
$this->title = 'Create Nonsurat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nonsurat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
