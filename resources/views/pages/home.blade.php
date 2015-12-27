@extends ('layouts.master')

@section('main')

   @if (! is_null($pinned))
      @include("fragments.stream.pinned-summary")
   @endif

   @foreach ($stream->data as $element)

      @if ($element->type === "tweet")
         @include("fragments.stream.tweet")
      @endif

      @if ($element->type === "article")
         @include("fragments.stream.article-summary")
      @endif

      <hr class="rule">
   @endforeach

   @include("fragments.stream.pagination")

@stop
