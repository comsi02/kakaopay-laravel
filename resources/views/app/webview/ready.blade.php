<!DOCTYPE html>
<html xmlns:layout="http://www.ultraq.net.nz/web/thymeleaf/layout" xmlns:th="http://www.thymeleaf.org/">
<head>
    <title>Kakaopay Sample</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
</head>
<body>
<a href="/">go to index page</a>
</body>
<!--결제대기화면을 웹뷰로 띄우면 결제대기화면에서 결제창 커스텀스킴이 호출된다.-->
<!--When you call payment stand-by screen, app custom url sheme will be called. -->
<script th:inline="javascript" type="text/javascript">
    document.location.href = "{{$webviewUrl}}";
</script>
</html>
