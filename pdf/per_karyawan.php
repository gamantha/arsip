<?php

error_reporting(E_ALL ^ E_NOTICE);
$nik = $_REQUEST['nik'];
$awal = $_REQUEST['awal'];
$akhir = $_REQUEST['akhir'];
$nami  = $_REQUEST['nama'];
$jml_terlambat = $_REQUEST['jml_terlambat'];
$jml_lembur = $_REQUEST['jml_lembur'];
$count = $_REQUEST['count'];
$dj  = $_REQUEST['dj'];
$tc  = $_REQUEST['total_cuti'];
$it  = $_REQUEST['total_ijin'];
$ts  = $_REQUEST['total_sakit'];
$ta  = $_REQUEST['total_alpa'];

//$tgl_absen = json_decode($_POST['tanggal_absen'], true);

//echo $tgl_absen;
//echo $_POST['form_pdf'];


$jsonData = $_POST['tanggal_absen'];
$phpArray = json_decode($jsonData);
foreach ($phpArray as $tgl) {
    $tanggal .= "<p> ".$tgl."</p>";
}


$jsonData2 = $_POST['jam_datang'];
$phpArray2 = json_decode($jsonData2);

foreach ($phpArray2 as $key => $dtg) {

$datang .= "<p> ".$dtg."</p>";

}

$jsonData3 = $_POST['terlambat'];
$phpArray3 = json_decode($jsonData3);

foreach ($phpArray3 as $key => $lambat) {

$terlambat .= "<p> ".$lambat."</p>";

}

$jsonData4 = $_POST['jam_pulang'];
$phpArray4 = json_decode($jsonData4);

foreach ($phpArray4 as $key => $jampul) {

$jam_pulang .= "<p> ".$jampul."</p>";

}

$jsonData5 = $_POST['total_kerja'];
$phpArray5 = json_decode($jsonData5);

foreach ($phpArray5 as $key => $totker) {

$total_kerja .= "<p> ".$totker."</p>";

}


$jsonData6 = $_POST['lembur'];
$phpArray6 = json_decode($jsonData6);

foreach ($phpArray6 as $key => $lemburr) {

$tampil_lembur .= "<p> ".$lemburr."</p>";

}

$jsonData7 = $_POST['jam_kerjaaa'];
$phpArray7 = json_decode($jsonData7);

foreach ($phpArray7 as $key => $kerja) {

$tampil_jam_kerja .= "<p> ".$kerja."</p>";

}

$jsonData8 = $_POST['cuti'];
$phpArray8 = json_decode($jsonData8);

foreach ($phpArray8 as $key => $cut) {

$tampil_cuti .= "<p> ".$cut."</p>";

}

$jsonData9 = $_POST['ijin'];
$phpArray9 = json_decode($jsonData9);

foreach ($phpArray9 as $key => $iji) {

$tampil_ijin .= "<p> ".$iji."</p>";

}

$jsonData10 = $_POST['sakit'];
$phpArray10 = json_decode($jsonData10);

foreach ($phpArray10 as $key => $saki) {

$tampil_sakit .= "<p> ".$saki."</p>";

}

$jsonData11 = $_POST['alpa'];
$phpArray11 = json_decode($jsonData11);

foreach ($phpArray11 as $key => $alp) {

$tampil_alpa .= "<p> ".$alp."</p>";

}



$jsonData12 = $_POST['libur'];
$phpArray12 = json_decode($jsonData12);

foreach ($phpArray12 as $key => $kete) {

$tampil_keterangan .= "<p> ".$kete."</p>";

}









//connection to the database
//$dbhandle = mysql_connect('202.67.13.34','ppsdm','ppsdM2014')
 //	or die("Unable to connect to MySQL");

//$selected = mysql_select_db("sigis-personalia",$dbhandle)
  //or die("Could not select db");

//$result = mysql_query("SELECT tb_absensi.NIK, tb_absensi.Tanggal, tb_absensi.Jam_Masuk, tb_absensi.Jam_Keluar, tb_absensi.Total_Jam_Kerja, tb_karyawan.Nama FROM tb_absensi, tb_karyawan WHERE tb_absensi.NIK = tb_karyawan.NIK_Absen");
//$result = mysql_query("SELECT * FROM tb_absensi WHERE NIK = $nik and Tanggal between '$awal' and '$akhir' ORDER BY Tanggal ASC");

