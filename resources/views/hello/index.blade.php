<!doctype html>
<html lang="ja">
<head>
    <title>Index</title>
    <link href="{{ mix('css/app.css') }}"  rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{{$msg}}</p>
    <input type="button" value="クリック" v-bind:disabled="flag" />
    <div id="app">
        <app></app>
    </div>
    <div id="app2">
        <app2></app2>
    </div>

    <script src="{{ mix('js/app.js')}}"></script>
</body>


</html>