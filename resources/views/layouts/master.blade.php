<!doctype html>
<html class="no-js" lang="en-US" prefix="og: http://ogp.me/ns#" itemscope itemtype="http://schema.org/Product">
    <head>
      @include('fragments.layout.head')
      @yield('head')
    </head>
    <body>
      @include('fragments.layout.browser-warning')

      <div class="container">
         <main class="main-content">
            <div class="wrapper">
               <header class="masthead">
                  <h1 class="masthead__logo"><a href="/" title="JoeCianflone.co">JoeCianflone.co</a></h1>
               </header>
               <section class="content" style="height: 5000px;">
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
