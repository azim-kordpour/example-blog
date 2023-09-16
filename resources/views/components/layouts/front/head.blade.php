<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="stylesheet" href="{{asset('/ui/airspace/plugins/bootstrap/bootstrap.min.css')}}" wire:ignore>
    <link rel="stylesheet" href="{{asset('/ui/airspace/plugins/Ionicons/css/ionicons.min.css')}}" wire:ignore>
    <link rel="stylesheet" href="{{asset('/ui/airspace/css/style.css')}}" wire:ignore>
    @yield('headerStylesheets')
    @yield('headerScripts')
</head>
