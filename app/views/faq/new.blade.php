@extends('templates.master')
@section('title','FAQ / คำถามที่พบบ่อย')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{URL::to('dashboard')}}">Dashboard</a></li>
			<li><a href="{{URL::to('faq')}}">FAQ</a></li>
			<li><a href="#">CREATE NEW FAQ</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-question"></i>
					<span>CREATE NEW FAQ</span>
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
				<form method="POST" id="CreateForm" class="form-horizontal">
					<fieldset>
						<legend>Title <label for="title"></label></legend>
						<div class="form-group">
							<div class="col-xs-12">
								<input name="title" id="title" value="{{$question->title or ''}}" class="form-control" required>	
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Question</legend>
						<div class="form-group">
							<div class="col-xs-12">
								<textarea class="form-control" name="question" rows="5" id="question" required>{{$question->question or ''}}</textarea>
							</div>
						</div>
					</fieldset>
					<br/>
					<fieldset>
						<legend>Answer</legend>
						<div class="form-group">
							<div class="col-xs-12">
								<textarea class="form-control" name="answer" rows="5" id="answer" required>{{$question->answer or ''}}</textarea>
							</div>
						</div>
					</fieldset>
					<div class="form-group">
						<div class="col-sm-3">
							<div class="checkbox-inline">
								<label>
									<input type="checkbox" name="pin" value="1" @if(isset($question->pin) && $question->pin=='1') {{'checked'}} @endif> ปักหมุด
									<i class="fa fa-square-o"></i>
								</label>
							</div>
							<div class="checkbox-inline">
								<label>
									<input type="checkbox" name="is_visible" value="0" @if(isset($question->pin) && $question->is_visible=='0') {{'checked'}} @endif> ซ่อน
									<i class="fa fa-square-o"></i>
								</label>
							</div>
							@if(isset($question->question_id))
							<div class="checkbox-inline">
								<a href="{{URL::to('faq/delete/'.Crypt::encrypt($question->question_id))}}" class="btn btn-danger">ลบ Faq</a>
							</div>
							@endif

						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<button type="submit" class="btn btn-primary pull-right">Submit</button>
						</div>
					</div>
					

				</form>

			</div>
		</div>
	</div>
</div>


@stop

@section('js_header')

{{HTML::script('http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js')}}
<script type="text/javascript">
    $(document).ready(function(){

    	var validator = $("#CreateForm").validate({
    		ignore: [], 
    		rules: {
                question: {
                    	required: function() 
	                    { CKEDITOR.instances.question.updateElement(); }
                    },
                answer: {
                    	required: function() 
	                    { CKEDITOR.instances.answer.updateElement(); }
                    }
                },
		    highlight: function(element) {
		        $(element).closest('fieldset').find('legend').addClass('text-danger');
		    },
		    unhighlight: function(element) {
		        $(element).closest('fieldset').find('legend').removeClass('text-danger');
		    },

	    	errorElement: 'span',
	    	errorClass: 'help-block',
	    	errorPlacement: function(error, element) {
	         return false;
	    	},
	    	submitHandler: function(form) {

			    form.submit();
			}
		});


    });
</script>
@stop

@section('js_footer')

{{HTML::script('assets/plugins/ckeditor/ckeditor.js')}}
<script type="text/javascript">

	function CkEditorURLTransfer(fnum,url) 
	{
	    window.parent.CKEDITOR.tools.callFunction(fnum, url, '');
	}

	$(function(){

		// Selectively replace <textarea> elements, based on custom assertions.
		CKEDITOR.replaceAll( function( textarea, config )
	    {
			config.filebrowserBrowseUrl= '{{URL::to("faq/browse")}}';
			config.filebrowserImageBrowseUrl = '{{URL::to("faq/browse")}}?type=Images';
		    config.filebrowserUploadUrl= '{{URL::to("faq/upload")}}';
		    config.filebrowserWindowWidth= '640';
		    config.filebrowserWindowHeight= '480';
	        config.height = 200;
	        config.skin = "office2013";
	    } );

		// $("#datatable").dataTable();
	});

</script>
@stop