<!doctype html>
<html lang="ja">
<head>
    <title>Index</title>
    <style>
        th{background-color: red;padding: 10px;}
        td{background-color:#eee;padding: 10px;}
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{!!$msg!!}</p>
    <ol>
    @foreach ($data as $item)
    <li>
        {{$item->name}} [{{$item->mail}}, {{$item->age}}]
    </li>
    @endforeach
    </ol>
    <br>
    {!! $paginator->link() !!}
</body>
</html>