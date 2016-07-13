   <article class="post--featured">
      <header class="post__header">
         <h1><a href="/article/{{ $pinned->slug }}" title="{{ $pinned->content->headline }}">{{ $pinned->content->headline }}</a></h1>
         <div class="meta-data--full">
            <ul class="meta-list">
               <li class="meta-list__item"><span class="fa fa-thumb-tack"></span></li>
               <li class="meta-list__item">{{ $pinned->content->byline }}</li>
               <li class="meta-list__item"><time data-livestamp="{{ $pinned->item_created_at }}" datetime="{{ $pinned->item_created_at }}">{{ $pinned->item_created_at }}</time></li>
            </ul>
         </div>
      </header>
      <section class="post__body">
         {!! $pinned->content->summary !!}
         <p class="post__read-more"><a href="/article/{{ $pinned->slug }}" title="">Read More...</a></p>
      </section>
   </article>
