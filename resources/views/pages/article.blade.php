@extends ('layouts.master')

@section('main')
   <article class="post">
      <header class="post__header">
         <h1>{{ $element->content->headline }}</h1>
         <div class="meta-data--full">
            <ul class="meta-list">
               <li class="meta-list__item"><span class="fa fa-pencil-square"></span></li>
               <li class="meta-list__item">{{ $element->content->byline }}</li>
               <li class="meta-list__item"><time data-livestamp="{{ $element->item_created_at }}" datetime="{{ $element->item_created_at }}">{{ $element->item_created_at }}</time></li>
               <li class="meta-list__item"><strong>SHARE</strong>: <a href="#" title=""><span class="fa fa-twitter"></span></a> &nbsp;&nbsp; <a href="#" title=""><span class="fa fa-facebook"></span></a></li>
            </ul>
         </div>
      </header>
      <section class="post__body">
         {!! $element->content->body !!}
      </section>
   </article>
@stop
