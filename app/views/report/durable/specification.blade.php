<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายละเอียดครุภัณฑ์</title>
<link rel="stylesheet" type="text/css" href="css/mycss.css"/>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
@charset "utf-8";
/* CSS Document */
.textBlackBold {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 12px;
  font-weight: bold;
}
.textRedNormal {
  font-family: Tahoma, Verdana, Geneva, sans-serif;
  font-size: 12px;
  color:#F00;
}
.textBlackNormal {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 12px;
}
.textBlackNormal14 {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 14px;
}
.textBlueNormal {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 12px;
  color:#0CF;
}
a#k1:link {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 12px;
  color: #09C;
  text-decoration: none;
}
a#k1:visited {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 12px;
  color: #09C;
  text-decoration: none;
}
a#k1:hover {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 12px;
  color: #09C;
  text-decoration: underline;
}
a#k2:link {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 12px;
  color: #F00;
  text-decoration: none;
}
a#k2:visited {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 12px;
  color: #F00;
  text-decoration: none;
}
a#k2:hover {
  font-family: Tahoma, Verdana, sans-serif;
  font-size: 12px;
  color: #F00;
  text-decoration: underline;
}
a#link_page:link {
  font-family: Tahoma, Verdana;
  font-size: 12px;
  color: #FFFFFF;
  text-decoration: none;
  background-color: #999999;
  border: 1px solid #666666;
}
a#link_page:visited {
  font-family: Tahoma, Verdana;
  font-size: 12px;
  color: #FFFFFF;
  text-decoration: none;
  background-color: #999999;
  border: 1px solid #666666;
}
a#link_page:hover {
  font-family: Tahoma, Verdana;
  font-size: 12px;
  color: #333333;
  text-decoration: none;
  background-color: #CCCCCC;
  border: 1px solid #666666;
}
.textBarcode1 {
  font-family: "code 3 de 9";
  font-size: 35px;
}
.textHeadReport {
  font-family: "TH SarabunPSK", Tahoma, Verdana;
  font-size: 26px;
  font-weight: bold;
}
.textColumnReport {
  font-family: "TH SarabunPSK", Tahoma, Verdana;
  font-size: 20px;
  font-weight: bold;
}
.textNoramlReport {
  font-family: "TH SarabunPSK", Tahoma, Verdana;
  font-size: 20px;
}
-->
</style></head>

<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="left" class="textHeadReport">รายละเอียดเฉพาะของครุภัณฑ์</td>
  </tr>
  <tr>
    <td colspan="2" align="left" class="textNoramlReport" style="border-bottom:1px solid #000;">งานซ่อมบำรุง ศูนย์คอมพิวเตอร์ โรงพยาบาลนครพนม</td>
  </tr>
  <tr>
    <td height="1" colspan="2" align="center"></td>
  </tr>
  <tr>
    <td height="5" colspan="2" align="center" style="border-top:3px solid #000;"></td>
  </tr>
  <tr>
    <td width="260" align="center" valign="top" style="border-right:1px solid #000;"><?php
    function FormatDateShort($str)
    {
      return "asd";
    }
    if ($durable->durable_img != "") {
		echo "<img src='http://localhost/inventory/images/durable/$durable->durable_img'>";
  	} else {
  		echo "<img src='http://localhost/inventory/images/durable/noimage.jpg'>";
  	}
	
  ?></td>
    <td width="800" align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="22%" height="25" align="right" class="textBlackBold">หมายเลขครุภัณฑ์ :&nbsp;</td>
        <td width="22%" height="25" align="left" class="textBlackNormal"><?php echo $durable->durable_id; ?></td>
        <td width="17%" align="right" class="textBlackBold">หมายเลขศูนย์ซ่อม :&nbsp;</td>
        <td width="39%" align="left" class="textBlackNormal"><?php echo $durable->durable_com_id; ?></td>
      </tr>
      <tr>
        <td width="22%" height="25" align="right" class="textBlackBold">หมายเลขครุภัณฑ์ :&nbsp;</td>
        <td width="22%" height="25" align="left" class="textBlackNormal"><?php echo $durable->durable_id; ?></td>
        <td width="17%" align="right" class="textBlackBold">ชื่อครุภัณฑ์ :&nbsp;</td>
        <td width="39%" align="left" class="textBlackNormal"><?php echo $durable->durable_name; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ประเภทครุภัณฑ์ :&nbsp;</td>
        <td height="25" colspan="3" align="left" class="textBlackNormal"><?php echo $durable->durable_type_name; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ชนิดครุภัณฑ์ :&nbsp;</td>
        <td height="25" colspan="3" align="left" class="textBlackNormal"><?php echo $durable->durable_kind_name; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ยี่ห้อ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php echo $durable->brand_name; ?></td>
        <td height="25" align="right" class="textBlackBold">รุ่น :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php echo $durable->durable_model; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">Serial Number :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php echo $durable->serial_number; ?></td>
        <td height="25" align="right" class="textBlackBold">ราคาที่ซื้อมา :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php echo number_format($durable->durable_price); ?>&nbsp;บาท</td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">วันที่ซื้อ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php if ($durable->durable_date != "0000-00-00") { echo FormatDateShort($durable->durable_date); } else { echo "-"; } ?></td>
        <td height="25" align="right" class="textBlackBold">หมดประกัน :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php
        if ($durable->waranty_check == "1") {
			echo FormatDateShort($durable->waranty_date);
		} else {
			echo "ไม่มีประกัน";
		}
		?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ระยะประกัน :&nbsp;</td>
        <td height="25" colspan="3" align="left" class="textBlackNormal"><?php
	//วันที่เริ่มต้น
	$start_explode = explode('-', $durable->durable_date);
	$start_day = $start_explode[2];
	$start_month = $start_explode[1];
	$start_year = $start_explode[0];
