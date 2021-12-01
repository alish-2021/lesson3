@extends('layouts.article')

<form action="/lesson3/public/articles/update" method="put">
   @csrf
   <input type="hidden" name="id" value="{{ $article->id }}">
   <br>
   <input type="text" name="title" placeholder="Title" value="{{ $article->title }}">
   @error('title')
      {{ $message }}
   @enderror
   <br>
   <textarea name="text" placeholder="Text">{{ $article->text }}</textarea>
   <br>
   <button type="submit">Edit Btn</button>
</form>