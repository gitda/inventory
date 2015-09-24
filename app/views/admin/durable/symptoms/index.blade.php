@extends('templates.master')
@section('title','Admin')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{URL::to('admin')}}">Admin</a></li>
			<li><a href="{{URL::to('admin/durable')}}">durable</a></li>
			<li><a href="{{URL::to('admin/durable/symptoms')}}">symptoms</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-file-o"></i>
					<span>ประเภทบริการ</span>
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

				<h4 class="page-header">ประเภทบริการ</h4>
				<table id="dt_ruin_type" class="table table-striped">
					 <thead>
			            <tr>
			                <th class="text-center">ลำดับ</th>
			                <th>ประเภท</th>
			                <th class="text-center">order</th>
			                <th class="text-center">child</th>
			                <th class="text-center">status</th>
			                <th class="text-center"></th>
			            </tr>
			        </thead>
					@foreach($ruin_type as $rt)
					<tr>
						<td class="text-center">{{$rt->ruin_type_id}}</td>
						<td><h4>{{$rt->ruin_type_name}}</h4></td>
						<td class="text-center">{{$rt->ruin_type_order}}</td>
						<th class="text-center">{{$rt->child_count or 0}}</th>
						<td class="text-center">
							@if($rt->ruin_type_status=="1")
							<i class="fa fa-eye"></i>
							@else
							<i class="fa fa-ban text-danger"></i>
							@endif
						</td>
						<td class="text-center"><button type="button" class="btn-xs" onclick="InitRuinType('{{$rt->ruin_type_id}}','{{$rt->ruin_type_name}}')"><i class="fa fa-caret-square-o-left"></i></button></td>
					</tr>
					@endforeach

				</table>
				

			</div>
		</div>

		<div id="ruin_sub_wrapper" class="box hide">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-file-o"></i>
					<span>อาการชำรุด</span>
				</div>
				<div class="box-icons ">
					<a class="beauty-table-to-json">
						<i class="fa fa-spinner fa-pulse fa-1x"></i>
					</a>
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
				<h4 class="page-header"><a name="ruin_sub_wrapper">อาการชำรุด</a></h4>
				<ul class="list-inline">
				    <li><button type="button" id="btn-new-symptoms" class="btn-link"><i class="fa fa-file-o txt-primary"></i> New</button></li>
				    <li class="hide"><i class="fa fa-floppy-o txt-danger"></i> Save</li>
				    <li class="hide"><i class="fa fa-cut txt-info"></i>Cut</li>
				</ul>
				<div id="frm-symptoms" class="hide">
					<h4>เพิ่ม/แก้ไขรายการ</h4>
					<form class="form-horizontal">

					  	<div class="form-group ">
					  		<label class="col-sm-1 control-label">อาการเสีย</label>
					    	<div class="col-sm-4">
				
								<input type="text" id="frm-symptoms-name" name="frm-symptoms-name" class="form-control" placeholder="symptoms" >
							</div>
							<div class="col-sm-1">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="frm-symptoms-status" name="frm-symptoms-status" value="1"> เปิดใช้งาน
										<i class="fa fa-square-o small"></i>
									</label>
								</div>
							</div>
							<div class="col-sm-2 ">
								<input type="hidden" name="hdd-mode" id="hdd-mode" value="">
								<input type="hidden" name="hdd-ruin-type" id="hdd-ruin-type" value="">
								<input type="hidden" name="hdd-symptom-id" id="hdd-symptom-id" value="">
								<button id="btn-symptoms-submit" type="button" class="btn btn-default">บันทึก</button>
							</div>
					  	</div>
					  	
					  
					</form>
					<hr/>
				</div>

				<table id="dt_ruin_type2" class="table table-bordered table-striped table-hover table-heading table-datatable" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>id</th>
			                <th>อาการเสีย</th>
			                <th class="text-center">child</th>
			                <th><i class="fa fa-eye"></i></th>
			                <th class="text-center"></th>
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
	function scrollToAnchor(aid,msg){
	    var aTag = $("a[name='"+ aid +"']");
	    aTag.text(msg)
	    $('html,body').animate({scrollTop: aTag.offset().top},0);
	}

	function InitRuinType(ruin_type,ruin_name)
	{
		var oTable = $("#dt_ruin_type2").dataTable();
		var oSettings = oTable.fnSettings();
		oSettings.ajax  = "{{URL::to('admin/durable/symptoms/ruinsubtype')}}/"+ruin_type;
		
		$("#ruin_sub_wrapper").removeClass("hide");

		$("#frm-symptoms").addClass("hide");
		$('#dt_ruin_type2').dataTable().api().ajax.reload();
		$("#hdd-ruin-type").val(ruin_type)
		scrollToAnchor('ruin_sub_wrapper',ruin_name);
	}

	function InitSymptonType(sid)
	{
		$("#frm-symptoms").removeClass("hide");
		InitSymptomForm(sid);

	}

	function InitSymptomForm(sid)
	{
		$.ajax({
		  method: "GET",
		  url: "{{URL::to('admin/durable/symptoms/init-symptom-form')}}/"+sid,
		  cache: false
		}).done(function( data ) {
		    $("#frm-symptoms-name").val(data.symptom_name)
		    $("#frm-symptoms-status").prop('checked',data.is_status==1);
		    $("#hdd-mode").val("edit");
		    $("#hdd-ruin-type").val(data.ruin_type_id)
		    $("#hdd-symptom-id").val(data.symptom_id)
		});
	}
	function NewSymptomForm()
	{
		clearForm();
		$("#hdd-mode").val("new");
		$("#frm-symptoms").removeClass("hide");
		
	}

	function InitSymptomFormSubmit(frm)
	{
		$.ajax({
		  method: "POST",
		  url: "{{URL::to('admin/durable/symptoms/init-symptom-form')}}",
		  data: frm.find("form").serialize(),
		  cache: false
		}).done(function( data ) {
			$('#dt_ruin_type2').dataTable().api().ajax.reload();
			
			frm.addClass("hide");
			clearForm();
		});

		
	}
	function clearForm()
	{
		$("#frm-symptoms-name").val("");
	    $("#frm-symptoms-status").prop('checked',true);
	    $("#hdd-mode").val("");
	    //$("#hdd-ruin-type").val("");
	    $("#hdd-symptom-id").val("");
	}

	function LoadTables(){
		Table();
		TableRuinSubType();
		// LoadSelect2Script(MakeSelect2);
	}

	function Table(){
		var table = $('#dt_ruin_type').dataTable({
			"bSort": false,
			//"bFilter" : false,               
			"bLengthChange": false,
		});
	}
	function TableRuinSubType()
	{
		var table = $("#dt_ruin_type2").dataTable( {
			"bLengthChange": false,
			"aaSorting": [[ 0, "asc" ]],
			"sDom": "<'box-content'<'col-sm-6'f><'col-sm-6 text-right'l><'clearfix'>>rt<'box-content'<'col-sm-6'i><'col-sm-6 text-right'p><'clearfix'>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
				"sSearch": "ค้นหา ",
				"sLengthMenu": '_MENU_'
			},
	        "processing": false,
	        "serverSide": true,
	        "iDisplayLength": 20,
	        "ajax": "{{URL::to('admin/durable/symptoms/ruinsubtype')}}",
	        "columns": [
	        	{ "data": "symptom_id" ,"width":"15%" , "class":"text-center"},
	            { "data": "symptom_name" ,"width":"70%"},
	            { "data": "is_status" ,"width":"5%" , "class":"text-center"},
	            { "data": null ,"width":"5%"},
	            { "data": null ,"width":"5%"}
	        ],
	        "columnDefs": [
	        {
                render: function ( data,type,obj,row) {
                	if(obj.is_status=='1')
                		return "<i class='fa fa-eye'></i>";
                    return "<i class='fa fa-ban text-danger'></i>";
                },targets: 3, orderable: false, class:"text-center"
            },
        	{
                render: function ( data,type,obj,row) {
                    return "<button type='button' class='btn btn-xs' onclick='InitSymptonType("+obj.symptom_id+")'><i class='fa fa-pencil'></i></button>"
                    + " <button type='button' class='btn btn-xs' onclick='InitSymptonType("+obj.symptom_id+")'><i class='fa fa-caret-square-o-left'></i></button>"
                },targets: 4, orderable: false
            }
            ],

	    } ).on( 'processing.dt', function ( e, settings, processing ) {
	    	//$('#processingIndicator').css( 'display', processing ? 'block' : 'none' );
	    	var record = settings.fnRecordsTotal();
		    if(record>0){
		      	var li = $("#dashboard_links ul li").find("span");
			    $(li[e.target.id.substring(8, 9)]).text(record);
			}

	    	var img  = $(e.currentTarget).find("thead tr th:last").find("i");
	    	img.css( 'display', processing ? 'block' : 'none' );
	    } );
	}

	$(document).ready(function() {

		$("#btn-new-symptoms").click(function(){
			NewSymptomForm();
		});

		$("#btn-symptoms-submit").click(function(){
			InitSymptomFormSubmit($("#frm-symptoms"));
		});

    	LoadDataTablesScripts(LoadTables);
    	//$('#dt_ruin_type').css("color","red");

	});
</script>
@stop