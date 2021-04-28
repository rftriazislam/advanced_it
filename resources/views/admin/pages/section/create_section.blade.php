@extends('admin.master')
@section('style')


@endsection
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
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- BEGIN FORM-->
                    <form action="{{route('post_section')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="control-group">
                            <label class="control-label"> Class Name</label>
                            <div class="controls">
                                <select id="class_id" name="class_id" data-placeholder="Your Favorite Type of Bear"
                                    class="chzn-select-deselect span6" tabindex="-1" id="selCSI">
                                    <option selected="" disabled>Select Class</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}"> class {{$class->class_number}}</option>
                                    @endforeach

                                </select>
                            </div>
                            @error('class_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label class="control-label"> Defualt Teacher</label>
                            <div class="controls">
                                <select id="teacher" name="teacher_id" data-placeholder="Your Favorite Type of Bear"
                                    class="chzn-select-deselect span6" tabindex="-1" id="selCSI">


                                </select>
                            </div>
                            @error('teacher_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="control-group">
                            <label class="control-label"> Section Name</label>
                            <div class="controls">
                                <select data-placeholder="Your Favorite Type of Bear" name="section_name"
                                    class="chzn-select-deselect span6" tabindex="-1" id="selCSI">

                                    <option selected=""> A</option>
                                    <option>B</option>
                                    <option> C</option>
                                    <option> D</option>
                                    <option> E</option>
                                    <option> F</option>
                                    <option>G</option>
                                    <option> H</option>
                                    <option> I</option>
                                    <option> J</option>
                                    <option> K</option>
                                    <option> L</option>

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


<script type=text/javascript>
$('#class_id').change(function() {
    var class_id = $(this).val();
    if (class_id) {
        $.ajax({
            type: "GET",
            url: "{{url('get-teacher-list')}}?class_id=" + class_id,
            dataType: "json",

            success: function(res) {


                if (res) {



                    $("#teacher").empty();
                    $("#teacher").append('<option selected="" disabled>Select Teacher</option>');
                    $("#teacher").append(res.load);
                    //   $.each(res,function(key,value,subject){
                    //     $("#teacher").append('<option value="'+key+'">'+value+' '+subject+'</option>');
                    //   });

                } else {
                    $("#teacher").empty();

                }
            }
        });
    } else {

        $("#teacher").empty();

    }
});
</script>
@endsection
@section('js')


@endsection