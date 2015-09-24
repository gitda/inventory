<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>พิมพ์ใบแจ้งซ่อม</title>
{{HTML::style('assets/css/print-css.css')}}
{{HTML::script('assets/js/date.js')}}
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

<body onload="chkData();">
<script>
function chkData() {
	window.opener.Refresh();
}
</script>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  class="bglogo"><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="230" height="118px" align="left" valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="118" align="left" valign="bottom" class="text18">เลขที่ส่งใบแจ้งซ่อม (ตึก)</td>
            <td width="82" style="border-bottom:1px dotted">&nbsp;</td>
          </tr>
        </table></td>
        <td width="570" align="right" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="313" align="center" class="text24Bold"><br />
              ใบแจ้งซ่อม<br />
              ศูนย์คอมพิวเตอร์ โรงพยาบาลนครพนม</td>
            <td width="35">&nbsp;</td>
            <td width="211" align="center" style="border-bottom:1px solid; border-left:1px solid; border-right:1px solid; border-top:1px solid;"><table width="95%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="51%" align="left" class="text18">เลขที่รับใบแจ้งซ่อม :</td>
                    <td width="49%" align="center" class="text18Bold" style="border-bottom:1px dotted;">{{$repair->repair_id_get}}</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="16%" align="left" class="text18">วันที่ :</td>
                    <?php
                    $repair_date = \Carbon\Carbon::createFromFormat('Y-m-d',$repair->repair_date);
                    ?>
                    <td width="84%" align="center" class="text18Bold" style="border-bottom:1px dotted;">{{$repair_date->day." ".\Helpers\Helper::MonthThai($repair_date->month)." ".($repair_date->year+543)}}</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="38%" align="left" class="text18">เวลาส่งซ่อม :</td>
                    <td width="62%" align="center" class="text18Bold" style="border-bottom:1px dotted;">{{$repair->insert_time}}</td>
                  </tr>
                  <tr>
                    <td align="left" class="text18">เวลาเสร็จ :</td>
                    <td align="center" class="text18Bold" style="border-bottom:1px dotted;">{{$repair->close_job_time}}</td>
                  </tr>
                  <tr>
                    <td height="5" align="left"></td>
                    <td height="5" align="center"></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="10"></td>
            <td height="10"></td>
            <td height="10"></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><table width="95%" border="0" cellspacing="0" cellpadding="0">

              <tr>
                <td width="33%">&nbsp;</td>
                <td width="6%" align="left" class="text22">วันที่</td>
                <td width="12%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair_date->day}}</td>
                <td width="6%" class="text22">เดือน</td>
                <td width="21%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{\Helpers\Helper::MonthThai($repair_date->month,true)}}</td>
                <td width="3%" class="text22">ปี</td>
                <td width="12%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair_date->year+543}}</td>
                <td width="7%">&nbsp;</td>
              </tr>
            </table></td>
            </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="text22Bold">เรียน&nbsp;&nbsp;ผู้อำนวยการโรงพยาบาลนครพนม</td>
  </tr>
  <tr>
    <td align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr class="text22">
        <td width="4%">&nbsp;</td>
        <td width="6%" align="left" class="text20">(1) ด้วย</td>
        <td width="50%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->sub_dept_name;}}
        @if ($repair->sub_dept_id == "D009"){{"&nbsp;/&nbsp;".$repair->durable_location}}
		    @else
			   @if ($repair->sub_dept2 != ""){{"&nbsp;/&nbsp;".$repair->sub_dept2}}@endif
		    @endif
    </td>
        <td width="40%" align="left" class="text20">มีความประสงค์ (<?php if ($repair->repair_type == 1) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) ซ่อม (<?php if ($repair->repair_type == 2) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) บำรุงรักษา (<?php if ($repair->repair_type == 3) echo "<img src='".asset('assets/img/check.png')."'>" ; else echo "&nbsp;"; ?>) ดัดแปลง</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="text22">
        <td width="12%" class="text20">(@if ($repair->repair_type == 4){{"<img src='".asset("assets/img/check.png")."'>"}}@else{{"&nbsp;"}}@endif) จัดทำ/ติดตั้ง</td>
        <td width="13%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->durable_kind_sname;}}</td>
        <td width="5%" class="text20">จำนวน</td>
        <td width="6%" align="center" class="text22Bold" style="border-bottom:1px dotted;">@if($repair->amount != 0) {{$repair->amount}} @endif</td>
        <td width="6%" align="left" class="text20">ยี่ห้อ/รุ่น</td>
        <td width="26%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->brand_name}} @if ($repair->durable_model != "") {{"&nbsp;/&nbsp;".$repair->durable_model}} @endif</td>
        <td width="14%" align="left" class="text20">เลขทะเบียนครุภัณฑ์</td>
        <td width="18%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->durable_id}}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" align="left" class="text22">วันที่ซื้อ</td>
        <?php
        if($repair->durable_date!="" && $repair->durable_date != "0000-00-00"){
          $durable_date = \Carbon\Carbon::createFromFormat('Y-m-d',$repair->durable_date);
        }
        ?>
        <td width="19%" align="center" class="text22Bold" style="border-bottom:1px dotted;"><?php if ($repair->durable_date != "" && $repair->durable_date != "0000-00-00") { echo $durable_date->day." ".\Helpers\Helper::MonthThai($durable_date->month,true)." ".($durable_date->year+543); } ?></td> 
        <td width="7%" align="left" class="text22">ราคาที่ซื้อ</td>
        <td width="13%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{number_format($repair->durable_price)}}</td>
        <td width="56%" align="left" class="text22">บาท</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14%" align="left" class="text22">ซึ่งมีอาการชำรุดดังนี้</td>
        <td width="86%" align="left" class="text22Bold" style="border-bottom:1px dotted;">&nbsp;{{$repair->ruin}}</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="text22">ได้ส่ง (<?php if ($repair->repair_device_send == 1) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) พัสดุชำรุด&nbsp;&nbsp;&nbsp;(<?php if ($repair->repair_device_send == 0) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) ไม่มีสิ่งที่แนบมาด้วย&nbsp;&nbsp;&nbsp;(<?php if ($repair->repair_device_send == 2) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) ได้แนบเอกสารครุภัณฑ์มาด้วย</td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" class="text20">&nbsp;</td>
        <td width="7%" align="left" class="text22">&nbsp;</td>
        <td width="28%" align="center" class="text20">&nbsp;</td>
        <td width="6%" align="left" class="text22">&nbsp;</td>
        <td width="9%" align="left" class="text20">&nbsp;</td>
        <td width="4%" class="text22">ลงชื่อ</td>
        <td width="28%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->get_name}}</td>
        <td width="13%" class="text22">ผู้รับใบซ่อม</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" class="text20">&nbsp;</td>
        <td width="7%" align="left" class="text22">ผู้ส่งซ่อม</td>
        <td width="28%" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->repair_name}}</td>
        <td width="6%" align="left" class="text22">&nbsp;</td>
        <td width="9%" align="left" class="text20">&nbsp;</td>
        <td width="4%" align="right" class="text22">ตำแหน่ง(</td>
        <td width="28%" align="center" class="text22" style="border-bottom:1px dotted;">เจ้าพนักงานเครื่องคอมพิวเตอร์<?php //echo $repair->get_name; ?></td>
        <td width="8%" class="text22">)</td>
        <td width="5%" class="text20">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" class="text20">&nbsp;</td>
        <td width="7%" align="left" class="text22">&nbsp;</td>
        <td width="28%" class="text20">&nbsp;</td>
        <td width="6%" align="left" class="text20">&nbsp;</td>
        <td width="9%" align="left" class="text20">&nbsp;</td>
        <td width="6%" class="text22">&nbsp;</td>
        <td width="26%" align="center" class="text22Bold"></td>
        <td width="8%" class="text20">&nbsp;</td>
        <td width="5%" class="text20">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10" background="{{asset('assets/img/line.jpg')}}"></td>
  </tr>
  <tr>
    <td align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%">&nbsp;</td>
        <td align="left" class="text22">(2) รายงานของช่างผู้รับผิดชอบได้ดำเนินการดังนี้&nbsp;(<?php if ($repair->repair_opr == "ตรวจเช็ค") echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) ตรวจเช็ค&nbsp;&nbsp;(<?php if ($repair->repair_opr == "ปรับแต่ง") echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) ปรับแต่ง&nbsp;&nbsp;(<?php if ($repair->repair_opr == "ดัดแปลง") echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) ดัดแปลง&nbsp;&nbsp;(<?php if ($repair->repair_opr == "บำรุงรักษา") echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) บำรุงรักษา&nbsp;&nbsp;(<?php if ($repair->repair_opr == "จัดทำ/ติดตั้ง") echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) จัดทำ/ติดตั้ง</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" height="20">&nbsp;</td>
        <td width="6%" height="20" align="left" class="text22">อุปกรณ์</td>
        <td width="24%" height="20" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->durable_kind_sname}}</td>
        <td width="6%" height="20" class="text22">ยี่ห้อ/รุ่น</td>
        <td width="31%" height="20" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->brand_name}} @if($repair->durable_model != ""){{"&nbsp;/&nbsp;".$repair->durable_model}}@endif</td>
        <td width="9%" height="20" class="text22">รหัสครุภัณฑ์</td>
        <td width="19%" height="20" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->durable_id}}</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="13%" align="left" class="text22">วิเคราะห์สาเหตุ</td>
        <td width="82%" align="left" class="text22Bold" style="border-bottom:1px dotted;">{{$repair->cause_name}}</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="40%" align="left" class="text22">(<?php if ($repair->repair_result == 1) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) 1. ไม่เสียค่าใช้จ่ายและดำเนินการเรียบร้อย โดยทำการ</td>
        <td width="55%" align="left" class="text22Bold" style="border-bottom:1px dotted;"><?php if ($repair->repair_result == 1) echo $repair->repair_result_detail1; else echo "&nbsp;"; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="95%" align="left" class="text22">(<?php if ($repair->repair_result == 2) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) 2. สามารถดำเนินการได้เองโดย (<?php if ($repair->repair_result == 2) { if ($repair->repair_device_type == "ใช้วัสดุจากคลังย่อย") echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; } else { echo "&nbsp;"; } ?>) ใช้วัสดุจากศูนย์คอม (<?php if ($repair->repair_result == 2) { if ($repair->repair_device_type == "เบิกวัสดุจากคลัง") echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; } else { echo "&nbsp;"; } ?>) เบิกวัสดุจากคลังพัสดุ (<?php if ($repair->repair_result == 2) { if ($repair->repair_device_type == "จัดซื้อใหม่") echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; } else { echo "&nbsp;"; } ?>) จัดซื้อวัสดุใหม่ ตามเอกสารแนบท้าย</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="600" border="0" cellspacing="0" cellpadding="0">
      <?php
	   $i = 1;
	  ?>
    @foreach($device as $dv)
      <tr class="text22">
        <td width="23" align="left"><?php echo $i++."."; ?></td>
        <td width="272" align="left" class="text22Bold" style="border-bottom:1px dotted;">{{$dv->device_list}}</td>
        <td width="32">ขนาด</td>
        <td width="141" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$dv->device_size}}</td>
        <td width="41">จำนวน</td>
        <td width="91" align="center" class="text22Bold" style="border-bottom:1px dotted;">{{$dv->device_amount}}</td>
      </tr>
    @endforeach
    <?php
	  $n = $i;
	  for ($i = $n; $i <= 5; $i++) {
	  ?>
      <tr class="text22">
        <td width="23" align="left"><?php echo $i."."; ?></td>
        <td width="272" align="left" class="text22Bold" style="border-bottom:1px dotted;">&nbsp;</td>
        <td width="32">ขนาด</td>
        <td width="141" align="center" class="text22Bold" style="border-bottom:1px dotted;">&nbsp;</td>
        <td width="41">จำนวน</td>
        <td width="91" align="center" class="text22Bold" style="border-bottom:1px dotted;">&nbsp;</td>
      </tr>
      <?php } ?>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%">&nbsp;</td>
        <td width="29%" align="left" class="text22">(<?php if ($repair->repair_result == 3) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) 3. ไม่สามารถดำเนินการได้เองเนื่องจาก</td>
        <td width="29%" align="center" class="text22Bold" style="border-bottom:1px dotted;">
          <?php if ($repair->repair_result == 3) echo $repair->repair_result_detail3; ?>
        </td>
        <td width="6%" align="left" class="text22">เห็นควร</td>
        <td width="31%" align="center" class="text22Bold" style="border-bottom:1px dotted;"><?php
        if ($repair->repair_result == 3 && $repair->repair_out == 1) {
			echo "ส่งซ่อมภายนอก&nbsp;";
		}
		if ($repair->repair_result == 3 && $repair->repair_in == 1) {
			echo "ส่งซ่อมภายใน&nbsp;";
		}
		if ($repair->repair_result == 3 && $repair->buy_replace == 1) {
			echo "ซื้อทดแทน";
		}
		?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php
	$de = explode('-', $repair->repair_date_end);
	?>
      <tr class="text22">
        <td width="3%" class="text20">โทร</td>
        <td width="21%" align="center" class="text22Bold" style="border-bottom:1px dotted;"><?php if ($repair->repair_result == 3 && $repair->repair_out == 1) echo $repair->repair_location_tel; ?></td>
        <td width="19%" align="left" class="text20">จะแล้วเสร็จประมาณวันที่</td>
        <td width="6%" align="center" class="text22Bold" style="border-bottom:1px dotted;"><?php if ($repair->repair_result == 3 && $repair->repair_out == 1) echo $de[2]; ?></td>
        <td width="4%" align="left" class="text20">เดือน</td>
        <td width="12%" align="center" class="text22Bold" style="border-bottom:1px dotted;"><?php if ($repair->repair_result == 3 && $repair->repair_out == 1) echo \Helpers\Helper::MonthThai($de[1],true); ?></td>
        <td width="4%" align="left" class="text20">พ.ศ.</td>
        <td width="7%" align="center" class="text22Bold" style="border-bottom:1px dotted;"><?php if ($repair->repair_result == 3 && $repair->repair_out == 1) echo $de[0] + 543; ?></td>
        <td width="11%" align="left" class="text20">ราคาประมาณ</td>
        <td width="10%" align="center" class="text22Bold" style="border-bottom:1px dotted;"><?php if ($repair->repair_result == 3 && $repair->repair_out == 1) echo number_format($repair->repair_price_about); ?></td>
        <td width="3%" align="right" class="text20">บาท</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td align="right"><table width="370" border="0" cellspacing="0" cellpadding="0">
      <tr class="text22">
        <td width="50" align="right" class="text20">ลงชื่อ</td>
        <td width="193" class="text22Bold" style="border-bottom:1px dotted;" align="center">{{$repair->technic_name}}</td>
        <td width="145" align="left" class="text20">ช่างผู้รับผิดชอบ</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right"><table width="370" border="0" cellspacing="0" cellpadding="0">
      <tr class="text22">
        <td width="32" align="right" class="text20">ตำแหน่ง(</td>
        <td width="193" align="center" class="text22" style="border-bottom:1px dotted;">เจ้าพนักงานเครื่องคอมพิวเตอร์</td>
        <td width="145" align="left" class="text20">)</td>
      </tr>
      <tr class="text22">
        <td align="left" class="text20">&nbsp;</td>
        <td align="center" class="text22Bold"></td>
        <td align="left" class="text20">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="49%" rowspan="2" align="center" valign="top" style="border-bottom:1px solid; border-left:1px solid; border-right:1px solid; border-top:1px solid;"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" class="text22">(3) ความเห็นของหัวหน้าศูนย์คอมพิวเตอร์</td>
          </tr>
          <tr>
            <td align="left" class="text22Bold">{{nl2br($repair->approve_detail)}}</td>
          </tr>
          <tr>
            <td align="center" class="text22">(<?php if ($repair->approve_status == 1) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) อนุมัติ&nbsp;&nbsp;&nbsp;(<?php if ($repair->approve_status == 2) echo "<img src='".asset('assets/img/check.png')."'>"; else echo "&nbsp;"; ?>) ไม่อนุมัติ&nbsp;&nbsp;<?php echo "<span class='text18'>".$repair->approve_date."</apan>"; ?></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text22">
                <td width="11%" align="left">(ลงชื่อ)</td>
                <td width="59%" align="center"><?php
                if ($repair->approve_status != "0" || $repair->approve_status != "") {
					//echo "<img src='images/signature.jpg'>";
				}
				?></td>
                <td width="30%"></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr class="text22">
                <td width="11%" align="right">(</td>
                <td width="59%" align="center" style="border-bottom:1px dotted;">นางพิณทิพย์ ซ้ายกลาง</td>
                <td width="30%" align="left" class="text22">)</td>
              </tr>
            </table></td>
          </tr>
          </table></td>
        <td width="51%" align="center" valign="top" style="border-bottom:1px solid; border-right:1px solid; border-top:1px solid;"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" class="text22">(4) ส่งเรื่องให้พัสดุเพื่อดำเนินการต่อไป</td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text22">
                <td width="7%" align="left" class="text20">วันที่</td>
                <td width="12%" style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="8%" class="text20">เดือน</td>
                <td width="22%" style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="7%" class="text20">พ.ศ.</td>
                <td width="15%" style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="7%" class="text20">เวลา</td>
                <td width="18%" style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="4%" align="left" class="text20">น.</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text22">
                <td width="7%" align="left" class="text20">ผู้รับ</td>
                <td style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="7%" class="text20">ผู้ส่ง</td>
                <td style="border-bottom:1px dotted;">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="top" style="border-bottom:1px solid; border-right:1px solid;"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text22">
                <td width="48%" height="20" align="left">(5) ผู้จ่ายพัสดุ</td>
                <td width="52%" height="20" align="left">(6) ผู้รับพัสดุ</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text22">
                <td width="10%" align="left" class="text20">(ลงชื่อ)</td>
                <td width="38%" style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="10%" class="text20">(ลงชื่อ)</td>
                <td width="42%" style="border-bottom:1px dotted;">&nbsp;</td>
              </tr>
              <tr class="text22">
                <td height="20" align="left" class="text20">วันที่</td>
                <td height="20" style="border-bottom:1px dotted;">&nbsp;</td>
                <td height="20" class="text20">วันที่</td>
                <td height="20" style="border-bottom:1px dotted;">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="top" style="border-bottom:1px solid; border-left:1px solid; border-right:1px solid;"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" class="text22">(7) ค่าใช้จ่ายในการดำเนินการมีดังนี้</td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text20">
                <td width="5%" align="left">&nbsp;</td>
                <td width="28%" align="left" class="text22">(&nbsp;&nbsp;) ค่าวัสดุเป็นเงิน</td>
                <td width="51%" style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="16%" align="left" class="text22">บาท</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text20">
                <td width="5%" align="left">&nbsp;</td>
                <td width="28%" align="left" class="text22">(&nbsp;&nbsp;) ค่าใช้จ่ายอื่นๆ</td>
                <td width="51%" style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="16%" align="left" class="text22">บาท</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text20">
                <td width="5%" align="left">&nbsp;</td>
                <td width="58%" align="left" class="text22">(&nbsp;&nbsp;) ค่าจ้างเหมาบุคคลภายนอกเป็นเงิน</td>
                <td width="21%" style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="16%" align="left" class="text22">บาท</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text20">
                <td width="5%" align="left">&nbsp;</td>
                <td width="54%" align="left" class="text22">(&nbsp;&nbsp;) ได้ออกเลขทะเบียนครุภัณฑ์แล้วคือ</td>
                <td width="41%" align="left" class="text22" style="border-bottom:1px dotted;">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text20">
                <td width="5%" align="left">&nbsp;</td></br></br>
                <td width="11%" class="text22">(ลงชื่อ)</td>
                <td width="55%" style="border-bottom:1px dotted;" class="text22" align="center">นางพิณทิพย์ ซ้ายกลาง</td>
                <td width="29%" align="left" class="text22"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
        </table></td>
        <td align="center" valign="top" style="border-bottom:1px solid; border-right:1px solid;"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" class="text22">(8) ความเห็นผู้อำนวยการโรงพยาบาลนครพนม</td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16%" align="left" class="text22">(&nbsp;&nbsp;) อนุมัติ</td>
                <td width="84%" class="text20" style="border-bottom:1px dotted;">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="19%" align="left" class="text22">(&nbsp;&nbsp;) ไม่อนุมัติ</td>
                <td width="81%" class="text20" style="border-bottom:1px dotted;">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="20" style="border-bottom:1px dotted;"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="text20">
                <td width="5%" align="left">&nbsp;</td>
                <td width="11%" class="text22">(ลงชื่อ)</td>
                <td width="55%" style="border-bottom:1px dotted;">&nbsp;</td>
                <td width="29%" align="left">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="10"></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>

