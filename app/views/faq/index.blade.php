@extends('templates.master')
@section('title','FAQ / คำถามที่พบบ่อย')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="{{URL::to('dashboard')}}">Dashboard</a></li>
			<li><a href="#">FAQ</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-question"></i>
					<span>FAQ / คำถามที่พบบ่อย</span>
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

				<a href="{{URL::to('faq/new')}}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i> Add new FAQ</a>

				<table class="table table-striped table-bordered table-hover table-heading no-border-bottom">
					<thead>
						
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>View</th>
							<th>Command</th>
						</tr>
					</thead>
					<tbody>
						@foreach($question as $q)
						<tr>
							<td>{{$q->question_id}}</td>
							<td><a href="{{URL::to('faq/edit/'.$q->question_id)}}">{{$q->title}}</a></td>
							<td>{{$q->view_count}}</td>
							<td></td>
						</tr>
						@endforeach
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>






@stop