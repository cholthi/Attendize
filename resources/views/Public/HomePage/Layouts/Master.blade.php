<html>
    <head>

        <title>@yield('title')</title>

        @include('Shared/Layouts/ViewJavascript')

        @include('Shared.Partials.GlobalMeta')

        <!--JS-->
       {!! Html::script('vendor/jquery/dist/jquery.min.js') !!}
       {!! Html::script('vendor/bootstrap/dist/js/bootstrap.min.js') !!}
        <!--/JS-->

        <!--Style-->
        {!!Html::style('assets/stylesheet/main.css?v=3') !!}
        {!!Html::style('assets/stylesheet/icons/iconfont/style.css?v=3') !!}
        {!!Html::style('assets/stylesheet/style.css?v=3s') !!}
        <!--/Style-->

        @yield('head')

    </head>
    <body>
      @include('Public.HomePage.Partials.Nav')
        <section id="main" role="main">
            <section class="container">
                @yield('content')
            </section>

        </section>
        <div style="text-align: center; color: white" >
        </div>

        @include("Shared.Partials.LangScript")
        {!! Html::script('assets/javascript/main.js') !!}
        {!!Html::script('assets/javascript/frontend.js')!!}
    </body>
    @include('Shared.Partials.GlobalFooterJS')
</html>
