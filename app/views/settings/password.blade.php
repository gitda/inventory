@extends('templates.master')

@section('content')
<div>
	<div class="row">
		<div id="breadcrumb" class="col-md-12">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/settings')}}">Settings</a></li>
				<li><a href="{{URL::to('/settings/account')}}">Change Password</a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
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
						<form method="post" action="{{URL::to('settings/account')}}" class="form-horizontal">
							<fieldset>

								<div class="form-group">

									<label class="col-sm-3 control-label">รหัสผ่านเดิม</label>
									<div class="col-sm-5">
										<input type="password" class="form-control" name="old_password" />
										@if($errors->has('old_password'))
										<span class='text-danger'><h5>{{$errors->first('old_password')}}</h5></span>
										@endif
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">รหัสผ่านใหม่</label>
									<div class="col-sm-5">
										<input type="password" class="form-control" name="password" />
										@if($errors->has('password'))
										<span class='text-danger'><h5>{{$errors->first('password')}}</h5></span>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">ยืนยันรหัสผ่านใหม่</label>
									<div class="col-sm-5">
										<input type="password" class="form-control" name="password_confirmation" />
										@if($errors->has('password_confirmation'))
										<span class='text-danger'><h5>{{$errors->first('password_confirmation')}}</h5></span>
										@endif
									</div>
								</div>

								
							</fieldset>
						
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-3">

									<button type="submit" class="btn btn-primary">Submit</button>
									{{$msg or ''}}
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@stop
