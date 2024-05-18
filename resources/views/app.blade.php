<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//unpkg.com/element-plus/dist/index.css" />

    <title>ًApplication</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div id="app"></div>
@vite('resources/js/main.js')
</body>
</html>
