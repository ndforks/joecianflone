<article data-id="{{ $element->item_id }}">
   <blockquote class="tweet-block" cite="{{$element->content->retweeted_status->user->screen_name or 'JoeCianflone' }}">
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
             @if ($element->content->retweeted)
                 <p class="tweet-block__text">
                    @if (isset($element->content->retweeted_status->full_text))
                        {!! Twitter::linkify($element->content->retweeted_status->full_text) !!}
                    @else
                        {!! Twitter::linkify($element->content->retweeted_status->text) !!}
                    @endif
                 </p>
             @else
                 <p class="tweet-block__text">
                    @if (isset($element->content->full_text))
                        {!! Twitter::linkify($element->content->full_text) !!}
                    @else
                        {!! Twitter::linkify($element->content->text) !!}
                    @endif
                </p>
             @endif
         </div>
         @if (isset($element->content->entities->media))
            <div class="meta-data--inside">
         @else
             <div class="meta-data--full">
         @endif
               <ul class="meta-list">
                  @if ($element->content->retweeted)
                      <li class="meta-list__item"><span class="fa fa-retweet" aria-hidden="true"></span></li>
                  @else
                      <li class="meta-list__item"><span class="fa fa-twitter"></span></li>
                  @endif
                  <li class="meta-list__item"><a href="//twitter.com/statuses/{{$element->item_id}}" title="">&#64;{{$element->content->retweeted_status->user->screen_name or 'JoeCianflone' }}</a></li>
                  <li class="meta-list__item"><time data-livestamp="{{ $element->item_created_at }}" datetime="{{ $element->item_created_at }}">{{ $element->item_created_at }}</time></li>
               </ul>
            </div>
      </div>
   </blockquote>
</article>
