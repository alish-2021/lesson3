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
      <form method="post" action="{{ route('articles.destroy', $article) }}">
         @csrf
         @method('delete')
         <input type="hidden" name="id" value="{{ $article->id }}">
         <button type="submit">Delete</button>
      </form>
   </div>
   <hr>
   <br>
@endforeach