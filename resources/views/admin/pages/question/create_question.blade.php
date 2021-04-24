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
                    <form action="{{route('post_question')}}" method="post" class="form-horizontal">

                        @csrf
                        <div class="control-group">
                            <label class="control-label">Question Number (Sri.No) </label>
                            <div class="controls">
                                <input type="number" name="question_number" class="span6 " />

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"> Exam Name</label>
                            <div class="controls">
                                <select id="class_id" data-placeholder="Your Favorite Type of Bear" name="exam_id"
                                    class="chzn-select-deselect span6" tabindex="-1" id="selCSI">

                                    <option selected="" disabled> Select Exam</option>
                                    @foreach($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->exam_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label">Question Name </label>
                            <div class="controls">
                                <input type="text" name="question_name" class="span6 " />

                            </div>
                        </div>
                   
                        <div class="control-group">
                            <label class="control-label">Question A</label>
                            <div class="controls">
                                <input type="text" required name="A" class="span6 " />

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Question A</label>
                            <div class="controls">
                                <input type="text" name="B" required class="span6 " />

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Question C</label>
                            <div class="controls">
                                <input type="text" required name="C" class="span6 " />

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Question D</label>
                            <div class="controls">
                                <input type="text" name="D" required class="span6 " />

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Question Answer</label>
                            <div class="controls">
                                <select data-placeholder="Your Favorite Type of Bear" name="answer"
                                    class="chzn-select-deselect span6" tabindex="-1" id="selCSI">

                                    <option selected=""> A</option>
                                    <option>B</option>
                                    <option> C</option>
                                    <option> D</option>


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