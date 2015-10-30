<?php 
namespace Helpers;

use DateTime;
use Carbon\Carbon;

class Helper {

	private static $month = array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');

	public static function GetDefaultMonthPick()
	{
		return self::MonthThai(date('m'),true).' '.(date('Y')+543);
	}
	public static function GetDefaultDatePick()
	{
		return date('d').' '.self::MonthThai(date('m'),true).' '.(date('Y')+543);
	}
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

	public static function fromFullDate($fulldate)
	{
		$ex = explode(" ", $fulldate);
		$format = ($ex[2]-543)."-".(array_search($ex[1],self::$month)+1)."-".$ex[0];
		
		$date = Carbon::createFromFormat('Y-m-d', $format)->format('Y-m-d');
		return $date;
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

	public static function formatSizeUnits($bytes,$mode="")
	{

		if(strtolower($mode)=="hdd"){
			$bytes = $bytes*4096.000001;
		}
		if(strtolower($mode)=="ram"){
			$bytes = $bytes*1024;
		}

		if ($bytes >= 1099511627776)
        {
            $bytes = number_format($bytes / 1099511627776, 2) . ' TB';
        }
        elseif ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
        	return "";
            $bytes = '0 bytes';
        }

        return $bytes;
	}
}