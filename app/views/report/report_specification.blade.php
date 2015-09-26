@extends('templates.master')
@section('title','Admin')

@section('content')

<div class="row">
    <div id="breadcrumb" class="col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('admin')}}">Admin</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-9 col-sm-9">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-file-o"></i>
                    <span>Module</span>
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

                <h4 class="page-header">ระบบครุภัณฑ์</h4>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <a href="{{URL::to('admin/durable/symptoms')}}"><i class="fa fa-list"></i> อาการส่งซ่อม</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 hide">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-gears"></i>
                    <span>System</span>
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
                <ul class="list-unstyled">
                    <li>
                        <h4><a href=""><i class="fa fa-gear"></i> ตั้งค่าระบบ</a> <small>ตั้งค่าทั่วไป</small></h4>
                    </li>
                    <li>
                        <h4><a href="{{URL::to('admin/privilege')}}"><i class="fa fa-check-square-o"></i> เพิ่มสิทธิ</a></h4>
                    </li>
                    <li>
                        <h4><a href=""><i class="fa fa-users"></i> ผู้ใช้ระบบ</a> <small>จัดการผู้ใช้ เพิ่ม ลบ แก้ไข</small></h4>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>






@stop