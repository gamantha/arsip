<?php
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);

require_once('../../Config.php');
require_once('../../library/Date.php');

$date =  new Date();

$result_con = mysqli_connect(Config::RESULTS_DB_HOST, Config::RESULTS_DB_USER, Config::RESULTS_DB_PASS,Config::RESULTS_DB_NAME) or die("Unable to connect to MySQL");
$rapordb_con = mysqli_connect(Config::PPSDM_DB_HOST, Config::PPSDM_DB_USER, Config::PPSDM_DB_PASS,Config::PPSDM_DB_NAME) or die("Unable to connect to MySQL");

$item_id = $_GET['id'];

$query = "SELECT a.*, b.`id` AS `item_id`, b.`profile_id`, b.`eportfolio_id`, c.* FROM `profile` AS `a`
		  LEFT JOIN `item` AS `b` ON b.`profile_id` = a.`id`
		  LEFT JOIN `education` AS `c` ON b.`profile_id` = c.`profile_id`
		  WHERE b.`id` = '".$item_id."'";

$profile_query = mysqli_query($rapordb_con, $query);
$profile = mysqli_fetch_assoc($profile_query);

$no_pemeriksaan = "1234567890";
$nama = $profile['first_name']." ".$profile['last_name'];
$ttl ='';
if ($profile['date_of_birth'] != NULL) {
	$ttl =  $date->getIndoTanggal($profile['date_of_birth']);
} else {
	$ttl = '';
}
$jenis_kelamin = $profile['gender_id'];
$pendidikan = $profile['academic_level_id'];
$tgl_pemeriksaan = "7 Juli 2014";
$tujuan_pemeriksaan = "Evaluasi Warid Belajar";


//============================================================+
// File name   : example_031.php
// Begin       : 2008-06-09
// Last Update : 2013-05-14
//
// Description : Example 031 for TCPDF class
//               Pie Chart
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
 * @abstract TCPDF - Example: Pie Chart
 * @author Nicola Asuni
 * @since 2008-06-09
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PPSDM');
$pdf->SetTitle('CFIT Result');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'HASIL PEMERIKSAAN CFIT', 'www.ppsdm.com');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

$n = 0;

$cfit1_benar = 0;
$cfit1_salah = 0;
$cfit2_benar = 0;
$cfit2_salah = 0;
$cfit3_benar = 0;
$cfit3_salah = 0;
$cfit4_benar = 0;
$cfit4_salah = 0;

$query = "SELECT * FROM `item` WHERE `id` = '". $item_id."'";
$result = mysqli_query($rapordb_con,$query);
$row = mysqli_fetch_assoc($result);
$eportfolio = $row['eportfolio_id'];

$query2 = "SELECT * FROM `item` WHERE `eportfolio_id` = '".$eportfolio."' AND `status` = 'finished'";
$result2 = mysqli_query($rapordb_con,$query2);
while($row2 = mysqli_fetch_assoc($result2)) {
	$item2[] = $row2['id'];
}

foreach ($item2 as $val) {
	$sql3 = 'SELECT * FROM `results` WHERE `rapor_item_id` = ' . $val;
	$result3 = mysqli_query($result_con,$sql3);
	$row3 = mysqli_fetch_assoc($result3);
	
	$hasil2 = json_decode($row3['result_json'],true);	

	$total_score2 = 0;
	$i2 = 0;

	$true2 	= 0;
	$false2	= 0;
	$empty2	= 0;
	
	if ($row3['tao_delivery_label'] != 'ppsdm/psikotes/cfit::2') {
		foreach ($hasil2 as $key=>$val) {
			$total_score2 += base64_decode($val['SCORE']);	
			if (base64_decode($val['SCORE']) > '0') {
				$true2++;
			} elseif (base64_decode($val['SCORE']) == '0' && base64_decode($val['RESPONSE']) == '') {
				$false2++;
			} elseif (base64_decode($val['SCORE']) == '0' && base64_decode($val['RESPONSE']) != '') {
				$false2++;
			}
			$i2++;
		}
	} else {
		foreach ($hasil2 as $key=>$val) {
			$total_score2 += base64_decode($val['SCORE']);	
			if (base64_decode($val['SCORE']) == '2' || base64_decode($val['SCORE']) == '11') {
				$true2++;
			} elseif (base64_decode($val['SCORE']) == '0' && base64_decode($val['RESPONSE']) == '') {
				$false2++;
			} elseif (base64_decode($val['SCORE']) == '0' || base64_decode($val['SCORE']) == '20' && base64_decode($val['RESPONSE']) != '') {
				$false2++;
			}
			$i2++;
		}
	}
	$n++;
	
	if ($n == 1) {
		$cfit1_benar = $true2;
		$cfit1_salah = $false2;
	} 
	
	if ($n == 2){
		$cfit2_benar = $true2;
		$cfit2_salah = $false2;
	}
	
	if ($n == 3) {
		$cfit3_benar = $true2;
		$cfit3_salah = $false2;
	}
	
	if ($n == 4) {
		$cfit4_benar = $true2;
		$cfit4_salah = $false2;
	}
}

