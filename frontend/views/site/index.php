<?php
use app\models\Perusahaan;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang Di Aplikasi Pengelolaan Arsip SIG!</h1>

        <?php
//echo sizeof($projects);

$projects = Perusahaan::find()->All();
foreach($projects as $project){

 echo '<p><a class="btn btn-default" href="'. Url::toRoute(['arsip/indexpt?' . 'ArsipSearch[no_surat]=' . '&ArsipSearch[divisi_id]=' . '&id=' . $project->perusahaan_id]) . '" >'.$project->nama_perusahaan.' &raquo;</a></p>';

}
echo '<br/>';
 //echo '<p><a class="btn btn-success" href="'. Url::toRoute(['sigproject/create']) . '" >Tambah PT &raquo;</a></p>';

?>




    </div>


</div>
