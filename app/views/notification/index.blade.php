@extends('templates.master')

@section('content')
<div id="messages" class="container-fluids">
	<div class="row">
		<div id="breadcrumb" class="col-md-12">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Dashboard</a></li>
				<li><a href="{{URL::to('/notification')}}">Notification</a></li>
				<li><a href="{{URL::to('/notification/new')}}">ทดสอบ</a></li>
			</ol>
		</div>
	</div>
	<div class="row" id="test">
		<div class="col-xs-12">
			<div class="row">

				<div id="messages-list" class="col-xs-12">

				@foreach ($unreadNotifications as $notify)
				
				
					<div class="row one-list-message msg-inbox-item">

						<div class="col-xs-2 text-left">
							<div class="col-xs-2 text-left">
							@if($notify->is_read==1)
								<i class="fa fa-file-o"></i>
							@else
								<i class="fa fa-file"></i>
							@endif
							</div>
							<div class="col-xs-10 checkbox">
								 {{$notify->type}}
							</div>
						</div>
						<div class="col-xs-8 message-title"><b>
						<a href="{{URL::to('notification/read/'.Crypt::encrypt($notify->id))}}">{{$notify->subject}}</a></b> 
						{{$notify->body}}
						</div>
						<div class="col-xs-2 message-date">{{Helpers\Helper::toDateThai($notify->sent_at, $form='Y-m-d H:i:s', $to='d/m/y')}}</div>
					</div>
				@endforeach
					
				</div>
			</div>
		</div>
	</div>
</div>


@stop
