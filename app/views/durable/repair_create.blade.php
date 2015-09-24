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
			<li><a href="#durable/repair-list" class="ajax-goto">รายการซ่อมครุภัณฑ์</a></li>
			<li><a href="#">บันทึกการซ่อมครุภัณฑ์</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-wrench"></i>
					<span>บันทึกการซ่อมครุภัณฑ์</span>
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
							<label for="durable_barcode" class="col-sm-2 control-label">Barcode</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="barcode" id="durable_barcode" >
							</div>
						</div>
						<div class="form-group">
							<label for="durable_id" class="col-sm-2 control-label">หมายเลขครุภัณฑ์</label>
							<div class="col-sm-4">
								<div class="input-group">
							      <input type="text" name="durable_id" id="durable_id" class="form-control">
							      <span class="input-group-btn">
							        <button class="btn btn-default" type="button" id="durable_search" data-toggle="modal" data-target="#ModalDurable">ค้นหา</button>
							      </span>
							    </div><!-- /input-group -->
							</div>
						</div>
						<div class="form-group">
							<label for="durable_name" class="col-sm-2 control-label">ชื่อครุภัณฑ์</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="durable_name" name="durable_name">
							</div>
						</div>
					
					</fieldset>
					<!-- end fieldset 1 -->
					<!-- fieldset 2 -->
					<fieldset>
					<legend>รายละเอียดการแจ้งซ่อม</legend>
						<div class="form-group">

							<label for="repair_id_dept" class="col-sm-2 control-label">เลขที่ (หน่วยงาน)</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="repair_id_dept" id="repair_id_dept">
							</div>
							<div class="validate-group">
								<label for="repair_date" class="col-sm-2 control-label">วันที่ส่งซ่อม</label>
							    <div class="col-sm-4">
							    	<input type="text" class="form-control datepickers" id="repair_date" name="repair_date" 
							    	value="{{date('d').' '.Helpers\Helper::MonthThai(date('m'),true).' '.(date('Y')+543) }}" 
							    	required>
							    </div>
						    </div>
						</div>
						<div class="form-group">
							<div class="validate-group">
								<label for="dept_id" class="col-sm-2 control-label">งานหลัก</label>
							    <div class="col-sm-4">
							    	<select id="dept_id" name="dept_id" class="selectpicker form-control" required>
										<option value="">--เลือก--</option>
										@foreach($dept as $d)
						            	<option value="{{$d->dept_id}}">{{$d->dept_name}}</option>
						           		@endforeach
									</select>

							    </div>
						    </div>
						    <div class="validate-group">
							    <label for="sub_dept_id" class="col-sm-2 control-label">งานย่อย</label>
							    <div class="col-sm-4">
							      	<select id="sub_dept_id" name="sub_dept_id" class="selectpicker form-control" required>
										<option value="">--เลือก--</option>
									</select>
							    </div>
						    </div>
						</div>
						<div class="form-group">
					    	<label for="repair_name" class="col-sm-2 control-label">ชื่อผู้ส่งซ่อม</label>
					    	<div class="col-sm-4">
					      		<input type="text" class="form-control" id="repair_name" name="repair_name" >
					    	</div>
					  	</div>
						<div class="form-group">
					    	<label for="urgency" class="col-sm-2 control-label">ความเร่งด่วน</label>
					    	<div class="col-sm-4">
					      		<select class="form-control" id="urgency" name="urgency">
					      			<option value="">--เลือก--</option>
					      			@foreach($urgency as $ur)
					      	 		<option value="{{$ur->urgency_id}}">{{$ur->urgency_name}}</option>
					      			@endforeach
					      		</select>
					    	</div>
					    
					    	<label for="risk" class="col-sm-2 control-label">อุบัติการณ์</label>
					    	<div class="col-sm-4">
					      		<select class="form-control" id="risk" name="risk">
					      			<option value="">--เลือก--</option>
					      			@foreach($risk as $rsk)
					      	 		<option value="{{$rsk->risk_id}}">{{$rsk->risk_name}}</option>
					      			@endforeach
					      		</select>
					    	</div>
					  	</div>
					  	<div class="form-group">
						    <label for="important_work" class="col-sm-2 control-label">ความสำคัญ</label>
						    <div class="col-sm-4">
						    	<select class="form-control" id="important_work" name="important_work">
						      		<option value="">--เลือก--</option>
						      		@foreach($important_work as $iw)
						      	 	<option value="{{$iw->important_work_id}}">{{$iw->important_work_name}}</option>
						      		@endforeach
						      </select>
						    </div>
						    
						    <label for="amount" class="col-sm-2 control-label">จำนวน</label>
						    <div class="col-sm-4">
						      	<input type="text" class="form-control" id="amount" name="amount">
						    </div>
					  	</div>
					  	<div class="form-group">
					  		<div class="validate-group">
							    <label for="repair_type" class="col-sm-2 control-label">ประเภทการซ่อม</label>
							    <div class="col-sm-10" for="repair_type">
									<div class="radio-inline col-sm-2">
										<label>
											<input type="radio" name="repair_type" value="1" required> ซ่อม
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-2">
										<label>
											<input type="radio" name="repair_type" value="2"> บำรุงรักษา
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-2">
										<label>
											<input type="radio" name="repair_type" value="3"> ดัดแปลง
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-2">
										<label>
											<input type="radio" name="repair_type" value="4"> จัดทำติดตั้งอุปกรณ์
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
							    </div>
							</div>
						</div>
						<div class="form-group">
							<div class="validate-group">
						    	<label for="repair_type" class="col-sm-2 control-label">สิ่งที่ส่งมาด้วย</label>
							    <div class="col-sm-10" for="repair_type">
									<div class="radio-inline col-sm-2">
										<label>
											<input type="radio" name="repair_device_send" value="1" required> พัสดุชำรุด
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-2">
										<label>
											<input type="radio" name="repair_device_send" value="0"> ไม่มีสิ่งที่ส่งมาด้วย
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
									<div class="radio-inline col-sm-4">
										<label>
											<input type="radio" name="repair_device_send" value="2"> ได้แนบประวัติครุภัณฑ์มาด้วย
											<i class="fa fa-circle-o small"></i>
										</label>
									</div>
							    </div>
						    </div>
					  	</div>
					
					</fieldset>
					<!-- end fieldset 2 -->
					<!-- fieldset 3 -->
					<fieldset>
					<legend>อาการชำรุด</legend>
						<div class="form-group">
							<div class="validate-group">
							    <label for="ruin_type" class="col-sm-2 control-label">อาการชำรุด</label>
							    <div class="col-sm-4">
							      	<select class="form-control" id="ruin_type" name="ruin_type" required>
							      		<option value="">--เลือก--</option>
							      		@foreach($ruin_type as $rt)
							      	 	<option value="{{$rt->ruin_type_name}}">{{$rt->ruin_type_name}}</option>
							      		@endforeach
							      </select>
							    </div>
						    </div>
						</div>
						<div class="form-group">
							<div class="validate-group">
								<label for="ruin" class="col-sm-2 control-label">รายละเอียดการชำรุด</label>
							    <div class="col-sm-10">
							      <textarea  class="form-control" id="ruin" name="ruin" rows="5" required></textarea>
							    </div>
						   	</div>
						</div>
						
					</fieldset>
					<!-- end fieldset 3 -->
					<!-- fieldset 4 -->
					<fieldset>
					<legend>อื่นๆ</legend>
						<div class="form-group">
							<div class="validate-group">
							    <label for="repair_get_name" class="col-sm-2 control-label">ผู้รับใบแจ้ง</label>
							    <div class="col-sm-4">
							      	<select class="form-control" id="repair_get_name" name="repair_get_name" required>
							      		<option value="">--เลือก--</option>
							      		@foreach($technician as $tn)
							      	 	<option value="{{$tn->technic_id}}">{{$tn->technic_name}}</option>
							      		@endforeach
							      	</select>
							    </div>
						    </div>

						    <label for="repair_techician_name" class="col-sm-2 control-label">ช่างผู้รับผิดชอบ</label>
						    <div class="col-sm-4">
						      	<select class="form-control" id="repair_techician_name" name="repair_techician_name">
						      		<option value="">--เลือก--</option>
						      		@foreach($technician as $tn)
						      	 	<option value="{{$tn->technic_id}}">{{$tn->technic_name}}</option>
						      		@endforeach
						      	</select>
						    </div>
					  	</div>
					  	<div class="clearfix"></div>
					  	<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" class="btn btn-primary">บันทึก</button>
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


