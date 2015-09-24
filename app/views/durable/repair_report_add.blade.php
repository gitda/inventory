@extends('templates.master')
@section('title','รายการซ่อมครุภัณฑ์')

@section('js_header')

{{HTML::style('assets/plugins/datepicker/datepicker3.css')}}
{{HTML::script('assets/plugins/datepicker/bootstrap-datepicker.js')}}
{{HTML::script('assets/plugins/datepicker/bootstrap-datepicker.th.js')}}
{{HTML::script('assets/plugins/datepicker/bootstrap-datepicker-thai.js')}}
{{HTML::script('http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js')}}

{{HTML::script('assets/plugins/typeahead/js/bootstrap-typeahead.js')}}


<style type="text/css">
	
	ul.typeahead > li.active a
	{
		color:black!important;
	}

</style>
@stop


@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li><a href="{{URL::to('durable/repair-list')}}" class="ajax-unlink">รายการซ่อมครุภัณฑ์</a></li>
			<li><a href="#">บันทึกการซ่อมครุภัณฑ์</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box ">
			<div class="box-header ">
				<div class="box-name text-danger bg-danger">
					<i class="fa fa-wrench"></i>
					<span>บันทึกการซ่อมครุภัณฑ์ที่ซ่อม</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link hide">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link hide">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link hide">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" role="form" id="create-form" action="{{URL::current()}}" method="POST">
					<!-- fieldset 1 -->
					<fieldset>
						<legend>ข้อมูลครุภัณฑ์</legend>
						<div class="form-group">
							<label for="durable_id" class="col-sm-2 control-label">หมายเลขครุภัณฑ์</label>
							<div class="col-sm-4">
								<label class="control-label">{{$repair->durable_id}}</label>
							</div>
							<label for="durable_name" class="col-sm-2 control-label">ชื่อครุภัณฑ์</label>
							<div class="col-sm-4">
								<label class="control-label">{{$repair->durable_name}}</label>
							</div>
						</div>
						<div class="form-group">
							<label for="durable_id" class="col-sm-2 control-label">วันที่ส่งซ่อม</label>
							<div class="col-sm-4">
								<label class="control-label">{{\Helpers\Helper::toDateThai($repair->repair_date)}}</label>
							</div>
							<label for="durable_name" class="col-sm-2 control-label">ผู้แจ้งซ่อม</label>
							<div class="col-sm-4">
								<label class="control-label">{{$repair->repair_name}}</label>
							</div>
						</div>	
						<div class="form-group">
							<label for="durable_id" class="col-sm-2 control-label">อาการชำรุด</label>
							<div class="col-sm-4">
								<label class="control-label">{{$repair->ruin_type}} {{$repair->ruin}}</label>
							</div>
							<label for="durable_name" class="col-sm-2 control-label">รับงานเมื่อ</label>
							<div class="col-sm-4">
								<label class="control-label">{{\Helpers\Helper::toDateThai($repair->repair_technician_get_date,'Y-m-d H:i:s','d/m/Y H:i:s')}}</label>
								<label class="control-label text-info">(

									
								
								{{\Helpers\Helper::secondsToTime(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$repair->insert_date.' '.$repair->insert_time)->diffInSeconds(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$repair->repair_technician_get_date)))}}


								)</label>
							</div>
						</div>
					</fieldset>
					<!-- end fieldset 1 -->
					<!-- fieldset 1 -->
					<fieldset>
						<legend>การดำเนินการ</legend>
						<div class="form-group">
							<div class="validate-group">
								<label for="repair_opr" class="col-sm-2 control-label">ได้ดำเนินการ</label>
							    <div class="col-sm-10">
									<div class="radio-inline col-sm-2">
										<label class="control-label">
											<input type="radio" name="repair_opr" value="ตรวจเช็ค" required @if($repair->repair_opr=="ตรวจเช็ค") {{"checked"}} @endif> ตรวจเช็ค
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-2">
										<label  class="control-label">
											<input type="radio" name="repair_opr" value="ปรับแต่ง"  @if($repair->repair_opr=="ปรับแต่ง") {{"checked"}} @endif> ปรับแต่ง
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-2">
										<label  class="control-label">
											<input type="radio" name="repair_opr" value="ดัดแปลง"  @if($repair->repair_opr=="ดัดแปลง") {{"checked"}} @endif> ดัดแปลง
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-2">
										<label  class="control-label">
											<input type="radio" name="repair_opr" value="บำรุงรักษา"  @if($repair->repair_opr=="บำรุงรักษา") {{"checked"}} @endif> บำรุงรักษา
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-2">
										<label  class="control-label">
											<input type="radio" name="repair_opr" value="จัดทำ/ติดตั้ง"  @if($repair->repair_opr=="จัดทำ/ติดตั้ง") {{"checked"}} @endif> จัดทำ/ติดตั้ง
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
							    </div>
							</div>
						</div>
					</fieldset>
					<!-- end fieldset 1 -->


					<!-- fieldset 3 -->
					<fieldset>
						<legend>ผลการดำเนินการ</legend>
						<div class="form-group">
							<div class="validate-group">
						    	<label for="repair_type" class="col-sm-1 control-label"></label>
							    <div class="col-sm-10" for="repair_type">
									<div class="radio-inline">
										<label>
											<input type="radio" required name="repair_result" value="1" @if($repair->repair_result=="1") {{"checked"}} @endif> 1. ไม่เสียค่าใช้จ่ายและดำเนินการเรียบร้อยแล้ว (ระบุวิธีดำเนินการ ถ้าผลการดำเนินการเป็นข้อ 1)
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
							    </div>

						    </div>
					  	</div>
					  	<div class="form-group">
							<div class="validate-group">
								<label for="repair_result_detail1" class="col-sm-3 control-label">วิธีดำเนินการ</label>
							    <div class="col-sm-5">
							      <textarea  class="form-control group1 ignore" id="repair_result_detail1" required name="repair_result_detail1" rows="3" >{{$repair->repair_result_detail1}}</textarea>
							    </div>
						   	</div>
						</div>

					  	<div class="form-group">
							<div class="validate-group">
						    	<label for="repair_type" class="col-sm-1 control-label"></label>
							    <div class="col-sm-10" for="repair_type">
									<div class="radio-inline">
										<label>
											<input type="radio" required name="repair_result" value="2" @if($repair->repair_result=="2") {{"checked"}} @endif> 2. สามารถดำเนินการได้เองโดย (ระบุรายการเบิกวัสดุ ถ้าผลการดำเนินการเป็นข้อ 2)
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
							    </div>
							    
						    </div>
					  	</div>
					  	<div class="form-group">
							<div class="validate-group">
								<label for="ruin" class="col-sm-3 control-label">การเบิกวัสดุ</label>
							    <div class="col-sm-9">
									<div class="radio-inline col-sm-3">
										<label class="control-label">
											<input type="radio" class="group2 ignore" required name="repair_device_type" value="ใช้วัสดุจากคลังย่อย"  @if($repair->repair_device_type=="ใช้วัสดุจากคลังย่อย") {{"checked"}} @endif> ใช้วัสดุจากศูนย์คอม
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-3">
										<label  class="control-label">
											<input type="radio" class="group2 ignore" name="repair_device_type" value="เบิกวัสดุจากคลัง"  @if($repair->repair_device_type=="เบิกวัสดุจากคลัง") {{"checked"}} @endif> เบิกวัสดุจากคลังพัสดุ
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-5">
										<label  class="control-label">
											<input type="radio" class="group2 ignore" name="repair_device_type" value="จัดซื้อใหม่"  @if($repair->repair_device_type=="จัดซื้อใหม่") {{"checked"}} @endif> จัดซื้อใหม่  เลือก ถ้าผลการดำเนินการเป็นข้อ 2
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="clearfix"></div>

									<div class="col-xs-11">
									<hr/>
										<div class="col-xs-12">
											<label class="pull-left">รายการวัสดุที่ใช้</label>
											<label class="pull-right">
												<button type="button" id="btn_new_device" class="btn btn-xs btn-default">เพิ่ม</button>
											</label>
										</div>
										<div class="clearfix"></div>
				
											<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="tblDurable">
												<thead>
													<tr class="bg-danger">
														<th class="col-xs-1">ลำดับ</th>
														<th class="col-xs-6">รายการ</th>
														<th class="col-xs-1">ขนาด</th>
														<th class="col-xs-1">จำนวน</th>
														<th class="col-xs-1">ราคา/หน่วย</th>
														<th class="col-xs-1">ราคารวม</th>
														<th class="col-xs-1">ลบ</th>
													</tr>
													<tr id="tr_add_device" class="hide active">
														<td class="col-xs-1">เพิ่ม</td>
														<td class="col-xs-6">
															<input id="device_list" name="device_list" type="text" class="form-control" placeholder="รายการ">
														</td>
														<td class="col-xs-1">
															<input id="device_size" name="device_size" type="text" class="form-control" >
														</td>
														<td class="col-xs-1">
															<input id="device_amount" name="device_amount" type="text" class="form-control" >
														</td>
														<td class="col-xs-1">
															<input id="price_unit" name="price_unit" type="text" class="form-control" >
														</td>
														<td class="col-xs-1">
															<input id="price_total" name="price_total" type="text" class="form-control" >
														</td>
														<td class="col-xs-1">
															<button id="btn_add_device" class="btn btn-primary" type="button">+</button>
														</td>
													</tr>
												</thead>
											
											</table>
						
									</div>
							    </div>
						   	</div>
						</div>
					  	<div class="form-group">
							<div class="validate-group">
						    	<label for="repair_type" class="col-sm-1 control-label"></label>
							    <div class="col-sm-10" for="repair_type">
									<div class="radio-inline">
										<label>
											<input type="radio" name="repair_result" value="3" @if($repair->repair_result=="3") {{"checked"}} @endif> 3. ไม่สามารถดำเนินการได้เอง (ระบุรายละเอียดด้านล่าง ถ้าผลการดำเนินการเป็นข้อ 3)
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
							    </div>
							    
						    </div>
					  	</div>
					  	<div class="form-group">
							<div class="validate-group">
								<label for="repair_result_detail3" class="col-sm-3 control-label">เนื่องจาก</label>
							    <div class="col-sm-5">
							      <textarea  class="form-control group3 ignore" required id="repair_result_detail3" name="repair_result_detail3" rows="3">{{$repair->repair_result_detail3}}</textarea>
							    </div>
						   	</div>
						</div>
						<div class="form-group">
							<label for="ruin" class="col-sm-3 control-label">เห็นควร</label>
						    <div class="col-sm-9">
								<div class="checkbox-inline col-sm-3">
									<label class="control-label">
										<input type="checkbox" name="repair_out" value="1" @if($repair->repair_out=="1") {{"checked"}} @endif> ส่งซ่อมร้าน (ภายนอก)
										<i class="fa fa-square-o small"></i>
									</label>
								</div>
								<div class="checkbox-inline col-sm-3">
									<label  class="control-label">
										<input type="checkbox" name="repair_in" value="1" @if($repair->repair_in=="1") {{"checked"}} @endif> ส่งซ่อมภายใน (หน่วยอาคาร) 
										<i class="fa fa-square-o small"></i>
									</label>
								</div>
								<div class="checkbox-inline col-sm-5">
									<label  class="control-label">
										<input type="checkbox" name="buy_replace" value="1" @if($repair->buy_replace=="1") {{"checked"}} @endif> ซื้อทดแทน
										<i class="fa fa-square-o small"></i>
									</label>
								</div>
							</div>
						</div>	

						<div class="form-group">
							<div class="validate-group">
								<label for="repair_location" class="col-sm-3 control-label">ขอส่งซ่อมที่</label>
							    <div class="col-sm-3">
									<div class="input-group">
								      <input type="text" class="form-control"  name="repair_location" id="repair_location" value="{{$repair->repair_location}}">
								      <span class="input-group-btn">
								        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal_repair_location"><i class="fa fa-search"></i></button>
								      </span>
								    </div>

								</div>
								<label for="repair_location_tel" class="col-sm-1 control-label">โทร</label>
							    <div class="col-sm-2">
									<input type="text" class="form-control" name="repair_location_tel" id="repair_location_tel" value="{{$repair->repair_location_tel}}">
								</div>
						   	</div>
						</div>
						<div class="form-group">
							<div class="validate-group">
								<label for="repair_date_end" class="col-sm-3 control-label">เสร็จประมาณวันที่</label>
							    <div class="col-sm-3">
							    	<?php
							    	$repair_date_end = "";
							    	if($repair->repair_date_end != "" && $repair->repair_date_end != '0000-00-00'){
							    		$cdate = \Carbon\Carbon::createFromFormat('Y-m-d', $repair->repair_date_end);
							    		$repair_date_end = $cdate->day." ".\Helpers\Helper::MonthThai($cdate->month,true)." ".($cdate->year+543);
							    	}
							    	?>
									<input type="text" class="form-control datepickers" name="repair_date_end" id="repair_date_end" value="{{$repair_date_end}}">
								</div>
								<label for="repair_price_about" class="col-sm-1 control-label">ราคาประมาณ </label>
							    <div class="col-sm-2">
									<input type="text" class="form-control" name="repair_price_about" id="repair_price_about" value="{{$repair->repair_price_about}}">
								</div>
						   	</div>
						</div>
						<div class="form-group">
							<div class="repair_location_name-group">
								<label for="ruin" class="col-sm-3 control-label">ชื่อผู้ติดต่อ</label>
							    <div class="col-sm-3">
									<input type="text" class="form-control" name="repair_location_name" id="repair_location_name" value="{{$repair->repair_location_name}}">
								</div>
						   	</div>
						</div>
					</fieldset>
					<!-- end fieldset 3 -->
					<!-- fieldset 3 -->
					<fieldset>
						<legend>ผลการซ่อม</legend>
						<div class="form-group">
							<div class="validate-group">
							    <label for="repair_out_status" class="col-sm-2 control-label">ผลการซ่อม</label>
							    <div class="col-sm-4">
							      	<select class="form-control" id="repair_out_status" name="repair_out_status">
							      		<option value="">--เลือก--</option>
							      		@foreach($repair_out_status as $ros)
							      	 	<option value="{{$ros->repair_out_status}}" @if($ros->repair_out_status==$repair->repair_out_status) {{"selected"}} @endif>{{$ros->repair_out_name}}</option>
							      		@endforeach
							      </select>
							    </div>
						    </div>
							<div class="validate-group">
								<label for="repair_out_problem" class="col-sm-2 control-label">สาเหตุ</label>
							    <div class="col-sm-4">
							      <textarea  class="form-control" id="repair_out_problem" name="repair_out_problem" rows="1" required>{{$repair->repair_out_problem}}</textarea>
							    </div>
						   	</div>
						</div>
						
					</fieldset>
					<!-- end fieldset 3 -->
					<!-- fieldset 4 -->
					<fieldset>
						<legend>หมายเหตุ / ผู้รับผิดชอบ</legend>
						<div class="form-group">
							<div class="validate-group">
							    <label for="cause_id" class="col-sm-2 control-label">วิเคราะห์มูลเหตุ </label>
							    <div class="col-sm-4">
							      	<select class="form-control" id="cause_id" name="cause_id" required>
							      		<option value="">--เลือก--</option>
							      		@foreach($cause_id as $ci)
							      	 	<option value="{{$ci->cause_id}}" @if($ci->cause_id==$repair->cause_id) {{"selected"}} @endif>{{$ci->cause_name}}</option>
							      		@endforeach
							      </select>
							    </div>
						    </div>
							<div class="validate-group">
								<label for="repair_cost" class="col-sm-2 control-label">ค่าใช้จ่าย</label>
							    <div class="col-sm-4">
							      <input type="text"  class="form-control" id="repair_cost" name="repair_cost" value="{{$repair->repair_cost}}">
							    </div>
						   	</div>
						</div>
						<div class="form-group">
							<div class="validate-group">
							    <label for="repair_comment" class="col-sm-2 control-label">หมายเหตุ </label>
							    <div class="col-sm-4">
							      	 <textarea  class="form-control" id="repair_comment" name="repair_comment" rows="2">{{$repair->repair_comment}}</textarea>
							    </div>
						    </div>

						</div>
						<div class="form-group">
							<div class="validate-group">
							    <label for="repair_status" class="col-sm-2 control-label">สถานะการซ่อม</label>
							    <div class="col-sm-4">
							      	<select class="form-control" id="repair_status" name="repair_status">
							      		<option value="">--เลือก--</option>
							      		@foreach($repair_status as $rss)
							      	 	<option value="{{$rss->repair_status_id}}" @if($rss->repair_status_id==$repair->repair_status) {{"selected"}} @endif>{{$rss->repair_status_name}}</option>
							      		@endforeach
							      	</select>
							    </div>
						    </div>
							<div class="validate-group">
								<label for="repair_care" class="col-sm-2 control-label">ช่างรับผิดชอบ </label>
							    <div class="col-sm-4">
							      	<select class="form-control" id="repair_care" name="repair_care">
							      		<option value="">--เลือก--</option>
							      		@foreach($technician as $t)
							      	 	<option value="{{$t->technic_id}}" @if($t->technic_id==$repair->repair_care) {{"selected"}} @endif>{{$t->technic_name}}</option>
							      		@endforeach
							      	</select>
							    </div>
						   	</div>
						</div>

					  	<div class="clearfix"></div>
					  	<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button id="btnSubmit" type="submit" class="btn btn-primary">บันทึก</button>
					    	</div>
					  	</div>
					</fieldset>
					<!-- end fieldset 4 -->
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalDurable"  tabindex="-1" role="dialog" aria-labelledby="ModalDurableLabel">
  <div class="modal-dialog" style="width:800px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalDurableLabel">ค้นหาครุภัณฑ์</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <div class="form-group">
		    <label for="search_dept" class="col-sm-2 control-label">หน่วยงานหลัก</label>
		    <div class="col-sm-10">
		      	<select id="search_dept_id" name="search_dept_id" class="selectpicker form-control" required>
					<option value="">--เลือก--</option>
					@foreach($dept as $d)
		            <option value="{{$d->dept_id}}">{{$d->dept_name}}</option>
		            @endforeach
				</select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="search_sub_dept" class="col-sm-2 control-label">หน่วยงานย่อย</label>
		    <div class="col-sm-10">
			    <select id="search_sub_dept_id" name="search_sub_dept_id" class="selectpicker form-control" required>
					<option value="">--เลือก--</option>
				</select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="search_dept" class="col-sm-2 control-label">คำค้นหา</label>
		    <div class="col-sm-10">
		      <div class="input-group">
		      <input type="text" class="form-control" id="txtsearch" placeholder="Search for...">
		      <span class="input-group-btn">
		        <button id="btn_search" class="btn btn-default" type="button">ค้นหา</button>
		      </span>
		    </div><!-- /input-group -->
		    </div>
		  </div>

		  <table id="tablesearch" class="table well table-bordered">
		  </table>


		</form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modal_repair_location"  tabindex="-1" role="dialog" aria-labelledby="ModalDurableLabel">
  <div class="modal-dialog" style="width:800px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalDurableLabel">ค้นหาครุภัณฑ์</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <table id="store_search" class="table table-bordered table-hover datatable">
	  		<thead>
	  			<tr>
	  				<th>รหัส</th>
	  				<th>ชื่อร้าน</th>
	  				<th class="hide">ชื่อร้าน</th>
	  				<th class="hide">ชื่อร้าน</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			@foreach($store as $s)
	  			<tr>
	  				<td>{{$s->store_id}}</td>
	  				<td>{{$s->store_name}}</td>
	  				<td class="hide">{{$s->store_tel}}</td>
	  				<td class="hide">{{$s->store_contact}}</td>
	  			</tr>
	  			@endforeach
	  		</tbody>
		  </table>
		</form>
      </div>

    </div>
  </div>
