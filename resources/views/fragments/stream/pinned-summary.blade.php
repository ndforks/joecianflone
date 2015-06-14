   <article class="pinned">
      <header class="pinned__header">
         <p><strong>FEATURED</strong></p>
         <h1>{{ $pinned->content->headline }}</h1>
         <div class="meta-data--full">
            <ul class="meta-list">
               <li class="meta-list__item"><span class="fa fa-thumb-tack"></span></li>
               <li class="meta-list__item">{{ $pinned->content->byline }}</li>
               <li class="meta-list__item"><time data-livestamp="{{ $pinned->item_created_at }}" datetime="{{ $pinned->item_created_at }}">{{ $pinned->item_created_at }}</time></li>
            </ul>
         </div>
      </header>
      <section class="pinned__body">
         {!! $pinned->content->summary !!}
         <p><a href="/article/{{ $pinned->slug }}" title="">Read More...</a></p>
      </section>
   </article>