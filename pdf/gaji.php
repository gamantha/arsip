<?php

error_reporting(E_ALL ^ E_NOTICE);
$awal = $_REQUEST['aw'];//.$awal.
$akhir = $_REQUEST['ak'];//.$akhir
$nik = $_REQUEST['nik'];//.$nik
$nama = $_REQUEST['nm'];//.$nama
$jabatan = $_REQUEST['jb'];//.$jabatan
//$g = $_REQUEST['g'];//.$g
//$ng = $_REQUEST['ng'];//.$ng
$tj = $_REQUEST['tj'];//.$tj
$xmt = $_REQUEST['xmt'];//.$kali_makan_transport
$tmt = $_REQUEST['tmt'];//.$tmt
$tomt = $_REQUEST['tomt'];//.$tomt
$xl = $_REQUEST['xl'];//.$kali_lembur
$tl = $_REQUEST['tl'];//.$tl
$tol = $_REQUEST['tol'];//.$tol
$ph = $_REQUEST['ph'];//.$ph
$bh = $_REQUEST['bh'];//.$bh
$xlk = $_REQUEST['kali_luar_kota'];//.$kali_luar_kota
$tlk = $_REQUEST['tlk'];//.$tlk
$tolk = $_REQUEST['tolk'];//.$tolk
$tgp = $_REQUEST['tgp'];//.$tgp
$pp = $_REQUEST['pp'];//.$pp
$k = $_REQUEST['k'];//.$k
$pph = $_REQUEST['pph'];//.$pph
$bpjs = $_REQUEST['bpjs'];//.$bpjs
$pot = $_REQUEST['pot'];//.$pot
$tope = $_REQUEST['tope'];//.$tope

$jsonData2 = $_POST['tes'];
$phpArray2 = json_decode($jsonData2);

foreach ($phpArray2 as $key => $dtg1) {
  
$ng .= "<p> ".$dtg1."</p>";




}
$jsonData3 = $_POST['tes2'];
$phpArray3 = json_decode($jsonData3);

foreach ($phpArray3 as $key => $dtg2) {
  
$g .= "<p> ".$dtg2."</p>";

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

$date  = date('Y-m-d');
$today = reformatDate($date);

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
<style>
	h1 {
		
		font-family: arial;
		font-size: 12pt;
		text-align: center;
	}
	h2 {
		
		font-family: arial;
		font-size: 8pt;
		
	}
	.big {
		
		font-family: arial;
		font-size: 40pt;
		
	}
	h3 {
		
		font-family: arial;
		font-size: 10pt;
		text-align: center;
	}
	p.first {
		color: #003300;
		font-family: helvetica;
		font-size: 12pt;
	}
	p.first span {
		color: #006600;
		font-style: italic;
	}
	p#second {
		color: rgb(00,63,127);
		font-family: times;
		font-size: 12pt;
		text-align: justify;
	}
	p#second > span {
		background-color: #FFFFAA;
	}
	
	div.test {
		color: #000;
	
		font-family: arial;
		font-size: 8pt;
		
	}
	.lowercase {
		text-transform: lowercase;
	}
	.uppercase {
		text-transform: uppercase;
	}
	.capitalize {
		text-transform: capitalize;
	}
</style>

<h1>SLIP GAJI PEGAWAI</h1>
<h1>SANGGAR INDAH GROUP</h1><BR><hr><BR>
<div class="test">
<table border="0" cellspacing="0" cellpadding="1" width="500">
  <tr>
    <td width="172"> NIK</td>
    <td width="9">:</td>
    <td width="313">$nik</td>
  </tr>
  <tr>
    <td > NAMA</td>
    <td>:</td>
    <td>$nama</td>
  </tr>
  <tr>
    <td> JABATAN</td>
    <td>:</td>
    <td>$jabatan</td>
  </tr>
</table>

<BR><BR>

