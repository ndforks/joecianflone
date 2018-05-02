<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('page-title', 'JoeCianflone.co')</title>
<meta name="p:domain_verify" content="50d6eea83f06b39fe7b95c1624caf5b7">
<meta name="description" content="@yield('page-description')">

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Facebook tags, because you know you're gonna add them -->
<meta property="og:app_id" content="993597193996291">
<meta property="og:site_name" content="@yield('og-sitename', 'JoeCianflone')">
<meta property="og:title" content="@yield('og-title', 'Joe Cianflone | joecianflone.co')">
<meta property="og:type" content="@yield('og-type', 'website')">
<meta property="og:description" content="@yield('og-description')">
<meta property="og:image" content="@yield('og-image', 'https://pbs.twimg.com/profile_images/561226905815642113/Lv_DZLTF_400x400.jpeg')">

<!-- Because of course Twitter needs meta tags too -->
<meta name="twitter:card" content="summary">
<meta name="twitter:url" content="@yield('t-url', 'https://joecianflone.co')">
<meta name="twitter:title" content="@yield('t-title', 'Joe Cianflone | joecianflone.co')">
<meta name="twitter:description" content="@yield('t-description')">
<meta name="twitter:image" content="@yield('t-image', 'https://pbs.twimg.com/profile_images/561226905815642113/Lv_DZLTF_400x400.jpeg')">

<!-- loading up modernizr -->
<script src="/assets/js/modernizr.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,900,900italic,700,700italic,500,500italic' rel='stylesheet' type='text/css'>

<!-- loading up our css -->
<link rel="stylesheet" type="text/css" href="/assets/css/application.css">

@if (App::environment('production'))
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118593693-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-118593693-1');
    </script>
@endif
