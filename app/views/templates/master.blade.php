<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>@yield('title','NKPH') - NVENTORY2</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{HTML::style('assets/plugins/bootstrap/bootstrap.css')}}
		{{--HTML::style('assets/plugins/jquery-ui/jquery-ui.min.css'1)--}}
		{{HTML::style('assets/css/font-awesome.css')}}
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		{{HTML::style('assets/plugins/fancybox/jquery.fancybox.css')}}
		{{HTML::style('assets/plugins/fullcalendar/fullcalendar.css')}}
		{{HTML::style('assets/plugins/xcharts/xcharts.min.css')}}
		{{HTML::style('http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css')}}
		{{HTML::style('assets/css/style.css')}}


		{{HTML::script('assets/plugins/jquery/jquery-2.1.0.min.js')}}

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://localhost/devoops/devoops/http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://localhost/devoops/devoops/http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
		@yield('js_header')
	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="{{URL::to('/')}}">NVENTORY2</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						  <i class="fa fa-bars"></i>
						</a>
						<div id="search">
							<input type="text" placeholder="search"/>
							<i class="fa fa-search"></i>
						</div>
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="hidden-xs">
								<a id="new-ticket" href="#" class="modal-link">
									<i class="fa fa-phone bg-primary"></i>
									<span class="badge hide">7</span>
								</a>

							</li>
							<li class="hidden-xs">
								<a class="ajax-unlink" href="{{URL::to('notification')}}">
									<i class="fa fa-bell"></i>
									<span class="badge @if(Cookie::get('notify_count')==0) hide @endif" id="notify_count" style="background:#f64c4c">{{Cookie::get('notify_count')}}</span>
								</a>
							</li>
							<li class="hidden-xs hide">
								<a href="assets/ajax/page_messages.html" class="ajax-link">
									<i class="fa fa-envelope"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="https://lh3.googleusercontent.com/-TJc2-TVmW3M/AAAAAAAAAAI/AAAAAAAABeU/o3gLbpzsxrE/photo.jpg" class="img-rounded" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span> {{Sentry::getUser()->technic_name}}</span>

									</div>
								</a>
								<ul class="dropdown-menu">
									<li class="hide">
										<a href="#">
											<i class="fa fa-user"></i>
											<span>Profile</span>
										</a>
									</li>
									<li class="hide">
										<a href="assets/ajax/page_messages.html" class="ajax-link">
											<i class="fa fa-envelope"></i>
											<span>Messages</span>
										</a>
									</li>
									<li class="hide">
										<a href="assets/ajax/gallery_simple.html" class="ajax-link">
											<i class="fa fa-picture-o"></i>
											<span>Albums</span>
										</a>
									</li>
									<li class="hide">
										<a href="assets/ajax/calendar.html" class="ajax-link">
											<i class="fa fa-tasks"></i>
											<span>Tasks</span>
										</a>
									</li>
									<li>
										<a href="{{URL::to('settings/account')}}" class="ajax-unlink">
											<i class="fa fa-cog"></i>
											<span>Change Password</span>
										</a>
									</li>
									<li>
										<a href="{{URL::to('auth/logout')}}">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li class="hide">
					<a href="dashboard" class="active ajax-link ">
						<i class="fa fa-dashboard"></i>
						<span class="hidden-xs">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-wrench"></i>
						<span class="hidden-xs">ระบบซ่อมบำรุง</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-unlink" href="{{URL::to('durable/repair-list')}}"><i class="fa fa-wrench"></i> รายการซ่อมครุภัณฑ์</a></li>
						<li><a class="ajax-unlink" href="{{URL::to('durable/repair-out')}}"><i class="fa fa-paper-plane-o"></i> รายการครุภัณฑ์ที่ส่งซ่อมภายนอก</a></li>
					</ul>
				</li>

				<li class="dropdown">

					<a href="#" class="dropdown-toggle">
						<i class="fa fa-cloud-upload"></i>
						 <span class="hidden-xs">อัพโหลดไฟล์สำรองข้อมูล</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-unlink" href="{{URL::to('upload/')}}"><i class="fa fa-list"></i> รายการสำรองข้อมูล</a></li>
						<li><a class="ajax-unlink" href="{{URL::to('upload/uploadbackuphosxp')}}"><i class="fa fa-upload"></i> สำรองข้อมูล HOSxP</a></li>
					</ul>

				</li>
				
				<li>
					<a href="{{URL::to('helpdesk/help-list')}}" class="ajax-unlink">
						<i class="fa fa-phone"></i>
						<span class="hidden-xs">HELPDESK</span>
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-sticky-note-o"></i>
						 <span class="hidden-xs">REPORT</span>
					</a>
					<ul class="dropdown-menu">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-plus-square"></i>
								<span class="hidden-xs">ครุภัณฑ์</span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="ajax-unlink" href="{{URL::to('report/durable/list')}}"><i class="fa fa-sticky-note-o"></i> ข้อมูลครุภัณฑ์คอมพิวเตอร์</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/report-gap')}}"><i class="fa fa-sticky-note-o"></i> Gap Analysis</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/repair/recieve')}}"><i class="fa fa-sticky-note-o"></i> ทะเบียนรับงาน</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/durable/repair-job-month')}}"><i class="fa fa-sticky-note-o"></i> *รายงาน JOB สรุปผลในเดือน</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/repair/technician')}}"><i class="fa fa-sticky-note-o"></i> รายงาน JOB สรุปผลในเดือน (ช่าง)</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/repair/job-dept')}}"><i class="fa fa-sticky-note-o"></i> รายงาน JOB สรุปผลในเดือน (หน่วยงาน)</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/durable/repair-type-month')}}"><i class="fa fa-sticky-note-o"></i> *รายงานจำแนกประเภทการซ่อมบำรุง</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/repair/technician-notsummary')}}"><i class="fa fa-sticky-note-o"></i> รายงาน JOB ยังไม่สรุปผล (ช่าง)</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/repair/job-dept-notsummary')}}"><i class="fa fa-sticky-note-o"></i> รายงาน JOB ยังไม่สรุปผล (หน่วยงาน)</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/durable/repair-type-month')}}"><i class="fa fa-sticky-note-o"></i> *รายงาน JOB ยังไม่สรุปผล (หน่วยงาน)</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/durable/repair-job-month')}}"><i class="fa fa-sticky-note-o"></i> *ประวัติการซ่อมบำรุงครุภัณฑ์</a></li>
								<li><a class="ajax-unlink" href="{{URL::to('report/durable/repair-job-month')}}"><i class="fa fa-sticky-note-o"></i> *ประวัติการซ่อมซ้ำ</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-plus-square"></i>
								<span class="hidden-xs">Helpdesk</span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="ajax-unlink" href="{{URL::to('report/report-helpdesk')}}"><i class="fa fa-sticky-note-o"></i> รายงาน HELPDESK</a></li>

							</ul>
						</li>
					</ul>
				</li>

				<li>
					<a href="{{URL::to('admin')}}" class="ajax-unlink">
						<i class="fa fa-linux"></i>
						<span class="hidden-xs">admin</span>
					</a>
				</li>
				<li class="hide">
					<a href="{{URL::to('faq')}}" class="ajax-unlink">
						<i class="fa fa-question"></i>
						<span class="hidden-xs">FAQ</span>
					</a>
				</li>

				<li class="dropdown hide">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-bar-chart-o"></i>
						<span class="hidden-xs">Charts</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="assets/ajax/charts_xcharts.html">xCharts</a></li>
						<li><a class="ajax-link" href="assets/ajax/charts_flot.html">Flot Charts</a></li>
						<li><a class="ajax-link" href="assets/ajax/charts_google.html">Google Charts</a></li>
						<li><a class="ajax-link" href="assets/ajax/charts_morris.html">Morris Charts</a></li>
						<li><a class="ajax-link" href="assets/ajax/charts_coindesk.html">CoinDesk realtime</a></li>
					</ul>
				</li>
				<li class="dropdown hide">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-table"></i>
						 <span class="hidden-xs">Tables</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="assets/ajax/tables_simple.html">Simple Tables</a></li>
						<li><a class="ajax-link" href="assets/ajax/tables_datatables.html">Data Tables</a></li>
						<li><a class="ajax-link" href="assets/ajax/tables_beauty.html">Beauty Tables</a></li>
					</ul>
				</li>
				<li class="dropdown hide">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-pencil-square-o"></i>
						 <span class="hidden-xs">Forms</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="assets/ajax/forms_elements.html">Elements</a></li>
						<li><a class="ajax-link" href="assets/ajax/forms_layouts.html">Layouts</a></li>
						<li><a class="ajax-link" href="assets/ajax/forms_file_uploader.html">File Uploader</a></li>
					</ul>
				</li>
				<li class="dropdown hide">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-desktop"></i>
						 <span class="hidden-xs">UI Elements</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="assets/ajax/ui_grid.html">Grid</a></li>
						<li><a class="ajax-link" href="assets/ajax/ui_buttons.html">Buttons</a></li>
						<li><a class="ajax-link" href="assets/ajax/ui_progressbars.html">Progress Bars</a></li>
						<li><a class="ajax-link" href="assets/ajax/ui_jquery-ui.html">Jquery UI</a></li>
						<li><a class="ajax-link" href="assets/ajax/ui_icons.html">Icons</a></li>
					</ul>
				</li>
				<li class="dropdown hide">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						 <span class="hidden-xs">Pages</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="assets/ajax/page_login.html">Login</a></li>
						<li><a href="assets/ajax/page_register.html">Register</a></li>
						<li><a id="locked-screen" class="submenu" href="assets/ajax/page_locked.html">Locked Screen</a></li>
						<li><a class="ajax-link" href="assets/ajax/page_contacts.html">Contacts</a></li>
						<li><a class="ajax-link" href="assets/ajax/page_feed.html">Feed</a></li>
						<li><a class="ajax-link add-full" href="assets/ajax/page_messages.html">Messages</a></li>
						<li><a class="ajax-link" href="assets/ajax/page_pricing.html">Pricing</a></li>
						<li><a class="ajax-link" href="assets/ajax/page_invoice.html">Invoice</a></li>
						<li><a class="ajax-link" href="assets/ajax/page_search.html">Search Results</a></li>
						<li><a class="ajax-link" href="assets/ajax/page_404.html">Error 404</a></li>
						<li><a href="assets/ajax/page_500.html">Error 500</a></li>
					</ul>
				</li>
				<li class="dropdown hide">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-map-marker"></i>
						<span class="hidden-xs">Maps</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="assets/ajax/maps.html">OpenStreetMap</a></li>
						<li><a class="ajax-link" href="assets/ajax/map_fullscreen.html">Fullscreen map</a></li>
					</ul>
				</li>
				<li class="dropdown hide">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-picture-o"></i>
						 <span class="hidden-xs">Gallery</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="assets/ajax/gallery_simple.html">Simple Gallery</a></li>
						<li><a class="ajax-link" href="assets/ajax/gallery_flickr.html">Flickr Gallery</a></li>
					</ul>
				</li>
				<li class="hide">
					 <a class="ajax-link" href="assets/ajax/typography.html">
						 <i class="fa fa-font"></i>
						 <span class="hidden-xs">Typography</span>
					</a>
				</li>
				 <li class="hide">
					<a class="ajax-link" href="assets/ajax/calendar.html">
						 <i class="fa fa-calendar"></i>
						 <span class="hidden-xs">Calendar</span>
					</a>
				 </li>

				
			</ul>
		</div>

		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">