</div>


@stop

@section('js_footer')
{{HTML::script('assets/js/dropdownchange.js')}}

<script type="text/javascript">

function test(id,name,bcode)
{
	$("#durable_barcode").val(bcode);
	$("#durable_name").val(name);
	$("#durable_id").val(id);
	$('#ModalDurable').modal('hide');
}

function Tables()
{
	TableDurable();
	DataTable();
}
function DataTable()
{
	$('.datatable').dataTable({"iDisplayLength": 5,"bLengthChange": false});
	$('#store_search').on( 'click', 'tr', function (e) {

        var id = $(e.currentTarget).find('td')[0].innerText;
        var name = $(e.currentTarget).find('td')[1].innerText;
        var tel = $(e.currentTarget).find('td')[2].innerText;
        var contact = $(e.currentTarget).find('td')[3].innerText;

		$("#repair_location").val(name);
		$("#repair_location_tel").val(tel);
		$("#repair_location_name").val(contact);

        $("#modal_repair_location").modal('hide');

    } );
}
function TableDurable(){

	var table = $('#tblDurable').dataTable( {
		"paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false,
        "processing": false,
        "serverSide": true,
        "ajax": "{{URL::to('durable/repair-report-add-ajax/'.$repair->repair_id)}}",
         "language": {
	      "emptyTable": "ไม่มีรายการเบิก"
	    },
        "columns": [
        	{ "data": "id" },
        	{ "data": "device_list" },
        	{ "data": "device_size" },
        	{ "data": "device_amount" },
        	{ "data": "price_unit" },
        	{ "data": "price_total" },
        	{ "data": null }
        ],
        "columnDefs": [
        	{
                render: function ( data,type,obj,row) {
                    return "<a class='ajax-unlink' onclick='return Device(this,"+obj.id+",confirm(\"ยืนยันการลบ รายการวัสดุที่ใช้ ?\"));' ><i class='fa fa-trash fa-2x text-danger'></i></a>"
                },targets: 6, orderable: false
            }
        ]
	});
}

