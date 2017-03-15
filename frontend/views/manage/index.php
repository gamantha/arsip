<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
	<center><br><br><br><br><br><br><br>
      <table border="0" cellspacing="2"  cellpadding="7">  
<tr>

<td><p><a class="btn btn-lg btn-success" href="<?php echo Url::toRoute(['perusahaan/index']); ?>" width="100">Tambah Perusahaan</a></p> </td>
<td ><p style="color:white">Arsip</p></td>
<td ><p><a class="btn btn-lg btn-success" href="<?php echo Url::toRoute(['jabatan/index']); ?>" width="100">Tambah Jabatan</a></p> </td>
</tr>
      

<tr>

<td> <p><a class="btn btn-lg btn-success" href="<?php echo Url::toRoute(['divisi/index']); ?>" width="100">Tambah Divisi</a></p> </td>
<td ><p style="color:white">Arsip</p></td>
<td ><p><a class="btn btn-lg btn-success" href="<?php echo Url::toRoute(['penyimpanan/index']); ?>" width="100">Tambah Penyimpanan</a></p> </td>

          </tr>

          <tr>

<td> <p><a class="btn btn-lg btn-success" href="<?php echo Url::toRoute(['kendaraan/index']); ?>" width="100">Tambah kendaraan</a></p> </td>


          </tr>
     
		 
		  
		   </table>
		   </center>
    </div>

    <div class="body-content">

        <div class="row">
            
            
           
        </div>

    </div>
</div>
