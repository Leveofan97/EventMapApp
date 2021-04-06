<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EventMap</title>
</head>
<body>
<div id="app"></div>
<script>
    window.initialState = {};
    @isset($user)
        window.initialState.user = {!! json_encode($user) !!};
    @endisset
</script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>

