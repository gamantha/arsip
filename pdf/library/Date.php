<?php

/**
 * Converting Any Date Format 
 * @author	Riky Fahri Hasibuan - riky.hasibuan@gmail.com
 */
class Date {

    var $year = "";
    var $month = "";
    var $day = "";
    var $date = "";
    var $input = '';

    public function getYear($date) {
        $temp_date = explode("-", $date);
        $this->year = $temp_date[0];
        return $this->year;
    }

    public function getMonth($date) {
        $temp_date = explode("-", $date);
        $this->month = $temp_date[1];
        return $this->month;
    }

    public function getDay($date) {
        $temp_date = explode("-", $date);
        $this->day = $temp_date[2];
        return $this->day;
    }

    function reformatDate($date) {
        $temp_date = explode("-", $date);
        $new_date = array();
        for ($i = 3; $i > 0; $i--)
            $new_date[] = $temp_date[$i - 1];
        $this->date = implode("-", $new_date);
        return $this->date;
    }

    function reformatDateSlash($date) {
        $temp_date = explode("-", $date);
        $new_date = array();
        for ($i = 3; $i > 0; $i--)
            $new_date[] = $temp_date[$i - 1];
        $this->date = implode("/", $new_date);
        return $this->date;
    }
    
    function reformatDateTimeSlash($date) {
    	$date = explode(" ", $date);
    	$temp_date = explode("-", $date[0]);
    	$new_date = array();
    	for ($i = 3; $i > 0; $i--)
    		$new_date[] = $temp_date[$i - 1];
    		$this->date = implode("/", $new_date);
    				return $this->date;
    }

    function getIndoBulan($bln) {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

    function getIndoHari($date) {
        $temp_date = explode("-", $date);
        $day = date_format(date_create($date), 'D');
        $hari = '';
        switch ($day) {
            case "Mon": 
                $hari = "Senin";
                break;
            case "Tue":
                $hari = "Selasa";
                break;
            case "Wed":
                $hari = "Rabu";
                break;
            case "Thu":
                $hari = "Kamis";
                break;
            case "Fri":
                $hari =  "Jumat";
                break;
            case "Sat":
                $hari = "Sabtu";
                break;
            case "Sun":
                $hari = "Minggu";
                break;
        }

        $bulan   = $this->getIndoBulan($temp_date[1]);
        $tahun   = $temp_date[0];
        $tanggal = $temp_date[2];

        $new_date = $hari." ".$tanggal.", ".$bulan." ".$tahun;

        return $new_date;
    } 
    
    function getIndoTanggal($date) {
        $temp_date = explode("-", $date);
        $day = date_format(date_create($date), 'j');

        $bulan   = $this->getIndoBulan($temp_date[1]);
        $tahun   = $temp_date[0];
        $tanggal = $day;

        $new_date = $tanggal." ".$bulan." ".$tahun;

        return $new_date;
    } 

    function getIndoHariJam($date) {
        $date = explode(" ", $date);
        $temp_date = explode("-", $date[0]);
        $day = date_format(date_create($date[0]), 'D');
        $hari = '';
        switch ($day) {
            case "Mon": 
                $hari = "Senin";
                break;
            case "Tue":
                $hari = "Selasa";
                break;
            case "Wed":
                $hari = "Rabu";
                break;
            case "Thu":
                $hari = "Kamis";
                break;
            case "Fri":
                $hari =  "Jumat";
                break;
            case "Sat":
                $hari = "Sabtu";
                break;
            case "Sun":
                $hari = "Minggu";
                break;
        }

        $bulan   = $this->getIndoBulan($temp_date[1]);
        $tahun   = $temp_date[0];
        $tanggal = $temp_date[2];

        $new_date = $hari." ".$tanggal.", ".$bulan." ".$tahun;

        return $new_date;
    }

}

?>
