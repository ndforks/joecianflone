<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset("/assets/js/jquery.min.js") }}"><\/script>')</script>
<script src="{{ asset('/assets/js/app.min.js') }}"></script>

@if (App::environment('production'))
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118593693-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-118593693-1');
    </script>
@endif
