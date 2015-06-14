   <article class="post">
      <header class="post__header">
         <h1>{{ $element->content->headline }}</h1>
         <div class="meta-data--full">
            <ul class="meta-list">
               <li class="meta-list__item"><span class="fa fa-pencil-square"></span></li>
               <li class="meta-list__item">{{ $element->content->byline }}</li>
               <li class="meta-list__item"><time data-livestamp="{{ $element->item_created_at }}" datetime="{{ $element->item_created_at }}">{{ $element->item_created_at }}</time></li>
            </ul>
         </div>
      </header>
      <section class="post__body">
         {!! $element->content->summary !!}
         <p><a href="/article/{{ $element->slug }}" title="">Read More...</a></p>
      </section>
   </article>