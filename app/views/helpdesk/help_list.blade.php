@extends('templates.master')
@section('title','Helpdesk')

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
			<li class="active"><a href="#" class="tab-link" id="overview">callcenter <span id="badge-1" class="badge bg-danger"></span></a></li>

		</ul>
	</div>
	<div id="dashboard_tabs" class="col-xs-12 col-sm-10">
		<!--Start Dashboard Tab 1-->
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<table id="example-0" class="table table-bordered table-striped table-hover table-heading table-datatable"cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>ที่</th>
		                <th>วัน/เดือน/ปี</th>
		                <th>เรื่อง</th>
		                <th>ผู้ติดต่อ</th>
		                <th>ผลการปฎิบัติ</th>
		                <th><i class="fa fa-clock-o"></i></th>
		                <th><i class="fa fa-user"></i></th>
		                <th><i class="fa fa-user"></i></th>
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
        "ajax": "{{URL::to('helpdesk/ajax')}}/"+status_id,
        "columnDefs": [
			{
                render: function ( data,type,obj,row) {

                    return data.help_description;
                },targets: 2, orderable: false
            },{
                render: function ( data,type,obj,row) {
                    return data.contact_name;
                },targets: 3, orderable: false
            },{
                render: function ( data,type,obj,row) {
                    return data.reslove_name;
                },targets: 4, orderable: false
            },{
                render: function ( data,type,obj,row) {
                	var s = datediff(data.callcenter_date,data.help_date,"seconds");
                    return s.toHHMMSS();
                },targets: 5, orderable: false
            },{
            	render: function ( data,type,obj,row) {

                    return "<a class='ajax-unlink' target='_blank' href='{{URL::to('helpdesk/help-edit-redirect')}}/"+obj.id+"' ><i class='fa fa-pencil fa-2x text-info'></i></a>"
                },targets: 7, orderable: false
            }
            ],
        "columns": [
        	{ "data": "id" ,"width":"5%","class":"text-center"},
            { "data": "help_date"  ,"width":"9%"},
            { "data": null,"width":"30%"},
            { "data": null,"width":"15%"},
            { "data": null ,"width":"10%","class":"text-center"},
            { "data": null ,"width":"10%","class":"text-center"},
            { "data": "technic_name" ,"width":"18%"},
            { "data": null,"width":"1%"}
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
    	var record = settings.fnRecordsTotal();
	    if(record>0){
	      	var li = $("#dashboard_links ul li").find("span");
		    $(li[e.target.id.substring(8, 9)]).text(record);
		}
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