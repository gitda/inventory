@extends('templates.master')
@section('title','Helpdesk')

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
			<li><a href="#">บันทึกข้อมูล Helpdesk</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-8">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-phone"></i>
					<span>บันทึกข้อมูล Helpdesk</span>
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
						<legend>บันทึกข้อมูล Helpdesk</legend>
						<div class="form-group">
							<label for="ruin_type_id" class="col-sm-2 control-label">เรื่อง</label>
							<div class="col-sm-4">
								<select class="form-control select2" id="ruin_type_id" name="ruin_type_id" required>
						      		<option value="">--เลือกเรื่อง--</option>
						      		@foreach($ruin_type as $rt)
						      	 	<option value="{{$rt->ruin_type_id}}" >{{$rt->ruin_type_name}}</option>
						      		@endforeach
						      	</select>
							</div>	
							<div class="col-sm-4">
								<select class="form-control select2" id="symptoms_id" name="symptoms_id" required>
						      	</select>
							</div>	
						</div>
						<div class="form-group">
							<label for="help_description" class="col-sm-2 control-label">รายละเอียด</label>
							<div class="col-sm-8">
								<textarea  class="form-control" id="help_description" name="help_description" rows="5" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="contact_name" class="col-sm-2 control-label">ผู้ติดต่อ</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="contact_name" id="contact_name">
							</div>
						</div>
						<div class="form-group">
							<label for="sub_dept_id" class="col-sm-2 control-label">แผนก</label>
							<div class="col-sm-8">
								<select class="form-control select2" id="sub_dept_id" name="sub_dept_id" required>
						      		<option value="">--เลือกแผนก--</option>
						      		@foreach($sub_dept as $sd)
						      	 	<option value="{{$sd->sub_dept_id}}">{{$sd->sub_dept_name}}</option>
						      		@endforeach
						      	</select>
							</div>	
						</div>

						<div class="form-group">
							<label for="reslove_type" class="col-sm-2 control-label">ผลการปฏิบัติ</label>
							<div class="col-sm-4">
								<select class="form-control" id="reslove_type" name="reslove_type" required>
						      		<option value="">--เลือกผลการปฏิบัติ--</option>
						      		@foreach($reslove_type as $st)
						      	 	<option value="{{$st->reslove_type}}">{{$st->reslove_name}}</option>
						      		@endforeach
						      	</select>
							</div>
							<div class="col-sm-4">
								<select class="form-control" id="cause" name="cause" required>
						      		<option value="">--เลือกความเสี่ยง--</option>
						      		@foreach($cause as $c)
						      	 	<option value="{{$c->cause_id}}">{{$c->cause_name}}</option>
						      		@endforeach
						      	</select>
							</div>
						</div>

						<div id="pnl-forward" class="form-group">
							<label for="workbench" class="col-sm-2 control-label">ส่งต่อให้</label>
							<div class="col-sm-4">
								<select class="form-control" id="workbench" name="workbench" required>
						      		<option value="">--ส่งต่องาน--</option>
						      		@foreach($workbench as $wb)
						      	 	<option value="{{$wb->workbench_id}}">{{$wb->workbench_name}}</option>
						      		@endforeach
						      	</select>
							</div>
							<div class="col-sm-4">
								<select class="form-control" id="forward_type" name="forward_type" required>
						      		<option value="">--สาเหตุการส่งต่อ--</option>
						      		@foreach($forward_type as $ft)
						      	 	<option value="{{$ft->forward_type_id}}">{{$ft->forward_type_name}}</option>
						      		@endforeach
						      	</select>
							</div>
						</div>



						<div class="form-group">
							<label for="staff_id" class="col-sm-2 control-label">ผู้รับโทรศัพท์</label>
							<div class="col-sm-4">
								<select class="form-control" id="staff_id" name="staff_id" required>
						      		<option value="">--เลือกผู้รับโทรศัพท์--</option>
						      		@foreach($technician as $tn)
						      	 	<option value="{{$tn->technic_id}}">{{$tn->technic_name}}</option>
						      		@endforeach
						      	</select>
							</div>

						</div>
						<div class="form-group">
							<label for="help_note" class="col-sm-2 control-label">หมายเหตุ</label>
							<div class="col-sm-8">
								<textarea  class="form-control" id="help_note" name="help_note" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="help_result" class="col-sm-2 control-label">สถานะ</label>
							<div class="col-sm-4">
								<select class="form-control" id="help_result" name="help_result" required>
						      		<option value="">--เลือกสถานะ--</option>
						      		@foreach($help_result as $hr)
						      	 	<option value="{{$hr->help_result_id}}">{{$hr->help_result_name}}</option>
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
					<!-- end fieldset 1 -->
				</form>
			</div>
		</div>
	</div>
</div>

@stop

@section('js_footer')
{{HTML::script('assets/js/dropdownchange.js')}}
<script type="text/javascript">
	

$(document).ready(function() {
	var fnResloveType = function(value)
	{

		if(value==1) /// เลือก ตอบเอง
		{
			$("#cause").removeClass("hide").val('');
			$("#pnl-forward").addClass("hide").find("select").val('');
		}
		else if(value==2) /// เลือกส่งต่องาน
		{
			$("#cause").addClass("hide").val('');
			$("#pnl-forward").removeClass("hide").find("select").val('');
		}
		else /// none
		{
			$("#cause").addClass("hide").val('');
			$("#pnl-forward").addClass("hide").find("select").val('');
		}
	}

	$('.select2').select2({
		theme: "classic",
		allow_single_deselect: true
	});


	$("#reslove_type").change(function(e){
		fnResloveType(e.target.value)
	});

	var change = $("#ruin_type_id").dropChange({
        child:[{
            name:'symptoms_id',
            url:'{{URL::to("combo/symptoms")}}',
            key:'symptom_id',
            display:'symptom_name'
        }]

    },function(ele,res,opt){
    	$("#"+opt.child[0].name).select2("val", "");

    	if(res.length>0){
        	validator.element($("#"+opt.child[0].name));
        }

    },true);

    


	var validator = $("#create-form").validate({
	    highlight: function(element) {
	        $(element).closest('.form-group').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.form-group').removeClass('has-error');
	    },
	    errorElement: 'span',
	    errorClass: 'help-block',
	    errorPlacement: function(error, element) {
	         return false;
	    },
	    submitHandler: function(form) {

			$(form).append($(input));
		    //console.log($(form.repair_date).datepicker("getDate"))
		    form.submit();
		}
	});

	fnResloveType();
});
</script>
@stop
