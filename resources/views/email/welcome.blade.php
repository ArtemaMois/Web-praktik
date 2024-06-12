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
<h1>Вы записались на Хакатон</h1>
<div>Ваша команда {{$team->name}} примет участие в предстоящем хакатоне.</div>
<div>Список участников вашей команды:</div>
<div>
    @foreach($users as $user)
        <div>{{$user->name}}</div>
    @endforeach
</div>
</body>
</html>
