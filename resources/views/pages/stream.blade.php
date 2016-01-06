@extends ('layouts.master')

@section('page-title', 'Stream of '.str_plural($stream->data[0]->type).'| Joe Cianflone | joecianflone.co')
@section('description', '')

@section('og-sitename', 'joecianflone.co')
@section('og-title', 'Stream of '.str_plural($stream->data[0]->type).'| Joe Cianflone | joecianflone.co')
@section('og-type', 'website')
@section('og-description', '')

@section('t-url', 'https://joecianflone.co')
@section('t-title', 'Stream of '.str_plural($stream->data[0]->type).'| Joe Cianflone | joecianflone.co')
@section('t-description', '')

@section('signature', 'stream '.$stream->data[0]->type)

@section('main')
   <h3 class="type-headline">{{str_plural($stream->data[0]->type)}}</h3>
   @foreach ($stream->data as $element)

      @if ($element->type === "tweet")
         @include("fragments.stream.tweet")
      @endif

      @if ($element->type === "article")
         @include("fragments.stream.article-summary")
      @endif

   @endforeach
@stop
