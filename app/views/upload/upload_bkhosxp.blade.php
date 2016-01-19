@extends('templates.master')
@section('title','รายการซ่อมครุภัณฑ์')


@section('js_header')
{{HTML::style('assets/plugins/uploadify/uploadify.css')}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

@stop

@section('content')
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{URL::to('/')}}">Dashboard</a></li>

		</ol>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-question"></i>
					<span>สำรองข้อมูล HOSxP รายวัน</span>
				</div>
				<div class="box-icons hide">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
				<div class="box-content">

				
				<h1>สำรองข้อมูล HOSxP รายวัน</h1>
				<input id="file_upload" name="file_upload" type="file" multiple="true">
			</div>
		</div>
	</div>
</div>


@stop

@section('js_footer')
{{ HTML::script('assets/plugins/uploadify/jquery.uploadify.js')}}
{{ HTML::script('assets/plugins/uploadify/jquery.uploadify.min.js')}}

	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({

				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},

				'buttonText' : '<div class="btn btn-primary"><i class="fa fa-cloud-upload"></i> &nbsp;เลือกไฟล์</div>',
				'fileTypeExts' : '*.zip;',
				'fileType' : '*.zip;',
				'fileSizeLimit' : '100MB',
				'swf'      : '{{URL::to("assets/plugins/uploadify/uploadify.swf")}}',
				'uploader' : '{{URL::to("upload/uploadbackuphosxp/uploadify")}}',
				'onQueueComplete': function(queueData) {
					window.location.href = '{{URL::to("upload/")}}';
				}
			});	
		});
	</script>

@stop