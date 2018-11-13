<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        window.onload = function () {
        CKEDITOR.replace( 'article-ckeditor' );
        };
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
 .tweet{
                padding: 9px 12px;
                border-bottom: 1px #e6ecf0 solid;
                cursor: pointer;
                width: 100%;
                background-color: white;
                min-height: 51px;
                
            }
            .tweet:hover{
                background-color: #f5f8fa;
                transition: background .1s linear;
                
            }
            .tweet-profile-pic{
                
                width: 48px;
                min-height: 100%;
                border-radius: 50%;
                overflow: hidden;
                float: left;
                
            }
            .avatar-pic{
                width: 50px;
                height: 50px;
                
            }
            .profile-info{
                padding: 5px;
                float: right;
                width:90%;
                height: 14px;
                text-align: left;
                color: #657786;
                font-size: 14px;
            }
            .content{
                font-size: 15px;
                padding: 5px;
                text-align: left;
                margin-top: 10px;
                overflow: hidden;
                width: 90%;
                float: right;
                min-height: 40px;
                
            }
            .tweet-username{
                color: black;
                font-weight: 700;
                text-decoration: underline;
                
            }
            .tweet-pic{
                float: right;
                overflow: hidden;
                min-width: 90%;
                
            }
            .tweet-bottom{
                text-align: left;
                padding-left: 50px;
                overflow: hidden;
                min-width: 90%;
                max-width: 100%;
                outline: 0;
            }
            .tweet-icons-bottom{
                cursor: pointer;
                background-color: transparent;
                border: 0;
                outline-width: 0;

        </style>
</head>
<body>
     @include('inc.navbar')
      <div id="app">
        

        <main class="py-4">
            <div class="container" >
                @include('inc.messages')
                 @yield('content')
                 
    
            </div>
        </main>
    </div>
    
</body>
</html>
