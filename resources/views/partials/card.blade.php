<div class="card-panel grey lighten-1 black-text">
    <strong>{{ $card->getName() }}</strong>
    <p>{{ $card->getDescription() }}</p>

    <hr/>

    <strong>Kommentare</strong>
    @if(count($comments = $card->getActions(['filter' => 'commentCard'])) > 0)
        @foreach($comments as $comment)
            <p>{{ $comment['data']['text'] }}</p>
        @endforeach
    @else
        <p><i>Keine Kommentare</i></p>
    @endif
    <a href="{{ url('card/' . $card->getId() . '/addComment') }}">Random Comment</a>

    <hr/>

    @include('partials.editForm')
</div>