<!-- 			<div class="preloader hide">
				<img src="http://localhost/devoops/devoops/img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div> -->
			<!-- Button trigger modal -->
			

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">เลือกรายการ Help</h4>
			      </div>
			      <div class="modal-body">
			        <a href="{{URL::to('durable/repair-create')}}" class="btn btn-menu btn-app" onclick="return goto(this)"><i class="fa fa-wrench"></i>แจ้งซ่อม</a>
			        <a href="{{URL::to('durable/repair-create')}}" class="btn btn-menu btn-app btn-default disabled" onclick="return goto(this)"><i class="fa fa-file-text-o"></i>ขอข้อมูล</a>
			        <a href="{{URL::to('helpdesk/help-create')}}" class="btn btn-menu btn-app" onclick="return goto(this)"><i class="fa fa-phone"></i>Help</a>
			        <a href="{{URL::to('durable/repair-create')}}" class="btn btn-menu btn-app btn-default disabled" onclick="return goto(this)"><i class="fa fa-bolt"></i>แจ้งปัญหา</a>
			      </div>
			      <div class="modal-footer hide">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>


			@yield('content')
			
			<!-- <div id="ajax-content"></div> -->
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://localhost/devoops/devoops/http://code.jquery.com/jquery.js"></script>-->

{{--HTML::script('assets/plugins/jquery-ui/jquery-ui.min.js')--}}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{HTML::script('assets/plugins/bootstrap/bootstrap.min.js')}}
{{HTML::script('assets/plugins/justified-gallery/jquery.justifiedgallery.min.js')}}
{{HTML::script('assets/plugins/tinymce/tinymce.min.js')}}
{{HTML::script('assets/plugins/tinymce/jquery.tinymce.min.js')}}