$avg_skor = '';
if ($n == 4) {
	$avg_skor = round(((($cfit1_benar/($cfit1_benar + $cfit1_salah)) + ($cfit2_benar/($cfit2_benar + $cfit2_salah)) + ($cfit3_benar/($cfit3_benar + $cfit3_salah))  + ($cfit4_benar/($cfit4_benar + $cfit4_salah))) / 4 * 100),2);
} else {
	$avg_skor = 'N/A';
}
//$avg_skor = 0;

// define some HTML content with style
$html = <<<EOF
<<style>
	h1 {
		color: navy;
		font-family: times;
		font-size: 24pt;
		text-decoration: underline;
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
	table.first {
		color: #003300;
		font-family: helvetica;
		font-size: 8pt;
		border-left: 3px double black;
		border-right: 3px double black;
		border-top: 3px double black;
		border-bottom: 3px double black	;
		background-color: #fff;
	}
	table.first2 {
		color: #003300;
		font-family: helvetica;
		font-size: 8pt;
		border-left: 0px double white;
		border-right: 0px double white;
		border-top: 0px double white;
		border-bottom: 3px double white	;
		background-color: #fff;
	}
	td {
		border: 1px solid black;
		background-color: #ffffee;
	}
	td.second {
		border: 2px dashed green;
	}
	div.test {
		color: #CC0000;
		background-color: #FFFF66;
		font-family: helvetica;
		font-size: 10pt;
		border-style: solid solid solid solid;
		border-width: 2px 2px 2px 2px;
		border-color: green #FF00FF blue red;
		text-align: center;
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

<h1 class="title" align="center">HASIL PEMERIKSAAN CFIT</h1>
<div align="center">

    <table class="first" widht="661" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" rowspan="2" align="center">IDENTITAS PESERTA</td>
    <td colspan="2" align="center">KETERANGAN</td>
  </tr>
  <tr>
    <td width="173" align="center">TARAF</td>
    <td width="77" align="center">IQ</td>
  </tr>
  <tr>
    <td width="166"> Nomor Pemeriksaan</td>
    <td width="14">:</td>
    <td width="194">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> Nama Lengkap</td>
    <td>:</td>
    <td>$nama</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> Tanggal Lahir </td>
    <td>:</td>
    <td>$ttl</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> Jenis Kelamin</td>
    <td>:</td>
    <td>$jenis_kelamin</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> Pendidikan  Terakhir</td>
    <td>:</td>
    <td>$pendidikan</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> Tgl. Pemeriksaan</td>
    <td>:</td>
    <td>$tgl_pemeriksaan</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> Tujuan Pemeriksaan</td>
    <td>:</td>
    <td>$tujuan_pemeriksaan</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<table class="first2" width="625">
  <tr>
    <td colspan="6" align="center"><p>&nbsp;</p>
    <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="460" align="center">
	<table class="first" width="425" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="450">KETERANGAN</td>
      </tr>
      <tr>
        <td><p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p></td>
      </tr>
    </table></td>
    <td colspan="5" align="center" width="150">
    <table class="first" width="148" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="148"><table class="first" width="148" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="148">SKOR</td>
          </tr>
          <tr>
            <td><p style="font-size: 400%;">$avg_skor&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>Jakarta, 21 April 2014</td>
      </tr>
      <tr>
        <td>A.n. Psikolog Pemeriksa</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Drs. Budiman Sanusi Mpsi</td>
      </tr>
      <tr>
        <td>No. HIMPSI: 0111891963</td>
      </tr>
    </table></td>
  </tr>
</table> 
</div>

EOF;

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();

$pdf->writeHTML($html, true, false, true, false, '');

/**
$xc = 40;
$yc = 100;
$r = 15;

$coord_benar_cfit1 = $cfit1_benar * 360 / ($cfit1_benar + $cfit1_salah);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 0, $coord_benar_cfit1, 'FD', true, 90, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, $coord_benar_cfit1, 0, 'FD', true, 90, 2);
 
$xc2 = 80;
$yc2 = 100;
$r = 15;

$coord_benar_cfit2 = $cfit2_benar * 360 / ($cfit2_benar + $cfit2_salah);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc2, $yc2, $r, 0, $coord_benar_cfit2, 'FD', true, 90, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc2, $yc2, $r, $coord_benar_cfit2, 0, 'FD', true, 90, 2);

$xc3 = 120;
$yc3 = 100;
$r = 15;
$coord_benar_cfit3 = $cfit3_benar * 360 / ($cfit3_benar + $cfit3_salah);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc3, $yc3, $r, 0, $coord_benar_cfit3, 'FD', true, 90, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc3, $yc3, $r, $coord_benar_cfit3, 0, 'FD', true, 90, 2);

$xc4 = 160;
$yc4 = 100;
$r = 15;
$coord_benar_cfit4 = $cfit4_benar * 360 / ($cfit4_benar + $cfit4_salah);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc4, $yc4, $r, 0, $coord_benar_cfit4, 'FD', true, 90, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc4, $yc4, $r, $coord_benar_cfit4, 0, 'FD', true, 90, 2);


// write labels
$pdf->SetTextColor(0,0,0);
//$pdf->Text(105, 105, 'Benar');
$pdf->Text(35, 120, $cfit1_benar . '/' . $cfit1_salah);
$pdf->Text(75, 120, $cfit2_benar . '/' . $cfit2_salah);
$pdf->Text(115, 120, $cfit3_benar . '/' . $cfit3_salah);
$pdf->Text(155, 120, $cfit4_benar . '/' . $cfit4_salah);

//$pdf->SetFont('helvetica', 'B', 25);

//$pdf->Text(60, 135, 'SKOR : ' . $avg_skor );
**/

// ---------------------------------------------------------

$sql = "SELECT * FROM `item` WHERE `id` = '". $item_id."'";
$returnedresult = mysqli_query($rapordb_con,$sql);
$result = mysqli_fetch_assoc($returnedresult);
$eportfolio_id = $result['eportfolio_id'];

$sql3 = "SELECT * FROM `item` WHERE `eportfolio_id` = '".$eportfolio_id."' AND `status` = 'finished'";
$returnedresult3 = mysqli_query($rapordb_con,$sql3);
while($result3 = mysqli_fetch_assoc($returnedresult3)) {
	$item[] = $result3['id'];
}

$xc = 40;
$yc = 100;
$r = 15;
//$coord_benar = 0;
$text_score_1 = 35;
$text_score_2 = 120;

$n = 0;

foreach ($item as $val) {
	$sql = 'SELECT * FROM `results` WHERE `rapor_item_id` = ' . $val;
	$returnedresult = mysqli_query($result_con,$sql);
	$result = mysqli_fetch_assoc($returnedresult);
	
	$hasil = json_decode($result['result_json'],true);	

	$total_score = 0;
	$i = 0;

	$true 	= 0;
	$false	= 0;
	$empty	= 0;

	if ($result['tao_delivery_label'] != 'ppsdm/psikotes/cfit::2') {
		foreach ($hasil as $key=>$val) {
			$total_score += base64_decode($val['SCORE']);	
			if (base64_decode($val['SCORE']) > '0') {
				$true++;
			} elseif (base64_decode($val['SCORE']) == '0' && base64_decode($val['RESPONSE']) == '') {
				$false++;
			} elseif (base64_decode($val['SCORE']) == '0' && base64_decode($val['RESPONSE']) != '') {
				$false++;
			}
			$i++;
		}
	} else {
		foreach ($hasil as $key=>$val) {
			$total_score += base64_decode($val['SCORE']);	
			if (base64_decode($val['SCORE']) == '2' || base64_decode($val['SCORE']) == '11') {
				$true++;
			} elseif (base64_decode($val['SCORE']) == '0' && base64_decode($val['RESPONSE']) == '') {
				$false++;
			} elseif (base64_decode($val['SCORE']) == '0' || base64_decode($val['SCORE']) == '20' && base64_decode($val['RESPONSE']) != '') {
				$false++;
			}
			$i++;
		}
	}
	
	if ($true > 0) {
		$coord_benar = $true * 360 / $i;

		$pdf->SetFillColor(0, 255, 0);
		$pdf->PieSector($xc, $yc, $r, 0, $coord_benar, 'FD', true, 90, 2);
		$pdf->SetFillColor(255, 0, 0);
		$pdf->PieSector($xc, $yc, $r, $coord_benar, 0, 'FD', true, 90, 2);

		$pdf->SetTextColor(0,0,0);
		$pdf->Text($text_score_1, $text_score_2 , $true . '/' . $false);
	} else {
		$coord_benar = $false * 360 / $i;

		$pdf->SetFillColor(255, 0, 0);
		$pdf->PieSector($xc, $yc, $r, 0, $coord_benar, 'FD', true, 90, 2);
		$pdf->SetFillColor(0, 255, 0);
		$pdf->PieSector($xc, $yc, $r, $coord_benar, 0, 'FD', true, 90, 2);

		$pdf->SetTextColor(0,0,0);
		$pdf->Text($text_score_1, $text_score_2 , $true . '/' . $false);
	}
	
	$text_score_1 = $text_score_1 + 40;
	$xc = $xc + 40;
}
	
//Close and output PDF document
$pdf->Output('example_031.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
