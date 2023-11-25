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

                        <div class="row d-flex justify-content-around align-items-center">
                            <p class="block accepted" id="accepted_{{$post->id}}">Заявка принята!!</p>
                        </div>

                        <div class="row d-flex justify-content-around align-items-center">
                            <p class="block denied"  id="denied_{{$post->id}}">Заявка отклонена!</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <script>
        // Функция для скрытия всех блоков
        function hideAllBlocks(cardId) {
            var blocks = document.querySelectorAll('.block');
            blocks.forEach(function(block) {
                if (block.id.startsWith('accepted_' + cardId) || block.id.startsWith('denied_' + cardId)) {
                    block.style.display = 'none';
                }
            });
        }

        // Функция для обработки нажатия на кнопку
        function handleButtonClick(cardId, blockClass) {
            hideAllBlocks(cardId); // Скрываем все блоки
            var blockToShow = document.getElementById(blockClass + '_' + cardId);
            blockToShow.style.display = 'block'; // Показываем выбранный блок
        }

        // Обработчики событий для кнопок
        var acceptButtons = document.querySelectorAll('.accept');
        var denyButtons = document.querySelectorAll('.deny');

        acceptButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var cardId = button.getAttribute('data-card-id');
                handleButtonClick(cardId, 'accepted');
            });
        });

        denyButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var cardId = button.getAttribute('data-card-id');
                handleButtonClick(cardId, 'denied');
            });
        });
    </script>
</body>
</html>