<table border="0" cellspacing="0" cellpadding="1" width="643">
  
  <tr>
    <td style="border-bottom:1pt double black; ">&nbsp;</td>
    <td  style="border-bottom:1pt double black; ">&nbsp;</td>
    <td  style="border-bottom:1pt double black; ">&nbsp;</td>
    <td style="border-bottom:1pt double black; ">&nbsp;</td>
  </tr>
  <tr>
    <td style="border-left:1pt double black; "> <strong>Gaji Pokok</strong></td>
    <td  style=""></td>
    <td  style="">Nama PT Aktif$ng</td>
    <td style="border-right:1pt double black; text-align:right ">Nominal $g</td>
  </tr>
  <tr>
    <td style="border-left:1pt double black; ">&nbsp;</td>
    <td  style="">&nbsp;</td>
    <td  style="">&nbsp;</td>
    <td style="border-right:1pt double black; ">&nbsp;</td>
    </tr>
  <tr>
    <td width="249" style="border-left:1pt double black"> <B>Penambahan</B></td>
    <td width="8">&nbsp;</td>
    <td width="199">&nbsp;</td>
    <td width="187" style="border-right:1pt double black">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> Tunjangan Jabatan</td>
    <td></td>
    <td></td>
    <td style="border-right:1pt double black">= Rp. $tj</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> Tunjangan Makan dan Transport</td>
    <td></td>
    <td>$xmt X $tmt</td>
    <td style="border-right:1pt double black">= Rp. $tomt</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> Tunjangan Lembur</td>
    <td></td>
    <td>$xl X $tl</td>
    <td style="border-right:1pt double black">= Rp. $tol</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> Premi Hadir</td>
    <td></td>
    <td></td>
    <td style="border-right:1pt double black">= Rp. $ph</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> Bonus Hadir</td>
    <td></td>
    <td></td>
    <td style="border-right:1pt double black">= Rp. $bh</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> Tunjangan Luar Kota</td>
    <td ></td>
    <td >$xlk X $tlk</td>
    <td style="border-right:1pt double black">= Rp. $tolk</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style="border-right:1pt double black"><hr></td>
    </tr>
  <tr>
    <td style="border-left:1pt double black">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style="border-right:1pt double black;text-align:right"><B>Rp. $tgp</B></td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"><B> Potongan</B></td>
    <td style="">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style=" border-right:1pt double black">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> Pengembalian Pinjaman</td>
    <td style=""></td>
    <td style="">&nbsp;</td>
    <td style="border-right:1pt double black">= Rp. $pp</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> Keterlambatan</td>
    <td style=""></td>
    <td style="">&nbsp;</td>
    <td style="border-right:1pt double black">= Rp. $k</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> Pph 21</td>
    <td style=""></td>
    <td style="">&nbsp;</td>
    <td style=" border-right:1pt double black">= Rp. $pph</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black"> BPJS</td>
    <td style=""></td>
    <td style="">&nbsp;</td>
    <td style=" border-right:1pt double black">= Rp. $bpjs</td>
    </tr>
  <tr>
    <td style=" border-left:1pt double black">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style="border-right:1pt double black"><hr></td>
    </tr>
  <tr>
    <td style="border-left:1pt double black">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style=" border-right:1pt double black;text-align:right"><B>Rp. $pot</B></td>
    </tr>
  <tr>
    <td style="border-left:1pt double black">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style=" border-right:1pt double black">&nbsp;</td>
    </tr>
  <tr>
    <td style="border-left:1pt double black">&nbsp;</td>
    <td style="">&nbsp;</td>
    <td style=""></td>
    <td style="border-right:1pt double black"><hr /></td>
    </tr>
  <tr>
    <td style="border-left:1pt double black; border-bottom:1pt double black">&nbsp;<BR></td>
    <td style="border-bottom:1pt double black">&nbsp;</td>
    <td style="border-bottom:1pt double black"><strong>Total Penerimaan</strong></td>
    <td style="border-bottom:1pt double black; border-right:1pt double black;text-align:right"><strong>Rp. $tope</strong></td>
  </tr>


</table>

<br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
<tr>
	<td></td>
	<td>Bandung, <span>$today</span></td>
	
</tr>

<tr>
	<td></td>
	<td><br><br><br><br>Manager Personalia</td>
	
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
	<td></td>
</tr>
</table>



EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Slip Gaji.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
