@extends('templates.master')
@section('title','รายการซ่อมครุภัณฑ์')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li><a href="#">รายการซ่อมครุภัณฑ์</a></li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->
<div id="dashboard-header" class="row">
	<div class="col-xs-10 col-sm-2">
		<h4>รายการซ่อมครุภัณฑ์</h4>
	</div>
	<div class="col-xs-2 col-sm-1 col-sm-offset-1 hide">
		<div id="social" class="row">
			<a href="#"><i class="fa fa-google-plus"></i></a>
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<a href="#"><i class="fa fa-youtube"></i></a>
		</div>
	</div>
	<div class="clearfix visible-xs"></div>
	<div class="col-xs-12 col-sm-8 col-md-7 pull-right hide">
		<div class="row">
			<div class="col-xs-4">
				<div class="sparkline-dashboard" id="sparkline-1"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa fa-usd"></i>756.45M
					<span class="txt-primary">EBITDA</span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="sparkline-dashboard" id="sparkline-2"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa fa-usd"></i>245.12M
					<span class="txt-info">OIBDA</span>
				</div>
			</div>
			<div class="col-xs-4">
				<div class="sparkline-dashboard" id="sparkline-3"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa fa-usd"></i>107.83M
					<span>REVENUE</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End Dashboard 1-->
<!--Start Dashboard 2-->
<div class="row-fluid">
	<div id="dashboard_links" class="col-xs-12 col-sm-2 pull-right">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#" class="tab-link" id="overview">อยู่ระหว่างการซ่อม <span id="badge-1" class="badge bg-danger"></span></a></li>
			<li><a href="#" class="tab-link" id="clients">ดำเนินการเรียบร้อย <span class="badge bg-success text-muted"></span></a></li>
			<li><a href="#" class="tab-link" id="graph">เสนอหัวหน้าศูนย์ <span class="badge bg-info"></span></a></li>
			<li><a href="#" class="tab-link" id="servers">เสนอรองผู้อำนวยการ <span class="badge bg-info"></span></a></li>
			<li><a href="#" class="tab-link" id="test">เสนอผู้อำนวยการ <span class="badge bg-info"></span></a></li>
			<li><a href="#" class="tab-link" id="test5">ส่งเอกสารพัสดุ-เบิกวัสดุ <span class="badge"></span></a></li>
			<li><a href="#" class="tab-link" id="test6">ส่งเอกสารพัสดุ-ประเมินราคา <span class="badge"></span></a></li>
			
		</ul>
	</div>
	<div id="dashboard_tabs" class="col-xs-12 col-sm-10">
		<!--Start Dashboard Tab 1-->
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<table id="example-0" class="table table-bordered table-striped table-hover table-heading table-datatable"cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th class="text-center"><i class="fa fa-spinner fa-pulse fa-1x"></i></th>
		            </tr>
		        </thead>
		 
		        <tfoot>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>

		            </tr>
		        </tfoot>
	    	</table>
		</div>
		<!--End Dashboard Tab 1-->
		<!--Start Dashboard Tab 2-->
		<div id="dashboard-clients" class="row" style="visibility: hidden; position: absolute;">
			<table id="example-1" class="table table-bordered table-striped table-hover table-heading table-datatable"cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th class="text-center"><i class="fa fa-spinner fa-pulse fa-1x"></i></th>
		            </tr>
		        </thead>
		 
		        <tfoot>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>

		            </tr>
		        </tfoot>
	    	</table>
		</div>
		<!--End Dashboard Tab 2-->
		<!--Start Dashboard Tab 3-->
		<div id="dashboard-graph" class="row" style="visibility: hidden; position: absolute;">
			<table id="example-2" class="table table-bordered table-striped table-hover table-heading table-datatable"cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th class="text-center"><i class="fa fa-spinner fa-pulse fa-1x"></i></th>
		            </tr>
		        </thead>
		 
		        <tfoot>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>

		            </tr>
		        </tfoot>
	    	</table>
		</div>
		
		<!--End Dashboard Tab 3-->
		<!--Start Dashboard Tab 4-->
		<div id="dashboard-servers" class="row" style="visibility: hidden; position: absolute;">
			<table id="example-3" class="table table-bordered table-striped table-hover table-heading table-datatable"cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th class="text-center"><i class="fa fa-spinner fa-pulse fa-1x"></i></th>
		            </tr>
		        </thead>
		 
		        <tfoot>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>

		            </tr>
		        </tfoot>
	    	</table>
		</div>

		<!--End Dashboard Tab 4-->
		<!--Start Dashboard Tab 5-->
		<div id="dashboard-test" class="row" style="visibility: hidden; position: absolute;">
			<table id="example-4" class="table table-bordered table-striped table-hover table-heading table-datatable"cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th class="text-center"><i class="fa fa-spinner fa-pulse fa-1x"></i></th>
		            </tr>
		        </thead>
		 
		        <tfoot>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>

		            </tr>
		        </tfoot>
	    	</table>
		</div>
		<div id="dashboard-test5" class="row" style="visibility: hidden; position: absolute;">
			<table id="example-5" class="table table-bordered table-striped table-hover table-heading table-datatable"cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th class="text-center"><i class="fa fa-spinner fa-pulse fa-1x"></i></th>
		            </tr>
		        </thead>
		 
		        <tfoot>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>

		            </tr>
		        </tfoot>
	    	</table>
		</div>
		<div id="dashboard-test6" class="row" style="visibility: hidden; position: absolute;">
			<table id="example-6" class="table table-bordered table-striped table-hover table-heading table-datatable"cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th class="text-center"><i class="fa fa-spinner fa-pulse fa-1x"></i></th>
		            </tr>
		        </thead>
		 
		        <tfoot>
		            <tr>
		                <th>ลำดับ</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>หน่วยงานย่อย [ผู้ส่งซ่อม]</th>
		                <th>อาการชำรุด</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>

		            </tr>
		        </tfoot>
	    	</table>
		</div>
		<!--End Dashboard Tab 5-->
	</div>
	<div class="clearfix"></div>
