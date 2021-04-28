@extends('admin.master')
@section('style')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js">
</script>
<script type="text/javascript">
if (window.location.search !== '') {
    var urlParams = window.location.search;
    if (urlParams[0] == '?') {
        urlParams = urlParams.substr(1, urlParams.length);
        urlParams = urlParams.split('&');
        for (i = 0; i < urlParams.length; i = i + 1) {
            var paramVariableName = urlParams[i].split('=')[0];
            if (paramVariableName === 'language') {
                _wrs_int_langCode = urlParams[i].split('=')[1];
                break;
            }
        }
    }
}
</script>
<script type="text/javascript" src="{{asset('back_end/editor')}}/math_ckeditor/ckeditor4/ckeditor.js"></script>

<!-- Style for html code -->
<link type="text/css" rel="stylesheet" href="{{asset('back_end/editor')}}/math_ckeditor/css/prism.css" />

<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
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

   

        @foreach($questions as $question)

        <h4> Question.No   {{$loop->index+1}}</h5>
    <div class="row-fluid">  

    <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN NOTIFICATION PORTLET-->
                <div class="widget red">
                    <div class="widget-title">
                        <h4> Exams No {{$loop->index+1}}</h4>

                    </div>
                    <div class="widget-body">


                        <div class="alert alert-block alert-info fade in">
                        
                            <p class="alert-heading">
                            @php
                           echo $question->question_name
                           @endphp 
                            </p>
                         
                            
                        </div>
                       
                        <div class="alert alert-block alert-success fade in">
 <p>Answer: {{$question->answer}} </p>
                        </div>
                    </div>
                </div>
                <!-- END NOTIFICATION PORTLET-->
            </div>
        </div>

        <div class="row-fluid">

            <div class="span6">
                <!-- BEGIN widget widget-->
                <div class="widget">
                    <div class="widget-title">
                        <h4> A</h4>
                        <div class="actions">
                                <a href="{{route('question_edit',[$question->id])}}" class="btn btn-success"><i class="icon-pencil"></i> Edit</a>
                                <a href="{{route('question_delete',[$question->id])}}" class="btn btn-primary"><i class="icon-plus"></i> Delete</a>
                            </div>
                    </div>
                    <div class="widget-body">
                        <div class="portlet-scroll-1">
                        @php
                           echo $question->A
                           @endphp 
                        </div>
                    </div>
                </div>
                <!-- END widget widget-->
            </div>
            <div class="span6 ">
                <!-- BEGIN widget widget-->
                <div class="widget orange">
                    <div class="widget-title">
                        <h4> B</h4>

                    </div>
                    <div class="widget-body">
                        <div class="portlet-scroll-1">
                           
                            @php
                           echo $question->B
                           @endphp 
                        </div>
                    </div>
                </div>
                <!-- END widget widget-->
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 ">
                <!-- BEGIN widget widget-->
                <div class="widget orange">
                    <div class="widget-title">
                        <h4> C</h4>

                    </div>
                    <div class="widget-body">
                        <div class="portlet-scroll-1">
                                 
                            @php
                           echo $question->C
                           @endphp 
                        </div>
                    </div>
                </div>
                <!-- END widget widget-->
            </div>
            <div class="span6">
                <!-- BEGIN widget widget-->
                <div class="widget">
                    <div class="widget-title">
                        <h4> D</h4>

                    </div>
                    <div class="widget-body">
                        <div class="portlet-scroll-1">
                           
                            @php
                           echo $question->D
                           @endphp 
                        </div>
                    </div>
                </div>
                <!-- END widget widget-->
            </div>
        </div>

        
    </div>
    @endforeach
</div>


@endsection


@section('js')

<script type="text/javascript" src="{{asset('back_end/editor')}}/math_ckeditor/js/wirislib.js"></script>




@endsection

