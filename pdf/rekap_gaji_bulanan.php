<?php
error_reporting(E_ALL ^ E_NOTICE);
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
   
$rekapitulasi = json_decode($_POST['rekapitulasi'], TRUE);

$periode = strtoupper($_POST['periode']);
$proyek = $_POST['proyek'];
$user = ucwords(strtolower($_POST['user']));

$date  = date('Y-m-d');
$today = reformatDate($date); 
$pend_int = 0;
$pend_ext = 0;
$potongan = 0;
$diterima = 0;

foreach($rekapitulasi as $row){
    $html_center1 .= '<tr class="bf">
						<td>'.$row['nik'].'</td>
						<td>'.$row['nama'].'</td>
						<td align="right">'.rupiah($row['pend_int']).'</td>
						<td align="right">'.rupiah($row['pend_ext']).'</td>
						<td align="right">'.rupiah($row['tot_potongan']).'</td>
						<td align="right">'.rupiah($row['tot_diterima']).'</td>
					  </tr>';
	$pend_int += $row['pend_int'];
	$pend_ext += $row['pend_ext'];
	$potongan += $row['tot_potongan'];
	$diterima += $row['tot_diterima'];

} 

$pend_int = rupiah($pend_int);
$pend_ext = rupiah($pend_ext);
$potongan = rupiah($potongan);
$diterima = rupiah($diterima);

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
.bf {
	font-size: 11px;
	
}
</style>
<h2>
<div align="center">Rekapitulasi Gaji Bulanan</div></h2>
<span class="bc">
<BR>
<table border="0" cellspacing="0" cellpadding="1" width="600">
<tr>
	<td width="80">PROYEK</td>
	<td>: $proyek</td>
</tr>
<tr>
	<td width="80">PERIODE</td>
	<td>: $periode</td>
</tr>
</table>
<br><br>
</span>

<table width="685" border="1" cellspacing="0" cellpadding="1">
  <tr>
    <td bgcolor="#FFC" width="80"><span class="bb">NIK</span></td>
    <td bgcolor="#FFC" width="190"><span class="bb">NAMA</span></td>
    <td bgcolor="#FFC" width="100"><span class="bb">PDPT Int</span></td>
    <td bgcolor="#FFC" width="100"><span class="bb">PDPT Eks</span></td>
    <td bgcolor="#FFC" width="100"><span class="bb">Potongan</span></td>
    <td bgcolor="#FFC" width="100"><span class="bb">Total Diterima</span></td>
    </tr>
  $html_center1
  <tr class="bb">
    <td colspan="2" bgcolor="#FFC">Total</td>
    <td bgcolor="#FFC" align="right">$pend_int</td>
    <td bgcolor="#FFC" align="right">$pend_ext</td>
    <td bgcolor="#FFC" align="right">$potongan</td>
    <td bgcolor="#FFC" align="right">$diterima</td>
    </tr>
</table>
<br><br><br><br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
<tr>
	<td></td>
	<td>Bandung, <span>$today</span></td>
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
	<td></td>
	<td>$user</td>
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
