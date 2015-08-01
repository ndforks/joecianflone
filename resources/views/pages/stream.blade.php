@extends ('layouts.master')

@section('main')
   <h3 class="type-headline">{{$stream->data[0]->type}}</h3>
   @foreach ($stream->data as $element)

      @if ($element->type === "twitter")
         @include("fragments.stream.tweet")
      @endif

      @if ($element->type === "article")
         @include("fragments.stream.article-summary")
      @endif

   @endforeach
@stop
