<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>DevOOPS</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="keyword" content="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{HTML::style('assets/plugins/bootstrap/bootstrap.css')}}
		{{HTML::style('assets/css/font-awesome.css')}}
		{{HTML::style('http://fonts.googleapis.com/css?family=Righteous')}}
		{{HTML::style('assets/css/style.css')}}

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="text-right hide">
				<a href="page_register.html" class="txt-default">Need an account?</a>
			</div>
			<div class="box">
				<div class="box-content">
					<form action="{{URL::to('auth/login')}}" method="post">
						<div class="text-center">
							<h3 class="page-header">INVENTORY2 Login Page</h3>
						</div>
						<div class="form-group">
							<label class="control-label">Username</label>
							<input type="text" class="form-control" name="username" />
						</div>
						<div class="form-group">
							<label class="control-label">Password</label>
							<input type="password" class="form-control" name="password" />
						</div>
						@if(Session::has('exception'))
				      	<div class="form-group">
				        	<div class="text-center">
				          	<span class="badge badge-error">{{ Session::get('exception') }}</span>
				        	</div>
				      	</div>
				      	@endif

						<div class="text-center">
							<button type="submit" class="btn btn-primary">Sign in</a>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
