<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
           _______ _      _        _                    
 |__   __(_)    | |      | |                   
    | |   _  ___| | _____| |_ __ _ _ __   __ _ 
    | |  | |/ __| |/ / _ \ __/ _` | '_ \ / _` |
    | |  | | (__|   <  __/ || (_| | | | | (_| |
    |_|  |_|\___|_|\_\___|\__\__,_|_| |_|\__,_|
        -->
        <title>{{{$organiser->name}}} - Ticketana.com</title>


        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0" />


        <!-- Open Graph data -->
        <meta property="og:title" content="{{{$organiser->name}}}" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="{{URL::to('')}}" />
        <meta property="og:image" content="{{URL::to($organiser->full_logo_path)}}" />
        <meta property="og:description" content="{{{Str::words(strip_tags($organiser->description)), 20}}}" />
        <meta property="og:site_name" content="Attendize.com" />
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

       <!--Style-->
    {!!Html::style('assets/stylesheet/main.css?'.time()) !!}
    {!!Html::style('assets/stylesheet/icons/iconfont/style.css?v=3s') !!}
    {!!Html::style('assets/stylesheet/style.css?v=3s') !!}
    <!--/Style-->
        @yield('head')
    </head>
    <body class="attendize">
        @include('Shared.Layouts.Header')
        @include('Shared.Partials.FacebookSdk')
        <div id="organiser_page_wrap">
            @yield('content')
        </div>

        @include('Shared.Layouts.Footer')
        <a href="#intro" style="display:none;" class="totop"><i class="ico-angle-up"></i>
            <span style="font-size:11px;">@lang("basic.TOP")</span></a>

        @include("Shared.Partials.LangScript")
        {!!Html::script('assets/javascript/frontend.js')!!}

        @include('Shared.Partials.GlobalFooterJS')
        @yield('foot')
</body>
</html>
