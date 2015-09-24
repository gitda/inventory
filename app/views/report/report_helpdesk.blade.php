@extends('templates.master')
@section('title','รายการซ่อมครุภัณฑ์')

@section('js_header')

{{HTML::style('assets/plugins/datepicker/datepicker3.css')}}
{{HTML::script('assets/plugins/datepicker/bootstrap-datepicker.js')}}
{{HTML::script('assets/plugins/datepicker/bootstrap-datepicker.th.js')}}
{{HTML::script('assets/plugins/datepicker/bootstrap-datepicker-thai.js')}}
{{HTML::script('http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js')}}

@stop

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li><a href="#">รายงาน HELPDESK</a></li>
		</ol>
	</div>
</div>
<div class="row">	
	<div class="col-xs-10 col-sm-2">
		<h4>รายงานHELPDESK</h4>
	</div>
</div>

<div class="row">
<div align="right">
	<label class="col-md-1 control-label" >เงื่อนไข : </label>
</div>


	<div class="col-md-2">
		<input type="text" class="form-control datepickers0" id="repair_date" name="repair_date" required>
	</div>
	<div class="col-md-2">
		<input type="text" class="form-control datepickers1" id="repair_date1" name="repair_date1" required>
	</div>

</div>
<div>
<br>	
</div>
 		<table class="table table-bordered" align="center" id="table_report" style="width: 80%;">
            <thead>
                <tr>
                    <th class="text-center" rowspan="2">ลำดับ</th>
                    <th class="text-center" rowspan="2" width="40%">การให้บริการ</th>
                    <th class="text-center" rowspan="2">จำนวนปัญหา<br>( ครั้ง )</th>
                    <th class="text-center" colspan="3">จำนวนแก้ปัญหา</th>
                    <th class="text-center" rowspan="2">ร้อยละ<br>ความสำเร็จ</th>
                </tr>
                <tr>
                    <th class="text-center">ทันเวลา</th>
                    <th class="text-center">ไม่ทันเวลา</th>
                    <th class="text-center">ไม่ระบุ</th>
                </tr>
            </thead>
            <?PHP
            // ฟั่งชั่น คำนวนเปอร์เซ็นต์
            	function kk($cout,$num){

            		$per = ($num*100)/$cout;
            		return $per;
            	}
            	$i=1; 
            ?>
            @foreach($query_ReportHelp as $ab)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td>{{ $ab->name }}</td>
                    <td class="text-center">{{ $ab->cc }}</td>
                    <td class="text-center"><a onclick="reslove_type({{ $ab->reslove_type }})">{{ $ab->ok }}</a></td>
                    <td class="text-center">{{ $ab->not }}</td>
                    <td class="text-center">{{ $ab->null }}</td>
                    <td class="text-center">{{ number_format(kk($ab->cc,$ab->ok),2) }}%</td> 
                </tr>
            @endforeach

        </table>
<div id="table_report1_hidden" class="hidden">
        <table class="table table-bordered" align="center" id="table_report1" style="width: 90%;">
            <thead>
                <tr>
                    <th width="5%">ลำดับ</td>
                    <th>เรื่อง</td>
                    <th>รายละเอียด</td>
                    <th>การแก้ปัญหา</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
</div>

@stop

@section('js_footer')
{{HTML::script('assets/js/dropdownchange.js')}}
<script type="text/javascript">

	$(document).ready(function(){

		$('.datepickers0').datepicker({
	        autoclose: true,
	        todayHighlight: true,
	        format: "d MM yyyy",
	        language: "th-th",
	        forceParse: false
    	});
		$('.datepickers1').datepicker({
	        autoclose: true,
	        todayHighlight: true,
	        format: "d MM yyyy",
	        language: "th-th",
	        forceParse: false
    	});
	});
	
    function reslove_type(a){
    	$("#table_report1_hidden").removeClass('hidden');
    	$("#table_report1 tbody").empty();
    	var $a=1;
        $.get("{{URL::to('report/report-helpdesk/selecthelpdeskok')}}"+'/'+a).done(function(data){
            $.each(data,function(key,dataget){
            	$("#table_report1 tbody").append(
            		"<tr>"+
					"<td class='text-center'>"+($a++)+"</td>"+
					"<td>"+dataget.helpdesk_type_name+"</td>"+
					"<td>"+dataget.help_description+"</td>"+
					"<td>"+dataget.help_note+"</td>"+
					"</tr>"
            	);
            });
        })
    }
</script>
@stop

