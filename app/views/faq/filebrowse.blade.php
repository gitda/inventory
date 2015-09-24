<!DOCTYPE html>
<html>
<head>
	<title></title>

	{{HTML::style('assets/css/bootstrap.min.css')}}

	<script type="text/javascript">
	function insert_url(fnnum,url)
	{
	     window.close();
	     window.opener.CkEditorURLTransfer(fnnum,url);
	}

	</script>
	<style type="text/css">
	.img-thumbnail{
		margin: 10px;
	}
	</style>
</head>
<body>

<div class="container">
	<div class="row">


		<div class="col-lg-12">
			@foreach($files as $file)

			<a href="#" onclick="insert_url({{$fnnumber}},'{{asset('assets/ckeditor/upload/original/'.$file)}}')" class="img-thumbnail">
				<img src="{{asset('assets/ckeditor/upload/thumbnail/'.$file)}}" class="media-item-image" />
			</a>
			@endforeach
		</div>
	</div>

</div>
</body>
</html>