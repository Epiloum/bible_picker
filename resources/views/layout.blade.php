<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>성경공유@yield('title')</title>
<script src="/js/@yield('script')"></script>
<link rel="stylesheet" href="/css/@yield('css')" />
</head>
<body>
@yield('content')
</body>
</html>
