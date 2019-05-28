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

 echo '<p><a class="btn btn-success" href="'. Url::toRoute(['arsip/index']) . '" >SURAT</a></p>';

echo '<p><a class="btn btn-info" href="'. Url::toRoute(['nonsurat/index']) . '" >Non SURAT</a></p>';


        
?>

<?php    
    echo '<br/>';
 //echo '<p><a class="btn btn-success" href="'. Url::toRoute(['sigproject/create']) . '" >Tambah PT &raquo;</a></p>';

?>




    </div>


</div>
