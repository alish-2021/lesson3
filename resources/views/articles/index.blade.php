@extends('layouts.article')

@foreach ($articles as $article)
   <div>
      <a href="{{ route('articles.index') }}/{{ $article->id }}">
         {{ $article->title }}
      </a>
      <p>
         {{ $article->text }}
      </p>
      <a href="{{ route('articles.index') }}/{{ $article->id }}/edit">Update</a>
   </div>
   <hr>
   <br>
@endforeach