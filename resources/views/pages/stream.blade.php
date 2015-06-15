@extends ('layouts.master')

@section('main')
   <h3 class="" style="text-transform: uppercase;">{{$stream[0]->type}}</h3>
   @foreach ($stream as $element)

      @if ($element->type === "twitter")
         @include("fragments.stream.tweet")
      @endif

      @if ($element->type === "article")
         @include("fragments.stream.article-summary")
      @endif

   @endforeach

@stop
