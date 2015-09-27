@extends('templates.master')
@section('title','Admin')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{URL::to('admin')}}">Admin</a></li>
			<li><a href="{{URL::to('admin/durable')}}">durable</a></li>
			<li><a href="{{URL::to('admin/durable/symptoms')}}">รายการครุภัณฑ์คอมพิวเตอร์</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-file-o"></i>
					<span>รายการครุภัณฑ์คอมพิวเตอร์</span>
				</div>
				<div class="box-icons ">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link hide">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">

				<h4 class="page-header">รายการครุภัณฑ์คอมพิวเตอร์</h4>
				<table id="dt_ruin_type" class="table table-bordered table-striped">
					 <thead>
			            <tr>
			                <th>ลำดับ</th>
			        		<th>วันที่รับเข้า</th>
			        		<th>หมายเลขครุภัณฑ์</th>
			        		<th>ชนิดครุภัณฑ์</th>
			        		<th>ชื่อครุภัณฑ์</th>
			        		<th>ราคา</th>
			        		<th>หน่วยงานเจ้าของครุภัณฑ์</th>
			        		<th>สถานะครุภัณฑ์</th>
			        		<th></th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($list as $k => $d)
			        	<tr>
			        		<td style="font-size:12px">{{($k+1)}}</td>
			        		<td style="font-size:12px">{{$d->durable_date}}</td>
			        		<td style="font-size:12px">{{$d->durable_id}}</td>
			        		<td style="font-size:12px">{{$d->durable_kind_name}}</td>
			        		<td style="font-size:12px">{{$d->durable_name}}</td>
			        		<td style="font-size:12px">{{number_format($d->durable_price, 2)}}</td>
			        		<td style="font-size:12px">{{$d->sub_dept_name}}@if ($d->sub_dept_id == "D009") {{$d->durable_location}} @endif</td>
			        		<td style="font-size:12px">{{$d->status_name}}</td>
			        		<td><a href="{{URL::to('report/durable/print-specific/'.$d->durable_id)}}" target="_blank"><i class="fa fa-print"></i></a></td>
			        	</tr>
			        	@endforeach

			        </tbody>
				</table>
				

			</div>
		</div>

	</div>


</div>






@stop

@section('js_footer')

<script type="text/javascript">

	function LoadTables(){
		Table();
		// LoadSelect2Script(MakeSelect2);
	}
	function Table(){
		var table = $('#dt_ruin_type').dataTable({
			"bSort": false,
			//"bFilter" : false,               
			"bLengthChange": false,
		});
	}
	$(document).ready(function() {

    	LoadDataTablesScripts(LoadTables);
    	//$('#dt_ruin_type').css("color","red");

	});
</script>
@stop