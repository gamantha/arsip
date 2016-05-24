<?php

function rupiah($angka) {
	$rupiah = number_format($angka ,2, ',' , '.' );
	return $rupiah;
}

function reformatDate($date) {
	$temp_date = explode("-", $date);
	$day = date_format(date_create($date), 'D');
	$bulan = '';
	switch ($temp_date[1]) {
		case 1:
			$bulan = "Januari"; break;
		case 2:
			$bulan = "Februari"; break;
		case 3:
			$bulan = "Maret"; break;
		case 4:
			$bulan = "April"; break;
		case 5:
			$bulan = "Mei"; break;
		case 6:
			$bulan = "Juni"; break;
		case 7:
			$bulan = "Juli"; break;
		case 8:
			$bulan = "Agustus"; break;
		case 9:
			$bulan = "September"; break;
		case 10:
			$bulan = "Oktober"; break;
		case 11:
			$bulan = "November"; break;
		case 12:
			$bulan = "Desember"; break;
	}

	$tahun   = $temp_date[0];
	$tanggal = $temp_date[2];

	$new_date = $tanggal." ".$bulan." ".$tahun;

	return $new_date;
} 

$date = date('Y-m-d');
$today = reformatDate($date);
$periode = strtoupper($_REQUEST['periode']);
$bank = $_REQUEST['bank'];
$payroll = json_decode($_REQUEST['payroll'], TRUE);

$user = ucwords(strtolower($_REQUEST['user']));
$total = 0;
$i = 1;

foreach($payroll as $row){
    $html_center1 .= '<tr class="f">
						<td align="center">'.$i.'</td>
						<td>'.$row['nik'].'</td>
						<td>'.$row['nama'].'</td>
						<td>'.$row['no_rek'].'</td>
						<td>'.$row['nama_rek'].'</td>
						<td align="right">'.rupiah($row['total']).'</td>
					  </tr>';

	$total += $row['total'];
	$i++;
} 

$total = rupiah($total);

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
	font-size: 11px;
}
.bb {
	font-weight: bold;
	font-size: 11px;
	text-align: center;
}
.t {
	text-align: center;
}
.bc {
	font-weight: bold;
	font-size: 12px;
	
}
</style>
<h2>
<div align="center">Payroll</div></h2>
<table>
<tr>
	<td width="200">BANK</td>
	<td width="800">:$bank</td>
</tr>

<tr>
	<td>PERIODE</td>
	<td>:$periode</td>
</tr>

<table>
</span>

<table width="685" border="1" cellspacing="0" cellpadding="1">
  <tr>
    <td bgcolor="#FFC" width="5%"><span class="bb">No</span></td>
    <td bgcolor="#FFC"><span class="bb">NIK</span></td>
    <td bgcolor="#FFC" width="28%"><span class="bb">Nama</span></td>
    <td bgcolor="#FFC"><span class="bb">Nomor Account </span></td>
    <td bgcolor="#FFC"><span class="bb">Nama Account</span></td>
    <td bgcolor="#FFC"><span class="bb">Jumlah</span></td>
    </tr>
  $html_center1
  <tr class="bb">
    <td colspan="5" bgcolor="#FFC">Total</td>
    <td bgcolor="#FFC" align="right">$total</td>
    </tr>
</table>
<br><br><br><br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
<tr>
	<td>Bandung, <span>$today</span></td>
	<td>Penerima</td>
</tr>
<tr>
	<td>PT. Sanggar Indah Group</td>
	<td>Bank BCA</td>
</tr>
<tr rowspan="2">
	<td></td>
	<td></td>
</tr>
<tr rowspan="2">
	<td></td>
	<td></td>
</tr>
<tr rowspan="2">
	<td></td>
	<td></td>
</tr>
<tr rowspan="2">
	<td></td>
	<td></td>
</tr>
<tr>
	<td>Manager Personalia</td>
	<td>(.........................)</td>
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
