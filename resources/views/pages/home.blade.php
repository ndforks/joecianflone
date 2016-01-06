@extends ('layouts.master')

@section('signature', 'stream')

@section('main')

   @if (! is_null($pinned))
      @include("fragments.stream.pinned-summary")
   @endif

   @foreach ($stream->data as $element)

      @if ($element->type === "tweet" && $element->is_pinned === false)
         @include("fragments.stream.tweet")
      @endif

      @if ($element->type === "article" && $element->is_pinned === false)
         @include("fragments.stream.article-summary")
      @endif

      <hr class="rule">
   @endforeach

   @include("fragments.stream.pagination")

@stop
