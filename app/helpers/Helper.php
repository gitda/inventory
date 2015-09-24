<?php 
namespace Helpers;

use DateTime;
use Carbon\Carbon;

class Helper {

    public static function DateFormat($date, $form='d/m/Y', $to='Y-m-d')
    {
    	$dt = Carbon::createFromFormat($form, $date);
		return $dt->subYears(543)->format($to); 
	}
	
	public static function MonthThai($month,$short=false)
    {
    	$allmonthfull = array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
    	$allmonth = array('ม.ค.','ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.','ต.ค.', 'พ.ย.', 'ธ.ค.' );
		if($short)
			return $allmonthfull[$month-1];
		return $allmonth[$month-1];
	}

	public static function toDateThai($date, $form='Y-m-d', $to='d/m/Y')
	{
		if($date=="")
			return "";
		$dt = Carbon::createFromFormat($form, $date);
		return $dt->addYears(543)->format($to);
	}
	public static function diffForHumans($from, $format='Y-m-d')
	{
		try {
			$find = array("weeks","week","months","month","days","day","years","year","ago","from","now"," ");
			$replace = array("สัปดาห์","สัปดาห์","เดือน","เดือน","วัน","วัน","ปี","ปี","ก่อน","หน้า","","");
			$diff = Carbon::createFromFormat($format, $from)->diffForHumans();
			$result = str_replace($find,$replace,$diff);

			return 	$result;
		} catch (Exception $e) {
			return "error";
		}
	}
	public static function fromJSDate($date, $form='M d Y', $to='Y-m-d')
	{
		$ex = explode(" ", $date);
		$format = $ex[1]." ".$ex[2]." ".$ex[3];
		$date = Carbon::createFromFormat($form, $format)->format($to);
		return $date;
	}

	public static function secondsToTime($seconds) {
	    $dtF = new DateTime("@0");
	    $dtT = new DateTime("@$seconds");
	    $diff = $dtF->diff($dtT);

	    $format = "%s วินาที";
	    if($diff->i>0)
	    	$format = "%i นาที และ ".$format;
	    if($diff->h>0)
	    	$format = "%h ชั่วโมง, ".$format;
	    if($diff->days>0)
	    	$format = "%a วัน, ".$format;
	    

	    return $diff->format($format);
	}


	public static function budgetYear($date, $format='Y-m-d')
	{
		$carbon = Carbon::createFromFormat($format,$date);

		$year_in_ngob = $carbon->year;
		if($carbon->month<=9){
			$year_in_ngob = $year_in_ngob-1;
		}
		return $year_in_ngob;
	}
	public static function dateBetweenbudgetYear($date, $format='Y-m-d')
	{
		$budgetYear = self::budgetYear($date, $format='Y-m-d');
		$start = $budgetYear."-10"."-01";
		$end = ($budgetYear+1)."-09"."-30";
		return compact('start','end');
	}
}