<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('/css/mainSlick.css') }}">
    <link rel="stylesheet" href="{{ url('/css/membership.css') }}">
    <link rel="stylesheet" href="{{ url('/css/proRelated.css') }}">
    <link rel="stylesheet" href="{{ url('/css/userRelated.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <title>펫펫</title>
</head>
<body>
    {{ $slot }}
    <script type="text/javascript" src="{{ url('/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/category.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/product.js') }}"></script>
</body>
</html>