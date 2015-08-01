
<ul class="paginator__list">
   @if (! is_null($stream->prev_page_url))
      <li class="paginator__item"><a href="{{ $stream->prev_page_url }}" title="Previous Page"><span class="fa fa-arrow-circle-left"></a></li>
   @endif
   @for ($i=1; $i <= $stream->last_page; $i++)
      <li class="paginator__item"><a href="?page={{$i}}" title="Go to page number {{$i}}">{{ $i }}</a></li>
   @endfor
   @if (! is_null($stream->next_page_url))
      <li class="paginator__item"><a href="{{ $stream->next_page_url }}" title="Next Page"><span class="fa fa-arrow-circle-right"></span></a></li>
   @endif
</ul>
