@extends('templates.master')
@section('title','รายการซ่อมครุภัณฑ์')


@section('js_header')
{{HTML::style('assets/plugins/datepicker/datepicker3.css')}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<style type="text/css">
	.popover{
    max-width: 1320px; /* Max Width of the popover (depending on the container!) */
	}
</style>
@stop

@section('content')
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{URL::to('/')}}">Dashboard</a></li>

		</ol>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-question"></i>
					<span>สำรองข้อมูล HOSxP รายวัน</span>
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

							<div class="row">
								<h3 class="text-center"> ตรวจสอบการสำรองข้อมูล</h3>
								<h4 class="text-center">ประจำเดือน {{ Helper::toDayMonth($datetoday) }}</h4>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
									<input type="text" class="form-control" id="reg_date" name="reg_date" value="{{$fullmy}}">
									<br>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="table-responsive">
								<table class="table table-bordered">

									<thead>
										<tr>
											<th align="center">Server</th>
											@foreach($result as $key => $value)
												@foreach($value as $vk => $vv)
													<th align="center">{{ Helper::DateFormat($vk,'Y-m-d','d') }}</th>
												@endforeach
												<?php break; ?>
											@endforeach
										</tr>
									</thead>

									@foreach($result as $key => $value)
									<tr>
										<td>{{$key}}</td>
										@foreach($value as $sub_value)
											<td align="center">
											@if($sub_value['has_backup']==true)
												<i class="fa fa-check text-success"
												data-toggle="popover"
												title= "คุณสมบัติ"
												data-content="<i class='fa fa-file-archive-o text-danger'></i> : 
												{{ $sub_value['file_name'] }}<br>
												<i class='fa fa-paperclip'></i> : {{ Helpers\Helper::formatSizeUnits($sub_value['file_size']) }}<br>
												<i class='fa fa-clock-o'></i> : {{ $sub_value['backup_time'] }}<br>
												<i class='fa fa-user text-success'> : {{ $sub_value['technic_name'] }}</i>"
												></i>
											@else
												<i class="fa fa-close text-danger"></i>
											@endif
											</td>
										@endforeach
									</tr>
									@endforeach
								</table>


							</div>	
						</div>
					</div>	
				</div>
		</div>
	</div>
</div>


@stop

@section('js_footer')
{{ HTML::script('assets/plugins/datepicker/bootstrap-datepicker.js')}}
{{ HTML::script('assets/plugins/datepicker/bootstrap-datepicker.th.js')}}
{{ HTML::script('assets/plugins/datepicker/bootstrap-datepicker-thai.js')}}

	<script type="text/javascript">

		<?php $timestamp = time();?>

		$(function() {

			$('[data-toggle="popover"]').popover({
				html:true,
				placement:'auto'
			}).mouseover(function(e){
				$(e.target).popover('show');
			})
			.mouseout(function(e){
				$(e.target).popover('hide');
			});

			$('#reg_date').datepicker({
				language: "th-th",
				autoclose: true,
				format: 'MM yyyy',
				viewMode: 'months',
				minViewMode: 'months'
			}).on('changeMonth', function(e){
				var year =  e.date.getFullYear();
				var month = e.date.getMonth()+1;
				window.location.href = "{{ URL::to('upload/index')}}/"+year+"/"+month;
			});
			
		});


	</script>

@stop