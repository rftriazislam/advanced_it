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
                    <li class="pull-right search-wrap">
                        <form action="search_result.html" class="hidden-phone">
                            <div class="input-append search-input-area">
                                <input class="" id="appendedInputButton" type="text">
                                <button class="btn" type="button"><i class="icon-search"></i> </button>
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-block-orange">
                    <a data-original-title="" href="#">
                        <i class="icon-user"></i>
                        <div class="info">321</div>
                        <div class="status">New User</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href="#">
                        <i class="icon-tags"></i>
                        <div class="info">+970</div>
                        <div class="status">Sales</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="#">
                        <i class="icon-comments-alt"></i>
                        <div class="info">49</div>
                        <div class="status">Comments</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-green double">
                    <a data-original-title="" href="#">
                        <i class="icon-eye-open"></i>
                        <div class="info">+897</div>
                        <div class="status">Unique Visitor</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="#">
                        <i class="icon-bar-chart"></i>
                        <div class="info">+288</div>
                        <div class="status">Update</div>
                    </a>
                </div>
            </div>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="#">
                        <i class="icon-shopping-cart"></i>
                        <div class="info">29</div>
                        <div class="status">New Order</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue double">
                    <a data-original-title="" href="#">
                        <i class="icon-tasks"></i>
                        <div class="info">$37624</div>
                        <div class="status">Stock</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="#">
                        <i class="icon-envelope"></i>
                        <div class="info">123</div>
                        <div class="status">Messages</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-brown">
                    <a data-original-title="" href="#">
                        <i class="icon-remove-sign"></i>
                        <div class="info">34</div>
                        <div class="status">Cancelled</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-grey ">
                    <a data-original-title="" href="#">
                        <i class="icon-external-link"></i>
                        <div class="info">$53412</div>
                        <div class="status">Total Profit</div>
                    </a>
                </div>
            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>

        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->


@endsection