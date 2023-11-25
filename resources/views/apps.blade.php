<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card_style {
            width: 15vw;
            margin: 0 20px;
        }
        @media only screen and (max-width: 1600px) {
            .card_style {
                width: 20vw;
                margin: 0 20px;
            }
        }
        @media only screen and (max-width: 1300px) {
            .card_style {
                width: 25vw;
                margin: 0 15px;
            }
        }
        @media only screen and (max-width: 1000px) {
            .card_style {
                width: 30vw;
                margin: 0 10px;
            }
        }
        @media only screen and (max-width: 800px) {
            .card_style {
                width: 45vw;
                margin: 0 10px;
            }
        }
        @media only screen and (max-width: 600px) {
            .card_style {
                width: 55vw;
                margin: 0 10px;
            }
        }
        @media only screen and (max-width: 400px) {
            .card_style {
                width: 70vw;
                margin: 0 auto;
            }
        }
        .accept-btn {
            color: lime;
        }
        .deny-btn {
            color: red;
        }
        .block {
            display: none;
        }
        body{
            background: #f1f3f8;
        }
        .card-header p{
            margin: 0;
            font-size: 18px;
            color: #6cb657;
        }
        .card_style {
            position: relative;
            overflow: hidden;
        }

        .accept-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 0;
            height: 0;
            background: radial-gradient(circle, transparent 0%, #32cd32 80%);
            border-radius: 50%;
            opacity: 0;
            transition: width 0.3s ease, height 0.3s ease, opacity 0.3s ease;
        }

        .accept-btn:hover::after {
            width: 400%; /* Измените размер градиента по вашему усмотрению */
            height: 400%; /* Измените размер градиента по вашему усмотрению */
            opacity: 1;
        }

        .deny-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 0;
            height: 0;
            background: radial-gradient(circle, transparent 0%, #dc3545 80%);
            border-radius: 50%;
            opacity: 0;
            transition: width 0.3s ease, height 0.3s ease, opacity 0.3s ease;
        }

        .deny-btn:hover::after {
            width: 400%; /* Измените размер градиента по вашему усмотрению */
            height: 400%; /* Измените размер градиента по вашему усмотрению */
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-around">
            
            @foreach($posts as $post)
                <div class="card d-inline-block card_style mb-4" id="card_{{$post->id}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->occupation}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Возраст: {{$post->age}}</li>
                        <li class="list-group-item">Сумма займа: {{$post->num_of_loan}}</li>
                        <li class="list-group-item">Месяц: {{$post->month}}</li>
                    </ul>
                    <div class="card-body">
                        <div class="row d-flex justify-content-around align-items-center">
                            <a href="#" class="card-link accept-btn accept" data-card-id="{{$post->id}}">Принять</a>
                            <a href="#" class="card-link deny-btn deny" data-card-id="{{$post->id}}">Отказать</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Находим все элементы с классом 'accept' и 'deny'
            var acceptButtons = document.querySelectorAll('.accept');
            var denyButtons = document.querySelectorAll('.deny');

            // Добавляем обработчик события для каждой кнопки 'Принять'
            acceptButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var cardId = button.getAttribute('data-card-id');
                    var card = document.getElementById('card_' + cardId);
                    fadeOutAndRemove(card);
                });
            });

            // Добавляем обработчик события для каждой кнопки 'Отказать'
            denyButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var cardId = button.getAttribute('data-card-id');
                    var card = document.getElementById('card_' + cardId);
                    fadeOutAndRemove(card);
                });
            });

            // Функция для анимированного скрытия элемента
            function fadeOutAndRemove(element) {
                var opacity = 1;
                var timer = setInterval(function() {
                    if (opacity <= 0.1) {
                        clearInterval(timer);
                        element.style.display = 'none';
                    }
                    element.style.opacity = opacity;
                    opacity -= 0.35;
                }, 50);
            }
        });


    </script>
</body>
</html>
