<section class="secondary-content js-secondary-content">
   <div class="wrapper js-wrapper">
      <a href="#" class="menu-toggler js-menu-toggler" title="Toggle Sidebar">
         <span class="menu-toggler__bars fa fa-bars"></span>
         <span class="menu-toggler__text">nav</span>
      </a>
      <div class="js-toggle-hide">
         <nav>
            <ul class="navigation-list">
               <li class="navigation-list__item"><a class="stream" href="{{ url('/') }}">stream</a>
                  <ul class="navigation-list--secondary">
                     <li class="navigation-list__item"><a class="article" href="{{ url('/stream/articles') }}">#articles</a></li>
                     <li class="navigation-list__item"><a class="tweets" href="{{ url('/stream/tweets') }}">#tweets</a></li>
{{--                      <li class="navigation-list__item"><a class="github" href="/stream/github">#github</a></li>
                     <li class="navigation-list__item"><a class="videos" href="/stream/videos">#videos</a></li> --}}
                  </ul>
               </li>
               <li class="navigation-list__item"><a class="about" href="/about">about</a></li>
            </ul>
            <hr class="rule--nav">
            <ul class="navigation-list">
               <li class="navigation-list__item"><a href="#" class="projects">projects &amp; contributions</a>
                  <ul class="navigation-list--secondary">
                     <li class="navigation-list__item"><a class="heisenberg" href="//github.com/joecianflone/heisenberg-toolkit" target="_blank">Heisenberg</a></li>
                     <li class="navigation-list__item"><a class="laravel-sass" href="//github.com/joecianflone/laravel-elixir-sass-compass"  target="_blank">Laravel Elixir Compass Plugin</a></li>
                  </ul>
               </li>
            </ul>
            <hr class="rule--nav">
            <ul class="navigation-list--icons">
               <li class="navigation-list__item"><a href="//twitter.com/JoeCianflone" target="_blank" title="Twitter"><span class="fa fa-twitter"></span></a></li>
               <li class="navigation-list__item"><a href="//github.com/JoeCianflone" target="_blank" title="Github"><span class="fa fa-github"></span></a></li>
               <li class="navigation-list__item"><a href="//livecoding.tv/joecianflone" target="_blank" title="LiveCoding.tv"><span class="fa fa-code"></span></a></li>
               <li class="navigation-list__item"><a href="{{ url('/feed') }}" title="RSS Feed"><span class="fa fa-rss"></span></a></li>
{{--                <li class="navigation-list__item"><a href="//youtube.com/JoeCianflone" target="_blank" title="YouTube"><span class="fa fa-youtube"></span></a></li>
               <li class="navigation-list__item"><a href="/contact" title="Contact"><span class="fa fa-envelope"></span></a></li> --}}
            </ul>
         </nav>
         <footer>
            <p>The content on this site is mine alone. The views expressed herein do not necessarily reflect the views of my employers clients.</p>
            <p>This work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License.</p>
         </footer>
      </div>
   </div>
</section>
