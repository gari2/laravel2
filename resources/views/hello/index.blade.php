<!doctype html>
<html lang="ja">
<head>
    <title>Index</title>
    <link href="{{ mix('css/app.css') }}"  rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{{$msg}}</p>
    <input type="button" value="クリック" v-bind:disabled="flag" />
    <div id="app">
        <app></app>
    </div>
    <div id="app2">
        <app2>
        </app2>
    </div>
    <div id="app3">
        <app3>
        </app3>
    </div>
    <script src="{{ mix('js/app.js')}}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
</body>


</html>