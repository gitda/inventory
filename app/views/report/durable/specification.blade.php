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
      return \Helpers\Helper::toDateThai($str);
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
        <td width="22%" height="25" align="right" class="textBlackBold">ประเภทครุภัณฑ์ :&nbsp;</td>
        <td width="22%" height="25" align="left" class="textBlackNormal"><?php echo $durable->durable_type_name; ?></td>
        <td width="17%" align="right" class="textBlackBold">ชนิดครุภัณฑ์ :&nbsp;</td>
        <td width="39%" align="left" class="textBlackNormal"><?php echo $durable->durable_kind_name; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ชื่อครุภัณฑ์ :&nbsp;</td>
        <td height="25" colspan="3" align="left" class="textBlackNormal"><?php echo $durable->durable_name; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ยี่ห้อ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php echo $durable->brand_name; ?></td>
        <td height="25" align="right" class="textBlackBold">รุ่น :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal"><?php echo $durable->durable_model; ?></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">CPU :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->cpu_name}}</td>
        <td height="25" align="right" class="textBlackBold">Speed :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->cpu_cap}}</td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ฮาร์ดดิสก์ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->hdd_name}}</td>
        <td height="25" align="right" class="textBlackBold">ความจุฮาร์ดดิสก์ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->hdd_cap}}</td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">หน่วยความจำ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->ram_name}}</td>
        <td height="25" align="right" class="textBlackBold">ความจุหน่วยความจำ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->ram_cap}}</td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ระบบปฏิบัติการ :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->os_name}}</td>
        <td height="25" align="right" class="textBlackBold"></td>
        <td height="25" align="left" class="textBlackNormal"></td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">Serial Number :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->serial_number}}</td>
        <td height="25" align="right" class="textBlackBold">ราคาที่ซื้อมา :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{number_format($durable->durable_price)}}&nbsp;บาท</td>
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

      <tr>
        <td height="25" align="right" class="textBlackBold">ประเภทเงิน :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->budget_name}}</td>
        <td height="25" align="right" class="textBlackBold">วิธีการได้มา :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->case_in_name}}</td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">ผู้ขาย/ผู้รับจ้าง/ผู้บริจาค :&nbsp;</td>
        <td colspan="3" height="25" align="left" class="textBlackNormal">{{$durable->store_name}}</td>
      </tr>
      <tr>
        <td height="25" align="right" class="textBlackBold">เลขที่สัญญา :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">{{$durable->contract_no}}</td>
        <td height="25" align="right" class="textBlackBold"></td>
        <td height="25" align="left" class="textBlackNormal"></td>
      </tr>

      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">หน่วยงานเจ้าของครุภัณฑ์</td>
  </tr>
  <tr>
    <td colspan="2" align="left">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="17%" height="25" align="right" class="textBlackBold">หน่วยงานหลัก :&nbsp;</td>
        <td width="34%" height="25" align="left" class="textBlackNormal"><?php echo $durable->dept_name; ?></td>
        <td width="12%" height="25" align="right" class="textBlackBold">หน่วยงานย่อย :&nbsp;</td>
        <td width="37%" height="25" align="left" class="textBlackNormal"><?php echo $durable->sub_dept_name; ?></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">ที่ตั้งของครุภัณฑ์</td>
  </tr>
  <tr>
    <td colspan="2" align="left">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="17%" height="25" align="right" class="textBlackBold">อาคาร :&nbsp;</td>
          <td width="34%" height="25" align="left" class="textBlackNormal"><?php echo $durable->build_name; ?></td>
          <td width="12%" height="25" align="right" class="textBlackBold">ชั้น  :&nbsp;</td>
          <td width="37%" height="25" align="left" class="textBlackNormal"><?php echo $durable->floor_name; ?></td>
          
        </tr>
        <tr>
          <td width="17%" align="right" class="textBlackBold">ห้อง :&nbsp;</td>
          <td width="34%" align="left" class="textBlackNormal"><?php echo $durable->durable_location; ?></td>
          <td width="12%" align="right" class="textBlackBold">ความสำคัญ :&nbsp;</td>
          <td width="37%" align="left" class="textBlackNormal">{{$durable->important_name}}</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">สถานะครุภัณฑ์</td>
  </tr>
  <tr>
    <td colspan="2" align="left">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="17%" height="25" align="right" class="textBlackBold">สถานะการใช้งาน :&nbsp;</td>
        <td width="31%" height="25" align="left" class="textBlackNormal"><?php echo $durable->status_name; ?></td>
        <td width="15%" height="25" align="right" class="textBlackBold"></td>
        <td width="37%" height="25" align="left" class="textBlackNormal"></td>
      </tr>
      <tr>
        <td width="17%" height="25" align="right" class="textBlackBold">การบำรุงรักษา :&nbsp;</td>
        <td width="31%" height="25" align="left" class="textBlackNormal">{{$durable->pm_name}}</td>
        <td width="15%" height="25" align="right" class="textBlackBold">ความถี่ PM :&nbsp;</td>
        <td width="37%" height="25" align="left" class="textBlackNormal">{{$durable->pm_frequency or '-'}} เดือน</td>
      </tr>
        <td height="25" align="right" class="textBlackBold">เครื่องมือสำรอง :&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">@if($durable->tool_reserve == "1") {{"ใช่"}} @else {{"ไม่"}} @endif</td>
        <td height="25" align="right" class="textBlackBold">&nbsp;</td>
        <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">สถานะด้านเน็ตเวิร์ค</td>
  </tr>
  <tr>
    <td colspan="2" align="left">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="17%" height="25" align="right" class="textBlackBold">Mac Address :&nbsp;</td>
        <td width="31%" height="25" align="left" class="textBlackNormal">{{$durable->mac_address}}</td>
        <td width="15%" height="25" align="right" class="textBlackBold">IP Address :&nbsp;</td>
        <td width="37%" height="25" align="left" class="textBlackNormal">{{$durable->ip_address}}</td>
      </tr>
      <tr>
        <td width="17%" height="25" align="right" class="textBlackBold">Computer name :&nbsp;</td>
        <td width="31%" height="25" align="left" class="textBlackNormal">{{$durable->computer_name}}</td>
        <td width="15%" height="25" align="right" class="textBlackBold">Workgroup :&nbsp;</td>
        <td width="37%" height="25" align="left" class="textBlackNormal">{{$durable->workgroup}}</td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">SNMP</td>
  </tr>
  <tr>
    <td colspan="2" align="left">
       <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="17%" height="25" align="right" class="textBlackBold">last snmp :&nbsp;</td>
          <td width="31%" height="25" align="left" class="textBlackNormal">{{$durable->last_scan}}</td>
          <td width="15%" height="25" align="right" class="textBlackBold">system type :&nbsp;</td>
          <td width="37%" height="25" align="left" class="textBlackNormal">{{$durable->system_type}}</td>
        </tr>
        <tr>
          <td width="17%" height="25" align="right" class="textBlackBold">netmask :&nbsp;</td>
          <td width="31%" height="25" align="left" class="textBlackNormal">{{$durable->netmask}}</td>
          <td width="15%" height="25" align="right" class="textBlackBold"></td>
          <td width="37%" height="25" align="left" class="textBlackNormal"></td>
        </tr>
        <tr>
          <td width="17%" height="25" align="right" class="textBlackBold">ram size :&nbsp;</td>
          <td width="31%" height="25" align="left" class="textBlackNormal">{{\Helpers\Helper::formatSizeUnits($durable->ramsize,"ram")}}</td>
          <td width="15%" height="25" align="right" class="textBlackBold">harddisk size :&nbsp;</td>
          <td width="37%" height="25" align="left" class="textBlackNormal">{{\Helpers\Helper::formatSizeUnits($durable->hddsize,"hdd")}}</td>
        </tr>
        <tr>
          <td width="17%" height="25" align="right" class="textBlackBold">last ram used :&nbsp;</td>
          <td width="31%" height="25" align="left" class="textBlackNormal">{{\Helpers\Helper::formatSizeUnits($durable->last_ram_used,"ram")}}</td>
          <td width="15%" height="25" align="right" class="textBlackBold">last hdd used :&nbsp;</td>
          <td width="37%" height="25" align="left" class="textBlackNormal">{{\Helpers\Helper::formatSizeUnits($durable->last_hdd_used,"hdd")}}</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">ผู้รับผิดชอบ(หน่วยงาน)</td>
  </tr>
  <tr>
    <td colspan="2" align="left">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="17%" height="25" align="right" class="textBlackBold">ชื่อ - สกุล :&nbsp;</td>
          <td width="31%" height="25" align="left" class="textBlackNormal">{{$durable->name_own}}</td>
          <td width="15%" height="25" align="right" class="textBlackBold">เบอร์โทรศัพท์ :&nbsp;</td>
          <td width="37%" height="25" align="left" class="textBlackNormal">{{$durable->num_phone}}</td>
        </tr>
        <tr>
          <td width="17%" height="25" align="right" class="textBlackBold">E-mail :&nbsp;</td>
          <td width="31%" height="25" align="left" class="textBlackNormal">{{$durable->e_mail}}</td>
          <td width="15%" height="25" align="right" class="textBlackBold"></td>
          <td width="37%" height="25" align="left" class="textBlackNormal"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="left" class="textBlackBold" style="border-top:1px solid #000;">หมายเหตุ/บอร์โค๊ด</td>
  </tr>
  <tr>
    <td colspan="2" align="left">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="17%" height="25" align="right" class="textBlackBold">หมายเหตุ</td>
          <td width="31%" height="25" align="left" class="textBlackNormal">{{$durable->durable_comment}}</td>
          <td width="15%" height="25" align="right" class="textBlackBold">รหัสบาร์โค๊ด</td>
          <td width="37%" height="25" align="left" class="textBlackNormal">
          @if($durable->durable_barcode!="")
          <img src="http://localhost/inventory/barcode/barcode.php?barcode={{$durable->durable_barcode}}&width=300&height=60&pop={{$durable->durable_barcode}}%27" />
          @endif
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
</table>
<script type="text/javascript">
window.print();
setTimeout(function(){window.close();}, 1);
</script>
</body>
</html>