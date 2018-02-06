<!DOCTYPE html>
<html xmlns:layout="http://www.ultraq.net.nz/web/thymeleaf/layout" xmlns:th="http://www.thymeleaf.org/">
<head>
    <title>Kakaopay Sample</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
</head>
<body>
</body>
<script th:inline="javascript">
    var kakaopay = {
        ref: null,
    };

    kakaopay.ref = window.open('', 'paypopup', 'width=426,height=510,toolbar=no');
    if (kakaopay.ref) {
        setTimeout(function(){
            kakaopay.ref.location.href="{{$response->next_redirect_pc_url}}";
        }, 0);
    } else {
        throw new Error("popup을 열 수 없습니다!(cannot open popup)");
    }
</script>
</html>

