@extends('templates.master')
@section('title','รายการซ่อมครุภัณฑ์')


@section('js_header')
@stop

@section('content')
<br>
<div class="row">
	<form action="#" method="POST">
		<div class="col-lg-4">
			<div class="row">
				<label class="col-sm-2 control-label">RAM</label>
				<div class="col-sm-4">
					<select name="ram_con" id="ram_con" class="form-control">
						<option value="">ไม่ระบุ</option>
						<option value="<="><=</option>
						<option value=">=">>=</option>
						<option value="=">=</option>
					</select>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="ram_per" id="ram_per" placeholder="%RAM">
				</div>
			</div>
	<br>
			<div class="row">
				<label class="col-sm-2 control-label">Harddisk</label>
				    <div class="col-sm-4">
					    <select name="hdd_con" id="hdd_con" class="form-control">
							<option value="">ไม่ระบุ</option>
							<option value="<="><=</option>
							<option value=">=">>=</option>
							<option value="=">=</option>
						</select>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="hdd_per" id="hdd_per" placeholder="%Harddisk">
						</div>
						</div>
	<br>
						<div align="right">
							<button type="submit" class="btn btn-primary">Run</button>	
						</div>	
			</div>
	</form>
</div>

@if(isset($data))
<!-- หัวข้อรายงาน -->
<div align="center">
	<label>รายงานทรัพยากรเทคโนโลยีสารสนเทศ (GAP Analysis)</label>
</div>
<br>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="15%" class="text-center">หน่วยงาน</th>
				<th width="10%" class="text-center">เลขครุภัณฑ์</th>
				<th width="10%" class="text-center">IPAdress</th>
				<th width="10%" class="text-center">Type</th>
				<th width="10%" class="text-center">เป้าหมายที่ต้องการ</th>
				<th width="15%"class="text-center">สถานการณ์ปัจจุบัน</th>
				<th width="10%" class="text-center">การดำเนินการ</th>
			</tr>
		</thead>
		<tbody>
		@foreach($data as $d)
			<tr>
				<td>{{ $d->sub_dept_name }}</td>
				<td>{{ $d->durable_id }}</td>
				<td>{{ $d->ip_address }}</td>
				<td>{{ $d->os_name }}</td>
				<td>{{ $d->ram_g }} <br> {{ $d->hdd_g }}</td>
				<td>{{ $d->ram_c }} <br> {{ $d->hdd_c }}</td>
				<td></td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endif

@stop

@section('js_footer')
@stop