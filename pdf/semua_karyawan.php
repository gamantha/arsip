<?php
error_reporting(E_ALL & ~E_NOTICE);
$awal = $_REQUEST['awal'];
$akhir = $_REQUEST['akhir'];
$karyawan = json_decode($_POST['karyawan'], TRUE);

//connection to the database
/**
$dbhandle = mysql_connect(localhost,ppsdm,ppsdM2014)
 	or die("Unable to connect to MySQL");

$selected = mysql_select_db("sigis",$dbhandle)
  or die("Could not select db");

//$result = mysql_query("SELECT * FROM tb_absenkar ;");
//$tot = 0;
**/

$total_kerja = 0;
$total_cuti = 0;
$total_ijin = 0;
$total_sakit = 0;
$total_alpa = 0;
//$html_center1 =0;


foreach($karyawan as $row){
    $html_center1 .= "<tr>
						<td>".$row['nik']."</td>
						<td>".$row['nama']."</td>
						<td>".$row['kehadiran']."</td>
						<td>".$row['cuti']."</td>
						<td>".$row['ijin']."</td>
						<td>".$row['sakit']."</td>
						<td>".$row['alpa']."</td>
					  </tr>";
					  
	$total_kerja += $row['kehadiran'];
	$total_cuti += $row['cuti'];
	$total_ijin += $row['ijin'];
	$total_sakit += $row['sakit'];
	$total_alpa += $row['alpa'];
	
} 


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
<h2><U><div align="center">Rekapitulasi Absensi</div></U></h2>
<span class="bc">
<BR>
PERIODE : $awal / $akhir <BR><BR>
</span>

<table width="685" border="1" cellspacing="0" cellpadding="1">
  <tr>
    <td rowspan="2" bgcolor="#FFC"><span class="bb">NIK</span></td>
    <td rowspan="2" bgcolor="#FFC"><span class="bb">NAMA</span></td>
    <td rowspan="2" bgcolor="#FFC"><span class="bb">KEHADIRAN</span></td>
    <td colspan="4" bgcolor="#FFC"><span class="bb">KEHADIRAN</span></td>
  </tr>
<tr>
    <td bgcolor="#FFC"><span class="bb">Cuti </span></td>
    <td bgcolor="#FFC"><span class="bb">Ijin</span></td>
    <td bgcolor="#FFC"><span class="bb">Sakit</span></td>
    <td bgcolor="#FFC"><span class="bb">Alpa</span></td>
  </tr>

  $html_center1
  <tr class="f">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="bb">
    <td colspan="2" bgcolor="#FFC">Total</td>
    <td bgcolor="#FFC">$total_kerja</td>
    <td bgcolor="#FFC">$total_cuti</td>
    <td bgcolor="#FFC">$total_ijin</td>
    <td bgcolor="#FFC">$total_sakit</td>
    <td bgcolor="#FFC">$total_alpa</td>
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
