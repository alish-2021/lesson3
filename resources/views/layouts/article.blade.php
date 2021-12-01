<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>{{ $pageTitle }}</title>
</head>
<body>
   <ul>
      <li><a href="{{ route('articles.index') }}">Article List</a></li>
      <li><a href="{{ route('articles.create') }}">Article Create</a></li>
   </ul>
</body>
</html>