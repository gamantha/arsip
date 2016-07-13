<?php

use yii\helpers\Html;
use app\models\Perusahaan;

/* @var $this yii\web\View */
/* @var $model app\models\Nonsurat */

$projects = Perusahaan::find()->One();
$this->title = 'Create Nonsurat';
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
<div class="nonsurat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
