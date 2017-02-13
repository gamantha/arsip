<?php

function rupiah($angka) {
	$rupiah = number_format($angka ,2, ',' , '.' );
	return $rupiah;
}
   
$bpjs = json_decode($_POST['bpjs'], TRUE);

$periode = $_POST['periode'];
$kpp = $_POST['kpp'];
$proyek = $_POST['proyek'];

foreach($bpjs as $row){
    $html_center1 .= "<tr>
						<td>".$row['nik']."</td>
						<td>".$row['nama']."</td>
						<td>".$row['no_kpj']."</td>
						<td>".$row['tgl_lahir']."</td>
						<td>".$row['gaji']."</td>
						<td>".$row['iuran']."</td>
					  </tr>";
} 

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
<h2><U>
<div align="center">BPJS</div></U></h2>
<span class="bc">
<BR>
<table border="0" cellspacing="0" cellpadding="1" width="500">
<tr>
	<td width="100">PROYEK</td>
	<td>: $proyek</td>
</tr>
<tr>
	<td width="100">KPP</td>
	<td>: $kpp</td>
</tr>
<tr>
	<td width="100">PERIODE</td>
	<td>: $periode</td>
</tr>
</table>
<br><br>
</span>

<table width="685" border="1" cellspacing="0" cellpadding="1">
  <tr>
    <td bgcolor="#FFC"><span class="bb">NIK</span></td>
    <td bgcolor="#FFC"><span class="bb">Nama</span></td>
    <td bgcolor="#FFC"><span class="bb">Nomor KPJ</span></td>
    <td bgcolor="#FFC"><span class="bb">Tanggal Lahir</span></td>
    <td bgcolor="#FFC"><span class="bb">Gaji</span></td>
    <td bgcolor="#FFC"><span class="bb">Iuran BPJS</span></td>
    </tr>
  $html_center1
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
