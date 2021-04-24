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
                    <h4> Schedule </h4>
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
                    <form action="{{route('post_assignment')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        @csrf
                        <div class="control-group">
                            <label class="control-label"> Class Name</label>
                            <div class="controls">
                                <select id="class_id" data-placeholder="Your Favorite Type of Bear" name="class_id"
                                    class="chzn-select-deselect span6" tabindex="-1" id="selCSI">

                                    <option selected="" disabled> Select Class</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}">Class {{$class->class_number}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"> Section name</label>
                            <div class="controls">
                                <select id="section" name="section_id" data-placeholder="Your Favorite Type of Bear"
                                    class="chzn-select-deselect span6" tabindex="-1" id="selCSI">



                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                                <label class="control-label">Assignment Name </label>
                                <div class="controls">
                                    <input type="text" required name="assignment_name" class="span6 " />
                              
                                </div>
                            </div>
                        <div class="control-group">
                            <label class="control-label">Subject </label>
                            <div class="controls">
                                <input type="text" required name="subject" class="span6 " />

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Deadline</label>

                            <div class="controls">
                                <div class="input-append bootstrap-timepicker">
                                    <input  type="date" required name="deadline" class="input-large">
                                    <span class="add-on"><i class="icon-time"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <textarea class="span6 " name="description" required rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Upload Question</label>
                            <div class="controls">
                                <div data-provides="fileupload" class="fileupload fileupload-new">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="icon-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-file">
                                            <span class="fileupload-new">Select file</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" name="upload_question" class="default" required>
                                        </span>
                                        <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                    </div>
                                </div>
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


@section('js')
<script type=text/javascript>
$('#class_id').change(function() {
    var class_id = $(this).val();
    if (class_id) {
        $.ajax({
            type: "GET",
            url: "{{url('get-section-list')}}?class_id=" + class_id,


            success: function(res) {
                if (res) {
                    $("#section").empty();
                    $("#section").append('<option selected="" disabled>Select Section</option>');
                    $.each(res, function(key, value) {
                        $("#section").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {
                    $("#section").empty();

                }
            }
        });
    } else {

        $("#section").empty();

    }
});
</script>
@endsection