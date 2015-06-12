@extends ('layouts.master')

@section('main')
{{--
   @foreach ($stream as $item)
      <p>{{ var_dump($item) }}</p>
   @endforeach
   --}}

   <article>
      <blockquote class="tweet">
         <p>Between PuPHPet and Phansible, we now have multiple ways to create virtual machines that we can destroy without understanding why :P</p>
      </blockquote>
   </article>
   <hr class="rule">
   <article class="post">
      <header class="post__header">
         <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
         <div class="post__metadata">
            <p><time datetime="2011-01-12">January 12th, 2011</time></p>
            <ul class="share-list">
               <li class="share-list__item"><span class="fa fa-twitter"></span></li>
               <li class="share-list__item"><span class="fa fa-facebook"></span></li>
            </ul>
         </div>
      </header>
      <section class="post__body">
         <p>Duis vestibulum dapibus auctor. Praesent vulputate ultrices lectus nec malesuada. Donec posuere nulla leo, eget gravida est ultricies a. Aliquam laoreet diam nec ex vulputate ullamcorper. Nam rhoncus fermentum imperdiet. Nulla et purus arcu. Ut arcu ex, sagittis posuere euismod nec, facilisis vitae ipsum. Fusce dapibus nisi eget turpis</p>
      </section>
   </article>
@stop