//$tot = 123;
//$periode = "xxxxxxx s/d xxxxxx";
//while($row = mysql_fetch_array($result)){
  //  $html_center1 .= "<tr><td>".$row['Tanggal']."</td><td>".$row['Jam_Masuk']."</td><td>".$tot."</td><td>".$row['Jam_Keluar']."</td><td>".$row['Total_Jam_Kerja']."</td><td>".$tot."</td><td>".$tot."</td><td>".$tot."</td><td>".$tot."</td><td>".$tot."</td><td>".$tot."</td></tr>";
//}


//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-0	1-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 061');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetMargins(PDF_MARGIN_LEFT, '0', PDF_MARGIN_RIGHT,'0');
$pdf->SetHeaderMargin('0');
$pdf->SetFooterMargin('0');
$pdf->SetAutoPageBreak(TRUE, 0);

 $pdf->setCellPaddings(0,0,0,0);
$pdf->setPrintHeader(false);
// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style type="text/css">

.f {
	font-size: 9px;
}
.bb {
	font-weight: bold;
	font-size: 10px;
	text-align: center;
}
.bc {
	font-weight: bold;
	font-size: 12px;

}
</style>
<h3><U><div align="center">Rekap Absensi per Karyawan </div></U></h3>


<table>
	<tr>
		<th width="100px">PERIODE	</th>
		<th>: $awal / $akhir </th>
		<th width="100px">HARI KERJA	</th>
		<th>: $dj Hari</th>
	</tr>

	<tr>
		<th width="100px">NIK</th>
		<th>: $nik</th>
		<th width="100px">NAMA</th>
		<th>: $nami</th>
	</tr>






</table>
<table width="685" border="1" cellspacing="0" cellpadding="1">
  <tr>
    <td rowspan="2" bgcolor="#FFC"  width="15%"><span class="bb">Tanggal</span></td>
    <td colspan="5" bgcolor="#FFC" width="50%"><span class="bb">Kehadiran</span></td>
    <td colspan="4" bgcolor="#FFC" width="20%"><span class="bb">Ketidakhadiran</span></td>
    <td rowspan="2" bgcolor="#FFC"width="15%"><span class="bb">Keterangan</span></td>
  </tr>
  <tr>
    <td bgcolor="#FFC" width="9%"><span class="bb">Jam Datang</span></td>
    <td bgcolor="#FFC" width="14%"><span class="bb">Terlambat</span></td>
    <td bgcolor="#FFC" width="9%"><span class="bb">Jam Pulang</span></td>
    <td bgcolor="#FFC" width="9%"><span class="bb">Jam Kerja</span></td>
    <td bgcolor="#FFC" width="9%"><span class="bb">Lembur</span></td>
    <td bgcolor="#FFC"><span class="bb">Cuti</span></td>
    <td bgcolor="#FFC"><span class="bb">Ijin</span></td>
    <td bgcolor="#FFC"><span class="bb" bgcolor="#FFC">Sakit</span></td>
    <td bgcolor="#FFC"><span class="bb" bgcolor="#FFC">Alpa</span></td>
  </tr>

<tr>
	<td height="2"> <font size="8">$tanggal</font></td>
	<td height="2"><font size="8">$datang</font></td>
	<td><font size="8">$terlambat</font></td>
	<td><font size="8">$jam_pulang</font></td>
	<td><font size="8">$tampil_jam_kerja</font></td>
	<td><font size="8">$tampil_lembur</font></td>
	<td><font size="8">$tampil_cuti</font></td>
	<td><font size="8">$tampil_ijin</font></td>
	<td><font size="8">$tampil_sakit</font></td>
	<td><font size="8">$tampil_alpa</font></td>

	<td><font size="8">$tampil_keterangan</font></td>
</tr>

  <tr>
    <td bgcolor="#FFC"><span class="bb">Total</span></td>
    <td bgcolor="#FFC">&nbsp;</td>
    <td bgcolor="#FFC"><span class="bb">$jml_terlambat</span></td>
    <td bgcolor="#FFC">&nbsp;</td>
    <td bgcolor="#FFC">&nbsp;</td>
    <td bgcolor="#FFC"><span class="bb">$jml_lembur</span></td>
    <td bgcolor="#FFC"><span class="bb">$tc</span></td>
    <td bgcolor="#FFC"><span class="bb">$it</span></td>
    <td bgcolor="#FFC"><span class="bb">$ts</span></td>
    <td bgcolor="#FFC"><span class="bb">$ta</span></td>
    <td bgcolor="#FFC">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#FFC"><span class="bb">Total Kehadiran (hari)</span></td>
    <td colspan="2" bgcolor="#FFC"><span class="bb">$count</span></td>
    <td colspan="5" bgcolor="#FFC">&nbsp;</td>
  </tr>
</table>



EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($nik.'_'.$awal.'_'.$akhir.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
