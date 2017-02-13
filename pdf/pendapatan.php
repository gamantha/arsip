<?php

function rupiah($angka) {
	$rupiah = number_format($angka ,2, ',' , '.' );
	return $rupiah;
}
   
$pendapatan = json_decode($_POST['pendapatan'], TRUE);

$periode = $_POST['periode'];
$proyek = $_POST['proyek'];

$gaji = 0;
$tunjangan = 0;
$makan_trans = 0;
$lembur = 0;
$luar_kota = 0;
$premi_hadir = 0;
$bonus_hadir = 0;
$lain = 0;
$total = 0;

foreach($pendapatan as $row){
    $html_center1 .= '<tr class="bf">
						<td>'.$row['nik'].'</td>
						<td>'.$row['nama'].'</td>
						<td align="right">'.rupiah($row['gaji']).'</td>
						<td align="right">'.rupiah($row['tunjangan']).'</td>
						<td align="right">'.rupiah($row['makan_trans']).'</td>
						<td align="right">'.rupiah($row['lembur']).'</td>
						<td align="right">'.rupiah($row['luar_kota']).'</td>
						<td align="right">'.rupiah($row['premi_hadir']).'</td>
						<td align="right">'.rupiah($row['bonus_hadir']).'</td>
						<td align="right">'.rupiah($row['lain']).'</td>
						<td align="right">'.rupiah($row['total']).'</td>
					  </tr>';
					  
	$gaji += $row['kasbon'];
	$tunjangan += $row['bpjs'];
	$makan_trans += $row['pph'];
	$lembur += $row['terlambat'];
	$luar_kota += $row['total_potongan'];
	$premi_hadir += $row['premi_hadir'];
	$bonus_hadir += $row['bonus_hadir'];
	$lain += $row['lain'];
	$total += $row['total'];

} 

$gaji = rupiah($gaji);
$tunjangan = rupiah($tunjangan);
$makan_trans = rupiah($makan_trans);
$lembur = rupiah($lembur);
$luar_kota = rupiah($luar_kota);
$premi_hadir = rupiah($premi_hadir);
$bonus_hadir = rupiah($bonus_hadir);
$lain = rupiah($lain);
$total = rupiah($total);
//----------------------------


//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
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
$pdf->AddPage('L');

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
	font-size: 10px;
}
.bb {
	font-weight: bold;
	font-size: 10px;
	text-align: center;
}
.t {
	text-align: center;
}
.bc {
	font-weight: bold;
	font-size: 11px;
	
}
.bf {
	font-size: 10px;
	
}
</style>
<div align="center"><h2>Pendapatan</h2></div>
<span class="bc">
<BR>
<table border="0" cellspacing="0" cellpadding="1" width="500">
<tr>
	<td width="100">PROYEK</td>
	<td>: $proyek</td>
</tr>
<tr>
	<td width="100">PERIODE</td>
	<td>: $periode</td>
</tr>
</table>
<br><br>
</span>

<table width="100%" border="1" cellspacing="0" cellpadding="1">
  <tr>
    <td bgcolor="#FFC"><span class="bb">NIK</span></td>
    <td bgcolor="#FFC"><span class="bb">Nama</span></td>
    <td bgcolor="#FFC"><span class="bb">Gaji Pokok</span></td>
    <td bgcolor="#FFC"><span class="bb">Tunjangan</span></td>
    <td bgcolor="#FFC"><span class="bb">Makan & Transport</span></td>
    <td bgcolor="#FFC"><span class="bb">Lembur</span></td>
    <td bgcolor="#FFC"><span class="bb">Luar Kota</span></td>
    <td bgcolor="#FFC"><span class="bb">Premi Hadir</span></td>
    <td bgcolor="#FFC"><span class="bb">Bonus Hadir</span></td>
    <td bgcolor="#FFC"><span class="bb">Lain-lain</span></td>
    <td bgcolor="#FFC"><span class="bb">Total</span></td>
    </tr>
  $html_center1
  <tr class="bb">
    <td colspan="2" bgcolor="#FFC">Total</td>
    <td bgcolor="#FFC" align="right">$gaji</td>
    <td bgcolor="#FFC" align="right">$tunjangan</td>
    <td bgcolor="#FFC" align="right">$makan_trans</td>
    <td bgcolor="#FFC" align="right">$lembur</td>
    <td bgcolor="#FFC" align="right">$luar_kota</td>
    <td bgcolor="#FFC" align="right">$premi_hadir</td>
    <td bgcolor="#FFC" align="right">$bonus_hadir</td>
    <td bgcolor="#FFC" align="right">$lain</td>
    <td bgcolor="#FFC" align="right">$total</td>
    </tr>
</table>


EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