if ($durable->waranty_check == "1" && $durable->waranty_date != "0000-00-00") {
	//วันที่สิ้นสุด
	$expire_explode = explode('-', $durable->waranty_date);
	$expire_day = $expire_explode[2];
	$expire_month = $expire_explode[1];
	$expire_year = $expire_explode[0];
	//วันนี้
	$today_explode = explode('-', date("Y-m-d"));
	$today_day = $today_explode[2];
	$today_month = $today_explode[1];
	$today_year = $today_explode[0];
	//เรียกฟังก์ชัน
	function DateDiff($strDate1, $strDate2) {
		return (strtotime($strDate2) - strtotime($strDate1)) /  ( 60 * 60 * 24 );  // 1 day = 60*60*24     
	}
	$period_of_time = DateDiff($durable->durable_date, $durable->waranty_date);
	$date_current = DateDiff(date("Y-m-d"), $durable->waranty_date);
	
	
	
	/*$start = gregoriantojd($start_month, $start_day, $start_year);
	$expire = gregoriantojd($expire_month, $expire_day, $expire_year);
	$today = gregoriantojd($today_month, $today_day, $today_year);
	$period_of_time = $expire - $start; //หาระยะเวลาการใช้งาน
	$date_current = $expire - $today;//หาวันที่เหลืออยู่*/
	echo "<span class='textRedNormal'>".number_format($period_of_time, 0)."</span> วัน";
	if ($date_current <= -1) {
		echo "&nbsp;<span class='textRedNormal'>หมดประกันแล้ว</span>";
	} else {
		echo "&nbsp;<span class='textBlueNormal'>ยังอยู่ในประกัน</span>";
		if ($date_current == 0)
			echo "&nbsp;วันนี้เป็นวันสุดท้าย";
		else
			echo "&nbsp;เหลือเวลาอีก : ".number_format($date_current, 0)." วัน";
	}
}
/*function GregorianToJD($month, $day, $year) {
	if ($month > 2) {
		$month = $month – 3;
	} else {
		$month = $month + 9;
		$year = $year – 1;
	}
	$c = floor($year / 100);
	$ya = $year – (100 * $c);
	$j = floor((146097 * $c) / 4);
	$j += floor((1461 * $ya) / 4);
	$j += floor(((153 * $month) + 2) / 5);
	$j += $day + 1721119;
	return $j;
}*/ ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ปีที่ซื้อ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php echo $start_year + 543; ?></td>
        <td height="25" align="right" class="textBlackBold">เลขที่สัญญา :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php echo $durable->contract_no; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">คุณลักษณะเฉพาะ :&nbsp;</td>
        <td height="25" colspan="3" align="left" class="textBlackNormal"><?php echo nl2br($durable->durable_detail); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">หน่วยงานเจ้าของครุภัณฑ์</td>
  </tr>
  <tr>
    <td colspan="2" align="left"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="17%" height="25" align="right" class="textBlackBold">หน่วยงานหลัก :&nbsp;</td>
        <td width="34%" height="25" align="left" class="textBlackNormal"><?php echo $durable->dept_name; ?></td>
        <td width="12%" height="25" align="right" class="textBlackBold">หน่วยงานย่อย :&nbsp;</td>
        <td width="37%" height="25" align="left" class="textBlackNormal"><?php echo $durable->sub_dept_name; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">ที่ตั้งของครุภัณฑ์</td>
  </tr>
  <tr>
    <td colspan="2" align="left"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="17%" height="25" align="right" class="textBlackBold">อาคาร :&nbsp;</td>
        <td width="30%" height="25" align="left" class="textBlackNormal"><?php echo $durable->build_name; ?></td>
        <td width="4%" height="25" align="right" class="textBlackBold">ชั้น  :&nbsp;</td>
        <td width="19%" height="25" align="left" class="textBlackNormal"><?php echo $durable->floor_name; ?></td>
        <td width="5%" align="right" class="textBlackBold">ห้อง :&nbsp;</td>
        <td width="25%" align="left" class="textBlackNormal"><?php echo $durable->durable_location; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">สถานะครุภัณฑ์</td>
  </tr>
  <tr>
    <td colspan="2" align="left"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="17%" height="25" align="right" class="textBlackBold">สถานะการใช้งาน :&nbsp;</td>
        <td width="31%" height="25" align="left" class="textBlackNormal"><?php echo $durable->status_name; ?></td>
        <td width="15%" height="25" align="right" class="textBlackBold">การบำรุงรักษา :&nbsp;</td>
        <td width="37%" height="25" align="left" class="textBlackNormal"><?php echo $durable->pm; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">หมายเหตุ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php
		if ($durable->durable_comment != "") {
			echo nl2br($durable->durable_comment);
		} else {
			echo "-";
		}
		?></td>
        <td height="25" align="right" class="textBlackBold">ประเภทความเสี่ยง :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php echo $durable->important_id; ?></td>
        </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">เครื่องมือสำรอง :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php
        if ($durable->tool_reserve == "1") {
			echo "ใช่";
		} else {
			echo "ไม่";
		} ?></td>
        <td height="25" align="right" class="textBlackBold">&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">รายละเอียดการจำหน่าย</td>
  </tr>
  <tr>
    <td colspan="2" align="left"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="17%" height="25" align="right" class="textBlackBold">เอกสารจำหน่าย :&nbsp;</td>
        <td width="31%" height="25" align="left" class="textBlackNormal"><?php if ($durable->durable_status == "5") { //ถ้าจำหน่ายแล้ว
			echo $durable->gr_doc;
		} else {
			echo "-";
		}?></td>
        <td width="15%" height="25" align="right" class="textBlackBold">เอกสารลงวันที่ :&nbsp;</td>
        <td width="37%" height="25" align="left" class="textBlackNormal"><?php if ($durable->durable_status == "5") { //ถ้าจำหน่ายแล้ว
			echo FormatDateShort($durable->gr_date);
		} else {
			echo "-";
		}?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">อนุมัติจำหน่ายวันที่ :&nbsp;</td>
        <td height="25" colspan="3" align="left" class="textBlackNormal"><?php if ($durable->durable_status == "5") { //ถ้าจำหน่ายแล้ว
			echo FormatDateShort($durable->gr_date_approve);
		} else {
			echo "-";
		}?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">ข้อมูลการยืม</td>
  </tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td height="10" colspan="2" align="left"></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">ข้อมูลการซ่อม</td>
  </tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
</table>
</body>
</html>