<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="BaltiCrypto ICO">
  <meta name="keywords" content="BaltiCrypto ICO">
  <meta name="author" content="BaltiCrypto ICO">
  <!-- <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon"/>
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon"/>  -->
  <link rel="icon" href="{{asset('assets/images/menu-logo.png')}}" type="image/x-icon"/>
  <link rel="shortcut icon" href="{{asset('assets/images/menu-logo.png')}}" type="image/x-icon"/>
  <title>@yield('title')</title>
    @include('layouts.head')
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
    @include('layouts.header')
    <div class="dashboard-wrapper">
      @include('layouts.sidebar')
      @yield('content')
    </div>
    @include('layouts.footerScript')
    <script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0074/2778.js" async="async"></script>
  </body>
  
</html>

