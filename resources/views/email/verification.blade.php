<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Письмо для подтверждения почты</h1>
    <h3>Ваша команда "{{$team->login}}" примет участие в предстоящем мероприятии.
        Подтвердите почту для авторизации.</h3>
    <h3> 6-значный код для подтверждения почты:</h3>
    <div>{{$code}}</div>
    <h3>Обратите внимание, 6-значный код будет доступен не дольше 1 часа!</h3>
</body>
</html>
