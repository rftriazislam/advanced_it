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
                Section
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                    <span class="divider">/</span>
                </li>

                <li class="active">
                    + Section
                </li>

            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
        <div class="span10">
            <!-- BEGIN SAMPLE FORMPORTLET-->
            <div class="widget green">
                <div class="widget-title">
                    <h4> Section </h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <!-- BEGIN FORM-->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- BEGIN FORM-->
                    <form action="{{route('post_teacher')}}" method="post" class="form-horizontal">

                        @csrf
                        <div class="control-group">
                            <label class="control-label"> Teacher Name</label>
                            <div class="controls">
                                <select data-placeholder="Your Favorite Type of Bear" name="user_id" class="chzn-select-deselect span6"
                                    tabindex="-1" id="selCSI">

                                    <option selected="" disabled > Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"> Class Name</label>
                            <div class="controls">
                                <select data-placeholder="Your Favorite Type of Bear" name="class_id" class="chzn-select-deselect span6"
                                    tabindex="-1" id="selCSI">

                                    <option selected="" disabled> Select Class Name</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}"> class {{$class->class_number}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"> Subject Name</label>
                            <div class="controls">
                                <select data-placeholder="Your Favorite Type of Bear" name="subject" class="chzn-select-deselect span6"
                                    tabindex="-1" id="selCSI">

                                    <option selected="" disabled> Select Subject Name</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{$subject->subject_name}}">{{$subject->subject_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn">Cancel</button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
</div>
@endsection