$(document).ready(function() {

	var validator = $("#create-form").validate({
	    highlight: function(element) {
	        $(element).closest('.validate-group').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.validate-group').removeClass('has-error');
	    },
	    errorElement: 'span',
	    errorClass: 'help-block',
	    errorPlacement: function(error, element) {
	         return false;
	    },
	    submitHandler: function(form) {
	    	var input = $("<input>").attr("type", "hidden").attr("name", "hdd_repair_date").val($(form.repair_date).datepicker("getDate"));
			
			$(form).append($(input));
		    //console.log($(form.repair_date).datepicker("getDate"))
		    form.submit();
		}
	});

	var change = $("#dept_id").dropChange({
        child:[{
            name:'sub_dept_id',
            url:'{{URL::to("combo/subdept")}}',
            key:'sub_dept_id',
            display:'sub_dept_name',
            ref:'sub_dept_tel'
        }]
    },function(ele,res,opt){
    	if(res.length>0){
    		$("#"+opt.child[0].name)[0].selectedIndex = 1;
    		validator.element($("#"+opt.child[0].name));
    	}
    });
	var search_change = $("#search_dept_id").dropChange({
        child:[{
            name:'search_sub_dept_id',
            url:'{{URL::to("combo/subdept")}}',
            key:'sub_dept_id',
            display:'sub_dept_name',
            ref:'sub_dept_tel'
        }]
    },function(){

    });

	

	var search = function(data)
	{
		$.get("{{URL::to('durable/durable-info')}}",data,function(result){
			var tbl = $("#tablesearch");
			tbl.empty();

			$.each( result, function( key, value ) {
			  $("#tablesearch").append('<tr><td>'+value.durable_id+'</td><td>'+value.durable_name+'</td><td>'+value.sub_dept_name+'</td>'+
			  	'<td><button class="" onclick="test(\''+value.durable_id+'\',\''+value.durable_name+'\',\''+value.durable_barcode+'\')" type="button"><i class="fa fa-hand-o-left" ></i></button></td></tr>');
			});
		})
	}

	$("#btn_search").click(function(){
		var data = {dept_id:$("#search_dept_id").val(),sub_dept_id:$("#search_sub_dept_id").val(),search:$("#txtsearch").val()};
		
		search(data);
	});

	

	search();

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
