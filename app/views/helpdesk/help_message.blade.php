
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>พิมพ์ใบแจ้งซ่อม</title>
<link rel="stylesheet" type="text/css" href="http://localhost/inventory/css/print-css.css"/>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	padding: 0px;
}
-->
</style></head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">


 
  <tr>
    <td height="10"></td>
  </tr>

  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="1">

      <tr>
        <td align="left" valign="top" class="text22" style="border-top:1px solid; border-right:1px solid; border-left:1px solid;">
        	<table width="100%">
        		<tr>
	        		<td>(ส่วน:Service Desk)</td>
	        		<td class="text24Bold" align="right">ใบรับบริการซ่อม</td>
        		</tr>
        	</table>
        </td>
        <td align="left" valign="top" class="text22" style="border-top:1px solid; border-right:1px solid;">
        	<table width="100%">
        		<tr>
	        		<td>(ส่วน:Help Desk)</td>
	        		<td class="text24Bold" align="right">ใบรับบริการซ่อม</td>
        		</tr>
        	</table>
        </td>
      </tr>
      <tr>
        <td width="49%" align="center" valign="top" style="border-bottom:1px solid; border-left:1px solid; border-right:1px solid; border-top:1px solid;">
        <table width="98%" border="0" cellspacing="0" cellpadding="1">
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="25%" align="left" class="text20">เลขที่รับเอกสาร</td>
	                <td width="25%" style="border-bottom:1px dotted;" align="center">{{$repair->repair_id_get}}</td>
	                <td width="25%" class="text20">เบอร์ติดต่อกลับ</td>
	                <td width="25%" style="border-bottom:1px dotted;" align="center">{{$repair->tel}}</td>
	                </tr>
	            </table>

            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="25%" align="left" class="text20">วันที่เข้ารับบริการ</td>
	                <td width="25%" style="border-bottom:1px dotted;" align="center">{{Helpers\Helper::toDateThai($repair->repair_date)}}</td>
	                <td width="25%" class="text20">กำหนดรับคืน</td>
	                <td width="25%" style="border-bottom:1px dotted;" align="center"></td>
	                </tr>
	            </table>

            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="25%" align="left" class="text20">หน่วยงาน</td>
	                <td width="75%" align="left" style="border-bottom:1px dotted;">{{$dept_name}}</td>
	                </tr>
	            </table>
            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="30%" align="left" class="text20">อาการชำรุด/ปัญหา</td>
	                <td width="70%" align="left" style="border-bottom:1px dotted;">&nbsp;{{$repair->ruin}}</td>
	                </tr>
	            </table>
            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="25%" align="left" class="text20">ชื่อผู้ส่งซ่อม</td>
	                <td width="70%" align="left" style="border-bottom:1px dotted;">&nbsp;{{$repair->repair_name}}</td>
	                </tr>
	            </table>
            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="25%" align="left" class="text20">ช่างผู้รับผิดชอบ</td>
	                <td width="70%" align="left" style="border-bottom:1px dotted;">&nbsp;{{$technical_name}}</td>
	                </tr>
	            </table>
            </td>
          </tr>
          
          
          </table>
          </td>
        <td width="51%" align="center" valign="top" style="border-bottom:1px solid; border-right:1px solid; border-top:1px solid;">
        	<table width="98%" border="0" cellspacing="0" cellpadding="1">
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="25%" align="left" class="text20">เลขที่รับเอกสาร</td>
	                <td width="75%" style="border-bottom:1px dotted;" align="left">{{$repair->repair_id_get}}</td>
	                </tr>
	            </table>

            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="25%" align="left" class="text20">วันที่เข้ารับบริการ</td>
	                <td width="25%" style="border-bottom:1px dotted;" align="center">{{Helpers\Helper::toDateThai($repair->repair_date)}}</td>
	                <td width="25%" class="text20">กำหนดรับคืน</td>
	                <td style="border-bottom:1px dotted;">&nbsp;</td>
	                </tr>
	            </table>

            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="25%" align="left" class="text20">หน่วยงาน</td>
	                <td width="75%" align="left" style="border-bottom:1px dotted;">{{$dept_name}}</td>
	                </tr>
	            </table>
            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="30%" align="left" class="text20">วิธีแก้ปัญหา</td>
	                <td width="70%" align="left" style="border-bottom:1px dotted;">&nbsp;{{$repair->repair_result_detail1}}</td>
	                </tr>
	            </table>
            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="25%" align="left" class="text20">ช่างผู้รับผิดชอบ</td>
	                <td width="75%" align="left" style="border-bottom:1px dotted;">&nbsp;{{$technical_name}}</td>
	                </tr>
	            </table>
            </td>
          </tr>
          <tr>
            <td align="left">
	            <table width="100%" border="0" cellspacing="0" cellpadding="1">
	              <tr class="text22">
	                <td width="30%" align="left" class="text20">ลงชื่อพนักงาน(รับคือ)</td>
	                <td width="30%" align="left" style="border-bottom:1px dotted;">&nbsp;</td>
	                <td width="10%" align="left" class="text20">เวลา</td>
	                <td width="30%" align="left" style="border-bottom:1px dotted;">&nbsp;</td>
	                </tr>
	            </table>
            </td>
          </tr>
          
          
          </table>


        </td>
      </tr>
      <tr>
      	<td class="text22"  valign="center" style="border-bottom:1px solid; border-left:1px solid; border-right:1px solid;">
      			ประเมิน (<img src="{{asset('assets/img/check.png')}}">)
      			<img src="{{asset('assets/img/5.jpg')}}" style="padding:0 8px;">
	      		<img src="{{asset('assets/img/4.jpg')}}" style="padding:0 8px">
	      		<img src="{{asset('assets/img/3.jpg')}}" style="padding:0 8px">
	      		<img src="{{asset('assets/img/2.jpg')}}" style="padding:0 8px">
	      		<img src="{{asset('assets/img/1.jpg')}}" style="padding:0 8px">
      	
      	</td>
      	<td class="text22" style="border-bottom:1px solid; border-right:1px solid;">
      		ผู้ให้บริการ : ศูนย์คอมพิวเตอร์ โรงพยาบาลนครพนม หมายเลขติดต่อ 1018
      	</td>
      </tr>



    </table>
    </td>

  </tr>


</table>

</body>
</html>