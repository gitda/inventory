@extends('templates.master')
@section('title','รายการครุภัณฑ์ที่ส่งซ่อมภายนอก')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li><a href="#">ทะเบียน callcenter</a></li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->
<div id="dashboard-header" class="row">
	<div class="col-xs-10 col-sm-2">
		<h4>ทะเบียน callcenter</h4>
	</div>
</div>
<!--End Dashboard 1-->
<!--Start Dashboard 2-->
<div class="row-fluid">
	<div id="dashboard_links" class="col-xs-12 col-sm-2 pull-right">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#" class="tab-link" id="overview">ส่งซ่อมภายนอก <span id="badge-1" class="badge bg-danger"></span></a></li>

		</ul>
	</div>
	<div id="dashboard_tabs" class="col-xs-12 col-sm-10">
		<!--Start Dashboard Tab 1-->
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<table id="example-0" class="table table-bordered table-striped table-hover table-heading table-datatable"cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ที่</th>
		                <th>หมายเลขครุภัณฑ์</th>
		                <th>ชื่อครุภัณฑ์</th>
		                <th>หน่วยงาน</th>
		                <th>วันที่ส่งซ่อม</th>
		                <th>ชื่อผู้ส่งซ่อม</th>
		                <th>ใบส่งซ่อม</th>
		            </tr>
		        </thead>
		
	    	</table>
		</div>
		<!--End Dashboard Tab 1-->
	</div>
	<div class="clearfix"></div>
</div>
<!--End Dashboard 2 -->
<div style="height: 40px;"></div>
<script type="text/javascript">

function Tables(){
	TableStatus(0);
	// LoadSelect2Script(MakeSelect2);
}

function TableStatus(status_id){

	var table = $('#example-'+status_id).dataTable( {

        "processing": false,
        "serverSide": true,
        "iDisplayLength": 20,
        "ajax": "{{URL::to('durable/repair-out-list')}}/"+status_id,
        "columnDefs": [
			{
                render: function ( data,type,obj,row) {
                    return "<a target='_blank' href='{{URL::to('durable/repair-out-print')}}/"+data.repair_id+"' ><i class='fa fa-print fa-2x'></i><a>";
                },targets: 6, orderable: false
            },
            {
                render: function ( data,type,obj,row) {
                    return ToDateThai(data.repair_date,'yyyy-MM-dd','d NNN YYYY');
                },targets: 4, orderable: false
            }
            ],
        "columns": [
        	{ "data": "repair_id" ,"width":"4%","class": "text-center"},
            { "data": "durable_id" ,"width":"10%"},
            { "data": "durable_name" ,"width":"20%"},
            { "data": "sub_dept_name" ,"width":"15%"},
            { "data": null ,"width":"8%" ,"class": "text-center"},
            { "data": "repair_name" ,"width":"10%"},
            { "data": null ,"width":"5%" ,"class": "text-center"}
        ],
        "fnInitComplete": function(oSettings, json) {

        	if(oSettings.fnRecordsTotal()>0){
		      	var li = $("#dashboard_links ul li").find("span");
			    $(li[status_id]).text(oSettings.fnRecordsTotal());
			}

			// setInterval( function () {
			//     table.api().ajax.reload();
			// }, 10000 );
			
	    }
    } ).on( 'processing.dt', function ( e, settings, processing ) {
        
  //   	var record = settings.fnRecordsTotal();
	 //    if(record>0){
	 //      	var li = $("#dashboard_links ul li").find("span");
		//     $(li[e.target.id.substring(8, 9)]).text(record);
		// }
    	// var img  = $(e.currentTarget).find("thead tr th:last").find("i");
    	// img.css( 'display', false ? 'none' : 'block' );
    } );
	
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