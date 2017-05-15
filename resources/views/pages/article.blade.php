@extends ('layouts.master')

@section('page-title', $element->content->headline . "| Joe Cianflone | joecianflone.co")
@section('description', $element->content->summary)

@section('og-sitename', 'joecianflone.co')
@section('og-title', $element->content->headline)
@section('og-description', $element->content->summary)

@section('t-url', 'https://joecianflone.co/article/'.$element->slug)
@section('t-title', $element->content->headline)
@section('t-description', $element->content->summary)

@section('main')
   <article class="post">
      <header class="post__header">
         <h1>{{ $element->content->headline }}</h1>
         <div class="meta-data--full">
            <ul class="meta-list">
               <li class="meta-list__item"><span class="fa fa-pencil-square"></span></li>
               <li class="meta-list__item">{{ $element->content->byline }}</li>
               <li class="meta-list__item"><time data-livestamp="{{ $element->item_created_at }}" datetime="{{ $element->item_created_at }}">{{ $element->item_created_at }}</time></li>
               <li class="meta-list__item--share">
                   <strong>SHARE</strong>:
                   <a href="//twitter.com/share?text={{ $element->content->headline }}&amp;url=https://joecianflone.co/article/{{$element->slug}}&amp;via=JoeCianflone" title="Share on twitter"><span class="fa fa-twitter"></span></a> &nbsp;&nbsp;
                   <a href="//www.facebook.com/dialog/feed?app_id=993597193996291&amp;display=popup&amp;caption={{$element->content->headline}}&amp;link=https://joecianflone.co/article/{{$element->slug}}" title="Share on Facebook"><span class="fa fa-facebook"></span></a>
                </li>
            </ul>
         </div>
      </header>
      <section class="post__body">
          {{ $element->content->summary }}
          {!! $element->content->body !!}
      </section>
   </article>
@stop
