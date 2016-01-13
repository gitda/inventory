<?php 
use Carbon\Carbon;

class Helper {

	public static function monththai($month,$short=false)
	{
		$i=01;
		$thaimonth = array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
		$shortmonth = array('ม.ค.','ก.พ.','มี.ค.','ม.ย.','พ.ค.','มิ.ย.','ก.ค.','สิ.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.');

		return $short==true?$shortmonth[$month-$i]:$thaimonth[$month-$i];

	}

	public static function DateFormat($date, $form='d/m/Y', $to='Y-m-d')
    {
    	$dt = Carbon::createFromFormat($form, $date);
		return $dt->subYears(543)->format($to); 
	}
	
	public static function toDateThai($date, $form='Y-m-d', $to='d/m/Y')
	{
		if($date=="")
			return "";
		$dt = Carbon::createFromFormat($form, $date);
		return $dt->addYears(543)->format($to);
	}

	public static function toYearThai($YearForm,$short=false)
	{
		$dt = $YearForm+543;
		if($short){
			$dt = $dt - 2500;
		}
		return $dt;
	}

	public static function toDayCou($d1,$d2)
	{
		return (strtotime($d2) - strtotime($d1))/  ( 60 * 60 * 24 );
	}

	public static function toYesON($num)
	{
		//$i=01;
		$YesNo = array('ไม่ใช่','ใช้');
		return $YesNo[$num];
	}

	public static function toRunnum($a,$b,$c)
	{
		$y1=date('Y')+543;
		$y2=substr($y1, 2);
		$c = sprintf("%04d", $c);
		$abc = $a.''.$y2.''.$b.''.$c;
	return $abc;
	}

	public static function toDayMonth($dt)
	{
		$date = new DateTime($dt.' 00:00:00');
		$thaimonth = array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
		$m = $thaimonth[$date->format('m')-1];
	    $y = $date->format('Y')+543;
	    $my = $m.' '.$y;

		return $my;
	}

	public static function sumColumn($sum,$field)
	{
		$a = 0;
		foreach ($sum as $row) {
		 	$a+=$row[$field];
		}
		return $a;
	}
}