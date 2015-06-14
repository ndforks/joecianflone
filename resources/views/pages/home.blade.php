@extends ('layouts.master')

@section('main')

   @include("fragments.stream.pinned-summary")

   @foreach ($stream as $element)

      @if ($element->type === "twitter")
         @include("fragments.stream.tweet")
      @endif

      @if ($element->type === "article")
         @include("fragments.stream.article-summary")
      @endif

      <hr class="rule">
   @endforeach

@stop
