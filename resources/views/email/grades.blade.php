<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Вашу команду кто-то оценил!</h1>
    <p>
        <h3>Команда "{{ $evaluator }}" поставила вашей команде следующие оценки: </h3>
        <div>
            <h4>Дизайн: {{ $grade->design }}</h4>
            <h4>Юзабилити: {{ $grade->usability }}</h4>
            <h4>Верстка: {{ $grade->layout }}</h4>
            <h4>Реализация: {{ $grade->implementation }}</h4>
        </div>
    </p>
</body>
</html>
