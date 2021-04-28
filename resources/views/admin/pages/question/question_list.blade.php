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
            <div class="widget">
                <div class="widget-title">
                    <h4><i class="icon-th-large"></i> Exam Type </h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <!--BEGIN METRO STATES-->
                    <div class="row-fluid">
                        <!--BEGIN METRO STATES-->
                        <div class="metro-nav">
                           @foreach($exams as $exam)
                        
                            <div class="metro-nav-block nav-block-orange" style="width: 19%;">
                                <a data-original-title="" href="{{route('question_view',[$exam->id])}}">
                                    <div >{{$exam->exam_name}}</div>
                                    <br>
                                    <div >{{$exam->subject}}</div>
                                    <div class="info"> Q {{$exam->total_question}}</div>
                                    <div class="status">{{$exam->date}}</div>
                                </a>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <!--END METRO STATES-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection