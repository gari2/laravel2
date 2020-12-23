<!doctype html>
<html lang="ja">
<head>
    <title>Index</title>
    {{-- <link href="/css/app.css"  rel="stylesheet"> --}}
    ……必要に応じて記述……
 
</head>
<body>
    <h1>Hello/Index</h1>
    <div>
        <form action="/hello" method="POST">
            @csrf
            <input type="text" id="find" name="find" value="{{$input}}">
            <input type="submit">
        </form>
    </div>
    <hr>
    <table>
        @foreach ($data as $item)
            <tr>
            <th>{{$item->id}}</th>
            <td>{{$item->all_data}}</td>
            </tr>
        @endforeach
    </table>
    <hr>
</body>


</html>