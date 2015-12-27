<article data-id="{{ $element->item_id }}">
   <blockquote class="tweet" cite="{{$element->content->retweeted_status->user->screen_name or 'JoeCianflone' }}">
      <div class="mediabox">
         @if (isset($element->content->entities->media))
            <div class="mediabox__visual">
               @foreach ($element->content->entities->media as $item)
                  @if ($item->type === "photo")
                     <img height="{{ $item->sizes->small->h }}" width="{{$item->sizes->small->w}}" src="{{ $item->media_url_https }}" alt="">
                  @endif
               @endforeach
            </div>
         @endif
         <div class={!! isset($element->content->entities->media) ? "mediabox__text" : "mediabox__text--full" !!}>
            <p class="tweet__text">{!! Twitter::linkify($element->content->text) !!}</p>
         </div>
         @if (isset($element->content->entities->media))
            <div class="meta-data--inside">
               <ul class="meta-list">
                  <li class="meta-list__item"><span class="fa fa-twitter"></span></li>
                  <li class="meta-list__item">{{$element->content->retweeted_status->user->screen_name or 'JoeCianflone' }}</li>
                  <li class="meta-list__item"><time data-livestamp="{{ $element->item_created_at }}" datetime="{{ $element->item_created_at }}">{{ $element->item_created_at }}</time></li>
               </ul>
            </div>
         @endif
      </div>
      @if (! isset($element->content->entities->media))
         <div class="meta-data--full">
            <ul class="meta-list">
               <li class="meta-list__item"><span class="fa fa-twitter"></span></li>
               <li class="meta-list__item">{{$element->content->retweeted_status->user->screen_name or 'JoeCianflone' }}</li>
               <li class="meta-list__item"><time data-livestamp="{{ $element->item_created_at }}" datetime="{{ $element->item_created_at }}">{{ $element->item_created_at }}</time></li>
            </ul>
         </div>
      @endif
   </blockquote>
</article>
