@extends('templates.master')
@section('title','ทะเบียนรับงานส่งเข้าซ่อมรายเดือน - NKPH')

@section('js_header')

{{HTML::style('assets/plugins/datepicker/datepicker3.css')}}
{{HTML::script('assets/plugins/datepicker/bootstrap-datepicker.js')}}
{{HTML::script('assets/plugins/datepicker/bootstrap-datepicker.th.js')}}
{{HTML::script('assets/plugins/datepicker/bootstrap-datepicker-thai.js')}}

@stop


@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{URL::to('/')}}">Inventory</a></li>
			<li><a href="#">ทะเบียนรับงานส่งเข้าซ่อม</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-question"></i>
					<span>ทะเบียนรับงานส่งเข้าซ่อม รายเดือน</span>
				</div>
				<div class="box-icons hide">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div class="row">
					
					<div class="col-xs-12">
						<form method="POST" action="{{URL::to('report/repair/recieve-export')}}">
							<label class="col-xs-1 label-control">เลือกเดือน ปี</label>
							<div class="col-xs-2">
								<input type="text" name="ds1" id="datepicker" readonly="" class="form-control col-xs-1 pull-left" value="{{\Helpers\Helper::GetDefaultDatePick()}}">
							</div>
							<div class="col-xs-2">
								<input type="text" name="ds2" id="datepicker2" readonly="" class="form-control col-xs-1 pull-left" value="{{\Helpers\Helper::GetDefaultDatePick()}}">
							</div>
							<div class="col-xs-2 col-xs-offset-5 text-right">
								<button name="export" value="print" class="btn btn-primary"><i class="fa fa-print"></i> พิมพ์</button>
								<button name="export" value="excel" class="btn btn-success"><i class="fa fa-file-excel-o"></i> excel</button>
							</div>
						</form>
						
					</div>
				</div>
				

				<table id="tbl" class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
			            <tr>
			                <th>ชนิด</th>
			                <th>หน่วยงานส่งซ่อม</th>
			                <th>รายการแจ้งซ่อม</th>
			                <th>ยี่ห้อ</th>
			                <th>รุ่น</th>
			                <th>หมายเลขครุภัณฑ์</th>
			                <th>Serial No.</th>
			                <th>อาการ/สาเหตุ</th>
			                <th>ID</th>
			            </tr>
			        </thead>
				</table>
			</div>
		</div>
	</div>
</div>






@stop

@section('js_footer')


<script type="text/javascript">
	function Tables(){
		TableStatus(0);
		// LoadSelect2Script(MakeSelect2);
	}
	function TableStatus(){
		var table = $('#tbl').dataTable( {
	        "processing": false,
	        "serverSide": true,
	        "iDisplayLength": 20,
	        "ajax": "{{URL::to('report/repair/recieve-data/'.date('Y').'/'.date('m'))}}/",
	        "columns": [
	        	{ "data": "durable_kind_name" ,"width":"10%","class":"text-left"},
	        	{ "data": "sub_dept_name" ,"width":"10%","class":"text-left"},
	        	{ "data": "durable_name" ,"width":"10%","class":"text-left"},
	        	{ "data": "brand_id" ,"width":"10%","class":"text-left"},
	        	{ "data": "durable_model" ,"width":"10%","class":"text-left"},
	        	{ "data": "durable_id" ,"width":"10%","class":"text-left"},
	        	{ "data": "serial_number" ,"width":"10%","class":"text-left"},
	        	{ "data": "ruin" ,"width":"10%","class":"text-left"},
	        	{ "data": "repair_id" ,"width":"5%","class":"text-left"}
	        ],
	    } );
	}



	$(document).ready(function() {


		$('#datepicker,#datepicker2').datepicker({
		        autoclose: true,
		        todayHighlight: true,
		        format: "dd MM yyyy",
		        language: "th-th",
		        minViewMode: 0,
		        forceParse: false
	    }).on("changeDate", function(e){


	    	var date1 = new Date($('#datepicker').datepicker('getDate'));
	    	var date2 = new Date($('#datepicker2').datepicker('getDate'));


	    	if(date1!="Invalid Date" && date2 != "Invalid Date")
	    	{
	    		var ds1 = date1.getFullYear()+"-"+("0"+(date1.getMonth()+1)).slice(-2)+"-"+("0"+date1.getDate()).slice(-2);
	    		var ds2 = date2.getFullYear()+"-"+("0"+(date2.getMonth()+1)).slice(-2)+"-"+("0"+date2.getDate()).slice(-2);

		    	//$('#tbl').dataTable().api().ajax.reload();
		    	$('#tbl').dataTable().api().ajax.url("{{URL::to('report/repair/recieve-data')}}/"+ds1+"/"+ds2).load();
	    	}
		});


		LoadDataTablesScripts(Tables);
	});


</script>
@stop