function Device(ele,id,confirm)
{	
	if(confirm){
		$.ajax({
		    url: '{{URL::to("durable/repair-report-device")}}/'+id,
		    type: 'DELETE',
		    success: function(result) {
		        $('#tblDurable').dataTable().api().ajax.reload();
		    }
		});

	}
	return false;
}
function AddDevice()
{	

	
	var params = $("#tblDurable :input").serialize();
	$.ajax({
	    url: '{{URL::to("durable/repair-report-device/".$repair->repair_id)}}',
	    type: 'PUT',
	    data: params,
	    dataType: 'json',
	    success: function(result) {
	    	if(result.record==true){
	    		$('#tr_add_device').addClass('hide').addClass('active');
	    		$("#tblDurable :input").val("");
		    	
		    	$('#tblDurable').dataTable().api().ajax.reload();
		    	
		    }else{
		    	$('#tr_add_device').removeClass('active').removeClass('hide');
		    }
	    }
	});
	return false;
}

function LoadTypeHeader()
{
	$('#device_list').typeahead({
		// onSelect: function(item) {
  //   	},
    	menu: '<ul class="typeahead dropdown-menu "></ul>',
        item: '<li><a href="#" ></a></li>',
		ajax: '{{URL::to("durable/autocomplete")}}',
		displayField: 'item_name',
		val:'id'
    });
}