<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>


<!-- All functions for this theme + document.ready processing -->

@yield('js_footer')

<script type="text/javascript">
	var base_url = "{{URL::to('/')}}/";
	var timestamp;
	var availableTime = 1;
	var interval;
	var available = false;
	function goto(ele){
		if(available)
			ele.href+= "/"+timestamp;
	}

	var myInterval = setInterval(function () {

		getNotify();

    },10000); 

    var getNotify = function(){

    	$.getJSON("{{URL::to('notification/notify')}}", function( notify ) {
    		var notify_span = $('#notify_count');
    		//notify_span.addClass('hide');
    		if(notify.count>0)
    		{
    			notify_span.removeClass('hide').text(notify.count);
    		}else{
    			notify_span.addClass('hide');
    		}
			
		});

    };

	$("#new-ticket").click(function(){
			available = false;
			var model  = $("#myModal");
			//$("#modelStatus").removeClass('hide');

			$.get("{{URL::to('time')}}", function( data ) {
				timestamp = data;
				$("a.btn-menu").attr( "disabled", true );
			  	model.modal('show');
			  	interval = setInterval(
			  		function(){ 
			  			$("a.btn-menu").attr( "disabled", false);
			  			//$("#modelStatus").addClass('hide');
			  			clearInterval(interval);
			  			available = true;
			  		}, availableTime*1000
			  	);
			});
		})

	getNotify();

</script>
{{HTML::script('assets/js/devoops.js')}}

</body>
</html>
