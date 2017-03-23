<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trello Test</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.css"/>

</head>
<body style="background-color: #9e9e9e;">
<div class="container">
    <div class="row">
        <div class="m12">
            <h3>{{ $board->getName() }}</h3>
        </div>
    </div>
    <div class="row">
        @foreach($lists as $list)
            <div class="col m3">
                <div class="card grey lighten-2">
                    <div class="card-content black-text">
                        <span class="card-title">{{ $list->getName() }}</span>
                        @if(count($cards = $list->getCards()) > 0)
                            @foreach($cards as $card)
                                <div class="row">
                                    <div class="m12">
                                        @include('partials.card')
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                @include('partials.addCard')
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.js"></script>
</body>
</html>
