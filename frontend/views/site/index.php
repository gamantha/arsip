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

 echo '<p><a class="btn btn-default" href="'. Url::toRoute(['site/pilih?' . 'ArsipSearch[no_surat]=' 
                                                                             . '&ArsipSearch[divisi_id]=' 
                                                                             . '&ArsipSearch[divisi_id]='
                                                                             . '&ArsipSearch[tema]='
                                                                             . '&ArsipSearch[jabatan_id]='
                                                                             . '&ArsipSearch[penyimpanan_id]='
                                                                             . '&ArsipSearch[jenis]='
                                                                             . '&ArsipSearch[created_at]='
                                                                             . '&ArsipSearch[modified_at]='
                                                                             . '&ArsipSearch[receipt]='
                                                                             . '&id=' . $project->perusahaan_id]) . '" >'.$project->nama_perusahaan.' &raquo;</a></p>';

}

        
?>
<a class="btn btn-lg btn-success" href="<?php echo Url::toRoute(['site/pilih2?' . '&id=' . $project->perusahaan_id]); ?>" width="100">ALL PERUSAHAAN</a>
<?php    
    echo '<br/>';
 //echo '<p><a class="btn btn-success" href="'. Url::toRoute(['sigproject/create']) . '" >Tambah PT &raquo;</a></p>';

?>




    </div>


</div>
