<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{--指定是手机设备--}}
    <meta name="viewport" content="width=device-width , initial-scale=1,user-scalable=0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/weui.css">
    <link rel="stylesheet" href="/css/book.css">
    <link rel="stylesheet" href="/css/swipe.css">

</head>
<body>
<div class="bk_title_bar">
    <img class="bk_back" src="/images/back.png" alt="" onclick="history.go(-1);">
    <p class="bk_title_content"></p>
    <img class="bk_menu" src="/images/menu.png" alt="" onclick="onMenuClick();">
</div>
<div class="page">@yield('content')</div>


</body>
<script src="/js/jquery-1.11.2.min.js"></script>
<script src="/js/swipe.min.js"></script>
<script type="text/javascript">
    $('.bk_title_content').html(document.title);
</script>
@yield('my-js')
</html>