$(document).ready(function() {

	LoadDataTablesScripts(Tables);
	LoadTypeHeader();

 	$("#btn_new_device").click(function(){

 		$('#tr_add_device').removeClass('hide');
 	})
 	$("#btn_add_device").click(function(){
 		AddDevice();
 	})





	var validator = $("#create-form").validate({
	    highlight: function(element) {
	        $(element).closest('.validate-group').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.validate-group').removeClass('has-error');
	    },
	    ignore: ".ignore",
	    errorElement: 'span',
	    errorClass: 'help-block',
	    errorPlacement: function(error, element) {
	         return false;
	    },
	    submitHandler: function(form) {
	    	var input = $("<input>").attr("type", "hidden").attr("name", "hdd_repair_date_end").val($(form.repair_date_end).datepicker("getDate"));
			
			$(form).append($(input));
		    //console.log($(form.repair_date).datepicker("getDate"))
		    form.submit();
		}
	});

	$("#btnSubmit").click(function(){

		switch($("input[name='repair_result']:checked").val())
		{
			case "1":
				$(".group1").removeClass('ignore');
				$(".group2,.group3").addClass('ignore').closest('.validate-group').removeClass('has-error');
				break;
			case "2":
				$(".group1,.group3").addClass('ignore').closest('.validate-group').removeClass('has-error');
				$(".group2").removeClass('ignore');
				break;
			case "3":
				$(".group2,.group1").addClass('ignore').closest('.validate-group').removeClass('has-error');
				$(".group3").removeClass('ignore');
				break;
			default :
				$(".group1,.group2,.group3").addClass('ignore').closest('.validate-group').removeClass('has-error');
				break;
		}
		return true;

 	});


	$('.datepickers').datepicker({
	        autoclose: true,
	        todayHighlight: true,
	        format: "d MM yyyy",
	        language: "th-th",
	        forceParse: false
    }).on("changeDate", function(e){
    	validator.element($(this));
	});


});
</script>
@stop
