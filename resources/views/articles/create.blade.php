@extends('layouts.article')

<form action="{{ route ('articles.store') }}" method="post">
   @csrf
   <input type="text" name="title" placeholder="Title">
   @error('title')
      {{ $message }}
   @enderror
   <br>
   <textarea name="text" placeholder="Text"></textarea>
   <br>
   <button type="submit">Create Btn</button>
</form>