


@extends('admin.master')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN THEME CUSTOMIZER-->
            <div id="theme-change" class="hidden-phone">
                <i class="icon-cogs"></i>
                <span class="settings">
                    <span class="text">Theme Color:</span>
                    <span class="colors">
                        <span class="color-default" data-style="default"></span>
                        <span class="color-green" data-style="green"></span>
                        <span class="color-gray" data-style="gray"></span>
                        <span class="color-purple" data-style="purple"></span>
                        <span class="color-red" data-style="red"></span>
                    </span>
                </span>
            </div>
            <!-- END THEME CUSTOMIZER-->
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
                Dashboard
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                    <span class="divider">/</span>
                </li>

                <li class="active">
                    Dashboard
                </li>

            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->


    <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN BASIC PORTLET-->
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> Class List</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                            </div>
                            <div class="widget-body">
                                <table class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i> ID</th>
                                        <th class="hidden-phosne"><i class="icon-class"></i> Class Name</th>
                                        <th><i class="icon-bookmark"></i> Teacher Name</th>
                                        <th><i class="icon-bookmark"></i>Assignment</th>
                                        <th><i class="icon-bookmark"></i>Subject</th>
                                        <th><i class="icon-bookmark"></i>Description</th>
                                        <th><i class="icon-bookmark"></i>Deadline</th>
                                        <th><i class="icon-bookmark"></i>Question</th>
                                        <th><i class="icon-bookmark"></i>Answer</th>
                                        <th><i class="icon-bookmark"></i></th>






                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                          @foreach($assignments as $assignment )
                                    <tr>
                                    <td><a href="#">{{$assignment->id}}</a></td>
                                <td>Class {{$assignment->section_info->class_info->class_number}} {{$assignment->section_info->section_name}}</td>
                                <td><span class="label label-important label-mini">{{$assignment->teacher_info->name}}</span></td>
                                <td><span class="label label-important label-mini">{{$assignment->assignment_name}}</span></td>
                             
                                <td><span class="label label-important label-mini">{{$assignment->subject}}</span></td>
                                <td><span class="label label-important label-mini">{{$assignment->description}}</span></td>
                                <td><span class="label label-important label-mini">{{$assignment->deadline}}</span></td>
                                <td><span class="label label-important label-mini"><a href="{{asset('Assignment/question')}}/{{$assignment->upload_question}}">Question</a></span></td>
                                <td><span class="label label-important label-mini"><a href="{{asset('Assignment/answer')}}/{{$assignment->upload_answer}}">Answer</a></span></td>


                                        <td>
                                            <button class="btn btn-success"><i class="icon-ok"></i></button>
                                            <button class="btn btn-primary"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="icon-trash "></i></button>
                                        </td>
                                    </tr>
                                  @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>


</div>
@endsection