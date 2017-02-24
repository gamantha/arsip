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

$project = Perusahaan::find()->One();

 echo '<p><a class="btn btn-success" href="'. Url::toRoute(['arsip/indexpt?' . 'ArsipSearch[no_surat]=' 
                                                                             . '&ArsipSearch[divisi_id]=' 
                                                                             . '&ArsipSearch[divisi_id]='
                                                                             . '&ArsipSearch[tema]='
                                                                             . '&ArsipSearch[jabatan_id]='
                                                                             . '&ArsipSearch[penyimpanan_id]='
                                                                             . '&ArsipSearch[jenis]='
                                                                             . '&ArsipSearch[created_at]='
                                                                             . '&ArsipSearch[modified_at]='
                                                                             . '&ArsipSearch[receipt]='
                                                                             . '&id=' . $_GET['id']]) . '" >SURAT</a></p>';

echo '<p><a class="btn btn-info" href="'. Url::toRoute(['nonsurat/indexpt3?' . 'NonsuratSearch[no_surat]=' 
                                                                             . '&NonsuratSearch[divisi_id]='
                                                                             . '&NonsuratSearch[tema]='
                                                                             . '&NonsuratSearch[penyimpanan_id]='
                                                                             . '&NonsuratSearch[status]='
                                                                             . '&NonsuratSearch[created_at]='
                                                                             . '&NonsuratSearch[modified_at]='
                                                                             . '&id=' . $_GET['id']]) . '" >Non SURAT</a></p>';


echo '<p><a class="btn btn-warning" href="'. Url::toRoute(['nonsurat/indexpt3?' . 'NonsuratSearch[no_surat]=' 
                                                                             . '&NonsuratSearch[divisi_id]='
                                                                             . '&NonsuratSearch[tema]='
                                                                             . '&NonsuratSearch[penyimpanan_id]='
                                                                             . '&NonsuratSearch[status]='
                                                                             . '&NonsuratSearch[created_at]='
                                                                             . '&NonsuratSearch[modified_at]='
                                                                             . '&id=' . $_GET['id']]) . '" >Kendaraan</a></p>';


        
        
?>

<?php    
    echo '<br/>';
 //echo '<p><a class="btn btn-success" href="'. Url::toRoute(['sigproject/create']) . '" >Tambah PT &raquo;</a></p>';

?>




    </div>


</div>
