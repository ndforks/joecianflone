<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset("/assets/js/jquery.min.js") }}"><\/script>')</script>
<script src="{{ asset('/assets/js/app.min.js') }}"></script>

@if (App::environment('production'))
   <script>
      !function(g,s,q,r,d){r=g[r]=g[r]||function(){(r.q=r.q||[]).push(
      arguments)};d=s.createElement(q);q=s.getElementsByTagName(q)[0];
      d.src='//d1l6p2sc9645hc.cloudfront.net/tracker.js';q.parentNode.
      insertBefore(d,q)}(window,document,'script','_gs');
      _gs('GSN-631676-F');
   </script>
@endif
