<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>House</title>
</head>
<body>
<h1>House details</h1>
@foreach($house as $h)
    <p>
        ID: {{ $h->id }} -
        Street Name: {{ $h->title }} -
        Description: {{ $h->description }} -
        Price: {{ $h->price }} -
        Surface: {{ $h->surface }} m² -
        Status: {{ $h->status }} -
        Province: {{ $h->location }}
    </p>
@endforeach
</body>
</html>