</div>
<!--End Dashboard 2 -->
<div style="height: 40px;"></div>
<script type="text/javascript">
//Array for random data for Sparkline
// var sparkline_arr_1 = SparklineTestData();
// var sparkline_arr_2 = SparklineTestData();
// var sparkline_arr_3 = SparklineTestData();

function Tables(){
	TableStatus(0);
	TableStatus(1);
	TableStatus(2);
	TableStatus(3);
	TableStatus(4);
	TableStatus(5);
	TableStatus(6);
	LoadSelect2Script(MakeSelect2);
}

function TableStatus(status_id){

	var table = $('#example-'+status_id).dataTable( {
		"lengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]],
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
        "ajax": "{{URL::to('durable/ajax')}}/"+status_id,

        
        "columnDefs": [
        	{
        		className:"text-center",
                render: function ( data,type,obj,row) {
                    return ToDateThai(data.repair_date,'yyyy-MM-dd','d NNN YYYY');
                },targets: 1, orderable: false 
            },{
                render: function ( data,type,obj,row) {
                    return data.sub_dept_name+"["+data.repair_name+"]";
                },targets: 2, orderable: false
            },{
                render: function ( data,type,obj,row) {
                    return data.ruin;
                },targets: 3, orderable: false
            },{
                render: function ( data,type,obj,row) {

                    return "<a class='ajax-unlink' href='{{URL::to('durable/repair-edit')}}/"+obj.repair_id+"' ><i class='fa fa-pencil fa-2x text-info'></i></a>"
                },targets: 4, orderable: false
            },{
                render: function ( data,type,obj,row) {
                    return "<a class='ajax-unlink' href='{{URL::to('durable/repair-report-add')}}/"+obj.repair_id+"' ><i class='fa fa-wrench fa-2x text-danger'></i></a>"
                },targets: 5, orderable: false
            },{
                render: function ( data,type,obj,row) {
                    return "<a class='ajax-unlink' target='_blank' onclick='WinOpen("+obj.repair_id+")' href='javascript:void(0)'><i class='fa fa-print fa-2x text-primary'></i></a>"
                },targets: 6, orderable: false
            },{
                render: function ( data,type,obj,row) {
                    if(data.approve_status == 1)
                    	return "<i class='fa fa-check-square-o fa-2x text-success'></i>";
                    if(data.approve_status == 2)
                    	return "<i class='fa fa-check-square-o fa-2x text-danger'></i>";
                    return null;
                },targets: 7, orderable: false
            },{
                render: function ( data,type,obj,row) {
                	if(data.close_job_date != null && data.close_job_date != "0000-00-00")
                    	return "<i class='fa fa-check-square-o fa-2x text-success'></i>";
                    return null;
                },targets: 8, orderable: false
            }
            ],
        "columns": [
        	{ "data": "repair_id" ,"width":"6%" , "class":"text-center"},
            { "data": null ,"width":"10%"},
            { "data": null ,"width":"32%"},
            { "data": null ,"width":"32%"},
            { "data": null ,"width":"4%", "class":"text-center"},
            { "data": null ,"width":"4%", "class":"text-center"},
            { "data": null ,"width":"4%", "class":"text-center"},
            { "data": null ,"width":"4%", "class":"text-center"},
            { "data": null ,"width":"4%", "class":"text-center"}
        ],
        "fnInitComplete": function(oSettings, json) {

        	if(oSettings.fnRecordsTotal()>0){
		      	var li = $("#dashboard_links ul li").find("span");
			    $(li[status_id]).text(oSettings.fnRecordsTotal());
			}

			setInterval( function () {
			    table.api().ajax.reload();
			}, 60000 );
			
	    }
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
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
function Refresh()
{
	$('#example-0,#example-1,#example-2,#example-3,#example-4,#example-5,#example-6').dataTable().api().ajax.reload();
}
function WinOpen(repair_id)
{
	var url = "{{URL::to('durable/repair-print')}}/"+repair_id;
	window.open(url, '', '', '');
}
$(document).ready(function() {

	$("#sd").click(function(){
		$('#example-0').dataTable().api().ajax.reload();
	})

    LoadDataTablesScripts(Tables);

	// Make all JS-activity for dashboard
	DashboardTabChecker();
	// Load Knob plugin and run callback for draw Knob charts for dashboard(tab-servers)
	// LoadKnobScripts(DrawKnobDashboard);
	// // // Load Sparkline plugin and run callback for draw Sparkline charts for dashboard(top of dashboard + plot in tables)
	// LoadSparkLineScript(DrawSparklineDashboard);
	// // Load Morris plugin and run callback for draw Morris charts for dashboard
	//LoadMorrisScripts(MorrisDashboard);
	// Make beauty hover in table
	$("#ticker-table").beautyHover();

	
});
</script>

@stop


@section('js_header')


{{HTML::script('assets/js/date.js')}}

@stop