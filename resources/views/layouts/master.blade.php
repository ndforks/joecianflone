<!doctype html>
<html class="no-js" lang="en-US" prefix="og: http://ogp.me/ns#" itemscope itemtype="http://schema.org/Product">
    <head>
      @include('fragments.layout.head')
      @yield('head')
    </head>
    <body class="@yield('signature')">
      @include('fragments.layout.browser-warning')

      <div class="container">
         <main class="main-content">
            <div class="wrapper">
               <header class="masthead__logo">
                  <h1 class="logo"><a href="{{ url('/') }}" data-click="logo" title="JoeCianflone.co">JoeCianflone.co</a></h1>
               </header>
               <section class="content">
                  @yield('main')
               </section>
            </div>
         </main>
         @include('fragments.layout.secondary')
      </div>
      @include('fragments.layout.scripts')
      @yield('scripts')
    </body>
</html>
