
<?php 
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="excel.xls"');
header("Pragma:no-cache");

 ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ทะเบียนรับงาน</title>

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
.textNormalReport {
  font-family: "TH SarabunPSK", Tahoma, Verdana;
  font-size: 20px;
}
-->
</style></head>

<body style="padding:0 0 0 0px;">

<table width="100%" border="0" align="center" cellpadding="4" cellspacing="4">
  <tr>
    <td colspan="2" align="left" class="textHeadReport">รายงาน JOB สรุปผล วันที่ {{Input::get('ds1')}} ถึง {{Input::get('ds2')}} (จำแนกหน่วยงาน)</td>
  </tr>
  <tr>
    <td align="left" class="textColumnReport">ศูนย์คอมพิวเตอร์ โรงพยาบาลนครพนม</td>
    <td align="right" class="textColumnReport">วันที่พิมพ์ {{\Helpers\Helper::GetDefaultDatePick()." ".date('H:i:s')}}</td>
  </tr>
  <tr>
    <td colspan="2" align="left" class="textHeadReport"></td>
  </tr>
  <tr>
    <td colspan="2">
      <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table-bordered">
        <thead>
          <tr bgcolor="#d1d1d1">
            <th><b>JobID</b></th>
            <th>หน่วยงาน</th>
            <th>รายการส่งซ่อม</th>
            <th>อาการ/สาเหตุ</th>
            <th>หมายเลขครุภัณฑ์</th>
            <th>ค่าใช้จ่าย</th>
            <th>วันรับ JOB</th>
            <th>วันสรุป JOB</th>
            <th>รวม</th>
          </tr>
        </thead>
        <tbody>
        @foreach($drepair as $dr)
        <tr>
          <td class="textBlackNormal" width="2%" style="padding:2px">&nbsp;{{$dr['repair_id']}}&nbsp;</td>
          <td class="textBlackNormal" width="20%" style="padding:2px">&nbsp;{{$dr['sub_dept_name']}}&nbsp;</td>
          <td class="textBlackNormal" width="30%" style="padding:2px">&nbsp;{{$dr['durable_name']}}&nbsp;</td>
          <td class="textBlackNormal" width="20%" style="padding:2px">&nbsp;{{$dr['ruin'].$dr['symptom_name']}}&nbsp;</td>
          <td class="textBlackNormal" width="10%" style="padding:2px">&nbsp;{{$dr['durable_id']}}&nbsp;</td>
          <td class="textBlackNormal" width="5%" style="padding:2px">&nbsp;{{$dr['repair_cost']}}&nbsp;</td>
          <td class="textBlackNormal" align="center" width="5%" style="padding:2px">&nbsp;{{$dr['repair_technician_get_date']}}&nbsp;</td>
          <td class="textBlackNormal" align="center" width="5%" style="padding:2px">&nbsp;{{$dr['close_job_date']}}&nbsp;</td>
          <td class="textBlackNormal" align="center" width="3%" style="padding:2px">&nbsp;{{$dr['datediffs']}}&nbsp;</td>
        </tr>
        @endforeach
        </tbody>

      </table>

    </td>
     <tr>
      <td colspan="2" align="left" class="textColumnReport">รวม {{count($drepair)}} รายการ</td>
    </tr>
  </tr>
</table>


</body>
</html>