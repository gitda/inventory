<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>พิมพ์ใบส่งซ่อมนอก</title>
{{HTML::style('assets/css/print-css.css')}}
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body onload="window.print()">
<?php
// $sql = "";
// $result = mysql_query($sql);
// $r = mysql_fetch_array($result);
  $dmy = explode('-', date("d-m-Y"));
  if (substr($dmy[0], 0, 1) == "0") {
  	$dmy[0] = substr($dmy[0], 1, 1);
  }
?>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="143" height="25" align="left" valign="top"><img src="{{asset('assets/img/logo-nkp.jpg')}}" width="124" height="118" /></td>
    <td width="557" align="center" valign="top"><br /><br /><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="25" align="left" class="text24Bold">แบบฟอร์มใบส่งซ่อมอุปกรณ์คอมพิวเตอร์ (หน่วยงานภายนอก)</td>
      </tr>
      <tr>
        <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="7%" height="25">&nbsp;</td>
            <td width="7%" height="25" align="right" class="text22">วันที่</td>
            <td width="10%" height="25" align="center" class="text22Bold" style="border-bottom:1px dotted #000;">{{ $dmy[0] }}</td>
            <td width="7%" height="25" align="left" class="text22">เดือน</td>
            <td width="22%" height="25" align="center" class="text22Bold" style="border-bottom:1px dotted #000;">{{ \Helpers\Helper::MonthThai($dmy[1],true) }}</td>
            <td width="6%" height="25" align="left" class="text22">พ.ศ.</td>
            <td width="11%" height="25" align="center" class="text22Bold" style="border-bottom:1px dotted #000;">{{ $dmy[2] + 543 }}</td>
            <td width="30%" height="25">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="45%" height="25" align="left" class="text22">ส่วนพัสดุได้ส่งซ่อมอุปกรณ์คอมพิวเตอร์กับบริษัท / ร้านค้า :</td>
        <td width="55%" height="25" align="center" class="text22Bold" style="border-bottom:1px dotted #000;">{{ $repair->repair_location }}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%" height="25" align="left" class="text22">ชื่อผู้ติดต่อ :</td>
        <td width="49%" height="25" align="center" class="text22Bold" style="border-bottom:1px dotted #000;">{{ $repair->repair_location_name }}</td>
        <td width="4%" height="25" align="right" class="text22">โทร</td>
        <td width="33%" height="25" align="center" class="text22Bold" style="border-bottom:1px dotted #000;">{{ $repair->repair_location_tel }}</td>
        <td width="4%" height="25" class="text22">ดังนี้</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" height="25">&nbsp;</td>
        <td width="10%" height="25" align="left" class="text22">ชื่อครุภัณฑ์ :</td>
        <td width="38%" height="25" class="text22Bold" style="border-bottom:1px dotted #000;">&nbsp;&nbsp;{{ $repair->durable_name }}</td>
        <td width="16%" class="text22">หมายเลขครุภัณฑ์ :</td>
        <td width="31%" class="text22Bold" style="border-bottom:1px dotted #000;">{{ $repair->durable_id }}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3%" height="25">&nbsp;</td>
        <td width="5%" height="25" align="left" class="text22">ยี่ห้อ :</td>
        <td width="36%" height="25" align="left" class="text22Bold" style="border-bottom:1px dotted #000;">&nbsp;{{ $repair->brand_name }}</td>
        <td width="4%" align="left" class="text22">รุ่น :</td>
        <td width="25%" align="left" class="text22Bold" style="border-bottom:1px dotted #000;">&nbsp;{{ $repair->durable_model }}</td>
        <td width="5%" align="left" class="text22">S/N :</td>
        <td width="22%" align="left" class="text22Bold" style="border-bottom:1px dotted #000;">{{ $repair->serial_number }}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" height="25">&nbsp;</td>
        <td width="13%" height="25" align="left" class="text22">ปัญหา / อาการ :</td>
        <td width="82%" height="25" align="left" class="text22Bold" style="border-bottom:1px dotted #000;">&nbsp;&nbsp;{{ nl2br($repair->ruin) }}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" height="25">&nbsp;</td>
        <td width="19%" height="25" align="left" class="text22">อุปกรณ์อื่นที่รับไปด้วย :</td>
        <td width="76%" height="25" class="text22Bold" style="border-bottom:1px dotted #000;">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" height="25">&nbsp;</td>
        <td width="13%" height="25" align="left" class="text22">ของหน่วยงาน :</td>
        <td width="15%" height="25" align="center" class="text22Bold" style="border-bottom:1px dotted #000;">ศูนย์คอมพิวเตอร์</td>
        <td width="11%" align="right" class="text22">เบอร์ภายใน :</td>
        <td width="22%" align="center" class="text22Bold" style="border-bottom:1px dotted #000;">042-511422 ต่อ 1018</td>
        <td width="11%" align="right" class="text22">ชื่อผู้ติดต่อ :</td>
        <td width="23%" align="center" class="text22Bold" style="border-bottom:1px dotted #000;">นายจิตติศักดิ์ สุวัณณกีฎะ</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%" height="25" align="left" class="text22">(ลงชื่อ)</td>
        <td width="30%" height="25" class="text22Bold" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="12%" height="25" align="left" class="text22">ผู้ส่งอุปกรณ์</td>
        <td width="5%" height="25">&nbsp;</td>
        <td width="7%" height="25" align="right" class="text22">(ลงชื่อ)</td>
        <td width="28%" height="25" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="12%" height="25" align="left" class="text22">ผู้รับอุปกรณ์</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%" height="25" align="right" class="text22">(</td>
        <td width="30%" height="25" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="12%" height="25" align="left" class="text22">)</td>
        <td width="5%" height="25">&nbsp;</td>
        <td width="7%" height="25" align="right" class="text22">(</td>
        <td width="28%" height="25" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="12%" height="25" align="left" class="text22">)</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%" height="25" align="left">&nbsp;</td>
        <td width="4%" height="25" align="left" class="text22">วันที่</td>
        <td width="8%" align="left" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="1%" align="left">/</td>
        <td width="10%" align="left" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="1%" align="left">/</td>
        <td width="6%" height="25" align="left" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="22%" height="25">&nbsp;</td>
        <td width="5%" height="25" align="right" class="text22">วันที่</td>
        <td width="7%" height="25" align="center" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="1%" align="center">/</td>
        <td width="9%" align="center" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="1%" align="center">/</td>
        <td width="7%" align="center" style="border-bottom:1px dotted #000;">&nbsp;</td>
        <td width="12%" height="25" align="left">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="41%" height="25" align="center" class="text22">เจ้าหน้าที่พัสดุ</td>
        <td width="9%" align="center">&nbsp;</td>
        <td width="50%" height="25" align="center" class="text22">บริษัท / ร้านค้า</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>