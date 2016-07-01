<?php
use app\models\Perusahaan;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Pilih Penyimpanan!</h1>
        <br>
        <br>

        <?php
//echo sizeof($projects);

$projects = Perusahaan::find()->One();

 echo '<p><a class="btn btn-success" href="'. Url::toRoute(['arsip/indexpt?' . 'ArsipSearch[no_surat]=' 
                                                                             . '&ArsipSearch[divisi_id]=' 
                                                                             . '&ArsipSearch[divisi_id]='
                                                                             . '&ArsipSearch[tema_id]='
                                                                             . '&ArsipSearch[jabatan_id]='
                                                                             . '&ArsipSearch[penyimpanan_id]='
                                                                             . '&ArsipSearch[jenis]='
                                                                             . '&ArsipSearch[created_at]='
                                                                             . '&ArsipSearch[modified_at]='
                                                                             . '&ArsipSearch[receipt]='
                                                                             . '&id=' . $projects->perusahaan_id]) . '" >SURAT</a></p>';

echo '<p><a class="btn btn-info" href="'. Url::toRoute(['arsip/indexpt3?' . 'ArsipSearch[no_surat]=' 
                                                                             . '&ArsipSearch[divisi_id]=' 
                                                                             . '&ArsipSearch[divisi_id]='
                                                                             . '&ArsipSearch[tema_id]='
                                                                             . '&ArsipSearch[jabatan_id]='
                                                                             . '&ArsipSearch[penyimpanan_id]='
                                                                             . '&ArsipSearch[jenis]='
                                                                             . '&ArsipSearch[created_at]='
                                                                             . '&ArsipSearch[modified_at]='
                                                                             . '&ArsipSearch[receipt]='
                                                                             . '&id=' . $projects->perusahaan_id]) . '" >Non SURAT</a></p>';


        
?>

<?php    
    echo '<br/>';
 //echo '<p><a class="btn btn-success" href="'. Url::toRoute(['sigproject/create']) . '" >Tambah PT &raquo;</a></p>';

?>




    </div>


</div>
