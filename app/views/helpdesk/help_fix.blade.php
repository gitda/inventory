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
					<span>บันทึกข้อมูล Helpdesk (แจ้งซ่อม)</span>
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
						<legend>ระบุรายละเอียดการแจ้งซ่อม</legend>
						<div class="form-group">
							<label for="dept_id" class="col-sm-2 control-label">หน่วยงานหลัก</label>
							<div class="col-sm-8">
								<select class="form-control select2" id="dept_id" name="dept_id" required>
						      		<option value="">--เลือกหน่วยงานหลัก--</option>
						      		@foreach($dept as $d)
						      	 	<option value="{{$d->dept_id}}" @if($d->dept_id==$hdept->dept_id) {{'selected'}} @endif>{{$d->dept_name}}</option>
						      		@endforeach
						      	</select>
							</div>	
						</div>
						<div class="form-group">
							<label for="sub_dept_id" class="col-sm-2 control-label">หน่วยงานย่อย</label>
							<div class="col-sm-8">
								<select class="form-control select2" id="sub_dept_id" name="sub_dept_id" required>
						      		<option value="">--เลือกหน่วยงานย่อย--</option>
						      	</select>
							</div>	
						</div>
						<div class="form-group">
							<label for="sub_dept_name" class="col-sm-2 control-label">หน่วยงานย่อย 2</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="sub_dept_name" id="sub_dept_name">
							</div>
						</div>
						<div class="form-group">
							<label for="contact_name" class="col-sm-2 control-label">ชื่อผู้ติดต่อ</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="contact_name" id="contact_name" value="{{$helpdesk->contact_name}}">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">email</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="email" id="email">
							</div>
						</div>
						<div class="form-group">
							<label for="ruin" class="col-sm-2 control-label">รายละเอียดการชำรุด</label>
							<div class="col-sm-8">
								<textarea  class="form-control" id="ruin" name="ruin" rows="5" required>{{$helpdesk->help_description}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="tel" class="col-sm-2 control-label">หมายเลขโทรศัพท์</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="tel" id="tel" value="{{$hsub_dept->sub_dept_tel}}">
							</div>
						</div>

						
						<div class="form-group">
							<label for="ruin_type_id" class="col-sm-2 control-label">เรื่อง</label>
							<div class="col-sm-4">
								<select class="form-control select2" id="ruin_type_id" name="ruin_type_id" required>
						      		<option value="">--เลือกอาการชำรุด--</option>
						      		@foreach($ruin_type as $rt)
						      	 	<option value="{{$rt->ruin_type_name}}" @if($rt->ruin_type_id==$helpdesk->helpdesk_type_id) {{'selected'}} @endif>{{$rt->ruin_type_name}}</option>
						      		@endforeach
						      	</select>
							</div>	
							<label for="tel" class="col-sm-2 control-label">อาการชำรุด</label>
							<div class="col-sm-4">
								<select class="form-control select2" id="symptoms_id" name="symptoms_id" required>
						      	</select>
							</div>
						</div>

						<div class="form-group">
							<label for="ruin" class="col-sm-2 control-label">ความเร่งด่วน</label>
							<div class="col-sm-4">
								<select class="form-control" id="urgency" name="urgency" required>
					      			<option value="">--เลือกความเร่งด่วน--</option>
					      			@foreach($urgency as $ur)
					      	 		<option value="{{$ur->urgency_id}}">{{$ur->urgency_name}}</option>
					      			@endforeach
					      		</select>
							</div>
							<label for="tel" class="col-sm-2 control-label">อุบัติการณ์</label>
							<div class="col-sm-4">
								<select class="form-control" id="risk" name="risk" required>
					      			<option value="">--เลือกอุบัติการณ์--</option>
					      			@foreach($risk as $rsk)
					      	 		<option value="{{$rsk->risk_id}}" >{{$rsk->risk_name}}</option>
					      			@endforeach
					      		</select>
							</div>
						</div>

						<div class="form-group">
							<label for="ruin" class="col-sm-2 control-label">ความสำคัญ</label>
							<div class="col-sm-4">
								<select class="form-control" id="important_work" name="important_work" required>
						      		<option value="">--เลือกความสำคัญ--</option>
						      		@foreach($important_work as $iw)
						      	 	<option value="{{$iw->important_work_id}}">{{$iw->important_work_name}}</option>
						      		@endforeach
						      </select>
							</div>
						</div>


						
						<div class="clearfix"></div>

						<div class="form-group">

							<div class="col-sm-offset-2 col-sm-10">
								<input type="hidden" name="helpdesk_id" value="{{$helpdesk->id}}" />
					      		<button type="submit" class="btn btn-primary">บันทึก</button>
					      		<a href="{{URL::to('helpdesk/help-edit/'.Request::segment(3));}}">แก้ไขการแจ้งซ่อม</a>
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
			$("#workbench").addClass("hide").val('');
		}
		else if(value==2) /// เลือกส่งต่องาน
		{

			$("#cause").addClass("hide").val('');
			$("#workbench").removeClass("hide").val('');

		}
		else /// none
		{
			$("#cause").addClass("hide").val('');
			$("#workbench").addClass("hide").val('');
		}
	}

	$('.select2').select2({
		theme: "classic",
		allow_single_deselect: true
	});


	$("#reslove_type").change(function(e){
		fnResloveType(e.target.value)
	});


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

	var change = $("#ruin_type_id").dropChange({
        child:[{
            name:'symptoms_id',
            url:'{{URL::to("combo/symptoms")}}',
            key:'symptom_id',
            ref:'symptom_name',
            display:'symptom_name',
            selectedValue: '{{$helpdesk->symptom_id}}'
        }],
        editValue:'{{$helpdesk->helpdesk_type_id}}',
    },function(ele,res,opt){
    	$("#"+opt.child[0].name).select2("val", "");
    	if(res.length>0){
    		$("#"+opt.child[0].name).select2("val", "{{$helpdesk->symptom_id}}");
        		validator.element($("#"+opt.child[0].name));
        }

    },true);

	var change = $("#dept_id").dropChange({
        child:[{
            name:'sub_dept_id',
            url:'{{URL::to("combo/subdept")}}',
            key:'sub_dept_id',
            display:'sub_dept_name',
            ref:'sub_dept_tel',
            selectedValue: '{{$hsub_dept->sub_dept_id}}'
        }],
        editValue:'{{$hdept->dept_id}}',
    },function(ele,res,opt){
    	$("#"+opt.child[0].name).select2("val", "");
    	if(res.length>0){
    		$("#"+opt.child[0].name).select2("val", "{{$hsub_dept->sub_dept_id}}");
        	validator.element($("#"+opt.child[0].name));
        }

    },true);

	fnResloveType();
});
</script>
@stop
