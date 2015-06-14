<article data-id="{{ $element->item_id }}">
   <blockquote class="tweet" cite="{{$element->content->retweeted_status->user->screen_name or 'JoeCianflone' }}">
      <p class="tweet__text">{!! Twitter::linkify($element->content->text) !!}</p>
      <div class="meta-data--full">
         <ul class="meta-list">
            <li class="meta-list__item"><span class="fa fa-twitter"></span></li>
            <li class="meta-list__item">{{$element->content->retweeted_status->user->screen_name or 'JoeCianflone' }}</li>
            <li class="meta-list__item"><time data-livestamp="{{ $element->item_created_at }}" datetime="{{ $element->item_created_at }}">{{ $element->item_created_at }}</time></li>
         </ul>
      </div>
   </blockquote>
</article>
