<form action="{{ url('card/' . $card->getId()) }}" method="POST">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <input type="hidden" name="boardId" value="{{ $board->getId() }}"/>
    <input type="hidden" name="listId" value="{{ $list->getId() }}"/>

    <div class="input-field col m12">
        <input id="name" type="text" class="validate" name="name" value="{{ $card->getName() }}">
        <label for="name">Name</label>
    </div>
    <div class="input-field col m12">
        <input id="description" type="text" class="validate" name="description" value="{{ $card->getDescription() }}">
        <label for="description">Beschreibung</label>
    </div>
    <button type="submit" class="waves-effect waves-light btn">Ändern</button>
</form>