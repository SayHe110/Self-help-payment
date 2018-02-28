<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hello</title>
</head>
<body>
<div id="app">

</div>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/hello.js') }}"></script>

</body>
</html>