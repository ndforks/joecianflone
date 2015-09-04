<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('page-title', 'JoeCianflone.co')</title>
<meta name="description" content="@yield('page-description')">

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google+ because that one asshat in your company is gonna ask about it -->
<meta itemprop="name" content="@yield('gplus-name')">
<meta itemprop="description" content="@yield('gplus-description')">
<meta itemprop="image" content="@yield('gplus-image')">

<!-- Facebook tags, because you know you're gonna add them -->
<meta property="og:site_name" content="@yield('og-sitename')">
<meta property="og:title" content="@yield('og-title')">
<meta property="og:type" content="@yield('og-type')">
<meta property="og:description" content="@yield('og-description')">
<meta property="og:image" content="@yield('og-image')">

<!-- Because of course Twitter needs meta tags too -->
<meta name="twitter:card" content="summary">
<meta name="twitter:url" content="@yield('t-url')">
<meta name="twitter:title" content="@yield('t-title')">
<meta name="twitter:description" content="@yield('t-description')">
<meta name="twitter:image" content="@yield('t-image')">

<!-- loading up modernizr -->
<script src="/assets/js/modernizr.min.js"></script>

<!-- import some Google fonts...loading them this way means no flash of unstyled fonts -->


<!-- loading up our css -->
<link rel="stylesheet" type="text/css" href="/assets/css/application.css">
