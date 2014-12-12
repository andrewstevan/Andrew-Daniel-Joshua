<?php
    #Date format from English to Indo
    function IndoTgl($tanggal)
    {
        $day = substr($tanggal, 8, 2);
        $months = substr($tanggal, 5, 2);
		switch($months)
		{
			case 1:
				$month = "Januari"; break;
			case 2:
				$month = "Februari"; break;
			case 3:
				$month = "Maret"; break;
			case 4:
				$month = "April"; break;
			case 5:
				$month = "Mei"; break;
			case 6:
				$month = "Juni"; break;
			case 7:
				$month = "Juli"; break;
			case 8:
				$month = "Agustus"; break;
			case 9:
				$month = "September"; break;
			case 10:
				$month = "Oktober"; break;
			case 11:
				$month = "November"; break;
			case 12:
				$month = "Desember"; break;
				
		}
        $year = substr($tanggal, 0, 4);
        $date = $day." ".$month." ".$year;
        
        return $date;        
    }
	
	function getIndoBulan($bln){
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
		if(empty($date))
		{
			echo "";
		}
		else
			{
				// memecah date berdasarkan separator -
				$temp_date = explode("-", $date);
				// membuat format date dengan hari
				// output yang dihasilkan adalah hari dengan bahasa inggris
				$day = date_format(date_create($date), 'D');
				$hari = '';
				// disini kita bikin pengkondisian
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
						$hari = "Jumat";
						break;
					case "Sat":
						$hari = "Sabtu";
						break;
					case "Sun":
						$hari = "Minggu";
						break;
				}
			
				// disini kita panggil fungsi getIndoBulan
				// untuk merubah format bulan angka menjadi nama bulan
				$bulan   = getIndoBulan($temp_date[1]);
				$tahun 	 = $temp_date[0];
				$tanggal = $temp_date[2];
	
				// nah disini kita gabungin lagi data yg kepecah tadi 
				// menjadi format date yang baru
				$new_date = $hari.", ".$tanggal." ".$bulan." ".$tahun;
			
				return $new_date;
			}
	} 

//$date = date('2014-04-14');
//echo getIndoHari($date);
?>