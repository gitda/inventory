@extends('templates.master')

@section('content')
	<div class="row">
		<div id="breadcrumb" class="col-md-12">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Dashboard</a></li>
				<li><a href="{{URL::to('/notification')}}">Notification</a></li>
			</ol>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<div class="box">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-question"></i>
						<span>Notification Example</span>
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

					<div class="box-content">
						<form method="post" action="{{URL::to('notification/new')}}" class="form-horizontal">
							<fieldset>
								<legend>Notification Example</legend>
								<div class="form-group">
									<label class="col-sm-3 control-label">Type</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="type" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Subject</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="subject" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Body</label>
									<div class="col-sm-5">
										<textarea class="form-control" name="body" rows="5"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">User</label>
									<div class="col-sm-5">
										<select class="form-control" name="user">
											<option value="">-- ทุกคน --</option>
											@foreach ($technic as $key => $value)
											<option value="{{$key}}">{{$value}}</option>
											@endforeach
										</select>
									</div>
								</div>
								
							</fieldset>
						
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-3">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@stop
