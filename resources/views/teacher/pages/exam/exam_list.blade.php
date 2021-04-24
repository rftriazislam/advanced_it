


@extends('teacher.master')
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
                                        <th><i class="icon-bookmark"></i> Section Name</th>

                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td><a href="#">1</a></td>
                                        <td>One </td>
                                        <td><span class="label label-important label-mini">Class 1</span></td>
                                        <td><span class="label label-important label-mini">No Group</span></td>
                                        <td>
                                            <button class="btn btn-success"><i class="icon-ok"></i></button>
                                            <button class="btn btn-primary"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="icon-trash "></i></button>
                                        </td>
                                    </tr>
                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC PORTLET-->
                    </div>
                </div>


</div>
@endsection